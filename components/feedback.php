<?php
$pageId = 143;
$cards = array_slice(get_field('feedback_cards', pll_get_post(143)), 0, 8);
$json_cards = json_encode($cards);
?>

<section class="feedback section" data-feedback-section>
  <div class="container">
    <div class="block">
      <header class="feedback__header section__header">
        <h2 class="h2 h2_blue">
          <?= pll__('Отзывы предпринимателей, которые успешно переехали в Испанию') ?></h2>
        <div class="carousel-arrows" data-carousel-arrows="feedback">
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

      <!-- carousel -->
      <div class="feedback__carousel carousel carousel_grid" data-carousel="feedback">
        <div class="carousel__viewport" data-carousel-viewport>
          <div class="carousel__container">
            <?php
            foreach ($cards as $key => $card) :
              $card['index'] = $key;
            ?>
              <div class="carousel__slide" data-carousel-slide>
                <?php get_template_part('components/feedback-card', null, $card) ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  echo "<script> window.feedbackCards = $json_cards </script>";
  ?>
</section>