<?php
/**
 * Шаблон страницы «muzey» темы «Одиссей».
 * Перенос из muzey.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="hero-video hero-video--page">
  <img class="hero-video-media" style="object-position:50% 40%;filter:grayscale(.85) contrast(1.05) brightness(60%)" src="<?php echo $A; ?>/photo/muzey_hero_01.webp" alt="Военная техника музея «Одиссей» на параде">
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Музей</nav>
    <div class="kicker">Своя коллекция · техника на ходу</div>
    <h1>Музей военной техники</h1>
    <p class="hero-sub hero-sub--mobile-hide">Одиннадцать единиц: от бронеавтомобиля БА-64 образца 1943 года до БРДМ-2. Техника участвует в парадах, выставках и экскурсиях – и заводится.</p>
    <div class="cta-row"><button class="btn btn-red" type="button" data-cta data-tema="Экскурсия / клуб «Патриот»">Записаться на экскурсию</button></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell--big cell--static sec-cell span2">
      <span class="kicker">Не только техника</span>
      <h2>Музей обмундирования и оружейная галерея</h2>
      <p>Редчайшие экземпляры форменного обмундирования времён Гражданской и Великой Отечественной войн и наших дней. В галерее тира – более 40 массогабаритных образцов оружия: от Гражданской войны до вооружения современной Российской армии.</p>
    </div>
        <div class="cell cell--compact stat" style="display:flex;flex-direction:column;justify-content:center">
      <b data-count="40">40</b><span>образцов оружия в экспозиции галереи</span>
    </div>
  </div>
  <div class="bento bento--seamtop rv">
    <div class="photo-cell" style="min-height:640px" data-slideshow>
      <img src="<?php echo $A; ?>/photo/muzey_obmundirovanie_01.webp" alt="Галерея обмундирования: форма разных эпох" loading="lazy">
      <img src="<?php echo $A; ?>/photo/muzey_obmundirovanie_02.webp" alt="Галерея обмундирования: форма разных эпох" loading="lazy">
      <img src="<?php echo $A; ?>/photo/muzey_obmundirovanie_03.webp" alt="Галерея обмундирования: форма разных эпох" loading="lazy">
      <img src="<?php echo $A; ?>/photo/muzey_obmundirovanie_04.webp" alt="Галерея обмундирования: форма разных эпох" loading="lazy">
      <div class="photo-cap"><b>Галерея обмундирования</b>формы разных эпох и знамя 150-й стрелковой дивизии</div>
    </div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="photo-cell" style="min-height:520px"><img style="object-position:50% 32%" src="<?php echo $A; ?>/photo/muzey_zal_zhivoy.webp" alt="Зал музея «Одиссея»: мотоцикл М-72, 45-мм пушка и знамя"><div class="photo-cap"><b>Зал техники</b>М-72, «сорокапятка», знамя – экскурсия для школьников</div></div>
  </div>
</section>

<section class="wrap canvas">
  <div class="bento g-3 rv">
    <div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/muz_ba64.webp" alt="БА-64, образца 1943 года" loading="lazy"></div>
  <div class="body"><span class="num">01 /</span><h3>БА-64</h3><p>Советский лёгкий бронеавтомобиль периода Второй мировой войны.</p><div class="meta">образца 1943 года</div></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/muz_gaz67.webp" alt="ГАЗ-67, образца 1943 года" loading="lazy"></div>
  <div class="body"><span class="num">02 /</span><h3>ГАЗ-67</h3><p>Наравне с «полуторкой» прошёл всю Великую Отечественную.</p><div class="meta">образца 1943 года</div></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/muz_gaz66.webp" alt="ГАЗ-66, образца 1990 года" loading="lazy"></div>
  <div class="body"><span class="num">03 /</span><h3>ГАЗ-66</h3><p>«Всепогодный проходимец»: рабочая машина военных, геологов, нефтяников и целинников.</p><div class="meta">образца 1990 года</div></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/muz_gaz69.webp" alt="ГАЗ-69, образца 1952 года" loading="lazy"></div>
  <div class="body"><span class="num">04 /</span><h3>ГАЗ-69</h3><p>Наследник командирских джипов войны. В мирной жизни получил имя «Труженик».</p><div class="meta">образца 1952 года</div></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/48-tpk-967-obrazca-1984-goda-.webp" alt="ТПК-967, образца 1984 года" loading="lazy"></div>
  <div class="body"><span class="num">05 /</span><h3>ТПК-967</h3><p>Лёгкий внедорожник ЛуАЗ-967. Известен по армейскому обозначению ТПК – транспортёр переднего края.</p><div class="meta">образца 1984 года</div></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/50-m-72-obrazca-1947-goda.webp" alt="М-72, образца 1947 года" loading="lazy"></div>
  <div class="body"><span class="num">06 /</span><h3>М-72</h3><p>Советский тяжёлый мотоцикл. Выпускался крупной серией с 1941 по 1960 год.</p><div class="meta">образца 1947 года</div></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/51-m-72m-obrazca-1956-goda.webp" alt="М-72М, образца 1956 года" loading="lazy"></div>
  <div class="body"><span class="num">07 /</span><h3>М-72М</h3><p>Модернизированная М-72: с 1956 года завод перешёл на эту модель.</p><div class="meta">образца 1956 года</div></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/muz_minomet.webp" alt="120-мм полковой миномёт ПМ-38" loading="lazy"></div>
  <div class="body"><span class="num">08 /</span><h3>Полковой миномёт ПМ-38</h3><p>Советский миномёт калибра 120 мм образца 1938 года. Гладкоствольная жёсткая система по схеме мнимого треугольника.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/tehnika/77-45-mm-protivotankovaja-pushka-obrazca-1937-goda-53-k.webp" alt="45-мм противотанковая пушка образца 1937 года (53-К)" loading="lazy"></div>
  <div class="body"><span class="num">09 /</span><h3>Противотанковая пушка 53-К</h3><p>Та самая «сорокапятка», индекс ГАУ 52-П-243-ПП-1. Советское полуавтоматическое орудие калибра 45 мм.</p><div class="meta">образца 1937 года</div></div>
</div>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Хотите увидеть вживую?</h2><p>Экскурсии для школ и организаций – бесплатно. Техника на ходу.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta data-tema="Экскурсия / клуб «Патриот»">Записаться на экскурсию</button>
    </div>
  </div>
</section>
<?php get_footer(); ?>
