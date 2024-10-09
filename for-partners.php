<?php

/**
 * Template name: Партнерам
 */
get_header();
?>

<main>
  <section class="text-page">
    <div class="container">

      <?php get_template_part('components/breadcrumbs') ?>

      <h1 class="h1 h1_orange"><?= get_field('title') ?></h1>
      <div class="text-page__banner">
        <img class="image-full-cover" loading="lazy" src="<?= get_field('banner') ?>" alt="">
      </div>
      <div class="block block_equal-padding plain-html">
        <?= the_content() ?>
      </div>
    </div>
  </section>

  <?php
  include 'components/contact-form.php';
  ?>
</main>

<?php get_footer(); ?>