<?php
$baseUrl  = get_template_directory_uri();
get_header();

$text = 'Вы можете связаться с нами или перейти на <a class="link" href="' . pll_home_url() . '">главную страницу</a>';

if (pll_current_language() === 'en') {
  $text = 'You can contact us or go back to a <a class="link" href="' . pll_home_url() . '">home page</a>';
}
?>

<main>
  <section class="not-found">
    <div class="container">
      <h1><?= pll__('Страница не найдена.') ?></h1>
      <p>
        <?= $text ?>
      </p>
    </div>
  </section>
</main>

<?php get_footer(); ?>