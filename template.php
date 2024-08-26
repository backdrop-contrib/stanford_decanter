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
  if ($variables['view_mode'] !== 'full') {

    $type = node_type_get_type($variables['type']);
    if (!($type->settings['hidden_path'] && !user_access('view hidden paths'))) {
      $variables['content']['links']['node'] = array(
        '#theme' => 'links__node__node',
        '#links' => ['node-readmore' => [
          'title' => t('Read more<span class="element-invisible"> about @title</span>', array('@title' => strip_tags($variables['title']))),
          'href' => 'node/' . $variables['node']->nid,
          'html' => TRUE,
          'attributes' => array('rel' => 'tag', 'title' => strip_tags($variables['title'])),
        ]],
        '#attributes' => array('class' => array('links', 'inline')),
      );
    }

    if (!empty($variables['content']['field_image'])) {
      $variables['pre_content'] = [
        '#type' => 'container',
          '#attributes' => array('class' => 'lead-image'),
          'image' =>  $variables['content']['field_image']
        ];
        hide($variables['content']['field_image']);
      }
      $variables['classes'][] = 'group';
  }
  if ($variables['status'] == NODE_NOT_PUBLISHED) {
    $name = node_type_get_name($variables['type']);
    $variables['title_suffix']['unpublished_indicator'] = array(
      '#type' => 'markup',
      '#markup' => '<div class="unpublished-indicator">' . t('This @type is unpublished.', array('@type' => $name)) . '</div>',
    );
  }
}

function stanford_decanter_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'views_ui_edit_display_form') {
    $row_class = $form['options']['style_options']['row_class']['#default_value'];
    if (!in_array($row_class, ['', 'background', 'bordered'])) {
      $row_class = 'custom';
    }
    $form['options']['style_options']['row_class_select'] = [
      '#type' => 'select',
      '#title' => t('Card Style'),
      '#options' => [
        ''            => t('Plain'),
        'bordered'    => t('Bordered'),
        'background'  => t('Dark Background'),
        'custom'      => t('Custom'),
      ],
      '#default_value' => $row_class,
      '#weight' => -1
    ];
    $form['options']['style_options']['row_class']['#value_callback'] = 'stanford_decanter_row_style_value';
  }
}

function stanford_decanter_row_style_value($element, $input = FALSE, $form_state = array()) {
  if ($form_state['input']['style_options']['row_class_select'] == 'custom') {
    return $input;
  }
  return $form_state['input']['style_options']['row_class_select'];
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
    'description' => t('A global bar with the Stanford wordmark and a link to the Stanford homepage'),
    'admin' => FALSE
  );
  $blocks['stanford_decanter_global_footer'] = array(
    'info' => t('Stanford Global Footer'),
    'description' => t(''),
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

/**
 * @file
 * Basis preprocess functions and theme function overrides.
 */

/**
 * Implements hook_css_alter().
 */
function stanford_decanter_css_alter(&$css) {
  // Remove Basis' `/css/component/menu-dropdown.css` if using a custom
  // breakpoint.
  if (config_get('menu.settings', 'menu_breakpoint') == 'custom') {
    $path = backdrop_get_path('theme', 'basis');
    unset($css[$path . '/css/component/menu-dropdown.css']);
  }
}

/**
 * Implements hook_entity_view_mode_info().
 */
function stanford_decanter_entity_view_mode_info() {
  return [
    'node' => ['card' => t('Card')]
  ];
}

/**
 * Prepares variables for page templates.
 *
 * @see page.tpl.php
 */
function stanford_decanter_preprocess_page(&$variables) {
  $node = menu_get_object();

  // Add the OpenSans font from core on every page of the site.
  backdrop_add_library('system', 'opensans', TRUE);

  // To add a class 'page-node-[nid]' to each page.
  if ($node) {
    $variables['classes'][] = 'page-node-' . $node->nid;
  }

  // To add a class 'view-name-[name]' to each page.
  $view = views_get_page_view();
  if ($view) {
    $variables['classes'][] = 'view-name-' . $view->name;
  }

  // Add breakpoint-specific CSS for dropdown menus.
  $config = config('menu.settings');
  if ($config->get('menu_breakpoint') == 'custom') {
    backdrop_add_css(backdrop_get_path('theme', 'basis') . '/css/component/menu-dropdown.breakpoint.css', array(
      'group' => CSS_THEME,
      'every_page' => TRUE,
    ));
    backdrop_add_css(backdrop_get_path('theme', 'basis') . '/css/component/menu-dropdown.breakpoint-queries.css', array(
      'group' => CSS_THEME,
      'every_page' => TRUE,
      'media' => 'all and (min-width: ' . $config->get('menu_breakpoint_custom') . ')',
    ));
  }
}

/**
 * Prepares variables for maintenance page templates.
 *
 * @see maintenance-page.tpl.php
 */
function stanford_decanter_preprocess_maintenance_page(&$variables) {
  $css_path = backdrop_get_path('theme', 'basis') . '/css/component/maintenance.css';
  backdrop_add_css($css_path);
}

/**
 * Prepares variables for layout templates.
 *
 * @see layout.tpl.php
 */
function stanford_decanter_preprocess_layout(&$variables) {
  if ($variables['is_front']) {
    // Add a special front-page class.
    $variables['classes'][] = 'layout-front';
    // Add a special front-page template suggestion.
    $original = $variables['theme_hook_original'];
    $variables['theme_hook_suggestions'][] = $original . '__front';
    $variables['theme_hook_suggestion'] = $original . '__front';
  }
}



/**
 * Prepares variables for header templates.
 *
 * @see header.tpl.php
 */
function stanford_decanter_preprocess_header(&$variables) {
  $logo = $variables['logo'];
  $logo_attributes = $variables['logo_attributes'];

  // Add classes and height/width to logo.
  if ($logo) {
    $logo_wrapper_classes = array();
    $logo_wrapper_classes[] = 'header-logo-wrapper';
    if ($logo_attributes['width'] <= $logo_attributes['height']) {
      $logo_wrapper_classes[] = 'header-logo-tall';
    }

    $variables['logo_wrapper_classes'] = $logo_wrapper_classes;
  }
}

/**
 * Overrides theme_breadcrumb(). Removes &raquo; from markup.
 *
 * @see theme_breadcrumb().
 */
function stanford_decanter_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $output = '';
  if (!empty($breadcrumb)) {
    $output .= '<nav class="breadcrumb" aria-label="' . t('Website Orientation') . '">';
    $output .= '<ol><li>' . implode('</li><li>', $breadcrumb) . '</li></ol>';
    $output .= '</nav>';
  }
  return $output;
}
