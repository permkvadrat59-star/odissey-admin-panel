<?php if (!defined('ABSPATH')) exit; ?>
<dialog class="cta-dialog" id="ctaDialog">
  <form class="cta-form form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
    <input type="hidden" name="action" value="odissey_lead">
    <?php wp_nonce_field('odissey_lead', 'odissey_lead_nonce'); ?>
    <button class="cta-dialog-close" type="button" aria-label="Закрыть">×</button>
    <h3 style="margin-bottom:8px">Оставить заявку</h3>
    <p style="font-size:13px;color:var(--muted);margin-bottom:24px">Перезвоним в рабочее время, подскажем по цене и срокам.</p>
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
    <!-- honeypot от спама -->
    <input type="text" name="website" tabindex="-1" autocomplete="off" style="position:absolute;left:-9999px" aria-hidden="true">
    <button class="btn btn-red" type="submit">Отправить</button>
  </form>
</dialog>

<dialog class="lightbox-dialog" id="lightboxDialog">
  <img id="lightboxImg" src="" alt="">
</dialog>
