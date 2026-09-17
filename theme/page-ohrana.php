<?php
/**
 * Шаблон страницы «ohrana» темы «Одиссей».
 * Перенос из ohrana.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="hero-video hero-video--page">
  <video class="hero-video-media" style="object-position:0% 20%;transform:scale(1.2)" muted playsinline poster="<?php echo $A; ?>/photo/ohrana_raciya_poster.jpg">
    <source src="<?php echo $A; ?>/video/ohrana_raciya.mp4" type="video/mp4">
  </video>
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Охрана</nav>
    <div class="kicker">ООО «Одиссей-СБ» · лицензия Росгвардии ЧО № 056449</div>
    <h1>Охранное предприятие</h1>
    <p class="hero-sub hero-sub--mobile-hide">Кадровая основа – бывшие сотрудники силовых структур. Дежурная часть отвечает круглосуточно, группа быстрого реагирования выезжает по тревоге.</p>
    <div class="cta-row"><button class="btn btn-red" type="button" data-cta data-tema="Охрана объекта">Получить расчёт</button><a class="btn btn-line" href="tel:+73422141911">Дежурная часть</a></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Услуги</span>
      <h2>Четыре услуги</h2>
      <p>Режим и состав поста подбираем под объект: офис, склад, ТЦ, стройка, частный дом.</p>
    </div>
  </div>
  <div class="bento g-2 bento--seamtop rv">
    <div class="cell cell--big cell--static">
  <span class="num">01 /</span>
  <h3 style="margin:8px 0 12px">Физическая охрана</h3>
  <div class="prose"><p>Охраняем объекты в Перми и Пермском крае. Сотрудники отдела физической охраны выставляют посты, ведут контрольно-пропускной режим и отвечают за порядок на территории. Схему постов и график смен считаем под конкретный объект.</p></div>
</div><div class="cell cell--big cell--static">
  <span class="num">02 /</span>
  <h3 style="margin:8px 0 12px">Пультовая охрана</h3>
  <div class="prose"><p>Проектируем, монтируем и обслуживаем охранную и охранно-пожарную сигнализацию. Оперативный дежурный держит объект на пульте централизованного наблюдения, принимает и обрабатывает сигналы. По сигналу «Тревога» на объект выезжает группа быстрого реагирования.</p></div>
</div><div class="cell cell--big cell--static">
  <span class="num">03 /</span>
  <h3 style="margin:8px 0 12px">Личный телохранитель</h3>
  <div class="prose"><p>Задача телохранителя – не допустить физического воздействия на охраняемого, а если попытка есть – пресечь её сразу и с минимальными потерями. Работаем с одним человеком или с группой.</p></div>
</div><div class="cell cell--big cell--static">
  <span class="num">04 /</span>
  <h3 style="margin:8px 0 12px">Охрана мероприятий</h3>
  <div class="prose"><p>За безопасность на массовом мероприятии отвечает организатор. Берём эту часть на себя: досмотр на входе, контроль площадки и зала, работа с потоком людей, сопровождение гостей.</p></div>
</div>
  </div>
  
  <div class="bento g-2 bento--seamtop rv">
    <div class="photo-cell" style="min-height:416px"><img src="<?php echo $A; ?>/photo/ohrana_gbr.webp" alt="Группа быстрого реагирования у автомобиля" loading="lazy"><div class="photo-cap"><b>ГБР на выезде</b>сигнал с пульта – машина уже в пути</div></div>
    <div class="photo-cell" style="min-height:416px"><img src="<?php echo $A; ?>/photo/ohrana_post.webp" alt="Пост охраны на проходной бизнес-центра" loading="lazy"><div class="photo-cap"><b>Пост на объекте</b>контрольно-пропускной режим</div></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Как это работает</span>
      <h2>Пультовая охрана за 4 шага</h2>
      <p>От тревоги на объекте до прибытия экипажа – без участия владельца. Дежурная часть не спит никогда.</p>
    </div>
  </div>
  <div class="bento g-4 bento--seamtop steps rv">
    <div class="cell scheme-cell"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="7" y="3" width="10" height="18"/><circle cx="12" cy="12" r="2.5"/><path d="M4 8v8M20 8v8"/></svg><h3>Датчики на объекте</h3><p>Охранная и пожарная сигнализация, тревожная кнопка. Монтаж и обслуживание – наши.</p></div>
    <div class="cell scheme-cell"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M4 18a8 8 0 0 1 16 0"/><path d="M8 18a4 4 0 0 1 8 0"/><circle cx="12" cy="18" r="1.4" fill="currentColor"/></svg><h3>Сигнал на пульт</h3><p>Тревога уходит в дежурную часть по резервируемым каналам за секунды.</p></div>
    <div class="cell scheme-cell"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><rect x="3" y="4" width="18" height="12"/><path d="M12 16v4M8 20h8M6 10l3 3 3-5 3 4"/></svg><h3>Дежурная часть 24/7</h3><p>Оператор видит объект и тип тревоги, направляет ближайший экипаж и держит связь.</p></div>
    <div class="cell scheme-cell"><svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><path d="M3 16l2-6h14l2 6v4h-3v-2H6v2H3v-4Z"/><circle cx="7.5" cy="16" r="1.4"/><circle cx="16.5" cy="16" r="1.4"/><path d="M9 7h6"/></svg><h3>Выезд ГБР</h3><p>Вооружённый экипаж группы быстрого реагирования выдвигается на объект немедленно.</p></div>
  </div>
  <div class="bento g-2 bento--seamtop rv">
    <div class="photo-cell" style="min-height:390px"><img src="<?php echo $A; ?>/photo/ohrana_pultovaya.webp" alt="Оперативный дежурный на пульте централизованного наблюдения" loading="lazy"><div class="photo-cap"><b>Дежурная часть 24/7</b>объект на пульте круглосуточно</div></div>
    <div class="photo-cell" style="min-height:390px"><img src="<?php echo $A; ?>/photo/ohrana_montazh.webp" alt="Монтаж охранной сигнализации на объекте" loading="lazy"><div class="photo-cap"><b>Монтаж и обслуживание</b>сигнализация под объект</div></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-hero-sec rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Стоимость</span>
      <h2>Пультовая охрана – по договору</h2>
      <p>Цену считаем под объект: тип сигнализации, площадь и режим работы, состав оборудования и монтаж. Выезжаем, смотрим объект и даём смету.</p>
    </div>
    <div class="cell cell--big cell--static">
      <ul class="list" style="margin-top:4px">
        <li>Охранная, пожарная и тревожная сигнализация – проект, монтаж, обслуживание</li>
        <li>Объект на пульте централизованного наблюдения круглосуточно</li>
        <li>Выезд группы быстрого реагирования по сигналу «Тревога»</li>
        <li>Квартиры, коттеджи, гаражи, офисы, склады и торговые объекты</li>
      </ul>
      <div class="bottom" style="margin-top:24px"><button class="btn btn-red" type="button" data-cta data-tema="Охрана объекта">Получить расчёт</button></div>
    </div>
  </div>
<?php $ohrana_price = odissey_price_rows(); if ($ohrana_price): ?>
  <div class="bento bento--seamtop rv">
    <?php foreach ($ohrana_price as $r): ?>
    <div class="cell cell--compact trow trow--2"><div class="prog"><?php echo esc_html($r['name']); ?></div><div class="cost"><?php echo esc_html($r['price']); ?></div></div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-hero-sec rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Документы</span>
      <h2>Лицензия на охранную деятельность</h2>
      <p>Лицензия ЧО № 056449 (ЛП 686) выдана Управлением Росгвардии по Пермскому краю. ОГРН 1115905002223, ИНН 5905284767.</p>
    </div>
    <div class="gram-teaser" style="grid-template-columns:1fr 1fr">
      <a class="doc-cell" href="<?php echo $A; ?>/photo/dokumenty/licenziya_ohrana_cho056449.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/dokumenty/licenziya_ohrana_cho056449.webp" alt="Лицензия ЧО № 056449 на частную охранную деятельность" loading="lazy"></a>
      <a class="doc-cell" href="<?php echo $A; ?>/photo/dokumenty/licenziya_ohrana_prilozhenie.jpg" target="_blank" rel="noopener"><img src="<?php echo $A; ?>/photo/dokumenty/licenziya_ohrana_prilozhenie.webp" alt="Приложение к лицензии" loading="lazy"></a>
    </div>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Обсудим ваш объект?</h2><p>Расчёт по телефону или заявке: выезд на объект, схема постов, смета.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta data-tema="Охрана объекта">Оставить заявку</button>
      <a class="btn btn-white" href="tel:+73422141911">Дежурная часть: +7 (342) 21-41-911</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
