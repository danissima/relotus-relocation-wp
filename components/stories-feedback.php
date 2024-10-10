<?php
$stories = get_posts([
  'posts_per_page' => 10,
  'post_type' => 'stories',
  'orderby' => 'date',
  'order' => 'ASC',
]);
?>

<section class="feedback section">
  <div class="container">
    <div class="block">
      <header class="feedback__header section__header">
        <h2 class="h2 h2_blue">
          <?= pll__('Истории людей, которые переехали в Испанию') ?></h2>
        <div class="carousel-arrows" data-carousel-arrows="stories">
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
      <div class="feedback__carousel carousel carousel_grid" data-carousel="stories">
        <div class="carousel__viewport" data-carousel-viewport>
          <div class="carousel__container">
            <?php
            foreach ($stories as $story) :
            ?>
              <div class="carousel__slide" data-carousel-slide>
                <?php get_template_part('components/story-feedback-card', null, $story) ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>