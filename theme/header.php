<?php if (!defined('ABSPATH')) exit; ?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="icon" href="<?php echo esc_url(home_url('/favicon.ico')); ?>" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="<?php echo esc_url(odissey_asset('logo/favicon-32x32.png')); ?>">
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo esc_url(odissey_asset('logo/favicon-16x16.png')); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(odissey_asset('logo/apple-touch-icon.png')); ?>">
<link rel="manifest" href="<?php echo esc_url(odissey_asset('site.webmanifest')); ?>">
<meta name="theme-color" content="#A50100">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="progress"></div>

<header>
  <div class="wrap nav">
    <a class="logo logo--original" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Одиссей — группа предприятий">
      <img src="<?php echo esc_url(odissey_asset('logo/odissey-logo-original.png')); ?>" alt="Одиссей — группа предприятий безопасности" width="568" height="102">
    </a>
    <nav class="nav-links">
      <?php
      $current = get_post() ? get_post()->post_name : '';
      foreach (odissey_nav_items() as $slug => $label) {
          $active = ($current === $slug) ? ' class="active"' : '';
          printf('<a href="%s"%s>%s</a>', esc_url(odissey_link($slug)), $active, esc_html($label));
      }
      ?>
    </nav>
    <a class="nav-phone" href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_main'))); ?>" aria-label="Позвонить: <?php echo esc_attr(odissey_opt('phone_main')); ?>">
      <svg class="nav-phone-icon" width="20" height="20" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M6.6 10.8c1.4 2.8 3.8 5.2 6.6 6.6l2.2-2.2a1 1 0 0 1 1.02-.24c1.1.37 2.28.57 3.48.57a1 1 0 0 1 1 1V20a1 1 0 0 1-1 1C10.6 21 3 13.4 3 4a1 1 0 0 1 1-1h3.5a1 1 0 0 1 1 1c0 1.2.2 2.38.57 3.48a1 1 0 0 1-.25 1.02L6.6 10.8Z"/></svg>
      <span class="nav-phone-text"><?php echo esc_html(odissey_opt('phone_main')); ?></span>
      <span>многоканальный</span>
    </a>
    <button class="burger" aria-label="Меню"><span></span><span></span><span></span></button>
  </div>
</header>
