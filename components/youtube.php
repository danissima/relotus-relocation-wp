<?php
$post_id = pll_get_post(271);
?>

<section class="slug-youtube section">
  <div class="container">
    <div class="block">
      <header class="section__header">
        <h2 class="h2 h2_blue">
          <?= get_field('youtube_title', $post_id) ?>
        </h2>
        <div class="carousel-arrows" data-carousel-arrows="slug-youtube">
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
      <div class="slug-youtube__carousel carousel carousel_grid" data-carousel="slug-youtube">
        <div class="carousel__viewport" data-carousel-viewport>
          <div class="carousel__container">
            <?php
            foreach (get_field('youtube_videos', $post_id) as $video) :
            ?>
              <div class="carousel__slide" data-carousel-slide>
                <div class="slug-youtube-card" data-slug-youtube-card="dQw4w9WgXcQ">
                  <div class="slug-youtube-card__image bg-cover"
                    style="background-image: url(https://i.ytimg.com/vi/<?= $video['youtube_id'] ?>/hqdefault.jpg);">
                    <svg width="42" height="42" xmlns="http://www.w3.org/2000/svg">
                      <use xlink:href="#play-circle" />
                    </svg>
                  </div>
                  <div class="h5" data-title><?= $video['title'] ?></div>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
      <a class="slug-youtube__link button button_blue" href="<?= get_field('youtube_channel_link', $post_id) ?>" target="_blank" rel="noopener noreferrer">
        <?= pll__('Открыть канал на Youtube') ?>
      </a>
    </div>
  </div>
</section>