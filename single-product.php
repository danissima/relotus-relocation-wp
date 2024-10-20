<?php
$baseUrl  = get_template_directory_uri();
get_header();

$promo_list = get_field('promo_list');
?>

<main class="main_no-padding">
  <section class="slug-hero">
    <div class="container">
      <div class="slug-hero__inner block block_equal-padding">

        <?php get_template_part('components/breadcrumbs') ?>

        <div class="slug-hero__content">
          <div class="slug-hero__text">
            <h1 class="h1 h1_orange"><?= the_field('title'); ?></h1>
            <ul class="slug-hero__list">
              <?php
              if ($promo_list && count($promo_list) > 0) :
                foreach (get_field('promo_list') as $item) :
              ?>
                  <li>
                    <svg width="20" height="20" xmlns="http://www.w3.org/2000/svg">
                      <use xlink:href="#checkmark-flower" />
                    </svg>
                    <span><?= $item['text'] ?></span>
                  </li>
              <?php
                endforeach;
              endif;
              ?>
            </ul>
            <button class="button button_primary" type="button" data-button="consultation">
              <?= pll__('Бесплатная консультация') ?>
            </button>
          </div>
          <div class="slug-hero__image">
            <div>
              <img class="image-full-cover absolute-top-left" loading="lazy" src="<?= get_field('promo_image')['sizes']['large'] ?>" alt="">
            </div>
          </div>
        </div>
        <button class="slug-hero__action button button_primary" type="button" data-button="consultation">
          <?= pll__('Бесплатная консультация') ?>
        </button>
        <svg class="slug-hero__pattern" width="1000" height="500" xmlns="http://www.w3.org/2000/svg">
          <use xlink:href="#pattern-2" />
        </svg>
      </div>
    </div>
  </section>

  <?php if (get_field('about_cards')): ?>
    <section class="slug-about section">
      <div class="container">
        <div class="block">
          <header class="slug-about__header section__header">
            <h2 class="h2 h2_orange"><?= the_field('about_title') ?></h2>
          </header>
          <div class="slug-about__grid">
            <?php
            foreach (get_field('about_cards') as $key => $card) :
              /* add primary class to last item */
              $primary_class = $key === 2 ? 'slug-about-card_primary slug-about-card_orange' : '';
            ?>
              <div class="slug-about-card <?= $primary_class ?>">
                <div class="slug-about-card__content">
                  <div class="h3"><?= $card['title'] ?></div>
                  <p><?= $card['description'] ?></p>
                </div>
                <div class="slug-about-card__image mask-<?= $card['image_shape'] ?>">
                  <img class="image-full-cover absolute-top-left" loading="lazy" src="<?= $card['image'] ?>" alt="">
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    </section>
  <?php endif; ?>

  <?php
  include 'components/why-spain.php';
  include 'components/text-section.php';
  include 'components/contact-form.php';
  ?>

  <?php if (get_field('for_slider')): ?>
    <section class="slug-for section">
      <div class="container">
        <div class="block">
          <header class="slug-for__header section__header">
            <h2 class="h2 h2_orange"><?= the_field('for_title') ?></h2>
            <div class="carousel-arrows carousel-arrows_orange" data-carousel-arrows="slug-for">
              <button class=" button-icon" type="button" data-carousel-arrow="prev">
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

          <!-- carousel -->
          <div class="slug-for__carousel carousel carousel_grid" data-carousel="slug-for">
            <div class="carousel__viewport" data-carousel-viewport>
              <div class="carousel__container">
                <?php
                foreach (get_field('for_slider') as $item) :
                ?>
                  <div class="carousel__slide" data-carousel-slide>
                    <div class="slug-for-card">
                      <div class="h3"><?= $item['title'] ?></div>
                      <p><?= $item['description'] ?></p>
                      <svg class="slug-for-card__pattern" width="404" height="204" xmlns="http://www.w3.org/2000/svg">
                        <use xlink:href="#pattern-1" />
                      </svg>
                    </div>
                  </div>
                  <div class="carousel__slide" data-carousel-slide>
                    <div class="slug-for-image">
                      <img src="<?= $item['image'] ?>" alt="">
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

  <?php if (get_field('documents_cards')): ?>
    <section class="slug-documents section">
      <div class="container">
        <div class="block">
          <header class="slug-documents__header section__header">
            <h2 class="h2 h2_orange"><?= the_field('documents_title') ?></h2>
            <div class="carousel-arrows carousel-arrows_orange" data-carousel-arrows="slug-documents">
              <button class=" button-icon" type="button" data-carousel-arrow="prev">
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

          <!-- carousel -->
          <div class="slug-documents__carousel carousel carousel_grid" data-carousel="slug-documents">
            <div class="carousel__viewport" data-carousel-viewport>
              <div class="carousel__container">
                <?php
                foreach (get_field('documents_cards') as $card) :
                ?>
                  <div class="carousel__slide" data-carousel-slide>
                    <div class="slug-documents-card numbers-pseudo" data-slug-documents-card>
                      <div class="h3"><?= $card['title'] ?></div>
                      <p><?= $card['description'] ?></p>
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

  <?php if (get_field('steps_cards')): ?>
    <section class="slug-steps section">
      <div class="container">
        <div class="slug-steps__grid">
          <div class="slug-steps__image" style="grid-area: image">
            <div class="block block_transparent block_equal-padding bg-cover"
              style="background-image: url(<?= the_field('steps_image') ?>);">
              <button class="button button_primary" type="button" data-button="consultation">
                <?= pll__('Бесплатная консультация') ?>
              </button>
            </div>
          </div>
          <h2 class="slug-steps__title block block_equal-padding h2 h2_orange" style="grid-area: title;">
            <?= the_field('steps_title') ?>
          </h2>
          <div class="slug-steps__items block block_equal-padding" style="grid-area: items;">
            <?php
            foreach (get_field('steps_cards') as $card) :
            ?>
              <div class="slug-steps-card" data-step="<?= pll__('шаг') ?>">
                <div class="h3"><?= $card['title'] ?></div>
                <p>
                  <?= $card['description'] ?>
                </p>
              </div>
            <?php endforeach; ?>
            <button class="slug-steps__action button button_primary" type="button" data-button="consultation">
              <?= pll__('Бесплатная консультация') ?>
            </button>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if (get_field('payment_cards')): ?>
    <section class="slug-about slug-about_smaller section">
      <div class="container">
        <div class="block">
          <header class="slug-about__header section__header">
            <h2 class="h2 h2_blue"><?= the_field('payment_title') ?></h2>
          </header>
          <div class="slug-about__grid">
            <?php
            foreach (get_field('payment_cards') as $key => $card) :
              /* add primary class to last item */
              $primary_class = $key === 2 ? 'slug-about-card_primary slug-about-card_blue' : '';
            ?>
              <div class="slug-about-card slug-about-card_smaller <?= $primary_class ?>">
                <div class="slug-about-card__content">
                  <strong class="numbers"><?= $card['title'] ?></strong>
                  <p><?= $card['description'] ?></p>
                </div>
                <div class="slug-about-card__image mask-<?= $card['image_shape'] ?>">
                  <img class="image-full-cover absolute-top-left" src="<?= $card['image'] ?>" alt="">
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
    </section>
  <?php endif; ?>

  <?php
  include 'components/promo-banner.php';
  ?>

  <?php if (get_field('questions_cards')): ?>
    <section class="slug-questions section">
      <div class="container">
        <div class="block">
          <header class="section__header">
            <h2 class="h2 h2_orange"><?= the_field('questions_title') ?></h2>
          </header>
          <div class="slug-questions__grid" data-slug-questions>
            <?php
            $questions = get_field('questions_cards');
            $half_length_ceil = ceil(count($questions) / 2);
            $half_length_floor = floor(count($questions) / 2);
            $column1 = array_slice($questions, 0, $half_length_ceil);
            $column2 = array_slice($questions, $half_length_ceil, $half_length_floor);
            $result = [$column1, $column2];

            foreach ($result as $column) :
            ?>
              <div class="slug-questions__column">

                <?php
                foreach ($column as $card) :
                ?>
                  <div class="accordion" data-accordion>
                    <button class="accordion__trigger" type="button" data-accordion-trigger>
                      <div class="accordion__head">
                        <div class="accordion__title">
                          <strong><?= $card['question'] ?></strong>
                        </div>
                        <div class="accordion__icon">
                          <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg">
                            <use xlink:href="#arrow-down" />
                          </svg>
                        </div>
                      </div>
                    </button>
                    <div class="accordion__content">
                      <div>
                        <div class="accordion__inner">
                          <p><?= $card['answer'] ?></p>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php endforeach; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php if (get_field('advantages_cards')): ?>
    <section class="slug-benefits section">
      <div class="container">
        <div class="block">
          <header class="section__header">
            <h2><?= pll__('Преимущества программы') ?></h2>
          </header>
          <div class="slug-benefits__grid">
            <?php
            $advantages = get_field('advantages_cards');
            foreach ($advantages as $card):
            ?>
              <div class="slug-benefits-item">
                <div class="slug-benefits-item__icon">
                  <img src="<?= $card['icon'] ?>" alt="">
                </div>
                <div class="h3"><?= $card['title'] ?></div>
                <p><?= $card['description'] ?></p>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

  <?php
  $journal_title = get_field('journal_title');
  $journal_topics = get_field('journal_topics');

  if ($journal_topics) {
    $similar_posts = get_posts([
      'post_type' => 'journal',
      'posts_per_page' => 3,
      'tax_query' => [
        [
          'taxonomy' => 'journal_post_topic',
          'field' => 'term_id',
          'terms' => $journal_topics,
        ],
      ],
    ]);

    $params = [
      'title' => $journal_title,
      'posts' => $similar_posts
    ];

    get_template_part('components/journal-preview', null, $params);
  }

  include 'components/team.php';
  include 'components/youtube.php';
  include 'components/products.php';
  include 'components/services.php';
  ?>

</main>

<?php get_footer(); ?>