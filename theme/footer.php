<?php if (!defined('ABSPATH')) exit; ?>
<footer>
  <div class="wrap">
    <div class="f-logo f-logo--original"><img src="<?php echo esc_url(odissey_asset('logo/odissey-logo-original.png')); ?>" alt="Одиссей — группа предприятий безопасности, Пермь" width="568" height="102"></div>
    <div class="f-grid">
      <div class="f-col"><b>Группа предприятий</b>
        <div>ООО «Одиссей-СБ» – охрана</div>
        <div>ЧУ ДПО «УЦ Одиссей» – обучение</div>
        <div>ПРСОО ССК «Одиссей» – стрелковый клуб</div>
        <div>ООО Техцентр «Одиссей» – полиграф</div>
        <div>АНО ВПК «Патриот» – работа с молодёжью</div>
      </div>
      <div class="f-col"><b>Разделы</b>
        <div class="f-links">
        <div><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a></div>
        <?php foreach (odissey_nav_items() as $slug => $label): ?>
        <div><a href="<?php echo esc_url(odissey_link($slug)); ?>"><?php echo esc_html($label); ?></a></div>
        <?php endforeach; ?>
        </div>
      </div>
      <div class="f-col"><b>Дежурная часть</b>
        <div><a href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_duty1'))); ?>"><?php echo esc_html(odissey_opt('phone_duty1')); ?></a></div>
        <div><a href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_duty2'))); ?>"><?php echo esc_html(odissey_opt('phone_duty2')); ?></a></div>
        <div>круглосуточно</div>
        <div class="f-addr"><?php echo esc_html(odissey_opt('address')); ?></div>
      </div>
    </div>
    <div class="f-bottom">
      <div>© 2006–<?php echo esc_html(date('Y')); ?> Группа предприятий «Одиссей», Пермь</div>
      <div><?php bloginfo('name'); ?></div>
    </div>
  </div>
</footer>
<?php get_template_part('template-parts/modals'); ?>
<?php wp_footer(); ?>
</body>
</html>
