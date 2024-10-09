<?php
$baseUrl  = get_template_directory_uri();
get_header();

$terms = get_the_terms(get_the_ID(), 'journal_post_topic');
$terms_names = array_map(fn($term) => $term->name, $terms);
?>
<main>
  <article class="article">
    <div class="container">
      <?php
      get_template_part('components/breadcrumbs', null, [
        [
          'name' => get_the_title(pll_get_post(9)),
          'link' => pll_home_url(),
        ],
        [
          'name' => get_the_title(pll_get_post(137)),
          'link' => get_permalink(pll_get_post(137)),
        ],
        [
          'name' => get_the_title(),
        ],
      ])
      ?>
      <header class="article__header">
        <h1 class="h1 h1_orange" data-article-title><?= the_title() ?></h1>
        <time datetime="<?= the_date_xml() ?>"><?= the_date('j F Y') ?></time>
      </header>
      <div class="article__content">
        <div class="article__banner" style="grid-area: banner;">
          <img src="<?= get_field('image')['url'] ?>" alt="">
        </div>
        <div class="article__text" style="grid-area: text;">
          <div id="article-content" class="block block_equal-padding plain-html" data-article>
            <?= the_content() ?>
          </div>
        </div>
        <div class="article__anchors" style="grid-area: anchors;">
          <div class="block block_equal-padding">
            <div class="h3"><?= pll__('Содержание') ?></div>
            <ol data-article-anchors></ol>
          </div>
        </div>

        <div class="article__share">
          <p><?= pll__('Поделиться') ?>:</p>
          <script src="https://yastatic.net/share2/share.js"></script>
          <div class="ya-share2" data-curtain data-size="l" data-shape="round"
            data-services="vkontakte,telegram,viber,whatsapp"></div>
        </div>

        <?php if (get_field('author_name')): ?>
          <div class="article-author block block_equal-padding">
            <div class="h3"><?= pll__('Автор статьи') ?></div>
            <div class="article-author__content">
              <div class="article-author__info">
                <div class="article-author__avatar">
                  <img class="image-full-cover" loading="lazy" src="<?= get_field('author_avatar') ?>" alt="<?= get_field('author_name') ?>">
                </div>
                <div class="article-author__name">
                  <div class="h4"><?= get_field('author_name') ?></div>
                  <div class="article-author__position"><?= get_field('author_position') ?></div>
                </div>
              </div>
              <p class="article-author__description">
                <?= get_field('author_description') ?>
              </p>
            </div>
            <button class="button button_primary" type="button" data-button="consultation">
              <?= pll__('Бесплатная консультация') ?>
            </button>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </article>

  <section class="journal-more section">
    <div class="container">
      <div class="block">
        <header class="section__header">
          <h2><?= pll__('Вам может быть интересно') ?></h2>
        </header>
        <div class="journal-more__grid">
          <?php
          $more_posts = get_posts([
            'post_type' => 'journal',
            'posts_per_page' => 6,
            'exclude' => get_the_ID(),
            'tax_query' => [
              [
                'taxonomy' => 'journal_post_topic',
                'field' => 'name',
                'terms' => $terms_names,
              ],
            ],
          ]);

          foreach ($more_posts as $post) {
            get_template_part('components/journal-card', null, $post);
          }
          ?>
        </div>
      </div>
    </div>
  </section>

  <?php
  include 'components/promo-banner.php';
  include 'components/products.php';
  include 'components/services.php';
  ?>

</main>

<?php get_footer(); ?>