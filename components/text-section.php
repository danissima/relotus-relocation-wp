<?php if (get_field('richtext')): ?>
  <section class="section">
    <div class="container">
      <div class="block block_equal-padding plain-html">
        <?= get_field('richtext') ?>
      </div>
    </div>
  </section>
<?php endif; ?>