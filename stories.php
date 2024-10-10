<?php

/**
 * Template name: Кейсы клиентов
 */
$baseUrl  = get_template_directory_uri();
get_header();

$current_page = 1;

$query = new WP_Query([
  'post_type' => 'stories',
  'posts_per_page' => 6,
  'paged' => $current_page,
]);
?>

<main>
  <section class="stories" data-stories>
    <div class="container">
      <?php get_template_part('components/breadcrumbs') ?>

      <h1 class="h1 h1_orange">
        <mark><?= pll__('Кейсы клиентов') ?></mark>
      </h1>
      <div class="stories__grid" data-stories-container>

        <?php
        foreach ($query->posts as $post) {
          get_template_part('components/story-article-card', null, $post);
        }
        ?>
        <?php wp_reset_postdata(); ?>
      </div>

      <?php if ($current_page < $query->max_num_pages) : ?>
        <div class="stories__controls" data-stories-controls>
          <button class="button button_primary" type="button" data-button="stories-more">
            <span class="button__text"><?= pll__('Загрузить ещё') ?></span>
            <span class="loader"><span></span></span>
          </button>
        </div>
      <?php endif; ?>
    </div>
  </section>

  <?php
  include 'components/contact-form.php';
  include 'components/products.php';
  include 'components/services.php';
  ?>

</main>

<?php get_footer(); ?>