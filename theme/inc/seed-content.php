<?php
/**
 * Одноразовый перенос хардкод-контента (оружие, фотоблоки) в новые ACF-поля.
 * Нужен только один раз — при первом включении этой версии темы на проде,
 * чтобы после перехода на репитеры страницы не оказались пустыми.
 * Срабатывает сам при заходе в админку, дальше отключается флагом.
 */
if (!defined('ABSPATH')) exit;

/**
 * Заводит файл темы (assets/photo/...) как вложение в медиабиблиотеку —
 * ACF-поле «Изображение» работает только с ID вложений, а эти фото лежат
 * прямо в теме, а не в uploads. Копирует файл один раз; при повторном
 * запуске находит уже созданное вложение по мета-метке и не дублирует.
 * @param string $rel_path путь внутри assets темы, напр. 'photo/tir/foo.webp'
 * @return int|false ID вложения или false, если файл не найден
 */
function odissey_seed_import_image($rel_path, $title = '') {
    $existing = get_posts([
        'post_type'      => 'attachment',
        'posts_per_page' => 1,
        'meta_key'       => '_odissey_seed_src',
        'meta_value'     => $rel_path,
        'fields'         => 'ids',
    ]);
    if ($existing) return $existing[0];

    $src = get_template_directory() . '/assets/' . ltrim($rel_path, '/');
    if (!file_exists($src)) return false;

    $upload_dir = wp_upload_dir();
    $filename   = wp_unique_filename($upload_dir['path'], basename($src));
    $dest       = trailingslashit($upload_dir['path']) . $filename;
    if (!copy($src, $dest)) return false;

    $filetype   = wp_check_filetype($filename, null);
    $attach_id  = wp_insert_attachment([
        'post_mime_type' => $filetype['type'],
        'post_title'     => $title !== '' ? $title : sanitize_file_name($filename),
        'post_content'   => '',
        'post_status'    => 'inherit',
    ], $dest);
    if (is_wp_error($attach_id) || !$attach_id) return false;

    require_once ABSPATH . 'wp-admin/includes/image.php';
    wp_update_attachment_metadata($attach_id, wp_generate_attachment_metadata($attach_id, $dest));
    update_post_meta($attach_id, '_odissey_seed_src', $rel_path);
    if ($title !== '') update_post_meta($attach_id, '_wp_attachment_image_alt', $title);

    return $attach_id;
}

function odissey_seed_content() {
    if (get_option('odissey_seeded_v1')) return;
    if (!function_exists('update_field')) return; // ACF ещё не активен — попробуем при следующем заходе в админку

    $tir = get_page_by_path('tir');
    $uc  = get_page_by_path('uc');

    // ── Арсенал (оружие) страницы «Тир» ──
    if ($tir && !get_field('weapon_list', $tir->ID)) {
        $weapons = [
            ['105-avtomat-kalashnikova-akms.webp', true,  'Автомат Калашникова (АКМС)', '7,62-мм автомат Калашникова принят на вооружение в СССР в 1949 году. Индекс ГРАУ – 56-А-212.'],
            ['106-ruchnoj-pulemet-kalashnikova.webp', true, 'Ручной пулемёт Калашникова', '7,62-мм ручной пулемёт Калашникова (РПК, Индекс ГРАУ – 6П2) – советский ручной пулемёт, созданный на основе автомата АКМ.'],
            ['11-pistolet-beretta-92-italija.webp', true, 'Пистолет Beretta 92 (Италия)', 'Классика итальянской оружейной школы. Калибр 9×19 мм, длина 217 мм, длина ствола 125 мм.'],
            ['14-pistolet-pulemet-glock-17.webp', true, 'Пистолет Glock 17', 'Четвёртое поколение. Пистолеты конструкции Гастона Глока серийно производятся в Австрии с начала 1980-х.'],
            ['15-pistolet-glock-34-glok-34-avstrija.webp', true, 'Пистолет Glock 34 (Австрия)', 'Модели 34 и 35 сделаны под спортивную стрельбу. Представлены в 1998 году, через год доработаны.'],
            ['16-pistolet-cz-75-sp-01-shadow-chehija.webp', true, 'Пистолет CZ-75 SP-01 Shadow (Чехия)', 'Оружейная компания Ceska Zbrojovka производит пистолеты CZ 75 уже свыше тридцати лет, а количество выпущенных за это время единиц приближается к трём четвертям миллиона.'],
            ['17-pistolet-k-100-grand-power-slovakija.webp', true, 'Пистолет K-100 Grand Power (Словакия)', 'Пистолет словацкой компании «Grand Power», разработан инженером Ярославом Курацина.'],
            ['18-pistolet-steyr-m9-a1-cal-919-avstrija.webp', false, 'Пистолет Steyr M9-A1 (Австрия)', 'В 1999 году австрийская компания Steyr Mannlicher представила новый пистолет серии Steyr M, созданный конструктором Вильгельмом Бубитсом.'],
            ['19-pistolet-colt-m1911-ssha.webp', false, 'Пистолет Colt M1911 (США)', 'Colt M1911 сначала применялся только в кавалерии армии США, полиция не пользовалась им из-за чрезмерной мощности патрона.'],
            ['20-samozarjadnyj-karabin-taurus-ct9-g2-brazilija.webp', true, 'Самозарядный карабин Taurus CT9 G2 (Бразилия)', 'Самозарядный карабин Taurus CT9 G2 под пистолетный боеприпас 9×19 Luger – новейшая модель от Taurus.'],
            ['21-revolver-taurus-94-brazilija.webp', false, 'Револьвер TAURUS 94 (Бразилия)', 'Классический револьвер с ударно-спусковым механизмом двойного действия. Тренировочное и спортивное оружие, держит быстрый темп стрельбы.'],
            ['22-revolver-taurus-66-cal357-mag-brazilija.webp', true, 'Револьвер Taurus 66 .357 Mag (Бразилия)', 'Мощный классический шестизарядный TAURUS 66 – полноразмерный спортивно-тренировочный револьвер.'],
            ['23-pistolet-taurus-24-7-brazilija.webp', false, 'Пистолет Taurus 24/7 (Бразилия)', 'Пистолеты Taurus серии 24/7 предназначены для вооружения полиции и гражданских лиц, впервые представлены в 2004 году.'],
            ['24-sportivnyj-pistolet-smith-amp-wesson-model-22a-ssha.webp', false, 'Спортивный пистолет Smith & Wesson model 22A (США)', 'Smith & Wesson (Смит-энд-Вессон) – крупнейший в США производитель огнестрельного оружия (в том числе револьверов).'],
            ['25-pistolet-jarygina-pja-mr-443-grach-viking-rossija.webp', false, 'Пистолет Ярыгина ПЯ МР-443 «Грач», «Викинг» (Россия)', 'Самозарядный пистолет российского производства, индекс ГРАУ – 6П35. Разработан коллективом конструкторов под руководством В. А. Ярыгина.'],
            ['26-pistolet-pulemet-kedr-rossija.webp', true, 'Пистолет-пулемёт «Кедр»', 'Разработан конструктором-оружейником Евгением Драгуновым. «КЕДР» – «Конструкция Евгения Драгунова».'],
            ['27-pistolet-makarova-sssr.webp', false, 'Пистолет Макарова (СССР)', '9-мм пистолет Макарова (ПМ, индекс ГАУ – 56-А-125) – самозарядный пистолет, разработанный советским конструктором Николаем Фёдоровичем Макаровым в 1948 году.'],
            ['28-pistolet-p-96-gsh-18-rossija.webp', false, 'Пистолет П-96, ГШ-18 (Россия)', 'П-96 «Эфа» – опытный российский самозарядный пистолет, разработанный в середине 1990х годов Тульским КБ Приборостроения в качестве армейского пистолета.'],
            ['29-pistolet-pulemet-shpagina-ppsh-.webp', true, 'Пистолет-пулемёт Шпагина (ППШ)', 'Пистолет-пулемёт конструкции Г. С. Шпагина (1897–1952) принят на вооружение в декабре 1940 года. Выпущено больше 6 миллионов экземпляров.'],
            ['30-pulemet-maksim.webp', true, 'Пулемёт Максим', 'Пулемёт Максим сконструирован Хайремом Стивенсом Максимом (4 февраля 1840 – 24 ноября 1916) в 1884 году.'],
            ['31-pulemet-djagtereva.webp', true, 'Пулемёт Дегтярёва', 'Ручной пулемёт ДП (Дегтярёва, пехотный) – один из первых образцов стрелкового оружия, созданных при советской власти.'],
            ['lebedev-pistolet.webp', false, 'Пистолет Лебедева (Россия)', 'Современный российский самозарядный пистолет под патрон 9×19 мм, разработан концерном «Калашников» на смену пистолету Макарова.'],
            ['mosina-vintovka.webp', false, 'Винтовка Мосина (СССР)', 'Легендарная «трёхлинейка» образца 1891/30 года – основное оружие пехоты Красной армии в годы Великой Отечественной войны.'],
        ];
        $rows = [];
        foreach ($weapons as [$file, $mirror, $name, $desc]) {
            $attach_id = odissey_seed_import_image('photo/oruzhie/card/' . $file, $name);
            if (!$attach_id) continue;
            $rows[] = ['image' => $attach_id, 'mirror' => $mirror, 'name' => $name, 'description' => $desc];
        }
        if ($rows) update_field('weapon_list', $rows, $tir->ID);
    }

    // ── Фотоблок «Выезды» на странице «Тир» ──
    if ($tir && !get_field('photo_list', $tir->ID)) {
        $rows = [
            ['photo/tir/vyezd_stend_oruzhiya.webp', 'Стенды оружия', 'потрогать легенды руками'],
            ['photo/tir/vyezd_stend_tolpa.webp', 'Городские фестивали', 'выставка клуба'],
            ['photo/tir/vyezd_sborka_razborka.webp', 'Сборка-разборка', 'классика нормативов'],
        ];
        $out = [];
        foreach ($rows as [$file, $title, $subtitle]) {
            $attach_id = odissey_seed_import_image($file, $title);
            if (!$attach_id) continue;
            $out[] = ['section' => 'Выезды', 'image' => $attach_id, 'title' => $title, 'subtitle' => $subtitle];
        }
        if ($out) update_field('photo_list', $out, $tir->ID);
    }

    // ── Фотоблок «Занятия» на странице «Учебный центр» ──
    if ($uc && !get_field('photo_list', $uc->ID)) {
        $rows = [
            ['photo/uc_zanyatie.webp', 'Занятия в классе', 'теория, разбор ситуаций с инструктором'],
            ['photo/uc_ekzamen.webp', 'Экзамен и документы', 'периодическая проверка по графику'],
        ];
        $out = [];
        foreach ($rows as [$file, $title, $subtitle]) {
            $attach_id = odissey_seed_import_image($file, $title);
            if (!$attach_id) continue;
            $out[] = ['section' => 'Занятия', 'image' => $attach_id, 'title' => $title, 'subtitle' => $subtitle];
        }
        if ($out) update_field('photo_list', $out, $uc->ID);
    }

    update_option('odissey_seeded_v1', 1);
}
add_action('admin_init', 'odissey_seed_content');
