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

function stanford_decanter_preprocess_node__stanford_event__compact(&$variables) {
}

function stanford_decanter_preprocess_paragraphs_item(&$variables) {
}

function stanford_decanter_preprocess_node(&$variables) {
  if ($variables['type'] == 'stanford_person') {
    // $variables['content'] = [
    //   '#type' => 'markup',
    //   '#markup' => '<h3>' . $variables['title'] . '</h3>',
    // ] + (array)$variables['content'];
    // // var_dump($variables['teaser']);
    // unset($variables['title']);
  }
}

/**
 * Returns HTML for a date element formatted as a single date.
 */
function stanford_decanter_preprocess_date_display_combination(&$variables) {
  $entity_type = $variables['entity_type'];
  $field       = $variables['field'];
  $field_name  = $field['field_name'];

  if ($field_name == 'field_stanford_event_datetime') {
    // $element = $variables['entity'];
    // foreach (date_granularity_names() as $key => $part) {
    //   if ($element[$key]['#type'] == 'hidden') {
    //     $rows[] = backdrop_render($element[$key]);
    //   }
    //   else {
    //     $rows[] = array(
    //       $part,
    //       backdrop_render($element[$key][0]),
    //       backdrop_render($element[$key][1]),
    //     );
    //   }
    // }
  }
}

/**
 * Implements hook_block_info().
 */
function stanford_decanter_block_info() {
  $blocks = array();
  $blocks['stanford_decanter_identity_bar'] = array(
    'info' => t('Stanford Global Identity Header'),
    'admin' => FALSE
  );
  $blocks['stanford_decanter_global_footer'] = array(
    'info' => t('Stanford Global Footer'),
    'admin' => FALSE
  );
  return $blocks;
}

/**
 * Implements hook_theme().
 */
function stanford_decanter_theme()
{
  return [
    'stanford_decanter_identity_bar' => [
      'path' => backdrop_get_path('theme', 'stanford_decanter') . '/templates',
      'template' => 'stanford-identity-bar'
    ],
    'stanford_decanter_global_footer' => [
      'path' => backdrop_get_path('theme', 'stanford_decanter') . '/templates',
      'template' => 'stanford-global-footer'
    ]
  ];
}
