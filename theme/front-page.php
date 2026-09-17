<?php
/**
 * Главная страница темы «Одиссей».
 * Перенос из index.html статического редизайна.
 * TODO (этап 4): вынести цифры/тексты в редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<div id="intro" aria-hidden="true">
  <div class="intro-mark intro-mark--original"><img src="<?php echo $A; ?>/logo/odissey-emblem.png" alt="Одиссей — группа предприятий" width="237" height="355"></div>
  <div class="intro-bar"><span></span></div>
</div>


<!-- ГЕРОЙ: видео на весь экран -->
<section class="hero-video">
  <video class="hero-video-media mirror" muted playsinline poster="<?php echo $A; ?>/photo/tir_rubezh_poster.jpg">
    <source src="<?php echo $A; ?>/video/tir_rubezh.mp4" type="video/mp4">
  </video>
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <div class="kicker">Пермь и Пермский край · с 2006 года</div>
    <h1>Комплексные решения<br>в сфере безопасности</h1>
    <p class="hero-sub hero-sub--mobile-hide">Охранное предприятие, учебный центр, боевой стрелковый тир и центр детекции лжи – четыре предприятия одной группы.</p>
    <div class="cta-row">
      <button class="btn btn-red" type="button" data-cta>Оставить заявку</button>
      <a class="btn btn-line" href="#napravleniya">Все направления</a>
    </div>
    <div class="hero-badges">
      <span>Лицензия Росгвардии ЧО № 056449</span>
      <span>Дежурная часть 24/7</span>
      <span>Пермь, Стахановская, 54Л</span>
    </div>
  </div>
</section>

<section class="wrap" style="margin-top:80px">
  <!-- статы: бенто-строка под героем, рамка со всех сторон -->
  <div class="bento g-4 rv">
    <div class="cell cell--compact stat"><b data-count="17">17</b><span>лет на рынке безопасности</span></div>
    <div class="cell cell--compact stat"><b>24/7</b><span>дежурная часть и выезд ГБР</span></div>
    <div class="cell cell--compact stat"><b data-count="26">26</b><span>единиц оружия в собственном тире</span></div>
    <div class="cell cell--compact stat"><b data-count="2011">2011</b><span>год: первый закрытый стрелковый клуб Перми</span></div>
  </div>
</section>

<!-- НАПРАВЛЕНИЯ -->
<section class="wrap canvas" id="napravleniya" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Направления</span>
      <h2>Четыре направления</h2>
      <p>Каждым занимается отдельное предприятие группы. Цены открыты и указаны на сайте.</p>
    </div>
  </div>
  <div class="bento g-4 bento--seamtop rv">
    <a class="cell cell-flex dir" href="<?php echo esc_url(odissey_link('ohrana')); ?>">
      <div class="dir-shot"><img src="<?php echo $A; ?>/photo/napravlenie_ohrana.webp" alt="Сотрудник охраны Одиссей на объекте"></div>
      <span class="num">01 /</span>
      <h3>Охранное предприятие</h3>
      <p>Физическая и пультовая охрана, телохранители, охрана мероприятий.</p>
      <div class="bottom">
        <div class="price">по договору <small>/ расчёт под объект</small></div>
        <div class="go" style="margin-top:8px">Подробнее →</div>
      </div>
    </a>
    <a class="cell cell-flex dir" href="<?php echo esc_url(odissey_link('tir')); ?>">
      <div class="dir-shot"><img src="<?php echo $A; ?>/photo/napravlenie_tir.webp" alt="Стрельба в тире Одиссей"></div>
      <span class="num">02 /</span>
      <h3>Стрелковый тир</h3>
      <p>Первый закрытый частный стрелковый клуб Перми. Боевое оружие, инструкторы, музей техники.</p>
      <div class="bottom">
        <div class="price">от 2 680 ₽ <small>/ занятие</small></div>
        <div class="go" style="margin-top:8px">Подробнее →</div>
      </div>
    </a>
    <a class="cell cell-flex dir" href="<?php echo esc_url(odissey_link('uc')); ?>">
      <div class="dir-shot"><img src="<?php echo $A; ?>/photo/napravlenie_uc.webp" alt="Занятие в учебном центре Одиссей"></div>
      <span class="num">03 /</span>
      <h3>Учебный центр</h3>
      <p>Подготовка и повышение квалификации охранников 4–6 разрядов, курсы по оружию, экзамены.</p>
      <div class="bottom">
        <div class="price">от 1 200 ₽ <small>/ программа</small></div>
        <div class="go" style="margin-top:8px">Подробнее →</div>
      </div>
    </a>
    <a class="cell cell-flex dir" href="<?php echo esc_url(odissey_link('poligraf')); ?>">
      <div class="dir-shot"><img src="<?php echo $A; ?>/photo/napravlenie_poligraf.webp" alt="Кабинет проверки на полиграфе"></div>
      <span class="num">04 /</span>
      <h3>Детекция лжи</h3>
      <p>Проверки на полиграфе при приёме на работу и служебных расследованиях. С заключением для заказчика.</p>
      <div class="bottom">
        <div class="price">5 000 ₽ <small>/ человек</small></div>
        <div class="go" style="margin-top:8px">Подробнее →</div>
      </div>
    </a>
  </div>
</section>

<!-- ОХРАНА -->
<section class="wrap canvas" id="ohrana" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">ООО «Одиссей-СБ»</span>
      <h2>Охранное предприятие</h2>
      <p>Кадровая основа – бывшие сотрудники силовых структур.</p>
      <div style="margin-top:16px"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('ohrana')); ?>">Подробнее об охране →</a></div>
    </div>
  </div>
  <div class="bento g-split bento--seamtop rv">
    <div style="display:grid;gap:1px;background:var(--line)">
      <div class="cell svc">
        <span class="num">01</span>
        <div><h3>Физическая охрана</h3><p>Посты на объектах: офисы, склады, ТЦ, стройплощадки. Подбор режима под объект.</p></div>
        <span class="tag">по объекту</span>
      </div>
      <div class="cell svc">
        <span class="num">02</span>
        <div><h3>Пультовая охрана</h3><p>Тревожная кнопка и охранная сигнализация с выездом группы быстрого реагирования.</p></div>
        <span class="tag">по договору</span>
      </div>
      <div class="cell svc">
        <span class="num">03</span>
        <div><h3>Личный телохранитель</h3><p>Сопровождение одного человека или группы. Конфиденциально.</p></div>
        <span class="tag">по договору</span>
      </div>
      <div class="cell svc">
        <span class="num">04</span>
        <div><h3>Охрана мероприятий</h3><p>Концерты, спортивные и корпоративные события: от досмотра до сопровождения.</p></div>
        <span class="tag">по смете</span>
      </div>
    </div>
    <a class="photo-cell" href="<?php echo esc_url(odissey_link('ohrana')); ?>">
      <img src="<?php echo $A; ?>/photo/ohrana_meropriyatiya.webp" alt="Охрана массового мероприятия">
      <div class="photo-cap"><b>Дежурная часть 24/7</b>+7 (342) 21-41-911 · реакция на тревогу круглосуточно</div>
    </a>
  </div>
</section>

<!-- ТИР -->
<section class="wrap canvas" id="tir" style="margin-top:128px">
  <div class="bento g-hero-sec rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">ССК «Одиссей» · первый закрытый клуб Перми</span>
      <h2>Боевой стрелковый тир</h2>
      <p>Стрельба из боевого оружия с инструктором, метание ножей, экспозиции оружия и военной техники.</p>
      <div style="margin-top:16px"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('tir')); ?>">Подробнее о тире →</a></div>
    </div>
    <a class="photo-cell" href="<?php echo esc_url(odissey_link('tir')); ?>">
      <video class="photo-cell-video mirror" autoplay muted loop playsinline poster="<?php echo $A; ?>/photo/tir_rubezh_poster.jpg">
        <source src="<?php echo $A; ?>/video/tir_rubezh.mp4" type="video/mp4">
      </video>
      <div class="photo-cap"><b>Галерея 30 метров</b>метание ножей · экспозиции оружия</div>
    </a>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="cell cell-flex pr-cell">
      <div class="nm">Стрельба из пистолета</div>
      <div class="pr">2 680 ₽</div>
      <p>20 выстрелов, 2 мишени и курс безопасного обращения с оружием; далее – 100 ₽ за выстрел</p>
    </div>
    <div class="cell cell-flex pr-cell">
      <div class="nm">Длинноствольное оружие</div>
      <div class="pr">3 680 ₽</div>
      <p>20 выстрелов, 2 мишени и курс безопасного обращения с оружием; далее – 150 ₽ за выстрел</p>
    </div>
    <div class="cell cell-flex pr-cell">
      <div class="nm">Подарочные карты</div>
      <div class="pr">от 5 680 ₽</div>
      <p>курсы «Базовый», «Универсальный стрелок», «Профессионал»</p>
    </div>
  </div>
</section>

<!-- тикер техники -->
<div class="wrap" style="margin-top:128px">
  <div class="ticker-band" aria-hidden="true">
    <div class="ticker">
      <span>БРДМ-2</span><span>ГАЗ-67</span><span>ГАЗ-66</span><span>ГАЗ-69</span><span>БА-64</span><span>М-72</span><span>Миномёт ПМ-38</span><span>Пушка 53-К</span><span>Пулемёт Максим</span><span>ППШ</span><span>ТПК-967</span><span>Кухня КП-48</span>
      <span>БРДМ-2</span><span>ГАЗ-67</span><span>ГАЗ-66</span><span>ГАЗ-69</span><span>БА-64</span><span>М-72</span><span>Миномёт ПМ-38</span><span>Пушка 53-К</span><span>Пулемёт Максим</span><span>ППШ</span><span>ТПК-967</span><span>Кухня КП-48</span>
    </div>
  </div>

  <!-- МУЗЕЙ: бенто без отступа от тикера -->
  <div class="bento g-3 bento--seamtop rv" id="muzey">
    <div class="cell cell--big cell--static cell-flex sec-cell">
      <span class="kicker">Своя коллекция</span>
      <h2>Музей военной техники</h2>
      <p>Одиннадцать единиц на ходу: от бронеавтомобиля БА-64 образца 1943 года до БРДМ-2. Выезжаем на парады, фестивали и школьные экскурсии.</p>
      <div class="bottom"><button class="btn btn-line" type="button" data-cta data-tema="Экскурсия / клуб «Патриот»">Записаться на экскурсию</button></div>
    </div>
    <a class="photo-cell photo-cell--static" href="<?php echo esc_url(odissey_link('muzey')); ?>">
      <img src="<?php echo $A; ?>/photo/tehnika_brdm.webp" alt="БРДМ-2 из коллекции музея">
      <div class="photo-cap"><b>БРДМ-2</b>образца 1981 года</div>
    </a>
    <a class="photo-cell photo-cell--static" href="<?php echo esc_url(odissey_link('muzey')); ?>">
      <img src="<?php echo $A; ?>/photo/tehnika_gaz67.webp" alt="ГАЗ-67 образца 1943 года">
      <div class="photo-cap"><b>ГАЗ-67</b>образца 1943 года</div>
    </a>
  </div>
</div>

<!-- УЧЕБНЫЙ ЦЕНТР -->
<section class="wrap canvas" id="uc" style="margin-top:128px">
  <div class="bento g-hero-sec rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">ЧУ ДПО «УЦ Одиссей»</span>
      <h2>Учебный центр</h2>
      <p>Лицензия на образовательную деятельность, свой тир для практики, экзамены на месте. Периодическую проверку принимают сотрудники Росгвардии.</p>
      <div style="margin-top:16px"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('uc')); ?>">Подробнее об обучении →</a></div>
      <div class="gold-note" style="margin-top:16px">Лицензия № 6801 от 14.07.2020, Минобрнауки Пермского края</div>
    </div>
    <div class="photo-cell"><img src="<?php echo $A; ?>/photo/uc_zanyatie.webp" alt="Занятие в учебном классе УЦ «Одиссей»"></div>
  </div>
  <div class="bento bento--seamtop rv">
    <div class="cell cell--compact trow head cell--static"><div>Программа</div><div>Для кого</div><div style="text-align:right">Стоимость</div></div>
    <div class="cell cell--compact trow"><div class="prog">Профподготовка охранников</div><div class="who">4–6 разряд, с квалификационным экзаменом</div><div class="cost">2 700 – 4 200 ₽</div></div>
    <div class="cell cell--compact trow"><div class="prog">Повышение квалификации</div><div class="who">4–6 разряд</div><div class="cost">1 500 – 1 700 ₽</div></div>
    <div class="cell cell--compact trow"><div class="prog">Периодическая проверка</div><div class="who">действующие охранники, 4–6 разряд</div><div class="cost">1 200 – 1 500 ₽</div></div>
    <div class="cell cell--compact trow"><div class="prog">Обращение с оружием</div><div class="who">владельцы гражданского оружия: вторник и среда, строго по записи</div><div class="cost">4 000 ₽</div></div>
    <div class="cell cell--compact trow"><div class="prog">Подготовка руководителей ЧОП</div><div class="who">впервые назначаемые и продление каждые 5 лет</div><div class="cost">4 000 – 8 000 ₽</div></div>
    <div class="cell cell--compact trow"><div class="prog">Консультирование</div><div class="who">помощь с документами, физлица и юрлица</div><div class="cost">от 300 ₽</div></div>
  </div>
</section>

<!-- ПОЛИГРАФ -->
<section class="wrap canvas" id="poligraf" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell--big cell--static sec-cell span2">
      <span class="kicker">Техцентр «Одиссей»</span>
      <h2>Центр детекции лжи</h2>
      <div style="margin-top:16px"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('poligraf')); ?>">Подробнее о полиграфе →</a></div>
      <ul class="list" style="margin-top:16px">
        <li>Проверка кандидатов при приёме на ответственные должности</li>
        <li>Служебные расследования: хищения, утечки, злоупотребления</li>
        <li>Профессиональный полиграф «РИФ», сертифицированные специалисты</li>
        <li>Тестирование одного человека – 5 000 ₽</li>
      </ul>
    </div>
    <div class="photo-cell"><img src="<?php echo $A; ?>/photo/poligraf_datchiki.webp" alt="Проверка на полиграфе, датчики на руке испытуемого"></div>
  </div>
</section>

<!-- ДОБРЫЕ ДЕЛА -->
<section class="wrap canvas" id="dela" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">АНО ВПК «Патриот»</span>
      <h2>Добрые дела</h2>
      <p>Больше двадцати бесплатных экскурсий: от второклассников до студентов техникума. Показываем тир, музей техники и полевую кухню.</p>
      <div style="margin-top:16px"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('dela')); ?>">Подробнее о добрых делах →</a></div>
    </div>
    <a class="photo-cell photo-cell--static" href="<?php echo esc_url(odissey_link('dela')); ?>">
      <img src="<?php echo $A; ?>/photo/ekskursiya_ulica.webp" alt="Экскурсия школьников на полигоне">
      <div class="photo-cap"><b>Экскурсии школам</b>тир · музей · полигон</div>
    </a>
    <a class="photo-cell photo-cell--static" href="<?php echo esc_url(odissey_link('dela')); ?>">
      <img src="<?php echo $A; ?>/photo/dela/83-meroprijatija-dlja-podrostkov-iz-neblagopoluchnyh-semej.webp" alt="Мероприятия для детей и подростков">
      <div class="photo-cap"><b>Мероприятия для детей</b>экскурсии для школьников и подростков</div>
    </a>
  </div>
</section>

<!-- КОНТАКТЫ -->
<section class="wrap canvas" id="doverie" style="margin-top:128px">
  <div class="bento g-hero-sec bento--gram rv">
    <div class="cell cell--big cell--static cell-flex sec-cell">
      <span class="kicker">Нам доверяют</span>
      <h2>29 благодарственных писем</h2>
      <p>Администрация города Перми, Министерство физической культуры и спорта Пермского края, ЗАТО Звёздный, торгово-промышленные палаты и клиенты по охране.</p>
      <div class="bottom"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('o-nas')); ?>#gramoty">Смотреть все грамоты</a></div>
    </div>
    <div class="gram-teaser">
      <a class="doc-cell" href="<?php echo esc_url(odissey_link('o-nas')); ?>#gramoty"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_01_v2.webp" alt="Благодарственное письмо" loading="lazy"></a>
      <a class="doc-cell" href="<?php echo esc_url(odissey_link('o-nas')); ?>#gramoty"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_02_v2.webp" alt="Благодарственное письмо" loading="lazy"></a>
      <a class="doc-cell" href="<?php echo esc_url(odissey_link('o-nas')); ?>#gramoty"><img src="<?php echo $A; ?>/photo/gramoty/thumbs/gramota_03_v2.webp" alt="Благодарственное письмо" loading="lazy"></a>
    </div>
  </div>
</section>

<?php get_footer(); ?>
