<?php

/**
 * Template name: Журнал
 */
$baseUrl  = get_template_directory_uri();
get_header();

$selected_topic = array_key_exists('topic_id', $_GET) ? $_GET['topic_id'] : null;
$actie_class = 'journal__tag_active';

$current_page = 1;

$query = new WP_Query([
  'post_type' => 'journal',
  'posts_per_page' => 3,
  'paged' => $current_page,
  'tax_query' => $selected_topic ? [
    [
      'taxonomy' => 'journal_post_topic',
      'field' => 'term_id',
      'terms' => $selected_topic,
    ],
  ] : [],
]);

$terms = get_terms([
  'taxonomy' => 'journal_post_topic',
]);

$journal_link = get_permalink(pll_get_post(137));
$journal_all_link = get_permalink(pll_get_post(328));
?>

<main>
  <section class="journal" data-journal>
    <div class="container">

      <?php get_template_part('components/breadcrumbs') ?>

      <h1 class="h1 h1_orange">
        <?= pll__('Онлайн-журнал о жизни и иммиграции в Испанию') ?>
      </h1>
      <div class="journal__tags carousel carousel_grid" data-carousel="journal-tags">
        <div class="carousel__viewport" data-carousel-viewport>
          <div class="carousel__container">
            <div class="carousel__slide" data-carousel-slide>
              <a class="journal__tag" href="<?= $journal_all_link ?>">
                А-Я
              </a>
            </div>
            <div class="carousel__slide" data-carousel-slide>
              <a class="journal__tag <?= $selected_topic === null ? $actie_class : '' ?>" href="<?= $journal_link ?>">
                <?= pll__('Все статьи') ?>
              </a>
            </div>
            <?php
            foreach ($terms as $term) :
            ?>
              <div class="carousel__slide" data-carousel-slide>
                <a
                  class="journal__tag <?= $selected_topic == $term->term_id ? $actie_class : '' ?>"
                  href="<?= $journal_link ?>?topic_id=<?= $term->term_id ?>">
                  <?= $term->name ?>
                </a>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <div class="block">

        <div class="journal__grid" data-journal-container>
          <?php
          foreach ($query->posts as $post) {
            get_template_part('components/journal-card', null, $post);
          }
          ?>
        </div>
        <?php wp_reset_postdata(); ?>

        <?php if ($current_page < $query->max_num_pages) : ?>
          <div class="journal__controls" data-journal-controls>
            <button class="button button_primary" type="button" data-button="journal-more">
              <span class="button__text"><?= pll__('Загрузить ещё') ?></span>
              <span class="loader"><span></span></span>
            </button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <?php
  include 'components/promo-banner.php';
  include 'components/products.php';
  include 'components/services.php';
  ?>

</main>

<?php get_footer(); ?>