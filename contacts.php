<?php

/**
 * Template name: Контакты
 */
$baseUrl  = get_template_directory_uri();
get_header();

$phone = get_field('phone', 'option');
$address = get_field('address', 'option');
$email = get_field('email', 'option');
$telegram = get_field('telegram', 'option');
$whatsapp = get_field('whatsapp', 'option');
?>

<main>
  <section class="contacts">
    <div class="container">

      <?php get_template_part('components/breadcrumbs') ?>

      <div class="block block_equal-padding">
        <div class="contacts__grid">
          <div class="contacts__links" style="grid-area: links;">
            <?php if ($email) : ?>
              <div class="contacts__link contacts__link_email">
                <span class="contacts__label"><?= pll__('Электронная почта') ?></span>
                <a class="link" href="mailto:<?= $email ?>"><?= $email ?></a>
              </div>
            <?php endif; ?>

            <?php if ($phone) : ?>
              <div class="contacts__link">
                <span class="contacts__label"><?= pll__('Позвоните нам') ?></span>
                <a class="link" href="tel:<?= $phone ?>"><?= $phone ?></a>
              </div>
            <?php endif; ?>
          </div>
          <div class="contacts__address" style="grid-area: address;">
            <?php if ($address) : ?>
              <address class="contacts__link">
                <span class="contacts__label"><?= pll__('Адрес офиса') ?></span>
                <div><?= $address ?></div>
              </address>
            <?php endif; ?>

            <div class="contacts__media">
              <?php if ($telegram) : ?>
                <a href="<?= $telegram ?>" class="button button_telegram" target="_blank">
                  Telegram
                </a>
              <?php endif; ?>

              <?php if ($whatsapp) : ?>
                <a href="<?= $whatsapp ?>" class="button button_whatsapp" target="_blank">
                  WhatsApp
                </a>
              <?php endif; ?>
            </div>
          </div>
          <div class="contacts__map" style="grid-area: map;"></div>
        </div>
      </div>
    </div>
  </section>
</main>

<?php get_footer(); ?>