<div class="<?php print implode(' ', $classes_array); ?>"<?php print backdrop_attributes($attributes); ?>>
  <?php foreach ($aplenty_cards as $card): ?>
    <?php print render($card); ?>
  <?php endforeach; ?>
</div>
