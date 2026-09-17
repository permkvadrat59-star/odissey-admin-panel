<?php
/**
 * Шаблон страницы «uc» темы «Одиссей».
 * Перенос из uc.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="hero-video hero-video--page">
  <video class="hero-video-media" style="object-position:50% 20%;transform:scale(1.2)" muted playsinline poster="<?php echo $A; ?>/photo/uc_klass_poster.jpg">
    <source src="<?php echo $A; ?>/video/uc_klass.mp4" type="video/mp4">
  </video>
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Учебный центр</nav>
    <div class="kicker">ЧУ ДПО «УЦ Одиссей» · лицензия № 6801</div>
    <h1>Учебный центр</h1>
    <p class="hero-sub hero-sub--mobile-hide">Подготовка и повышение квалификации частных охранников 4–6 разрядов, курсы по оружию для граждан, подготовка руководителей ЧОП. Свой тир для практики, экзамены на месте.</p>
    <div class="cta-row"><button class="btn btn-red" type="button" data-cta data-tema="Обучение в УЦ">Записаться</button><a class="btn btn-line" href="tel:+73422061911">+7 (342) 20-61-911</a></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Программы</span>
      <h2>Восемь программ обучения</h2>
      <p>Периодическую проверку принимают сотрудники Росгвардии. Курс по безопасному обращению с оружием – по вторникам и средам, строго по записи.</p>
    </div>
  </div>
  <div class="bento g-4 bento--seamtop rv">
    <?php $i = 0; foreach (odissey_price_rows('Программы') as $r): $i++; ?>
    <div class="cell cell-flex">
      <span class="num"><?php printf('%02d /', $i); ?></span>
      <h3 style="margin:8px 0 12px"><?php echo esc_html($r['name']); ?></h3>
      <?php if ($r['note'] !== ''): ?><p style="font-size:13px;color:var(--muted)"><?php echo esc_html($r['note']); ?></p><?php endif; ?>
      <div class="bottom"><?php if ($r['price'] !== ''): ?><div class="meta" style="color:var(--ink)"><?php echo esc_html($r['price']); ?></div><?php endif; ?></div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="bento g-2 bento--seamtop rv">
    <div class="photo-cell" style="min-height:320px"><img src="<?php echo $A; ?>/photo/uc_zanyatie.webp" alt="Занятие в учебном классе УЦ «Одиссей»" loading="lazy"><div class="photo-cap"><b>Занятия в классе</b>теория, разбор ситуаций с инструктором</div></div>
    <div class="photo-cell" style="min-height:320px"><img src="<?php echo $A; ?>/photo/uc_ekzamen.webp" alt="Квалификационный экзамен охранника" loading="lazy"><div class="photo-cap"><b>Экзамен и документы</b>периодическая проверка по графику</div></div>
  </div>
  <div class="bento bento--seamtop rv">
    <div class="cell cell--compact cell--static">
      <div class="gold-note">Лицензия № 6801 от 14.07.2020, Министерство образования и науки Пермского края · ЧУ ДПО «Учебный центр «Одиссей»</div>
    </div>
  </div>
</section>

<!-- КУРС ПО БЕЗОПАСНОМУ ОБРАЩЕНИЮ С ОРУЖИЕМ: развёрнутый блок с РОХа -->
<section class="wrap canvas" id="oruzhie" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Владельцам гражданского оружия</span>
      <h2>Курс безопасного обращения с оружием</h2>
      <p>Обучение по программе подготовки лиц в целях изучения правил безопасного обращения с оружием и приобретения навыков. Экзамен принимают сотрудники Управления Росгвардии по Пермскому краю и Управления лицензионно-разрешительной работы.</p>
    </div>
  </div>
  <?php $ors = odissey_price_rows('Курс по оружию'); if ($ors): ?>
  <div class="bento g-3 bento--seamtop rv">
    <?php foreach ($ors as $r): ?>
    <div class="cell cell-flex pr-cell">
      <div class="nm"><?php echo esc_html($r['name']); ?></div>
      <div class="pr"><?php echo esc_html($r['price']); ?></div>
      <?php if ($r['note'] !== ''): ?><p><?php echo esc_html($r['note']); ?></p><?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
  <?php endif; ?>
  <div class="hours-band rv">
    <div class="hb-main">
      <span class="hb-label">Занятия — строго по записи</span>
      <b class="hb-days">Вторник 14:00 и 17:30</b><span class="hb-time">Среда 10:00</span>
    </div>
    <div class="hb-side">
      <span class="hb-note">Экзамен — каждую пятницу с 12:00</span>
      <a class="hb-phone" href="tel:+73422061911">+7 (342) 20-61-911</a>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="cell cell-flex">
      <span class="kicker">При себе</span>
      <h3 style="margin:8px 0 12px">Документы на занятие</h3>
      <ul class="list" style="margin-top:4px;font-size:13px">
        <li>Паспорт гражданина РФ</li>
        <li>Медицинское заключение об отсутствии противопоказаний к владению оружием</li>
        <li>Для продления — действующее разрешение (РОХа)</li>
      </ul>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Экзамен</span>
      <h3 style="margin:8px 0 12px">Из чего состоит</h3>
      <ul class="list" style="margin-top:4px;font-size:13px">
        <li>Теория — тест на компьютере</li>
        <li>Практика — стрельба из травматического пистолета МР-79-9ТМ и карабина «Сайга-410К»</li>
        <li>Не уверены в себе — берите тренировку: курс и зачётные упражнения заранее</li>
      </ul>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">По итогу</span>
      <h3 style="margin:8px 0 12px">Что получите</h3>
      <ul class="list" style="margin-top:4px;font-size:13px">
        <li>Свидетельство о прохождении курсов безопасного обращения с оружием</li>
        <li>Акт проверки знаний правил безопасного обращения с оружием</li>
        <li>При продлении РОХа выдаётся акт проверки знаний</li>
      </ul>
    </div>
  </div>
</section>

<!-- МАТЕРИАЛЫ И ДОКУМЕНТЫ -->
<?php $doc_secs = odissey_doc_sections(); if ($doc_secs): ?>
<section class="wrap canvas" id="materialy" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Скачать</span>
      <h2>Материалы и документы</h2>
      <p>Вопросы к экзамену, правила выполнения упражнений и учебные планы — те же, по которым идёт подготовка в центре.</p>
    </div>
  </div>
  <?php $gi = 0; foreach ($doc_secs as $sec): $docs = odissey_doc_rows($sec); if (!$docs) continue; $gi++;
        $n = count($docs);
        // склонение: 1 файл / 2-4 файла / 5+ файлов, с поправкой на 11-14
        $tail = ($n % 100 >= 11 && $n % 100 <= 14) ? 'файлов'
              : ([1 => 'файл', 2 => 'файла', 3 => 'файла', 4 => 'файла'][$n % 10] ?? 'файлов'); ?>
  <details class="doc-group rv"<?php echo $gi === 1 ? ' open' : ''; ?>>
    <summary class="cell cell--compact doc-head">
      <span class="doc-sec"><?php echo esc_html($sec); ?></span>
      <span class="doc-count"><?php echo esc_html($n . ' ' . $tail); ?></span>
      <svg class="doc-chev" width="14" height="14" viewBox="0 0 24 24" aria-hidden="true"><path fill="none" stroke="currentColor" stroke-width="2.6" d="m5 8.5 7 7 7-7"/></svg>
    </summary>
    <div class="bento doc-list">
      <?php foreach ($docs as $d): ?>
      <a class="cell cell--compact doc-row" href="<?php echo esc_url($d['url']); ?>" target="_blank" rel="noopener">
        <span class="doc-ext"><?php echo esc_html($d['ext']); ?></span>
        <span class="doc-name"><?php echo esc_html($d['title']); ?></span>
        <span class="doc-size"><?php echo esc_html($d['size']); ?></span>
      </a>
      <?php endforeach; ?>
    </div>
  </details>
  <?php endforeach; ?>
</section>
<?php endif; ?>

<!-- ОФИЦИАЛЬНЫЕ СВЕДЕНИЯ (обязательный раздел на сайте образовательной организации) -->
<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-split rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Официальная информация</span>
      <h2>Сведения об образовательной организации</h2>
      <p>Лицензия, устав, образовательные программы, учебные планы, педагогический состав
      и отчётность ЧУ ДПО «Учебный центр «Одиссей» — на официальном сайте образовательной организации.</p>
    </div>
    <div class="cell cell--big cell--static" style="display:flex;flex-direction:column;justify-content:center;gap:12px">
      <a class="btn btn-red" href="https://ucenter.gpodyssey.ru/sveden" target="_blank" rel="noopener">Открыть раздел «Сведения»</a>
      <a class="btn btn-line" href="https://ucenter.gpodyssey.ru/" target="_blank" rel="noopener">Сайт учебного центра</a>
    </div>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Записаться на обучение</h2><p>Подскажем программу и ближайшие даты.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta data-tema="Обучение в УЦ">Оставить заявку</button>
      <a class="btn btn-white" href="tel:+73422061911">+7 (342) 20-61-911</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
