<?php

/**
 * Template name: Отзывы
 */
$baseUrl  = get_template_directory_uri();
get_header();

$cards = get_field('feedback_cards');
$json_cards = json_encode($cards);
?>
<main>
  <section class="feedback-all" data-feedback-all data-feedback-section>
    <div class="container">

      <?php get_template_part('components/breadcrumbs') ?>

      <h1 class="h1 h1_blue"><?= pll__('Отзывы предпринимателей, которые успешно переехали в Испанию') ?></h1>
      <div class="block">
        <div class="feedback-all__grid">
          <?php
          foreach ($cards as $key => $card) {
            $card['index'] = $key;
            get_template_part('components/feedback-card', null, $card);
          }
          ?>
        </div>
        <!-- <div class="feedback-all__controls">
          <button class="button button_primary" type="button">
            Загрузить ещё
          </button>
        </div> -->
      </div>
    </div>

    <?php
    echo "<script> window.feedbackCards = $json_cards </script>";
    ?>

  </section>
</main>
<?php get_footer(); ?>