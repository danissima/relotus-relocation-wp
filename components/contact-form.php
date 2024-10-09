<?php
$baseUrl  = get_template_directory_uri();

$privacy_link = [
  'url' => get_permalink(pll_get_post(3)),
  'title' => get_the_title(pll_get_post(3)),
];

$privact_checkbox_label = 'Я согласен с <a class="link" href="' . $privacy_link['url'] . '" target="_blank">политикой обработки</a> персональных данных сайта';

if (pll_current_language('slug') === 'en') {
  $privact_checkbox_label = 'I agree with <a class="link" href="' . $privacy_link['url'] . '" target="_blank">privacy policy</a> of the site';
}
?>
<section class="contact-form section">
  <div class="container">
    <div class="block block_equal-padding">
      <div class="contact-form__content">
        <form class="contact-form__form form" data-form="contact">
          <h2><?= pll__('Оставьте заявку на бесплатную консультацию эксперта') ?></h2>
          <div class="form__fields">
            <div class="input">
              <input type="text" name="name" placeholder="<?= pll__('Ваше имя') ?>*" required>
            </div>
            <div class="input">
              <input type="tel" name="phone" placeholder="<?= pll__('Ваш номер телефона') ?>*" required data-maska="+###############">
            </div>
            <div class="input">
              <input type="text" name="question" placeholder="<?= pll__('Ваш вопрос') ?>">
            </div>
            <div class="checkbox">
              <label class="checkbox__label" for="contact-form-privacy">
                <input class="checkbox__input" type="checkbox" checked id="contact-form-privacy"
                  name="privacy-agreement" required>
                <div class="checkbox__checkmark">
                  <svg width="14" height="14" xmlns="http://www.w3.org/2000/svg">
                    <use xlink:href="#checkmark" />
                  </svg>
                </div>
                <span>
                  <?= $privact_checkbox_label ?>
                </span>
              </label>
            </div>
          </div>
          <button class="form__submit button button_primary" type="submit" data-button="contact-submit">
            <?= pll__('Оставить заявку') ?>
          </button>
          <p style="color: #2BAF2B; margin-top: 10px; display: none;" data-form-success><?= pll__('Заявка отправлена!') ?></p>
          <p style="color: red; margin-top: 10px; display: none;" data-form-error><?= pll__('Ошибка. Попробуйте позже') ?></p>
        </form>
        <div class="contact-form__image">
          <img loading="lazy" src="<?= $baseUrl ?>/assets/images/content/home-hero-bg.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
</section>