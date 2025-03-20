<?php
/**
 * @file
 * stanford_decanter preprocess functions and theme function overrides.
 */

define('STYLEGUIDE_PATH', 'decanter_help/styleguide');

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

  if ($variables['theme_hook_original'] == 'block__search__form') {
    if (empty($variables['title'])) {
      $variables['title'] = t('Search');
    }
    backdrop_add_js(backdrop_get_path('theme', 'stanford_decanter') . '/js/search-toggle.js');
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
    'description' => t('A global footer with links to Stanford resources'),
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
// function stanford_decanter_entity_view_mode_info() {
//   return [
//     'node' => ['card' => t('Card')]
//   ];
// }

function stanford_decanter_layout_info() {
  $layouts['decanter'] = array(
    'title' => t('Decanter'),
    'path' => 'layouts/decanter',
    'regions' => array(
      'identitybar'        => t('Identity bar'),
      'header'             => t('Header'),
      'hero'               => t('Hero'),
      'top'                => t('Top'),
      'content'            => t('Content'),
      'sidebar'            => t('First Sidebar'),
      'sidebar2'           => t('Second Sidebar'),
      'bottom'             => t('Page Bottom'),
      'footer'             => t('Local Footer'),
      'stanfordfooter'     => t('Stanford Footer'),
    ),
    'preview'              => 'decanter.png',
  );
  return $layouts;
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

  if ($logo) {
    $variables['logo'] = '<img src="'. $logo .'" alt="'. t('Home') .'" class="header-logo logo" '. backdrop_attributes($logo_attributes) . '/>';
  }
  else {
    $variables['logo'] = 'Stanford';
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


/**
 * Implements hook_menu().
 */
function stanford_decanter_menu() {
  $items = array();

  $items[STYLEGUIDE_PATH] = array(
    'title' => 'Backdrop Decanter Style Guide',
    'description' => 'Decanter 7 Style guide.',
    'page callback' => 'backdrop_get_form',
    'page arguments' => array('stanford_decanter_style_guide'),
    'access arguments' => array('access content overview'),
    'weight' => 4,
    'type' => MENU_NORMAL_ITEM,
    'file path' => backdrop_get_path('theme', 'stanford_decanter'),
    'file' => 'template.php',
  );

  $dir = backdrop_get_path('theme', 'stanford_decanter') . '/examples/';
  foreach(scandir($dir) as $snippet) {
    if (substr($snippet, 0, 1) !== '.') {
      $name = substr($snippet, 0, strlen($snippet) - strlen('.html'));
      $items[STYLEGUIDE_PATH . '/' . $name] = array(
        'title' => ucwords(strtr($name, ['.html' => '', '-' => ' — '])),
        'page callback' => 'backdrop_get_form',
        'page arguments' => array('stanford_decanter_style_guide_section', $dir . $snippet),
        'access arguments' => array('access content overview'),
        'type' => MENU_NORMAL_ITEM,
        'file path' => backdrop_get_path('theme', 'stanford_decanter'),
        'file' => 'template.php',
      );
      }
    }

  return $items;
}

/**
 * Implements hook_admin_paths_alter().
 */
function stanford_decanter_admin_paths_alter(&$paths) {
  $paths[STYLEGUIDE_PATH] = FALSE;
  $paths[STYLEGUIDE_PATH . '/*'] = FALSE;
}


/*
 * Style guide form callback. Reads html snippets from files to display.
 */
function stanford_decanter_style_guide() {
  $form = [];

  $dir = backdrop_get_path('theme', 'stanford_decanter') . '/examples/';
  $snippets = scandir($dir);
  foreach($snippets as $snippet) {
    if (substr($snippet, 0, 1) !== '.') {
      $name = substr($snippet, 0, strlen($snippet) - strlen('.html'));

      $form[$name] = [
        "#type" => 'link',
        '#title' => ucwords(strtr($name, ['.html' => '', '-' => ' — '])),
        '#href' => STYLEGUIDE_PATH . '/' . $name,
        '#options' => array(
          'attributes' => array('class' => 'forward block pb-20'),
        ),    
      ];
    }
  }
  return $form;
}

/*
 * Style guide form callback. Reads html snippets from files to display.
 */
function stanford_decanter_style_guide_section($form, &$form_state, $snippet = '') {

  $form = [];

  if (stripos($snippet, 'alert') !== false) {
    backdrop_set_message(t('This is a Backdrop status message'), 'status');
    backdrop_set_message(t('This is a Backdrop info message'), 'info');
    backdrop_set_message(t('This is a Backdrop warning'), 'warning');
    backdrop_set_message(t('This is a Backdrop error'), 'error');  
  }

  $html = file_get_contents($snippet);
  $form['back'] = [
    "#type" => 'link',
    '#title' => 'Back to Styleguide',
    '#href' => STYLEGUIDE_PATH,
    '#options' => array(
      'attributes' => array('class' => 'back block pb-20'),
    ),    
  ];
  $filename = basename($snippet);
  $form['edit'] = [
    "#type" => 'link',
    '#title' => 'Edit this page on Github',
    '#href' => "https://github.com/backdrop-contrib/stanford_decanter/edit/main/examples/$filename",
    '#options' => array(
      'attributes' => array('class' => 'block pb-20'),
    ),
  ];

  $form['preview'] = [
    '#type' => 'markup',
    '#markup' => $html,
  ];
  $form['src'] = [
    '#type' => 'textarea',
    '#default_value' => $html,
    '#rows' => 30,
  ];
  return $form;
}

/**
 * Implements hook_form_alter().
 */
function stanford_decanter_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'layout_block_configure_form') {
    $form['style']['style_settings']['classes']['#description'] = t(
      'Separate class names with spaces. Example: <code>!classes</code>',
      ['!classes' => implode(' ',
          array_map(
            fn($c) => "<a onclick=\"this.closest('.form-type-textfield').closest('.form-item').querySelector('input').value += ' $c';\">$c</a>",
            [
              'col-full',
              'col-half',
              'col-third',
              'col-quarter',
              'col-sixth',
              'col-twelfth',
              'col-twothird',
              'col-threequarter'
            ]))
        ]
      );
  }
}