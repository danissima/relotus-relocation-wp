<?php
$post_id = pll_get_post(271);

$team_cards = get_field('team_cards', $post_id);
$json_cards = json_encode($team_cards);
?>

<section class="feedback section" data-team-section>
  <div class="container">
    <div class="block">
      <header class="feedback__header section__header">
        <h2><?= get_field('team_title', $post_id) ?></h2>
        <div class="carousel-arrows" data-carousel-arrows="team">
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
      <div class="feedback__carousel carousel carousel_grid" data-carousel="team">
        <div class="carousel__viewport" data-carousel-viewport>
          <div class="carousel__container">
            <?php
            foreach ($team_cards as $key => $card) :
              $card['index'] = $key;
            ?>
              <div class="carousel__slide" data-carousel-slide>
                <?= get_template_part('components/feedback-card', null, $card) ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
    <?= "<script> window.teamCards = $json_cards </script>" ?>
  </div>
</section>