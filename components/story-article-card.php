<?php
$id = $args->ID;
$title = get_the_title($id);
$link = get_permalink($id);
$preview = get_field('preview', $id);
$date = $args->post_date_gmt;
$date_formatted = get_the_time('d.m.Y', $id);
$client_name = get_field('client_name', $id);
$client_avatar = get_field('client_avatar', $id);
$client_position = get_field('client_position', $id);
?>
<div class="stories-card block block_equal-padding">
  <div class="h2">
    <a class="link" href="<?= $link ?>">
      <?= $title ?>
    </a>
  </div>
  <p class="stories-card__description"><?= $preview ?></p>
  <div class="stories-card__author">
    <div class="article-author">
      <div class="article-author__content">
        <div class="article-author__info">
          <div class="article-author__avatar">
            <img class="image-full-cover" loading="lazy" src="<?= $client_avatar ?>" alt="<?= $client_name ?>">
          </div>
          <div class="article-author__name">
            <div class="h4"><?= $client_name ?></div>
            <div class="article-author__position"><?= $client_position ?></div>
          </div>
        </div>
      </div>
    </div>
    <a class="stories-card__more" href="<?= $link ?>">
      <?= pll__('Подробнее') ?>
      <svg width="12" height="12" xmlns="http://www.w3.org/2000/svg">
        <use xlink:href="#arrow-right" />
      </svg>
    </a>
  </div>
</div>