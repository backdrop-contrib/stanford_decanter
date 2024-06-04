<?php
/**
 * @file
 * stanford_decanter preprocess functions and theme function overrides.
 */

/**
 * Prepares variables for block templates.
 *
 * @see block.tpl.php
 */
function stanford_decanter_preprocess_block(&$variables)
{
  if ($variables['theme_hook_original'] == 'block__system__main_menu') {
    $variables['classes'] = array_merge($variables['classes'], ['su-main-nav']);
  }
}

