<?php
/**
 * Шаблон страницы «kontakty» темы «Одиссей».
 * Перенос из kontakty.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="wrap">
  <div class="page-hero page-hero--crumbs">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Контакты</nav>
  </div>
</section>

<?php $team = odissey_team_members(); if ($team): ?>
<section class="wrap canvas" style="margin-top:32px">
  <div class="section-head">
    <span class="kicker">Команда</span>
    <h2>Кто работает в «Одиссее»</h2>
  </div>
  <div class="bento g-4 bento--seamtop rv team-grid">
    <?php foreach ($team as $m): ?>
    <div class="cell team-card">
      <?php if ($m['photo_id']): ?>
        <?php // srcset: карточка 262 px, на ретине берётся 520 — без этого портрет мылился ?>
        <div class="team-photo"><?php echo wp_get_attachment_image($m['photo_id'], 'team-card', false, [
            'alt'     => $m['name'],
            'loading' => 'lazy',
            'sizes'   => '(max-width:560px) 100vw, (max-width:1020px) 50vw, 20vw',
        ]); ?></div>
      <?php else:
        // фото нет — ставим заглушку с инициалами, иначе карточка ниже соседних и ряд разъезжается
        $parts = preg_split('/\s+/u', trim($m['name']));
        $ini = mb_strtoupper(mb_substr($parts[0] ?? '', 0, 1) . mb_substr($parts[1] ?? '', 0, 1)); ?>
        <div class="team-photo team-photo--none" aria-hidden="true"><span><?php echo esc_html($ini); ?></span></div>
      <?php endif; ?>
      <div class="team-body">
        <div class="team-name"><?php echo esc_html($m['name']); ?></div>
        <?php if ($m['role']): ?><div class="team-role"><?php echo esc_html($m['role']); ?></div><?php endif; ?>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="wrap">
  <div class="page-hero">
    <h1>Как нас найти</h1>
    <p class="hero-sub"><?php echo esc_html(odissey_opt('address')); ?> · остановки «Манеж Спартак», «Снайперов», «Стахановская»</p>
    <div class="cta-row"><a class="btn btn-red" href="https://yandex.ru/maps/?text=<?php echo urlencode(odissey_opt('address')); ?>" target="_blank" rel="noopener">Маршрут в Яндекс.Картах</a></div>
  </div>
</section>
<section class="wrap canvas contacts-flow" style="margin-top:24px">
  <div class="bento g-split rv">
    <div class="cell" style="padding:0;overflow:hidden;min-height:360px;position:relative">
      <iframe src="https://yandex.ru/map-widget/v1/?ll=56.209171%2C57.988030&z=16&pt=56.209171%2C57.988030%2Cpm2rdm" style="border:0;display:block;width:100%;height:100%" loading="lazy" title="<?php echo esc_attr('Одиссей на карте – ' . odissey_opt('address')); ?>"></iframe>
    </div>
    <div style="display:grid;gap:1px;background:var(--line)">
      <div class="cell c-cell"><b>Охрана</b><div class="v"><a href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_main'))); ?>"><?php echo esc_html(odissey_opt('phone_main')); ?></a></div><span>Пн–Пт 9:00–18:00 · дежурная часть круглосуточно · <a href="<?php echo esc_attr('mailto:' . odissey_opt('email')); ?>" style="color:var(--muted)"><?php echo esc_html(odissey_opt('email')); ?></a></span></div>
      <div class="cell c-cell"><b>Тир</b><div class="v"><a href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_tir'))); ?>"><?php echo esc_html(odissey_opt('phone_tir')); ?></a></div><span>Ср–Вс 12:00–20:00 · <a href="<?php echo esc_attr('mailto:' . odissey_opt('email_tir')); ?>" style="color:var(--muted)"><?php echo esc_html(odissey_opt('email_tir')); ?></a></span></div>
      <div class="cell c-cell"><b>Учебный центр</b><div class="v"><a href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_uc'))); ?>"><?php echo esc_html(odissey_opt('phone_uc')); ?></a></div></div>
    </div>
  </div>
  <div class="bento bento--seamtop rv">
    <form class="cell cell--big cell--static form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
      <input type="hidden" name="action" value="odissey_lead">
      <?php wp_nonce_field('odissey_lead', 'odissey_lead_nonce'); ?>
      <h3 style="margin-bottom:8px">Оставить заявку</h3>
      <?php if (($_GET['lead'] ?? '') === 'ok'): ?>
      <p style="font-size:14px;color:var(--red);margin-bottom:24px;font-weight:600">Заявка отправлена — перезвоним в рабочее время.</p>
      <?php else: ?>
      <p style="font-size:13px;color:var(--muted);margin-bottom:24px">Перезвоним в рабочее время, подскажем по цене и срокам.</p>
      <?php endif; ?>
      <div class="form-row">
        <input type="text" name="name" placeholder="Как вас зовут" required>
        <input type="tel" name="phone" placeholder="+7 (___) ___-__-__" required>
      </div>
      <select name="topic" required>
        <option value="" disabled selected hidden>Тема обращения</option>
        <option>Охрана объекта</option>
        <option>Стрелковый тир</option>
        <option>Подарочная карта в тир</option>
        <option>Обучение в УЦ</option>
        <option>Проверка на полиграфе</option>
        <option>Экскурсия / клуб «Патриот»</option>
      </select>
      <input type="text" name="comment" placeholder="Комментарий: объект, адрес, задача (необязательно)">
      <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
      <button class="btn btn-red" type="submit">Отправить</button>
    </form>
  </div>
</section>


<?php endif; ?>
<?php get_footer(); ?>
