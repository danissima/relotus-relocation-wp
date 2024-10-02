<?php
$services = get_posts([
  'posts_per_page' => -1,
  'post_type' => 'service',
  'orderby' => 'date',
  'order' => 'ASC',
]);
?>

<section class="service section">
  <div class="container">
    <div class="service__block block">
      <header class="section__header">
        <h2><?= pll__('Услуги') ?></h2>
        <div class="carousel-arrows" data-carousel-arrows="service">
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
      <div class="service__carousel carousel carousel_grid" data-carousel="service">
        <div class="carousel__viewport" data-carousel-viewport>
          <div class="carousel__container">
            <?php
            if ($services) :
              foreach ($services as $index => $service) :
                $title = $service->post_title;
                $id = $service->ID;
                $link = get_permalink($id);
                $svg_id = ($index % 4) + 1; // 1 to 4
            ?>
                <div class="carousel__slide" data-carousel-slide>
                  <a class="service__card" href="<?= $link ?>">
                    <svg width="60" height="60" xmlns="http://www.w3.org/2000/svg">
                      <use xlink:href="#shape-<?= $svg_id ?>" />
                    </svg>
                    <div class="h3"><?= $title ?></div>
                    <p>
                      <?= get_field('description', $id) ?>
                    </p>
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
  </div>
</section>