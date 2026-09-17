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
