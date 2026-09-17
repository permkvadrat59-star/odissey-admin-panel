<?php
/**
 * Шаблон страницы «tir» темы «Одиссей».
 * Перенос из tir.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="hero-video hero-video--page">
  <picture>
    <source media="(max-width:700px)" srcset="<?php echo $A; ?>/photo/tir_hero_range_v3_mobile.webp">
    <img class="hero-video-media" style="object-position:50% 42%" src="<?php echo $A; ?>/photo/tir_hero_range_v3.webp" alt="Стрелковая галерея тира «Одиссей»: оружие, мишени, снаряжение">
  </picture>
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Тир</nav>
    <div class="kicker">ССК «Одиссей» · первый закрытый клуб Перми · с 2011 года</div>
    <h1>Боевой стрелковый тир</h1>
    <p class="hero-sub hero-sub--mobile-hide">Стрельба из боевого оружия под руководством инструкторов, метание ножей, экспозиции оружия и техники времён Великой Отечественной. Работаем по курсам стрельб КС МВД РФ.</p>
    <div class="cta-row"><button class="btn btn-red" type="button" data-cta data-tema="Стрелковый тир">Записаться</button><a class="btn btn-line" href="#arsenal">Смотреть арсенал</a></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell--compact stat"><b><span data-count="30">30</span><i> м</i></b><span>стрелковая галерея</span></div>
    <div class="cell cell--compact stat"><b data-count="26">26</b><span>единиц оружия: от ПМ до пулемёта Максим</span></div>
    <div class="cell cell--compact stat"><b data-count="2011">2011</b><span>год основания клуба</span></div>
  </div>
  <!-- график работы отдельной полосой: заказчик просил, чтобы его видели все -->
  <div class="hours-band rv">
    <div class="hb-main">
      <span class="hb-label">График работы тира</span>
      <b class="hb-days">Среда – воскресенье</b>
      <span class="hb-time">12:00–20:00</span>
    </div>
    <div class="hb-side">
      <span class="hb-note">Запись строго в рабочие дни тира</span>
      <a class="hb-phone" href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_tir'))); ?>"><?php echo esc_html(odissey_opt('phone_tir')); ?></a>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <?php foreach (odissey_price_rows('Занятия') as $r): ?>
    <div class="cell cell-flex pr-cell">
      <div class="nm"><?php echo esc_html($r['name']); ?></div>
      <div class="pr"><?php echo esc_html($r['price']); ?></div>
      <?php if ($r['note'] !== ''): ?><p><?php echo esc_html($r['note']); ?></p><?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Подарочные карты</span>
      <h2>Подарить стрельбу</h2>
      <p>Три курса под уровень: от первого знакомства с оружием до уверенного владения.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <?php foreach (odissey_price_rows('Подарочные карты') as $r): $parts = explode('; ', $r['note'], 2); ?>
    <div class="cell cell-flex pr-cell">
      <div class="nm"><?php echo esc_html($r['name']); ?></div>
      <div class="pr"><?php echo esc_html($r['price']); ?></div>
      <p><?php if (count($parts) > 1): ?><b style="color:var(--ink)"><?php echo esc_html($parts[0]); ?></b><br><?php echo esc_html($parts[1]); else: echo esc_html($r['note']); endif; ?></p>
      <div class="bottom"><button class="btn btn-red" type="button" data-cta data-tema="Подарочная карта в тир">Заказать карту</button></div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="bento bento--seamtop rv">
    <div class="cell cell--static">
      <span class="kicker">Правила сертификата</span>
      <ul class="list" style="margin-top:12px">
        <li>Действует ровно год с даты приобретения</li>
        <li>По сертификату стреляет один человек – тот, на чьё имя он приобретён</li>
        <li>Используется за один визит; оружие – российского производства</li>
        <li>Инструктор проводит инструктаж и оценивает уровень подготовки стрелка</li>
        <li>Количество выстрелов рассчитано на стрельбу из пистолета. При стрельбе из другого оружия делаем перерасчёт: выстрел дороже – выстрелов меньше</li>
      </ul>
    </div>
  </div>
</section>

<section class="wrap canvas" id="arsenal" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Арсенал клуба</span>
      <h2>26 единиц оружия</h2>
      <p>От пистолета Макарова до пулемёта Максим. Всё оружие боевое, стрельба только с инструктором.</p>
    </div>
  </div>
  <div class="bento g-4 bento--seamtop rv">
    <?php $wi = 0; foreach (odissey_weapon_rows() as $w): $wi++; if (!$w['image']) continue; ?>
    <div class="cell wcard">
      <div class="shot"><img<?php echo $w['mirror'] ? ' class="mirror"' : ''; ?> src="<?php echo esc_url($w['image']['url']); ?>" alt="<?php echo esc_attr($w['name']); ?>" loading="lazy"></div>
      <div class="body"><span class="num"><?php printf('%02d /', $wi); ?></span><h3><?php echo esc_html($w['name']); ?></h3><?php if ($w['description'] !== ''): ?><p><?php echo esc_html($w['description']); ?></p><?php endif; ?></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Галерея</span>
      <h2>Как всё устроено</h2>
      <p>Закрытый тир: рубеж, мишени, инструктаж перед каждой стрельбой.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="photo-cell" style="min-height:300px"><img src="<?php echo $A; ?>/photo/tir/tir_galereya.webp" alt="Стрелковая галерея тира" loading="lazy"><div class="photo-cap"><b>Стрелковая галерея</b>рубеж и мишенное поле</div></div>
    <div class="photo-cell" style="min-height:300px"><img src="<?php echo $A; ?>/photo/tir/tir_instruktazh.webp" alt="Инструктаж перед стрельбой" loading="lazy"><div class="photo-cap"><b>Инструктаж</b>до выстрела – разбор правил</div></div>
    <div class="photo-cell" style="min-height:300px"><img src="<?php echo $A; ?>/photo/tir/tir_mishen.webp" alt="Мишень с кучным попаданием, наушники и очки" loading="lazy"><div class="photo-cap"><b>Результат на руки</b>мишень забираете с собой</div></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell-flex">
      <span class="kicker">Правила</span>
      <h3 style="margin:8px 0 12px">Поведение в тире</h3>
      <ul class="list" style="margin-top:4px;font-size:13px">
        <li>Вход по документу, удостоверяющему личность; регистрация обязательна</li>
        <li>Перед стрельбой – инструктаж по мерам безопасности под подпись</li>
        <li>Оружие всегда направлено в сторону мишеней, работа строго по командам инструктора</li>
        <li>Наушники и защитные очки обязательны – выдаём на месте, покупать ничего не нужно</li>
        <li>В состоянии опьянения посетители не допускаются</li>
      </ul>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Сервис</span>
      <h3 style="margin:8px 0 12px">Ремонт оружия</h3>
      <p style="font-size:13px;color:var(--muted)">Официальная оружейная мастерская: диагностика, чистка, ремонт любой сложности.</p>
      <div class="gold-note" style="margin-top:12px;font-size:12px">Лицензия Минпромторга РФ № 14806-ПО от 11.12.2020</div>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Экскурсии</span>
      <h3 style="margin:8px 0 12px">Музей и полигон</h3>
      <p style="font-size:13px;color:var(--muted)">Экспозиции оружия и военной техники, выезды на полигон, программы для школ – бесплатно.</p>
      <div class="bottom"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('muzey')); ?>">В музей</a></div>
    </div>
  </div>
</section>

<!-- образовательная деятельность клуба: программа подготовки и правовая часть,
     которую обучающийся изучает самостоятельно (условие самой программы) -->
<section class="wrap canvas" id="obuchenie" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Образовательная деятельность</span>
      <h2>Программа подготовки ПРСОО ССК «Одиссей»</h2>
      <p>Дополнительная общеобразовательная общеразвивающая программа для взрослых от 21 года — базовый спортивно-ознакомительный этап. Знакомит с видами гражданского оружия и правилами его применения, даёт первые навыки меткой стрельбы. Общая трудоёмкость — 150 минут.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="cell cell-flex">
      <span class="kicker">Теория</span>
      <h3 style="margin:8px 0 12px">Правовая подготовка</h3>
      <p style="font-size:13px;color:var(--muted)">2 академических часа. Изучается дистанционно и самостоятельно: закон «Об оружии», Гражданский и Уголовный кодексы, КоАП, правила оборота оружия и правила безопасного обращения. Весь перечень со ссылками на действующие тексты — на отдельной странице.</p>
      <div class="bottom" style="display:flex;flex-wrap:wrap;gap:8px">
        <?php $prog = odissey_tir_file('programma-podgotovki-ssk.pdf'); ?>
        <?php if ($prog): ?><a class="btn btn-red" href="<?php echo esc_url($prog); ?>" target="_blank" rel="noopener">Программа, PDF</a><?php endif; ?>
        <a class="btn btn-line" href="<?php echo esc_url(trailingslashit(odissey_link('tir')) . 'pravovaya-podgotovka/'); ?>">Материалы для изучения</a>
      </div>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Практика</span>
      <h3 style="margin:8px 0 12px">Огневая подготовка</h3>
      <p style="font-size:13px;color:var(--muted)">60 минут в галерее с инструктором: приёмы прицеливания, упражнения из короткоствольного и длинноствольного оружия либо вводное занятие в пулевую или практическую стрельбу. Индивидуально или в группе до 6 человек, по записи.</p>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Допуск</span>
      <h3 style="margin:8px 0 12px">Что нужно принести</h3>
      <ul class="list" style="margin-top:4px;font-size:13px">
        <li>Паспорт гражданина РФ</li>
        <li>Медицинские справки 002 О/у и 003 О/у либо действующее разрешение серии РОХа или служебное удостоверение</li>
        <li>Справка об отсутствии судимости</li>
      </ul>
    </div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Фестивали и выезды</span>
      <h2>Одиссей на выезде</h2>
      <p>Клуб регулярно выходит за пределы галереи: стенды оружия, сборка-разборка, стрельба под контролем инструкторов на городских фестивалях и полигоне.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <?php foreach (odissey_photo_rows('Выезды') as $p): if (!$p['image']) continue; ?>
    <div class="photo-cell"><img src="<?php echo esc_url($p['image']['url']); ?>" alt="<?php echo esc_attr($p['title']); ?>" loading="lazy"><div class="photo-cap"><b><?php echo esc_html($p['title']); ?></b><?php echo esc_html($p['subtitle']); ?></div></div>
    <?php endforeach; ?>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Готовы пострелять?</h2><p>Заявка на сайте или звонок в клуб – подберём программу и время.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta data-tema="Стрелковый тир">Оставить заявку</button>
      <a class="btn btn-white" href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_tir'))); ?>"><?php echo esc_html(odissey_opt('phone_tir')); ?></a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
