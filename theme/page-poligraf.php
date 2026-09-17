<?php
/**
 * Шаблон страницы «poligraf» темы «Одиссей».
 * Перенос из poligraf.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="hero-video hero-video--page">
  <img class="hero-video-media" src="<?php echo $A; ?>/photo/poligraf_stol.webp" alt="Кабинет для проверки на полиграфе «РИФ»">
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Полиграф</nav>
    <div class="kicker">ООО Техцентр «Одиссей»</div>
    <h1>Центр детекции лжи</h1>
    <p class="hero-sub">Проверки на профессиональном полиграфе «РИФ»: приём на ответственные должности, служебные расследования, периодический контроль персонала.</p>
    <div class="cta-row"><button class="btn btn-red" type="button" data-cta data-tema="Проверка на полиграфе">Записаться на проверку</button></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell--big cell--static sec-cell span2">
      <span class="kicker">Виды проверок</span>
      <h2>Что проверяем</h2>
      <ul class="list" style="margin-top:16px">
        <li>Кандидаты при приёме на ответственные должности</li>
        <li>Служебные расследования: хищения, утечки информации, злоупотребления</li>
        <li>Периодический контроль действующего персонала</li>
        <li>Частные вопросы физических лиц – конфиденциально</li>
      </ul>
    </div>
    <div class="cell cell--static" style="display:flex;flex-direction:column;justify-content:center">
      <div class="poly-big">95–99<small> %</small></div>
      <span style="font-size:13px;color:var(--muted);margin-top:12px">достоверность результатов при работе подготовленного специалиста</span>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <?php foreach (odissey_price_rows() as $r): ?>
    <div class="cell cell-flex pr-cell">
      <div class="nm"><?php echo esc_html($r['name']); ?></div>
      <div class="pr"><?php echo esc_html($r['price']); ?></div>
      <?php if ($r['note'] !== ''): ?><p><?php echo esc_html($r['note']); ?></p><?php endif; ?>
    </div>
    <?php endforeach; ?>
    <div class="cell cell-flex">
      <span class="kicker">Оборудование</span>
      <h3 style="margin:8px 0 12px">Полиграф «РИФ»</h3>
      <p style="font-size:13px;color:var(--muted)">Профессиональный прибор; с испытуемым работает сертифицированный специалист – от этого зависит точность.</p>
    </div>
    <div class="photo-cell" style="min-height:440px"><video class="photo-cell-video" muted playsinline poster="<?php echo $A; ?>/photo/poligraf_rif_poster.jpg"><source src="<?php echo $A; ?>/video/poligraf_rif.mp4" type="video/mp4"></video></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-2 rv">
    <div class="photo-cell" style="min-height:390px"><img src="<?php echo $A; ?>/photo/poligraf_kabinet.webp" alt="Кабинет для проверки на полиграфе" loading="lazy"><div class="photo-cap"><b>Отдельный кабинет</b>без посторонних и спешки</div></div>
    <div class="cell cell-flex cell--static">
      <span class="kicker">Как проходит</span>
      <h3 style="margin:8px 0 12px">Проверка занимает 1,5–2 часа</h3>
      <p style="font-size:13px;color:var(--muted)">Предтестовая беседа, сама проверка, обработка результатов. Испытуемый заранее знает все вопросы – неожиданных тем не будет.</p>
    </div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Вопросы</span>
      <h2>Частые вопросы</h2>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="cell cell--static">
      <h3 style="margin-bottom:12px">Это законно?</h3>
      <p style="font-size:13px;color:var(--muted)">Да. Тестирование проводится только после письменного согласия работника – в полном соответствии с п. 4 ст. 86 ТК РФ и ст. 24 Конституции РФ. Метод тестирования признаётся одним из современных методов подбора и расстановки кадров (гл. 11 ТК РФ).</p>
    </div>
    <div class="cell cell--static">
      <h3 style="margin-bottom:12px">Можно ли обмануть полиграф?</h3>
      <p style="font-size:13px;color:var(--muted)">«Методы обмана» из интернета дают только помехи – полиграфолог видит противодействие. Работу сердца, сосудов и кожное сопротивление усилием воли не контролируют.</p>
    </div>
    <div class="cell cell--static">
      <h3 style="margin-bottom:12px">Зачем это бизнесу?</h3>
      <p style="font-size:13px;color:var(--muted)">Приём на материально ответственные должности, расследование хищений и утечек, периодический контроль персонала.</p>
    </div>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Нужна проверка?</h2><p>Конфиденциально: обсудим задачу и назначим время.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta data-tema="Проверка на полиграфе">Оставить заявку</button>
      <a class="btn btn-white" href="<?php echo esc_attr(odissey_tel(odissey_opt('phone_main'))); ?>"><?php echo esc_html(odissey_opt('phone_main')); ?></a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
