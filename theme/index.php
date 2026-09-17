<?php
/**
 * Базовый шаблон-fallback темы «Одиссей».
 * Внутренние страницы (О нас, Охрана, Тир…) получат свои шаблоны на этапе 3.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<main class="wrap" style="padding-top:64px;padding-bottom:64px">
  <?php if (have_posts()): while (have_posts()): the_post(); ?>
    <article>
      <h1><?php the_title(); ?></h1>
      <div class="entry"><?php the_content(); ?></div>
    </article>
  <?php endwhile; else: ?>
    <p>Материал не найден.</p>
  <?php endif; ?>
</main>
<?php get_footer(); ?>
