<?php
$title = wp_strip_all_tags($args->post_title);
$id = $args->ID;
$link = get_permalink($id);
$description = $args->post_excerpt;
$date = $args->post_date_gmt;
$date_formatted = get_the_time('d.m.Y', $id);
$image = get_field('image', $id)['sizes']["medium_large"];
?>

<article class="journal-card">
  <a class="journal-card__image bg-cover" href="<?= $link ?>"
    style="background-image: url(<?= $image ?>);"></a>
  <div class="h4"><a href="<?= $link ?>"><?= $title ?></a></div>
  <p><?= $description ?></p>
  <time datetime="<?= $date ?>"><?= $date_formatted ?></time>
</article>