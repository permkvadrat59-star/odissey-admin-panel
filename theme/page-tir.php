<?php
/**
 * Шаблон страницы «tir» темы «Одиссей».
 * Перенос из tir.html. TODO (этап 4): редактируемые поля.
 */
if (!defined('ABSPATH')) exit;
$A = get_template_directory_uri() . '/assets';
get_header();
?>
<section class="hero-video hero-video--page">
  <picture>
    <source media="(max-width:700px)" srcset="<?php echo $A; ?>/photo/tir_hero_range_v3_mobile.webp">
    <img class="hero-video-media" style="object-position:50% 42%" src="<?php echo $A; ?>/photo/tir_hero_range_v3.webp" alt="Стрелковая галерея тира «Одиссей»: оружие, мишени, снаряжение">
  </picture>
  <div class="hero-video-scrim"></div>
  <div class="wrap hero-video-inner">
    <nav class="crumbs"><a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><span>/</span>Тир</nav>
    <div class="kicker">ССК «Одиссей» · первый закрытый клуб Перми · с 2011 года</div>
    <h1>Боевой стрелковый тир</h1>
    <p class="hero-sub hero-sub--mobile-hide">Стрельба из боевого оружия под руководством инструкторов, метание ножей, экспозиции оружия и техники времён Великой Отечественной. Работаем по курсам стрельб КС МВД РФ.</p>
    <div class="cta-row"><button class="btn btn-red" type="button" data-cta data-tema="Стрелковый тир">Записаться</button><a class="btn btn-line" href="#arsenal">Смотреть арсенал</a></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell--compact stat"><b><span data-count="30">30</span><i> м</i></b><span>стрелковая галерея</span></div>
    <div class="cell cell--compact stat"><b data-count="26">26</b><span>единиц оружия: от ПМ до пулемёта Максим</span></div>
    <div class="cell cell--compact stat"><b data-count="2011">2011</b><span>год основания клуба</span></div>
  </div>
  <!-- график работы отдельной полосой: заказчик просил, чтобы его видели все -->
  <div class="hours-band rv">
    <div class="hb-main">
      <span class="hb-label">График работы тира</span>
      <b class="hb-days">Среда – воскресенье</b>
      <span class="hb-time">12:00–20:00</span>
    </div>
    <div class="hb-side">
      <span class="hb-note">Запись строго в рабочие дни тира</span>
      <a class="hb-phone" href="tel:+73422066161">+7 (342) 20-66-161</a>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <?php foreach (odissey_price_rows('Занятия') as $r): ?>
    <div class="cell cell-flex pr-cell">
      <div class="nm"><?php echo esc_html($r['name']); ?></div>
      <div class="pr"><?php echo esc_html($r['price']); ?></div>
      <?php if ($r['note'] !== ''): ?><p><?php echo esc_html($r['note']); ?></p><?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Подарочные карты</span>
      <h2>Подарить стрельбу</h2>
      <p>Три курса под уровень: от первого знакомства с оружием до уверенного владения.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <?php foreach (odissey_price_rows('Подарочные карты') as $r): $parts = explode('; ', $r['note'], 2); ?>
    <div class="cell cell-flex pr-cell">
      <div class="nm"><?php echo esc_html($r['name']); ?></div>
      <div class="pr"><?php echo esc_html($r['price']); ?></div>
      <p><?php if (count($parts) > 1): ?><b style="color:var(--ink)"><?php echo esc_html($parts[0]); ?></b><br><?php echo esc_html($parts[1]); else: echo esc_html($r['note']); endif; ?></p>
      <div class="bottom"><button class="btn btn-red" type="button" data-cta data-tema="Подарочная карта в тир">Заказать карту</button></div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="bento bento--seamtop rv">
    <div class="cell cell--static">
      <span class="kicker">Правила сертификата</span>
      <ul class="list" style="margin-top:12px">
        <li>Действует ровно год с даты приобретения</li>
        <li>По сертификату стреляет один человек – тот, на чьё имя он приобретён</li>
        <li>Используется за один визит; оружие – российского производства</li>
        <li>Инструктор проводит инструктаж и оценивает уровень подготовки стрелка</li>
        <li>Количество выстрелов рассчитано на стрельбу из пистолета. При стрельбе из другого оружия делаем перерасчёт: выстрел дороже – выстрелов меньше</li>
      </ul>
    </div>
  </div>
</section>

<section class="wrap canvas" id="arsenal" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Арсенал клуба</span>
      <h2>26 единиц оружия</h2>
      <p>От пистолета Макарова до пулемёта Максим. Всё оружие боевое, стрельба только с инструктором.</p>
    </div>
  </div>
  <div class="bento g-4 bento--seamtop rv">
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/105-avtomat-kalashnikova-akms.webp" alt="Автомат Калашникова (АКМС)" loading="lazy"></div>
  <div class="body"><span class="num">01 /</span><h3>Автомат Калашникова (АКМС)</h3><p>7,62-мм автомат Калашникова принят на вооружение в СССР в 1949 году. Индекс ГРАУ – 56-А-212.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/106-ruchnoj-pulemet-kalashnikova.webp" alt="Ручной пулемёт Калашникова" loading="lazy"></div>
  <div class="body"><span class="num">02 /</span><h3>Ручной пулемёт Калашникова</h3><p>7,62-мм ручной пулемёт Калашникова (РПК, Индекс ГРАУ – 6П2) – советский ручной пулемёт, созданный на основе автомата АКМ.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/11-pistolet-beretta-92-italija.webp" alt="Пистолет Beretta 92 (Италия)" loading="lazy"></div>
  <div class="body"><span class="num">03 /</span><h3>Пистолет Beretta 92 (Италия)</h3><p>Классика итальянской оружейной школы. Калибр 9×19 мм, длина 217 мм, длина ствола 125 мм.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/14-pistolet-pulemet-glock-17.webp" alt="Пистолет Glock 17" loading="lazy"></div>
  <div class="body"><span class="num">04 /</span><h3>Пистолет Glock 17</h3><p>Четвёртое поколение. Пистолеты конструкции Гастона Глока серийно производятся в Австрии с начала 1980-х.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/15-pistolet-glock-34-glok-34-avstrija.webp" alt="Пистолет Glock 34 ГЛОК-34 (Австрия)" loading="lazy"></div>
  <div class="body"><span class="num">05 /</span><h3>Пистолет Glock 34 (Австрия)</h3><p>Модели 34 и 35 сделаны под спортивную стрельбу. Представлены в 1998 году, через год доработаны.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/16-pistolet-cz-75-sp-01-shadow-chehija.webp" alt="Пистолет CZ-75 SP-01 Shadow (Чехия)" loading="lazy"></div>
  <div class="body"><span class="num">06 /</span><h3>Пистолет CZ-75 SP-01 Shadow (Чехия)</h3><p>Оружейная компания Ceska Zbrojovka производит пистолеты CZ 75 уже свыше тридцати лет, а количество выпущенных за это время единиц приближается к трём четвертям миллиона.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/17-pistolet-k-100-grand-power-slovakija.webp" alt="Пистолет K-100 Grand Power (Словакия)" loading="lazy"></div>
  <div class="body"><span class="num">07 /</span><h3>Пистолет K-100 Grand Power (Словакия)</h3><p>Пистолет словацкой компании «Grand Power», разработан инженером Ярославом Курацина.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/18-pistolet-steyr-m9-a1-cal-919-avstrija.webp" alt="Пистолет Steyr M9-A1 cal 9×19 (Австрия)" loading="lazy"></div>
  <div class="body"><span class="num">08 /</span><h3>Пистолет Steyr M9-A1 (Австрия)</h3><p>В 1999 году австрийская компания Steyr Mannlicher представила новый пистолет серии Steyr M, созданный конструктором Вильгельмом Бубитсом.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/19-pistolet-colt-m1911-ssha.webp" alt="Пистолет Colt M1911 (США)" loading="lazy"></div>
  <div class="body"><span class="num">09 /</span><h3>Пистолет Colt M1911 (США)</h3><p>Colt M1911 сначала применялся только в кавалерии армии США, полиция не пользовалась им из-за чрезмерной мощности патрона.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/20-samozarjadnyj-karabin-taurus-ct9-g2-brazilija.webp" alt="Самозарядный карабин Taurus CT9 G2 (Бразилия)" loading="lazy"></div>
  <div class="body"><span class="num">10 /</span><h3>Самозарядный карабин Taurus CT9 G2 (Бразилия)</h3><p>Самозарядный карабин Taurus CT9 G2 под пистолетный боеприпас 9×19 Luger – новейшая модель от Taurus.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/21-revolver-taurus-94-brazilija.webp" alt="Револьвер TAURUS 94 (Бразилия)" loading="lazy"></div>
  <div class="body"><span class="num">11 /</span><h3>Револьвер TAURUS 94 (Бразилия)</h3><p>Классический револьвер с ударно-спусковым механизмом двойного действия. Тренировочное и спортивное оружие, держит быстрый темп стрельбы.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/22-revolver-taurus-66-cal357-mag-brazilija.webp" alt="Револьвер TAURUS 66 cal.357 Mag (Бразилия)" loading="lazy"></div>
  <div class="body"><span class="num">12 /</span><h3>Револьвер Taurus 66 .357 Mag (Бразилия)</h3><p>Мощный классический шестизарядный TAURUS 66 – полноразмерный спортивно-тренировочный револьвер.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/23-pistolet-taurus-24-7-brazilija.webp" alt="Пистолет Taurus 24/7 (Бразилия)" loading="lazy"></div>
  <div class="body"><span class="num">13 /</span><h3>Пистолет Taurus 24/7 (Бразилия)</h3><p>Пистолеты Taurus серии 24/7 предназначены для вооружения полиции и гражданских лиц, впервые представлены в 2004 году.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/24-sportivnyj-pistolet-smith-amp-wesson-model-22a-ssha.webp" alt="Спортивный пистолет Smith &amp; Wesson model 22A (США)" loading="lazy"></div>
  <div class="body"><span class="num">14 /</span><h3>Спортивный пистолет Smith & Wesson model 22A (США)</h3><p>Smith & Wesson (Смит-энд-Вессон) – крупнейший в США производитель огнестрельного оружия (в том числе револьверов).</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/25-pistolet-jarygina-pja-mr-443-grach-viking-rossija.webp" alt="Пистолет Ярыгина ПЯ МР-443 “Грач”, “Викинг” (Россия)" loading="lazy"></div>
  <div class="body"><span class="num">15 /</span><h3>Пистолет Ярыгина ПЯ МР-443 «Грач», «Викинг» (Россия)</h3><p>Самозарядный пистолет российского производства, индекс ГРАУ – 6П35. Разработан коллективом конструкторов под руководством В. А. Ярыгина.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/26-pistolet-pulemet-kedr-rossija.webp" alt="Пистолет-пулемёт «Кедр»" loading="lazy"></div>
  <div class="body"><span class="num">16 /</span><h3>Пистолет-пулемёт «Кедр»</h3><p>Разработан конструктором-оружейником Евгением Драгуновым. «КЕДР» – «Конструкция Евгения Драгунова».</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/27-pistolet-makarova-sssr.webp" alt="Пистолет Макарова (СССР)" loading="lazy"></div>
  <div class="body"><span class="num">17 /</span><h3>Пистолет Макарова (СССР)</h3><p>9-мм пистолет Макарова (ПМ, индекс ГАУ – 56-А-125) – самозарядный пистолет, разработанный советским конструктором Николаем Фёдоровичем Макаровым в 1948 году.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/28-pistolet-p-96-gsh-18-rossija.webp" alt="Пистолет П-96, ГШ-18 (Россия)" loading="lazy"></div>
  <div class="body"><span class="num">18 /</span><h3>Пистолет П-96, ГШ-18 (Россия)</h3><p>П-96 «Эфа» – опытный российский самозарядный пистолет, разработанный в середине 1990х годов Тульским КБ Приборостроения в качестве армейского пистолета.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/29-pistolet-pulemet-shpagina-ppsh-.webp" alt="Пистолет-пулемёт Шпагина (ППШ)" loading="lazy"></div>
  <div class="body"><span class="num">19 /</span><h3>Пистолет-пулемёт Шпагина (ППШ)</h3><p>Пистолет-пулемёт конструкции Г. С. Шпагина (1897–1952) принят на вооружение в декабре 1940 года. Выпущено больше 6 миллионов экземпляров.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/30-pulemet-maksim.webp" alt="Пулемёт Максим" loading="lazy"></div>
  <div class="body"><span class="num">20 /</span><h3>Пулемёт Максим</h3><p>Пулемёт Максим сконструирован Хайремом Стивенсом Максимом (4 февраля 1840 – 24 ноября 1916) в 1884 году.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img class="mirror" src="<?php echo $A; ?>/photo/oruzhie/card/31-pulemet-djagtereva.webp" alt="Пулемёт Дегтярёва" loading="lazy"></div>
  <div class="body"><span class="num">21 /</span><h3>Пулемёт Дегтярёва</h3><p>Ручной пулемёт ДП (Дегтярёва, пехотный) – один из первых образцов стрелкового оружия, созданных при советской власти.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/lebedev-pistolet.webp" alt="Пистолет Лебедева (Россия)" loading="lazy"></div>
  <div class="body"><span class="num">22 /</span><h3>Пистолет Лебедева (Россия)</h3><p>Современный российский самозарядный пистолет под патрон 9×19 мм, разработан концерном «Калашников» на смену пистолету Макарова.</p></div>
</div>
<div class="cell wcard">
  <div class="shot"><img src="<?php echo $A; ?>/photo/oruzhie/card/mosina-vintovka.webp" alt="Винтовка Мосина (СССР)" loading="lazy"></div>
  <div class="body"><span class="num">23 /</span><h3>Винтовка Мосина (СССР)</h3><p>Легендарная «трёхлинейка» образца 1891/30 года – основное оружие пехоты Красной армии в годы Великой Отечественной войны.</p></div>
</div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Галерея</span>
      <h2>Как всё устроено</h2>
      <p>Закрытый тир: рубеж, мишени, инструктаж перед каждой стрельбой.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="photo-cell" style="min-height:300px"><img src="<?php echo $A; ?>/photo/tir/tir_galereya.webp" alt="Стрелковая галерея тира" loading="lazy"><div class="photo-cap"><b>Стрелковая галерея</b>рубеж и мишенное поле</div></div>
    <div class="photo-cell" style="min-height:300px"><img src="<?php echo $A; ?>/photo/tir/tir_instruktazh.webp" alt="Инструктаж перед стрельбой" loading="lazy"><div class="photo-cap"><b>Инструктаж</b>до выстрела – разбор правил</div></div>
    <div class="photo-cell" style="min-height:300px"><img src="<?php echo $A; ?>/photo/tir/tir_mishen.webp" alt="Мишень с кучным попаданием, наушники и очки" loading="lazy"><div class="photo-cap"><b>Результат на руки</b>мишень забираете с собой</div></div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento g-3 rv">
    <div class="cell cell-flex">
      <span class="kicker">Правила</span>
      <h3 style="margin:8px 0 12px">Поведение в тире</h3>
      <ul class="list" style="margin-top:4px;font-size:13px">
        <li>Вход по документу, удостоверяющему личность; регистрация обязательна</li>
        <li>Перед стрельбой – инструктаж по мерам безопасности под подпись</li>
        <li>Оружие всегда направлено в сторону мишеней, работа строго по командам инструктора</li>
        <li>Наушники и защитные очки обязательны – выдаём на месте, покупать ничего не нужно</li>
        <li>В состоянии опьянения посетители не допускаются</li>
      </ul>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Сервис</span>
      <h3 style="margin:8px 0 12px">Ремонт оружия</h3>
      <p style="font-size:13px;color:var(--muted)">Официальная оружейная мастерская: диагностика, чистка, ремонт любой сложности.</p>
      <div class="gold-note" style="margin-top:12px;font-size:12px">Лицензия Минпромторга РФ № 14806-ПО от 11.12.2020</div>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Экскурсии</span>
      <h3 style="margin:8px 0 12px">Музей и полигон</h3>
      <p style="font-size:13px;color:var(--muted)">Экспозиции оружия и военной техники, выезды на полигон, программы для школ – бесплатно.</p>
      <div class="bottom"><a class="btn btn-line" href="<?php echo esc_url(odissey_link('muzey')); ?>">В музей</a></div>
    </div>
  </div>
</section>

<!-- образовательная деятельность клуба: программа подготовки и правовая часть,
     которую обучающийся изучает самостоятельно (условие самой программы) -->
<section class="wrap canvas" id="obuchenie" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Образовательная деятельность</span>
      <h2>Программа подготовки ПРСОО ССК «Одиссей»</h2>
      <p>Дополнительная общеобразовательная общеразвивающая программа для взрослых от 21 года — базовый спортивно-ознакомительный этап. Знакомит с видами гражданского оружия и правилами его применения, даёт первые навыки меткой стрельбы. Общая трудоёмкость — 150 минут.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="cell cell-flex">
      <span class="kicker">Теория</span>
      <h3 style="margin:8px 0 12px">Правовая подготовка</h3>
      <p style="font-size:13px;color:var(--muted)">2 академических часа. Изучается дистанционно и самостоятельно: закон «Об оружии», Гражданский и Уголовный кодексы, КоАП, правила оборота оружия и правила безопасного обращения. Весь перечень со ссылками на действующие тексты — на отдельной странице.</p>
      <div class="bottom" style="display:flex;flex-wrap:wrap;gap:8px">
        <?php $prog = odissey_tir_file('programma-podgotovki-ssk.pdf'); ?>
        <?php if ($prog): ?><a class="btn btn-red" href="<?php echo esc_url($prog); ?>" target="_blank" rel="noopener">Программа, PDF</a><?php endif; ?>
        <a class="btn btn-line" href="<?php echo esc_url(trailingslashit(odissey_link('tir')) . 'pravovaya-podgotovka/'); ?>">Материалы для изучения</a>
      </div>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Практика</span>
      <h3 style="margin:8px 0 12px">Огневая подготовка</h3>
      <p style="font-size:13px;color:var(--muted)">60 минут в галерее с инструктором: приёмы прицеливания, упражнения из короткоствольного и длинноствольного оружия либо вводное занятие в пулевую или практическую стрельбу. Индивидуально или в группе до 6 человек, по записи.</p>
    </div>
    <div class="cell cell-flex">
      <span class="kicker">Допуск</span>
      <h3 style="margin:8px 0 12px">Что нужно принести</h3>
      <ul class="list" style="margin-top:4px;font-size:13px">
        <li>Паспорт гражданина РФ</li>
        <li>Медицинские справки 002 О/у и 003 О/у либо действующее разрешение серии РОХа или служебное удостоверение</li>
        <li>Справка об отсутствии судимости</li>
      </ul>
    </div>
  </div>
</section>

<section class="wrap canvas" style="margin-top:128px">
  <div class="bento rv">
    <div class="cell cell--big cell--static sec-cell">
      <span class="kicker">Фестивали и выезды</span>
      <h2>Одиссей на выезде</h2>
      <p>Клуб регулярно выходит за пределы галереи: стенды оружия, сборка-разборка, стрельба под контролем инструкторов на городских фестивалях и полигоне.</p>
    </div>
  </div>
  <div class="bento g-3 bento--seamtop rv">
    <div class="photo-cell"><img src="<?php echo $A; ?>/photo/tir/vyezd_stend_oruzhiya.webp" alt="Стенд оружия на выездном мероприятии" loading="lazy"><div class="photo-cap"><b>Стенды оружия</b>потрогать легенды руками</div></div>
    <div class="photo-cell"><img src="<?php echo $A; ?>/photo/tir/vyezd_stend_tolpa.webp" alt="Выставка клуба на городском фестивале" loading="lazy"><div class="photo-cap"><b>Городские фестивали</b>выставка клуба</div></div>
    <div class="photo-cell"><img src="<?php echo $A; ?>/photo/tir/vyezd_sborka_razborka.webp" alt="Сборка-разборка автомата на время" loading="lazy"><div class="photo-cap"><b>Сборка-разборка</b>классика нормативов</div></div>
  </div>
</section>

<section class="wrap" style="margin-top:128px">
  <div class="cta-band rv">
    <div><h2>Готовы пострелять?</h2><p>Заявка на сайте или звонок в клуб – подберём программу и время.</p></div>
    <div class="btns">
      <button class="btn btn-solid" type="button" data-cta data-tema="Стрелковый тир">Оставить заявку</button>
      <a class="btn btn-white" href="tel:+73422066161">+7 (342) 20-66-161</a>
    </div>
  </div>
</section>
<?php get_footer(); ?>
