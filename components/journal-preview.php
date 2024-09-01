<?php
$title = isset($args['title']) ? $args['title'] : pll__('Журнал о релокации');

$posts = isset($args['posts']) ? $args['posts'] : get_posts([
  'posts_per_page' => 3,
  'post_type' => 'journal',
]);

$journal_link = get_permalink(pll_get_post(137));
?>

<section class="journal-preview section">
  <div class="container">
    <div class="block">
      <header class="journal-preview__header section__header">
        <h2 class="h2 h2_orange"><?= $title ?></h2>
        <a href="<?= $journal_link ?>">
          <?= pll__('Открыть журнал') ?>
          <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg">
            <use xlink:href="#arrow-right" />
          </svg>
        </a>
      </header>
      <div class="journal-preview__grid">
        <?php
        foreach ($posts as $post) {
          get_template_part('components/journal-card', null, $post);
        }
        ?>
      </div>
      <div class="journal-preview__more">
        <a href="<?= $journal_link ?>">
          <?= pll__('Открыть журнал') ?>
          <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg">
            <use xlink:href="#arrow-right" />
          </svg>
        </a>
      </div>
    </div>
  </div>
</section>