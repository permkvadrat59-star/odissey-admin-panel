<?php
/**
 * Тема «Одиссей» — функции.
 * Перенос авторского статического редизайна на WordPress.
 */

if (!defined('ABSPATH')) exit;

define('ODISSEY_VER', '1.3.30');

/** Файл в uploads/tir — ссылка появляется только когда файл реально загружен. */
function odissey_tir_file($filename) {
    $u = wp_upload_dir();
    return file_exists($u['basedir'] . '/tir/' . $filename) ? $u['baseurl'] . '/tir/' . $filename : '';
}

// ACF-поля (прайс и пр.) — активны, если установлен плагин ACF
require_once get_template_directory() . '/inc/acf-fields.php';
// Перенос старого хардкод-контента (оружие, фотоблоки) в новые ACF-поля — один раз
require_once get_template_directory() . '/inc/seed-content.php';

/**
 * Базовая поддержка возможностей темы.
 */
function odissey_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('automatic-feed-links');

    // Меню шапки и подвала — заказчик правит через «Внешний вид → Меню».
    register_nav_menus([
        'primary' => 'Основное меню (шапка)',
        'footer'  => 'Меню подвала',
    ]);
}
add_action('after_setup_theme', 'odissey_setup');

/**
 * Подключение стилей и шрифтов.
 * Наш CSS лежит в assets/styles.css, шрифты — в assets/fonts.
 */
function odissey_assets() {
    $uri = get_template_directory_uri();
    wp_enqueue_style('odissey-fonts', $uri . '/assets/fonts/fonts.css', [], ODISSEY_VER);
    wp_enqueue_style('odissey-main', $uri . '/assets/styles.css', ['odissey-fonts'], ODISSEY_VER);
    wp_enqueue_script('odissey-main', $uri . '/assets/main.js', [], ODISSEY_VER, true);
}
add_action('wp_enqueue_scripts', 'odissey_assets');

/**
 * Ссылка на страницу по слагу (o-nas, ohrana, tir, ...).
 * В статике были файлы index.html/o-nas.html — здесь это WP-страницы с теми же слагами.
 */
function odissey_link($slug) {
    if ($slug === '' || $slug === 'index') return home_url('/');
    $page = get_page_by_path($slug);
    return $page ? get_permalink($page) : home_url('/' . $slug . '/');
}

/**
 * URL файла из assets темы (фото, лого).
 */
function odissey_asset($path) {
    return get_template_directory_uri() . '/assets/' . ltrim($path, '/');
}

/**
 * Пункты навигации — единый источник для шапки и подвала,
 * пока меню не заполнено в админке (fallback).
 */
function odissey_nav_items() {
    return [
        'o-nas'    => 'О нас',
        'ohrana'   => 'Охрана',
        'tir'      => 'Тир',
        'muzey'    => 'Музей',
        'uc'       => 'Учебный центр',
        'poligraf' => 'Полиграф',
        'dela'     => 'Добрые дела',
        'kontakty' => 'Контакты',
    ];
}

/**
 * Телефоны и адрес — из настроек темы (Внешний вид → Настроить → Контакты),
 * с запасными значениями из текущего дизайна.
 */
function odissey_opt($key) {
    $defaults = [
        'phone_main'  => '+7 (342) 20-66-911',
        'phone_tir'   => '+7 (342) 20-66-161',
        'phone_uc'    => '+7 (342) 20-61-911',
        'phone_duty1' => '+7 (342) 21-41-911',
        'phone_duty2' => '+7 (922) 333-29-11',
        'email'       => 'odyssey.security@mail.ru',
        'email_tir'   => 'tirodissey@mail.ru',
        'email_uc'    => 'dissey_uc@mail.ru',
        'address'     => 'Пермь, ул. Стахановская, 54Л',
    ];
    $val = get_theme_mod('odissey_' . $key, '');
    return $val !== '' ? $val : ($defaults[$key] ?? '');
}

/** tel: из телефона (только цифры и +) */
function odissey_tel($phone) {
    return 'tel:' . preg_replace('/[^\d+]/', '', $phone);
}

/**
 * Прайс с ЛЮБОЙ страницы по слагу (не только текущей) — чтобы главная
 * показывала те же позиции, что и страница раздела, без дублирования цен.
 * @param string $slug    слаг страницы, напр. 'tir', 'uc'
 * @param string $section '' = все позиции этой страницы; иначе — только раздел
 */
function odissey_price_rows_for($slug, $section = '') {
    $page = get_page_by_path($slug);
    if (!$page || !function_exists('get_field')) return [];
    $rows = get_field('price_list', $page->ID);
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
 * Настройки контактов в кастомайзере.
 */
function odissey_customize($wp) {
    $wp->add_section('odissey_contacts', ['title' => 'Контакты «Одиссей»', 'priority' => 30]);
    $fields = [
        'phone_main'  => 'Телефон (главный)',
        'phone_tir'   => 'Телефон тира',
        'phone_uc'    => 'Телефон учебного центра',
        'phone_duty1' => 'Дежурная часть 1',
        'phone_duty2' => 'Дежурная часть 2',
        'email'       => 'E-mail (охрана)',
        'email_tir'   => 'E-mail (тир)',
        'email_uc'    => 'E-mail (учебный центр)',
        'address'     => 'Адрес',
    ];
    foreach ($fields as $key => $label) {
        $wp->add_setting('odissey_' . $key, ['default' => '', 'sanitize_callback' => 'sanitize_text_field']);
        $wp->add_control('odissey_' . $key, ['label' => $label, 'section' => 'odissey_contacts', 'type' => 'text']);
    }
}
add_action('customize_register', 'odissey_customize');

/**
 * Почта-получатель заявки по теме обращения — заявки по тиру уходят
 * на почту тира, а не в общий ящик охраны.
 */
function odissey_lead_email($topic) {
    $tir_topics = ['Стрелковый тир', 'Подарочная карта в тир'];
    if (in_array($topic, $tir_topics, true)) {
        return odissey_opt('email_tir');
    }
    return odissey_opt('email');
}

/**
 * Приём заявки с формы.
 * Шлёт письмо на почту из настроек (по теме — см. odissey_lead_email())
 * и сохраняет копию как запись «Заявка».
 */
function odissey_handle_lead() {
    if (!isset($_POST['odissey_lead_nonce']) || !wp_verify_nonce($_POST['odissey_lead_nonce'], 'odissey_lead')) {
        wp_safe_redirect(home_url('/?lead=err')); exit;
    }
    // honeypot: бот заполнил скрытое поле — тихо выходим
    if (!empty($_POST['website'])) { wp_safe_redirect(home_url('/?lead=ok')); exit; }

    $name    = sanitize_text_field($_POST['name'] ?? '');
    $phone   = sanitize_text_field($_POST['phone'] ?? '');
    $topic   = sanitize_text_field($_POST['topic'] ?? '');
    $comment = sanitize_textarea_field($_POST['comment'] ?? '');
    $ref     = wp_get_referer() ?: home_url('/');

    $to      = odissey_lead_email($topic);
    $subject = 'Заявка с сайта: ' . ($topic ?: 'без темы');
    $body    = "Имя: {$name}\nТелефон: {$phone}\nТема: {$topic}\nКомментарий: {$comment}\n"
             . "Страница: {$ref}\n\nВсе заявки: " . admin_url('edit.php?post_type=odissey_lead') . "\n";
    // Отправитель на своём домене — иначе mail.ru кладёт письмо в спам как подделку
    $headers = [
        'Content-Type: text/plain; charset=UTF-8',
        'From: Сайт gpodyssey.ru <noreply@gpodyssey.ru>',
    ];
    wp_mail($to, $subject, $body, $headers);

    // Сохраняем копию, чтобы заявки не терялись, даже если письмо не дошло.
    wp_insert_post([
        'post_type'   => 'odissey_lead',
        'post_status' => 'private',
        'post_title'  => ($name ?: 'Аноним') . ' — ' . ($phone ?: '—'),
        'post_content'=> $body,
    ]);

    wp_safe_redirect(add_query_arg('lead', 'ok', $ref)); exit;
}
add_action('admin_post_nopriv_odissey_lead', 'odissey_handle_lead');
add_action('admin_post_odissey_lead', 'odissey_handle_lead');

/**
 * Тип записи «Доброе дело» — карточки на странице «Добрые дела».
 * Заказчик добавляет: заголовок, описание (текст), фото (изображение записи).
 * Порядок — через «Свойства → Порядок» (меньше число — выше).
 */
function odissey_register_deed_cpt() {
    register_post_type('odissey_deed', [
        'labels' => [
            'name'          => 'Добрые дела',
            'singular_name' => 'Доброе дело',
            'menu_name'     => 'Добрые дела',
            'add_new'       => 'Добавить дело',
            'add_new_item'  => 'Новое доброе дело',
            'edit_item'     => 'Редактировать дело',
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-heart',
        'menu_position'=> 22,
        'supports'     => ['title', 'editor', 'thumbnail', 'page-attributes'],
        'has_archive'  => false,
    ]);
}
add_action('init', 'odissey_register_deed_cpt');

/**
 * Тип записи «Сотрудник» — карточки команды на странице «Контакты».
 * Заказчик добавляет: ФИО (заголовок), фото (изображение записи),
 * должность и телефон (поля ACF). Порядок — «Свойства → Порядок».
 */
function odissey_register_team_cpt() {
    register_post_type('odissey_team', [
        'labels' => [
            'name'          => 'Команда',
            'singular_name' => 'Сотрудник',
            'menu_name'     => 'Команда',
            'add_new'       => 'Добавить сотрудника',
            'add_new_item'  => 'Новый сотрудник',
            'edit_item'     => 'Редактировать сотрудника',
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-groups',
        'menu_position'=> 23,
        'supports'     => ['title', 'thumbnail', 'page-attributes'],
        'has_archive'  => false,
    ]);
}
add_action('init', 'odissey_register_team_cpt');

/**
 * Список сотрудников для вывода: ФИО, должность, телефон, фото.
 */
/**
 * Размер портрета под карточку команды. Карточка 262 px по макету, на ретине нужно 520.
 * Штатный 'medium' даёт 225 px — из-за этого портреты выглядели замыленными.
 */
function odissey_team_image_size() {
    add_image_size('team-card', 520, 700, false);
}
add_action('after_setup_theme', 'odissey_team_image_size');

function odissey_team_members() {
    $q = new WP_Query([
        'post_type'      => 'odissey_team',
        'posts_per_page' => -1,
        'orderby'        => 'menu_order',
        'order'          => 'ASC',
    ]);
    $out = [];
    foreach ($q->posts as $p) {
        $out[] = [
            'name'  => get_the_title($p),
            'role'  => function_exists('get_field') ? (string) get_field('role', $p->ID) : get_post_meta($p->ID, 'role', true),
            'phone' => function_exists('get_field') ? (string) get_field('phone', $p->ID) : get_post_meta($p->ID, 'phone', true),
            // отдаём id вложения, а не готовый url: шаблон соберёт srcset,
            // иначе в карточку 262 px уходил файл 225 px и на ретине портрет мылился
            'photo_id' => get_post_thumbnail_id($p),
        ];
    }
    wp_reset_postdata();
    return $out;
}

/**
 * Тип записи «Заявки» — журнал обращений в админке.
 */
function odissey_register_lead_cpt() {
    register_post_type('odissey_lead', [
        'labels' => [
            'name'          => 'Заявки',
            'singular_name' => 'Заявка',
            'menu_name'     => 'Заявки',
        ],
        'public'       => false,
        'show_ui'      => true,
        'menu_icon'    => 'dashicons-phone',
        'supports'     => ['title', 'editor'],
        'capability_type' => 'post',
    ]);
}
add_action('init', 'odissey_register_lead_cpt');

/**
 * SEO: заголовки и описания страниц.
 * Тексты перенесены из статической версии редизайна — WP без плагина
 * своих description не выводит, а старый сайт их имел.
 */
function odissey_seo_map() {
    return [
        ''         => ['Одиссей – группа предприятий безопасности. Пермь',
                       'Охранное предприятие, учебный центр, боевой стрелковый тир и центр детекции лжи. С 2006 года обеспечиваем безопасность в Перми и Пермском крае.'],
        'o-nas'    => ['О компании «Одиссей» – история, структура, награды | Одиссей Пермь',
                       'Группа предприятий «Одиссей»: охрана, учебный центр, тир, полиграф и военно-патриотический клуб «Патриот» в Перми. История, структура группы, дипломы и благодарственные письма.'],
        'ohrana'   => ['Охранное предприятие «Одиссей-СБ» – Пермь',
                       'Физическая и пультовая охрана, телохранители, охрана мероприятий в Перми. Пультовая охрана – по договору, расчёт под объект.'],
        'tir'      => ['Боевой стрелковый тир «Одиссей» – Пермь',
                       'Первый закрытый частный стрелковый клуб Перми: 30-метровая галерея, 26 единиц боевого оружия, метание ножей, подарочные карты.'],
        'muzey'    => ['Музей военной техники «Одиссей» – Пермь',
                       '11 единиц военной техники на ходу: БРДМ-2, ГАЗ-67, миномёт ПМ-38, пулемёт Максим. Экскурсии для школ бесплатно.'],
        'uc'       => ['Учебный центр «Одиссей» – подготовка охранников в Перми',
                       'Профподготовка и повышение квалификации охранников 4–6 разрядов, периодические проверки, курс безопасного обращения с оружием и продление РОХа. Лицензия № 6801.'],
        'poligraf' => ['Центр детекции лжи «Одиссей» – проверки на полиграфе в Перми',
                       'Проверки на полиграфе «РИФ» в Перми: кандидаты, служебные расследования. Достоверность 95–99 %, 5000 ₽ за человека.'],
        'dela'     => ['Добрые дела – экскурсии и клуб «Патриот» | Одиссей Пермь',
                       'Бесплатные экскурсии для школьников Перми: стрелковый тир, музей военной техники, полевая кухня. Клуб «Патриот».'],
        'kontakty' => ['Контакты группы предприятий «Одиссей» – Пермь',
                       'Адрес, телефоны и заявка группе предприятий «Одиссей» в Перми: охрана, тир, учебный центр, полиграф.'],
    ];
}

/** Пара [title, description] для текущей страницы или null. */
function odissey_seo_current() {
    $slug = '';
    if (!is_front_page()) {
        $obj = get_queried_object();
        if (!($obj instanceof WP_Post)) return null;
        $slug = $obj->post_name;
    }
    $map = odissey_seo_map();
    return $map[$slug] ?? null;
}

add_filter('pre_get_document_title', function ($title) {
    $seo = odissey_seo_current();
    return $seo ? $seo[0] : $title;
});

add_action('wp_head', function () {
    $seo = odissey_seo_current();
    if (!$seo) return;
    $url = is_front_page() ? home_url('/') : get_permalink();
    $img = odissey_asset('photo/muzey_ekskursiya_poster.jpg');
    printf(
        '<meta name="description" content="%1$s">' . "\n" .
        '<link rel="canonical" href="%2$s">' . "\n" .
        '<meta property="og:type" content="website">' . "\n" .
        '<meta property="og:site_name" content="Группа предприятий «Одиссей»">' . "\n" .
        '<meta property="og:title" content="%3$s">' . "\n" .
        '<meta property="og:description" content="%1$s">' . "\n" .
        '<meta property="og:url" content="%2$s">' . "\n" .
        '<meta property="og:image" content="%4$s">' . "\n" .
        '<meta name="twitter:card" content="summary_large_image">' . "\n",
        esc_attr($seo[1]), esc_url($url), esc_attr($seo[0]), esc_url($img)
    );
}, 1);
