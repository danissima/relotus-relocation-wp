<?php

/**
 * Template name: Главная страница
 */
$baseUrl  = get_template_directory_uri();
get_header();

$promo_slider = get_field('promo_slider');
?>

<main>
  <section class="home-hero">
    <div class="container">
      <div class="home-hero__content">
        <div class="home-hero__text block block_equal-padding">
          <h1 class="h1 h1_blue">
            <?= pll__('Поможем переехать в Испанию без стресса и ошибок за 45 дней') ?>
          </h1>
          <p><?= pll__('Подберем лучший ВНЖ или визу под ваши цели и ситуацию') ?></p>
          <button class="button button_primary" type="button" data-button="consultation">
            <?= pll__('Бесплатная консультация') ?>
          </button>
        </div>
        <div class="home-hero__image block block_transparent block_equal-padding bg-cover"
          style="background-image: url(<?= the_field('promo_background'); ?>)">

          <!-- carousel -->
          <div class="home-hero-slider carousel" data-carousel="hero">
            <div class="carousel__viewport" data-carousel-viewport>
              <div class="carousel__container">
                <?php
                foreach ($promo_slider as $slide) :
                ?>
                  <div class="home-hero-slider__slide carousel__slide" data-carousel-slide-link="<?= $slide['slide_link'] ?>">
                    <div class="home-hero-slider__card">
                      <div class="h4"><?= $slide['slide_title'] ?></div>
                      <p><?= $slide['slide_description'] ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>

            <!-- slides images -->
            <?php
            foreach ($promo_slider as $key => $slide) :
            ?>
              <div class="home-hero-slider__image bg-cover"
                style="background-image: url(<?= $slide['slide_image'] ?>);" data-carousel-image="<?= $key ?>"></div>
            <?php endforeach; ?>

            <!-- controls -->
            <div class="home-hero-slider__controls">
              <div class="home-hero-slider__more">
                <a href="#" data-link>
                  <?= pll__('Подробнее') ?>
                  <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#arrow-right" />
                  </svg>
                </a>
              </div>
              <div class="home-hero-slider__dots" data-carousel-dots></div>
            </div>
          </div>
        </div>
        <button class="home-hero__action button button_primary" type="button" data-button="consultation">
          <?= pll__('Бесплатная консультация') ?>
        </button>
      </div>
    </div>
  </section>

  <?php
  include 'components/products.php';
  include 'components/services.php';
  ?>

  <section class="home-stats section">
    <div class="container">
      <div class="home-stats__content">
        <div class="home-stats__image bg-cover" style="background-image: url(<?= the_field('stats_image'); ?>);"></div>
        <div class="home-stats__info block block_equal-padding">
          <h2 class="h2 h2_blue"><?= the_field('stats_title'); ?></h2>
          <p><?= the_field('stats_description'); ?></p>
          <div class="home-stats__grid">
            <?php
            foreach (get_field('stats_items') as $key => $item) :
              /* add primary class to first item */
              $primary_class = $key === 0 ? 'home-stats__item_primary' : '';
            ?>
              <div class="home-stats__item <?= $primary_class ?>">
                <strong class="numbers"><?= $item['number'] ?></strong>
                <p><?= $item['description'] ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>

  <?php
  include 'components/journal-preview.php';
  include 'components/feedback.php';
  ?>

</main>

<?php get_footer(); ?>