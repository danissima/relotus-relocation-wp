<?php
$visas = get_posts([
  'posts_per_page' => -1,
  'post_type' => 'product',
  'orderby' => 'date',
  'order' => 'ASC',
]);
?>

<section class="visas section">
  <div class="container">
    <div class="visas__block block">
      <header class="section__header">
        <h2><?= pll__('Визы и ВНЖ') ?></h2>
        <div class="carousel-arrows" data-carousel-arrows="visas">
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
      <div class="visas__carousel carousel carousel_grid" data-carousel="visas">
        <div class="carousel__viewport" data-carousel-viewport>
          <div class="carousel__container">
            <?php
            if ($visas) :
              foreach ($visas as $visa) :
                $title = $visa->post_title;
                $id = $visa->ID;
                $link = get_permalink($id);
            ?>
                <div class="carousel__slide" data-carousel-slide>
                  <a class="visas__card" href="<?= $link ?>">
                    <h3><?= $title ?></h3>
                    <svg width="347" height="175" xmlns="http://www.w3.org/2000/svg">
                      <use xlink:href="#pattern-1" />
                    </svg>
                    <img src="<?= get_field('promo_image', $id)['sizes']["medium_large"]; ?>" alt="">
                  </a>
                </div>
            <?php
              endforeach;
            endif;
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>