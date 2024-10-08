<?php

/**
 * Template name: Политика конфиденциальности
 */
get_header();
?>

<main>
  <section class="text-page">
    <div class="container">

      <?php get_template_part('components/breadcrumbs') ?>

      <h1><?= pll__('Политика в отношении обработки персональных данных') ?></h1>
      <div class="block block_equal-padding plain-html">
        <?= the_content() ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>