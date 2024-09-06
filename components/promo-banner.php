<?php
$baseUrl  = get_template_directory_uri();
?>
<section class="promo section">
  <div class="container">
    <div class="block">
      <div class="promo__content">
        <div class="promo__text">
          <h2 class="h2 h2_orange"><?= pll__('Поможем переехать в Испанию без стресса и ошибок за 45 дней') ?></h2>
          <p><?= pll__('Подберем лучший ВНЖ или визу под ваши цели и ситуацию') ?></p>
          <button class="button button_primary" type="button" data-button="chances">
            <?= pll__('Оценить шансы') ?>
          </button>
        </div>
        <div class="promo__image">
          <img src="<?= $baseUrl ?>/assets/images/content/home-hero-bg.jpg" alt="">
        </div>
        <button class="promo__action button button_primary" type="button" data-button="chances">
          <?= pll__('Оценить шансы') ?>
        </button>
      </div>
    </div>
  </div>
</section>