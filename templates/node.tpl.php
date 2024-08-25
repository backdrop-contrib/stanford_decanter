<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * See web/core/modules/node/templates/node.tpl.php
 *
 * Added variables:
 * - $pre_content: Any fields which appear above the title (eg: card image).
 *
 * @ingroup themeable
 */
?>
<article id="node-<?php print $node->nid; ?>" class="<?php print implode(' ', $classes); ?> clearfix"<?php print backdrop_attributes($attributes); ?>>
  <?php print render($pre_content); ?>

  <div class="content"<?php print backdrop_attributes($content_attributes); ?>>
    <?php print render($title_prefix); ?>

    <?php if (!$page && !empty($title)): ?>
      <?php if (!empty($node_url)): ?>
        <h2><a href="<?php print $node_url; ?>" rel="bookmark"><?php print $title; ?></a></h2>
      <?php else: ?>
        <h2><?php print $title; ?></h2>
      <?php endif; ?>
    <?php endif; ?>
    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
      <footer>
        <?php print $user_picture; ?>
        <p class="submitted"><?php print $submitted; ?></p>
      </footer>
    <?php endif; ?>

    <?php
      // We hide the links now so that we can render them later.
      hide($content['links']);
      print render($content);
      ?>
      <?php print render($content['links']); ?>
  </div>


  <?php if ($comments): ?>
    <section class="comments" id="comments">
      <?php if ($comments['comments']): ?>
        <h2 class="title"><?php print t('Comments'); ?></h2>
        <?php print render($comments['comments']); ?>
      <?php endif; ?>

      <?php if ($comments['comment_form']): ?>
        <h2 class="title comment-form"><?php print t('Add comment'); ?></h2>
        <?php print render($comments['comment_form']); ?>
      <?php endif; ?>
    </section>
  <?php endif; ?>

</article>
