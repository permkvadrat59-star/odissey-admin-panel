<?php
/**
 * Шаблон страницы «o-nas» темы «Одиссей».
 * Перенос из o-nas.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="hero-video hero-video--page">
  <picture>
    <source media="(max-width:700px)" srcset="<?php echo $A; ?>/photo/onas_hero_guard_v2_mobile.webp">
    <img class="hero-video-media" style="object-position:72% 27%" src="<?php echo $A; ?>/photo/onas_hero_guard_v2.webp" alt="Сотрудник охранного предприятия «Одиссей» у бизнес-центра">
  </picture>
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>О нас</nav>
    <div class="kicker">Группа предприятий «Одиссей» · Пермь</div>
    <h1>О нас</h1>
    <p class="hero-sub">Пять предприятий в Перми: от поста охраны на объекте до музея военной техники. Работаем с 2006 года.</p>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">О группе</span>
      <h2>Чем занимается группа</h2>
      <p>Группа предприятий «Одиссей» работает в Перми и Пермском крае. Собираем безопасность в одну систему: физическая и экономическая защита, технические средства охраны, юридическая поддержка.</p>
      <p style="margin-top:16px">Кадровую основу группы составляют бывшие сотрудники силовых структур – люди, для которых охрана была профессией до «Одиссея». Договор, регламент и понятная ответственность за объект – без этого не работаем.</p>
    </div>
  </div>

  <div class="bento g-split bento--seamtop rv">
    <div class="cell cell--big cell--static">
      <h3 style="margin-bottom:16px">Структура группы предприятий</h3>
      <ul class="list">
        <li><a href="<?php echo esc_url(odissey_link('ohrana')); ?>">ООО «Одиссей-СБ»</a> – охранное предприятие: физическая и пультовая охрана, телохранители, охрана мероприятий</li>
        <li><a href="<?php echo esc_url(odissey_link('uc')); ?>">ЧУ ДПО «УЦ Одиссей»</a> – учебный центр: подготовка и повышение квалификации охранников, курсы по оружию</li>
        <li><a href="<?php echo esc_url(odissey_link('tir')); ?>">ПРСОО ССК «Одиссей»</a> – боевой стрелковый тир, первый закрытый стрелковый клуб Перми (с 2011 года)</li>
        <li><a href="<?php echo esc_url(odissey_link('poligraf')); ?>">ООО Техцентр «Одиссей»</a> – центр детекции лжи, проверки на полиграфе «РИФ»</li>
        <li><a href="<?php echo esc_url(odissey_link('dela')); ?>">АНО ВПК «Патриот»</a> – военно-патриотический клуб, бесплатные экскурсии для школ Перми</li>
      </ul>
    </div>
    <div class="cell cell--big cell--static" style="display:flex;flex-direction:column;justify-content:center">
      <span class="kicker" style="margin-bottom:8px">Руководство</span>
      <h3 style="margin-bottom:12px">Самвел Максимович Шахназарян</h3>
      <p style="color:var(--muted)">Председатель ССК «Одиссей» и АНО ВПК «Патриот». Организует стрелковые и военно-патриотические мероприятия для детей и подростков Пермского края, включая всероссийский фестиваль-форум «Виват, кадет!».</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="cell c-cell"><b>Генеральный директор «Одиссей-СБ»</b><div class="v" style="font-size:17px">Ермашов Олег Товиевич</div><span><a href="tel:+79223826700">+7 922 382-67-00</a> · <a href="tel:+79223335911">+7 922 333-59-11</a></span></div>
    <div class="cell c-cell"><b>Заместитель директора</b><div class="v" style="font-size:17px">Зинченко Спартак Павлович</div><span><a href="tel:+79222403991">+7 922 240-39-91</a></span></div>
    <div class="cell c-cell"><b>Начальник охраны</b><div class="v" style="font-size:17px">Зырянов Андрей Сергеевич</div><span><a href="tel:+79048470000">+7 904 847-00-00</a></span></div>
    <div class="cell c-cell"><b>Главный инженер</b><div class="v" style="font-size:17px">Лизунов Алексей Николаевич</div><span><a href="tel:+79223826641">+7 922 382-66-41</a></span></div>
    <div class="cell c-cell"><b>Главный бухгалтер</b><div class="v" style="font-size:17px">Щеколдина Ольга Николаевна</div><span><a href="tel:+79026469045">+7 902 64-69-045</a></span></div>
    <div class="cell c-cell"><b>Председатель ССК «Одиссей»</b><div class="v" style="font-size:17px">Шахназарян Самвел Максимович</div><span><a href="tel:+79223826615">+7 922 382-66-15</a></span></div>
  </div>
</section>

<section class="wrap canvas" id="licenzii" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Документы</span>
      <h2>Лицензии и свидетельства</h2>
      <p>Охранная деятельность – ЧО № 056449, образовательная – № Л035-01212-59/00203920, ремонт оружия – № 14806-ПО Минпромторга РФ. Плюс пожарная безопасность, регистрационные документы предприятий группы и свидетельства специалистов. Всего 17 документов – нажмите, чтобы открыть скан.</p>
    </div>
  </div>
  <div class="doc-scroll bento--seamtop rv">
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_01.jpg" target="_blank" rel="noopener" title="Лицензия на образовательную деятельность"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_01.webp" alt="Выписка из реестра лицензий на образовательную деятельность, ЧУ ДПО «Учебный центр «Одиссей»" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_02.jpg" target="_blank" rel="noopener" title="Приложение к лицензии на образование"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_02.webp" alt="Приложение к лицензии на образовательную деятельность, перечень программ" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_03.jpg" target="_blank" rel="noopener" title="Лицензия на охранную деятельность"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_03.webp" alt="Лицензия на осуществление частной охранной деятельности" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_04.jpg" target="_blank" rel="noopener" title="Приложение к лицензии на охрану"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_04.webp" alt="Приложение к лицензии на осуществление частной охранной деятельности, перечень разрешённых видов услуг" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_05.jpg" target="_blank" rel="noopener" title="Лицензия на пожарную безопасность"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_05.webp" alt="Лицензия МЧС России на монтаж и обслуживание средств пожарной безопасности" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_09.jpg" target="_blank" rel="noopener" title="Лицензия на ремонт оружия"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_09.webp" alt="Лицензия Минпромторга РФ на ремонт гражданского и служебного оружия" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_07.jpg" target="_blank" rel="noopener" title="Лицензия на образовательную деятельность"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_07.webp" alt="Лицензия на осуществление образовательной деятельности, Министерство образования Пермского края" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_08.jpg" target="_blank" rel="noopener" title="Приложение к лицензии на образование"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_08.webp" alt="Приложение к лицензии на осуществление образовательной деятельности от 14 июля 2020 года" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_11.jpg" target="_blank" rel="noopener" title="Свидетельство о регистрации НКО"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_11.webp" alt="Свидетельство о государственной регистрации некоммерческой организации, Учебный центр Одиссей" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_12.jpg" target="_blank" rel="noopener" title="Свидетельство о регистрации НКО"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_12.webp" alt="Свидетельство о государственной регистрации некоммерческой организации, Спортивно-стрелковый клуб Одиссей" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_16.jpg" target="_blank" rel="noopener" title="Свидетельство о постановке на учёт"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_16.webp" alt="Свидетельство о постановке на учёт в налоговом органе, Учебный центр Одиссей" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_15.jpg" target="_blank" rel="noopener" title="Свидетельство о постановке на учёт"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_15.webp" alt="Свидетельство о постановке на учёт в налоговом органе, Спортивно-стрелковый клуб Одиссей" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_13.jpg" target="_blank" rel="noopener" title="Свидетельство о постановке на учёт"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_13.webp" alt="Свидетельство о постановке на учёт в налоговом органе, ООО Одиссей-СБ" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_14.jpg" target="_blank" rel="noopener" title="Свидетельство о регистрации юрлица"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_14.webp" alt="Свидетельство о государственной регистрации юридического лица, ООО Одиссей-СБ" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_17.jpg" target="_blank" rel="noopener" title="Сертификат на программу «ОВД» РСПБ"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_17.webp" alt="Сертификат на аналитическую информационно-поисковую программу ОВД РСПБ" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_06.jpg" target="_blank" rel="noopener" title="Свидетельство специалиста-полиграфолога"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_06.webp" alt="Свидетельство о базовой подготовке специалиста по опросам с использованием полиграфа" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/licenzii/licenziya_10.jpg" target="_blank" rel="noopener" title="Свидетельство о повышении квалификации"><img src="<?php echo $A; ?>/photo/licenzii/thumbs/licenziya_10.webp" alt="Свидетельство о повышении квалификации по кадровому отбору с применением полиграфа" loading="lazy"></a>
  </div>
</section>

<section class="wrap canvas" id="gramoty" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Признание партнёров</span>
      <h2>Дипломы и грамоты</h2>
      <p>29 благодарственных писем и грамот от партнёров, органов власти и организаторов мероприятий: Министерство физической культуры и спорта Пермского края (фестиваль «Виват, кадет!»), Верхнекамская торгово-промышленная палата, Клуб промышленников и финансистов «Строгановский». Нажмите на грамоту, чтобы открыть её целиком.</p>
    </div>
  </div>
  <div class="doc-scroll bento--seamtop rv">
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_01.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_01_v2.webp" alt="Грамота или благодарственное письмо №1" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_02.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_02_v2.webp" alt="Грамота или благодарственное письмо №2" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_03.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_03_v2.webp" alt="Грамота или благодарственное письмо №3" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_04.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_04_v2.webp" alt="Грамота или благодарственное письмо №4" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_05.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_05_v2.webp" alt="Грамота или благодарственное письмо №5" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_06.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_06_v2.webp" alt="Грамота или благодарственное письмо №6" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_07.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_07_v2.webp" alt="Грамота или благодарственное письмо №7" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_08.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_08_v2.webp" alt="Грамота или благодарственное письмо №8" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_09.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_09_v2.webp" alt="Грамота или благодарственное письмо №9" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_10.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_10_v2.webp" alt="Грамота или благодарственное письмо №10" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_11.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_11_v2.webp" alt="Грамота или благодарственное письмо №11" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_12.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_12_v2.webp" alt="Грамота или благодарственное письмо №12" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_13.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_13_v2.webp" alt="Грамота или благодарственное письмо №13" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_14.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_14_v2.webp" alt="Грамота или благодарственное письмо №14" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_15.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_15_v2.webp" alt="Грамота или благодарственное письмо №15" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_16.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_16_v2.webp" alt="Грамота или благодарственное письмо №16" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_17.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_17_v2.webp" alt="Грамота или благодарственное письмо №17" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_18.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_18_v2.webp" alt="Грамота или благодарственное письмо №18" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_19.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_19_v2.webp" alt="Грамота или благодарственное письмо №19" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_20.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_20_v2.webp" alt="Грамота или благодарственное письмо №20" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_21.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_21_v2.webp" alt="Грамота или благодарственное письмо №21" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_22.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_22_v2.webp" alt="Грамота или благодарственное письмо №22" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_23.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_23_v2.webp" alt="Грамота или благодарственное письмо №23" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_24.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_24_v2.webp" alt="Грамота или благодарственное письмо №24" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_25.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_25_v2.webp" alt="Грамота или благодарственное письмо №25" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_26.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_26_v2.webp" alt="Грамота или благодарственное письмо №26" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_27.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_27_v2.webp" alt="Грамота или благодарственное письмо №27" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_28.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_28_v2.webp" alt="Грамота или благодарственное письмо №28" loading="lazy"></a>
    <a class="doc-cell" href="<?php echo $A; ?>/photo/gramoty/gramota_29.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_29_v2.webp" alt="Грамота или благодарственное письмо №29" loading="lazy"></a>
  </div>
</section>

<section class="wrap canvas" id="clienty" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Нам доверяют</span>
      <h2>Наши клиенты</h2>
      <p>Среди клиентов группы предприятий – промышленные, строительные, торговые и государственные организации Перми и края.</p>
    </div>
  </div>
  <div class="client-grid bento--seamtop rv">
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p01.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p02.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p03.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p04.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p05.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p06.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p07.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p08.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p09.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p10.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p11.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p12.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p13.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p14.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p15.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p16.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p17.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p18.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p19.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p20.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p21.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p22.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
    <div class="client-cell"><img src="<?php echo $A; ?>/photo/klienty/p23.webp" alt="Логотип клиента группы предприятий «Одиссей»" loading="lazy"></div>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Остались вопросы о группе предприятий?</h2><p>Ответим по любому направлению: охрана, обучение, тир, полиграф.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta>Связаться с нами</button>
    </div>
  </div>
</section>
<?php get_footer(); ?>
