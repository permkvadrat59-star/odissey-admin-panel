<?php
/**
 * Шаблон 404 темы «Одиссей». Перенос из 404.html.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<section class="wrap" style="min-height:70vh;display:flex;align-items:center">
  <div class="bento" style="width:100%">
    <div class="cell cell--big cell--static">
      <span class="kicker">Ошибка 404</span>
      <h1 style="margin:8px 0 12px">Страница не найдена</h1>
      <p style="color:var(--muted);max-width:520px;margin-bottom:32px">Такой страницы нет — возможно, адрес изменился при переезде со старого сайта. Всё ценное на месте: охрана, тир, музей и обучение.</p>
      <div class="cta-row" style="display:flex;gap:16px;flex-wrap:wrap">
        <a class="btn btn-red" href="<?php echo esc_url(home_url('/')); ?>">На главную</a>
        <a class="btn btn-line" href="<?php echo esc_url(odissey_link('tir')); ?>">В тир</a>
      </div>
    </div>
  </div>
</section>
<?php get_footer(); ?>
