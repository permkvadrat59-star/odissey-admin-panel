<?php
/**
 * Шаблон страницы «dela» темы «Одиссей».
 * Перенос из dela.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="wrap">
  <div class="page-hero">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Добрые дела</nav>
    <div class="kicker">АНО ВПК «Патриот»</div>
    <h1>Добрые дела</h1>
    <p class="hero-sub">Бесплатные экскурсии для школ Перми: тир, музей техники, полевая кухня. Военно-патриотический клуб работает круглый год.</p>
    <div class="cta-row"><button class="btn btn-red" type="button" data-cta data-tema="Экскурсия / клуб «Патриот»">Привести класс</button></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-3 rv">
    <?php
    $deeds = new WP_Query(['post_type'=>'odissey_deed','posts_per_page'=>-1,'orderby'=>'menu_order','order'=>'ASC']);
    $i = 0;
    if ($deeds->have_posts()): while ($deeds->have_posts()): $deeds->the_post(); $i++; ?>
    <div class="cell wcard">
      <div class="shot"><?php if (has_post_thumbnail()) the_post_thumbnail('large', ['alt'=>esc_attr(get_the_title()),'loading'=>'lazy']); ?></div>
      <div class="body"><span class="num"><?php printf('%02d /', $i); ?></span><h3><?php the_title(); ?></h3><?php $c = trim(wp_strip_all_tags(get_the_content())); if ($c !== ''): ?><p><?php echo esc_html($c); ?></p><?php endif; ?></div>
    </div>
    <?php endwhile; wp_reset_postdata(); endif; ?>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Ваш класс следующий</h2><p>Тир, музей техники и полевая кухня – бесплатная экскурсия для школ Перми.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta data-tema="Экскурсия / клуб «Патриот»">Привести класс</button>
    </div>
  </div>
</section>
<?php get_footer(); ?>
