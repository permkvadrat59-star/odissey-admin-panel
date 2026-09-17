<?php
/**
 * ACF-поля темы «Одиссей».
 * Регистрируются кодом (не кликами в админке) — так они версионируются
 * и одинаковы локально и на проде. Требуется плагин ACF (>= 6.3, repeater бесплатный).
 */
if (!defined('ABSPATH')) exit;

add_action('acf/init', function () {
    if (!function_exists('acf_add_local_field_group')) return;

    // ── Сотрудник: должность и телефон (фото — «Изображение записи», ФИО — заголовок) ──
    acf_add_local_field_group([
        'key'    => 'group_odissey_team',
        'title'  => 'Данные сотрудника',
        'fields' => [
            [
                'key'   => 'field_odissey_team_role',
                'label' => 'Должность',
                'name'  => 'role',
                'type'  => 'text',
                'instructions' => 'Напр. «Начальник охраны».',
            ],
            [
                'key'   => 'field_odissey_team_phone',
                'label' => 'Телефон',
                'name'  => 'phone',
                'type'  => 'text',
                'instructions' => 'Напр. «+7 922 382-66-15». Пусто — телефон не показывается.',
            ],
        ],
        'location' => [
            [['param' => 'post_type', 'operator' => '==', 'value' => 'odissey_team']],
        ],
        'position' => 'normal',
    ]);

    // ── Документы и материалы страницы (учебные планы, вопросы к экзамену и пр.) ──
    acf_add_local_field_group([
        'key'    => 'group_odissey_docs',
        'title'  => 'Документы и материалы',
        'fields' => [[
            'key'          => 'field_odissey_docs',
            'label'        => 'Файлы для скачивания',
            'name'         => 'docs_list',
            'type'         => 'repeater',
            'instructions' => 'Учебные планы, вопросы к экзамену, положения. Чтобы заменить файл — откройте строку и загрузите новый.',
            'layout'       => 'block',
            'button_label' => 'Добавить документ',
            'sub_fields'   => [
                [
                    'key'   => 'field_odissey_docs_section',
                    'label' => 'Раздел',
                    'name'  => 'section',
                    'type'  => 'text',
                    'instructions' => 'Группирует файлы: «Гражданам», «Охранникам», «Руководителям ЧОП», «Документы центра».',
                    'wrapper' => ['width' => '25'],
                ],
                [
                    'key'   => 'field_odissey_docs_title',
                    'label' => 'Название',
                    'name'  => 'title',
                    'type'  => 'text',
                    'required' => 1,
                    'wrapper' => ['width' => '40'],
                ],
                [
                    'key'   => 'field_odissey_docs_file',
                    'label' => 'Файл',
                    'name'  => 'file',
                    'type'  => 'file',
                    'return_format' => 'array',
                    'library' => 'all',
                    'wrapper' => ['width' => '35'],
                ],
            ],
        ]],
        'location' => [
            [['param' => 'post_type', 'operator' => '==', 'value' => 'page']],
        ],
        'menu_order' => 6,
        'position'   => 'normal',
        'description'=> 'Файлы, которые посетитель может скачать со страницы.',
    ]);

    // ── Прайс страницы: список позиций (услуга · цена · примечание) ──
    acf_add_local_field_group([
        'key'    => 'group_odissey_price',
        'title'  => 'Прайс (цены услуг)',
        'fields' => [[
            'key'          => 'field_odissey_price',
            'label'        => 'Позиции прайса',
            'name'         => 'price_list',
            'type'         => 'repeater',
            'instructions' => 'Список услуг с ценами. Порядок — перетаскиванием. Чтобы убрать услугу — «Удалить строку».',
            'layout'       => 'table',
            'button_label' => 'Добавить услугу',
            'sub_fields'   => [
                [
                    'key'   => 'field_odissey_price_section',
                    'label' => 'Раздел',
                    'name'  => 'section',
                    'type'  => 'text',
                    'instructions' => 'Необязательно. Группирует позиции (напр. «Занятия», «Подарочные карты»). Пусто — общий список.',
                    'wrapper' => ['width' => '20'],
                ],
                [
                    'key'   => 'field_odissey_price_name',
                    'label' => 'Услуга',
                    'name'  => 'name',
                    'type'  => 'text',
                    'required' => 1,
                    'wrapper' => ['width' => '28'],
                ],
                [
                    'key'   => 'field_odissey_price_price',
                    'label' => 'Цена',
                    'name'  => 'price',
                    'type'  => 'text',
                    'instructions' => 'Напр. «2 680 ₽»',
                    'required' => 1,
                    'wrapper' => ['width' => '17'],
                ],
                [
                    'key'   => 'field_odissey_price_note',
                    'label' => 'Примечание',
                    'name'  => 'note',
                    'type'  => 'textarea',
                    'rows'  => 2,
                    'new_lines' => '',
                    'wrapper' => ['width' => '35'],
                ],
            ],
        ]],
        // показываем на страницах разделов, где есть прайс
        'location' => [
            [['param' => 'post_type', 'operator' => '==', 'value' => 'page']],
        ],
        'menu_order' => 5,
        'position'   => 'normal',
        'description'=> 'Цены услуг. Выводятся на страницах Тир, Обучение, Охрана, Полиграф.',
    ]);

    // ── Фотоблоки страницы: галереи с подписью (выезды, занятия и т.п.) ──
    acf_add_local_field_group([
        'key'    => 'group_odissey_photos',
        'title'  => 'Фотоблоки',
        'fields' => [[
            'key'          => 'field_odissey_photos',
            'label'        => 'Фотографии',
            'name'         => 'photo_list',
            'type'         => 'repeater',
            'instructions' => 'Фото с подписью для галерей страницы (напр. «Одиссей на выезде», «Занятия в классе»). Раздел — служебная метка, группирует карточки одного блока.',
            'layout'       => 'block',
            'button_label' => 'Добавить фото',
            'sub_fields'   => [
                [
                    'key'   => 'field_odissey_photos_section',
                    'label' => 'Раздел',
                    'name'  => 'section',
                    'type'  => 'text',
                    'instructions' => 'Группирует фото одного блока, напр. «Выезды», «Занятия».',
                    'wrapper' => ['width' => '20'],
                ],
                [
                    'key'   => 'field_odissey_photos_image',
                    'label' => 'Фото',
                    'name'  => 'image',
                    'type'  => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'required' => 1,
                    'wrapper' => ['width' => '25'],
                ],
                [
                    'key'   => 'field_odissey_photos_title',
                    'label' => 'Заголовок подписи',
                    'name'  => 'title',
                    'type'  => 'text',
                    'wrapper' => ['width' => '25'],
                ],
                [
                    'key'   => 'field_odissey_photos_subtitle',
                    'label' => 'Текст подписи',
                    'name'  => 'subtitle',
                    'type'  => 'text',
                    'wrapper' => ['width' => '30'],
                ],
            ],
        ]],
        'location' => [
            [['param' => 'post_type', 'operator' => '==', 'value' => 'page']],
        ],
        'menu_order' => 7,
        'position'   => 'normal',
        'description'=> 'Фотогалереи с подписями. Одна и та же страница может иметь несколько разделов (разные фотоблоки), различай их полем «Раздел».',
    ]);

    // ── Арсенал (оружие): карточки оружия на странице «Тир» ──
    acf_add_local_field_group([
        'key'    => 'group_odissey_weapons',
        'title'  => 'Арсенал (оружие)',
        'fields' => [[
            'key'          => 'field_odissey_weapons',
            'label'        => 'Единицы оружия',
            'name'         => 'weapon_list',
            'type'         => 'repeater',
            'instructions' => 'Карточки в блоке «Арсенал клуба». Порядок — перетаскиванием, нумерация «01/, 02/...» проставляется автоматически.',
            'layout'       => 'block',
            'button_label' => 'Добавить оружие',
            'sub_fields'   => [
                [
                    'key'   => 'field_odissey_weapons_image',
                    'label' => 'Фото',
                    'name'  => 'image',
                    'type'  => 'image',
                    'return_format' => 'array',
                    'preview_size'  => 'medium',
                    'required' => 1,
                    'wrapper' => ['width' => '25'],
                ],
                [
                    'key'   => 'field_odissey_weapons_mirror',
                    'label' => 'Отзеркалить фото',
                    'name'  => 'mirror',
                    'type'  => 'true_false',
                    'instructions' => 'Развернуть фото по горизонтали (если оружие смотрит не в ту сторону).',
                    'ui'    => 1,
                    'wrapper' => ['width' => '10'],
                ],
                [
                    'key'   => 'field_odissey_weapons_name',
                    'label' => 'Название',
                    'name'  => 'name',
                    'type'  => 'text',
                    'required' => 1,
                    'wrapper' => ['width' => '30'],
                ],
                [
                    'key'   => 'field_odissey_weapons_desc',
                    'label' => 'Описание',
                    'name'  => 'description',
                    'type'  => 'textarea',
                    'rows'  => 2,
                    'new_lines' => '',
                    'wrapper' => ['width' => '35'],
                ],
            ],
        ]],
        'location' => [
            [['param' => 'post_type', 'operator' => '==', 'value' => 'page']],
        ],
        'menu_order' => 8,
        'position'   => 'normal',
        'description'=> 'Оружие в блоке «Арсенал клуба» на странице Тир.',
    ]);
});

/**
 * Хелпер вывода прайса: возвращает позиции нужного раздела (или все).
 * @param string $section '' = все позиции; иначе — только с этим разделом.
 * @return array список ['name','price','note']
 */
function odissey_price_rows($section = '') {
    if (!function_exists('get_field')) return [];
    $rows = get_field('price_list');
    if (!$rows) return [];
    $out = [];
    foreach ($rows as $r) {
        $sec = trim($r['section'] ?? '');
        if ($section === '' || $sec === $section) {
            $out[] = ['name' => $r['name'] ?? '', 'price' => $r['price'] ?? '', 'note' => $r['note'] ?? ''];
        }
    }
    return $out;
}

/**
 * Документы страницы: файлы нужного раздела (или все).
 * @return array список ['title','url','ext','size'] — size уже в КБ/МБ строкой
 */
function odissey_doc_rows($section = '') {
    if (!function_exists('get_field')) return [];
    $rows = get_field('docs_list');
    if (!$rows) return [];
    $out = [];
    foreach ($rows as $r) {
        $sec = trim($r['section'] ?? '');
        if ($section !== '' && $sec !== $section) continue;
        $f = $r['file'] ?? null;
        if (!$f) continue;
        // ACF отдаёт массив, ID или URL — в зависимости от того, как поле сохранили
        if (is_array($f)) {
            $url   = $f['url'] ?? '';
            $bytes = (int) ($f['filesize'] ?? 0);
        } elseif (is_numeric($f)) {
            $url   = (string) wp_get_attachment_url((int) $f);
            $path  = get_attached_file((int) $f);
            $bytes = ($path && file_exists($path)) ? filesize($path) : 0;
        } else {
            $url   = (string) $f;
            $bytes = 0;
        }
        if ($url === '') continue;
        $out[] = [
            'title' => $r['title'] ?? '',
            'url'   => $url,
            'ext'   => strtoupper(pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION)),
            'size'  => $bytes ? ($bytes >= 1048576 ? round($bytes / 1048576, 1) . ' МБ' : round($bytes / 1024) . ' КБ') : '',
        ];
    }
    return $out;
}

/**
 * Разделы документов по порядку (уникальные section в порядке появления).
 */
function odissey_doc_sections() {
    if (!function_exists('get_field')) return [];
    $rows = get_field('docs_list');
    if (!$rows) return [];
    $secs = [];
    foreach ($rows as $r) {
        $s = trim($r['section'] ?? '');
        if ($s !== '' && !in_array($s, $secs, true)) $secs[] = $s;
    }
    return $secs;
}

/**
 * Разделы прайса по порядку (уникальные section в порядке появления).
 */
function odissey_price_sections() {
    if (!function_exists('get_field')) return [];
    $rows = get_field('price_list');
    if (!$rows) return [];
    $secs = [];
    foreach ($rows as $r) {
        $s = trim($r['section'] ?? '');
        if (!in_array($s, $secs, true)) $secs[] = $s;
    }
    return $secs;
}

/**
 * Приводит значение ACF-поля «Изображение» к единому виду ['url'=>...,'alt'=>...].
 * ACF при чтении обычно отдаёт массив (return_format=array), но для строк
 * репитера, сохранённых напрямую через update_field() (см. inc/seed-content.php),
 * иногда возвращает голый ID вложения — учитываем оба варианта, иначе фото
 * молча не показывается на сайте при полностью рабочих текстовых полях.
 * @param mixed $img значение поля: int|string ID, массив ACF или null
 * @return array|null ['url', 'alt'] или null, если картинки нет/не найдена
 */
function odissey_normalize_image($img) {
    if (is_array($img) && !empty($img['url'])) {
        return ['url' => $img['url'], 'alt' => $img['alt'] ?? ''];
    }
    if (is_numeric($img)) {
        $id = (int) $img;
        $url = wp_get_attachment_image_url($id, 'large');
        if (!$url) return null;
        $alt = get_post_meta($id, '_wp_attachment_image_alt', true);
        return ['url' => $url, 'alt' => (string) $alt];
    }
    return null;
}

/**
 * Фотоблок нужного раздела текущей страницы (или страницы $page_id).
 * @param string   $section раздел (напр. «Выезды», «Занятия»); '' — все фото страницы
 * @param int|null $page_id ID страницы; null — текущая (полезно для главной,
 *                          которая показывает фото со страницы другого раздела)
 * @return array список ['image' => ['url'=>...,'alt'=>...], 'title', 'subtitle']
 */
function odissey_photo_rows($section = '', $page_id = null) {
    if (!function_exists('get_field')) return [];
    $rows = $page_id ? get_field('photo_list', $page_id) : get_field('photo_list');
    if (!$rows) return [];
    $out = [];
    foreach ($rows as $r) {
        $sec = trim($r['section'] ?? '');
        if ($section === '' || $sec === $section) {
            $out[] = ['image' => odissey_normalize_image($r['image'] ?? null), 'title' => $r['title'] ?? '', 'subtitle' => $r['subtitle'] ?? ''];
        }
    }
    return $out;
}

/**
 * Оружие текущей страницы (карточки «Арсенал клуба»).
 * @return array список ['image', 'mirror', 'name', 'description']
 */
function odissey_weapon_rows() {
    if (!function_exists('get_field')) return [];
    $rows = get_field('weapon_list');
    if (!$rows) return [];
    $out = [];
    foreach ($rows as $r) {
        $out[] = [
            'image'       => odissey_normalize_image($r['image'] ?? null),
            'mirror'      => !empty($r['mirror']),
            'name'        => $r['name'] ?? '',
            'description' => $r['description'] ?? '',
        ];
    }
    return $out;
}
