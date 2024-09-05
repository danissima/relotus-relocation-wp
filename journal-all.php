<?php

/**
 * Template name: Все статьи
 */
$baseUrl  = get_template_directory_uri();
get_header();

$journal_link = get_permalink(pll_get_post(137));

$letters = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Э', 'Ю', 'Я');

if (pll_current_language('slug') === 'en') {
  $letters = range('A', 'Z');
}

$posts = get_posts([
  'post_type' => 'journal',
  'numberposts' => -1,
]);

usort($posts, function ($a, $b) {
  return strcmp(strip_tags($a->post_title), strip_tags($b->post_title));
})
?>

<main>
  <section class="journal-all">
    <div class="container">

      <?php get_template_part('components/breadcrumbs', null, [
        [
          'name' => get_the_title(pll_get_post(9)),
          'link' => pll_home_url(),
        ],
        [
          'name' => get_the_title(pll_get_post(137)),
          'link' => $journal_link,
        ],
        [
          'name' => pll__('Все статьи'),
        ],
      ]) ?>

      <header class="journal-all__header">
        <h1 class="h1 h1_orange">
          <?= the_title() ?>
        </h1>
        <a class="button button_primary" href="<?= $journal_link ?>">
          <?= pll__('Статьи по типу ВНЖ') ?>
        </a>
      </header>
      <div class="journal-all-filter">
        <div class="journal-all-filter__label">
          <?= pll__('А-Я') ?>
        </div>
        <ul class="journal-all-filter__letters">
          <?php foreach ($letters as $key => $letter) : ?>
            <li class="journal-all-filter__letter">
              <a href="#letter-<?= $key + 1 ?>"><?= $letter ?></a>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
      <div class="block block_equal-padding journal-all__content">
        <?php
        foreach ($letters as $key => $letter) :
          /* get posts starting with given letter */
          $filtered = array_filter($posts, function ($post) use ($letter) {
            return mb_substr(strip_tags($post->post_title), 0, 1) === $letter;
          });

          if (count($filtered) > 0) :
        ?>
            <div id="letter-<?= $key + 1 ?>" class="journal-all__letter">
              <div class="journal-all__label"><?= $letter ?></div>
              <div class="journal-all__articles">
                <?php
                foreach ($filtered as $post) :
                ?>
                  <a href="<?= get_permalink($post->ID) ?>" class="journal-all__article link">
                    <?= strip_tags($post->post_title) ?>
                  </a>
                <?php endforeach; ?>
              </div>
            </div>
        <?php endif;
        endforeach; ?>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>