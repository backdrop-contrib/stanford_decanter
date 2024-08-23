<?php
/**
 * @file
 * Theme settings for MyTheme.
 */

if (module_exists('color')) {
  $form['header'] = array(
    '#type' => 'fieldset',
    '#title' => t('Header Settings'),
    '#collapsible' => TRUE,
  );


  $fields = array(
    'header',
    'titleslogan',
    'stanfordwordmark',

    'menubg',
    'menutext',
    'menuhover'
  );
  foreach ($fields as $field) {
    $form['header'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
  }

  $form['general'] = array(
    '#type' => 'fieldset',
    '#title' => t('General Settings'),
    '#collapsible' => TRUE,
  );

  $fields = array(
    'bg',
    'text',
    'link',
    'title',
    'identitybg',
    'identitytext',
  );
  foreach ($fields as $field) {
    $form['general'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
  }

  $form['footer'] = array(
    '#type' => 'fieldset',
    '#title' => t('Footer Settings'),
    '#collapsible' => TRUE,
  );
  $fields = array(
    'footerborder',
    'footer',
    'footertext',
  );
  foreach ($fields as $field) {
    $form['footer'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
  }
}
