<?php

/**
 * Template name: О нас
 */
$baseUrl  = get_template_directory_uri();
get_header();
?>
<main>
  <section class="about-us">
    <div class="container">
      <?php get_template_part('components/breadcrumbs') ?>
      <h1 class="h1 h1_orange">
        <?= the_title() ?>
      </h1>
    </div>
  </section>

  <?php
  include 'components/text-section.php';
  include 'components/team.php';
  include 'components/contact-form.php';
  ?>

  <?php if (get_field('documents')): ?>
    <section class="about-documents section">
      <div class="container">
        <div class="block">
          <header class="about-documents__header section__header">
            <h2><?= pll__('Сертификаты') ?></h2>
            <div class="carousel-arrows carousel-arrows_orange" data-carousel-arrows="about-documents">
              <button class="button-icon" type="button" data-carousel-arrow="prev">
                <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg">
                  <use xlink:href="#arrow-left" />
                </svg>
              </button>
              <button class="button-icon" type="button" data-carousel-arrow="next">
                <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg">
                  <use xlink:href="#arrow-right" />
                </svg>
              </button>
            </div>
          </header>

          <div id="about-documents-carousel" class="about-documents__carousel carousel carousel_grid" data-carousel="about-documents">
            <div class="carousel__viewport" data-carousel-viewport>
              <div class="carousel__container">
                <?php
                foreach (get_field('documents') as $document):
                ?>
                  <div class="carousel__slide" data-carousel-slide>
                    <div class="about-documents-card">
                      <div class="about-documents-card__image">
                        <a
                          href="<?= $document['photo']['url'] ?>"
                          data-pswp-width="<?= $document['photo']['width'] ?>"
                          data-pswp-height="<?= $document['photo']['height'] ?>"
                          target="_blank">
                          <img
                            loading="lazy"
                            src="<?= $document['photo']['sizes']['medium'] ?>"
                            alt="<?= $document['description'] ?>">
                        </a>
                      </div>
                      <div class="h4"><?= $document['title'] ?></div>
                      <p><?= $document['description'] ?></p>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  include 'components/feedback.php';
  ?>

</main>

<?php get_footer(); ?>