<?php
/**
 * @file
 * Theme settings for Stanford Decanter.
 */

 $form['global'] = array(
  '#type' => 'fieldset',
  '#title' => t('Global Settings'),
  '#collapsible' => TRUE,
);
$fields = array(
  'identity',
  'identity_text',
  'bg',
  'text',
  'link',
  'title',
);
foreach ($fields as $field) {
  $form['global'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
}

$form['forms'] = array(
  '#type' => 'fieldset',
  '#title' => t('Form Settings'),
  '#collapsible' => TRUE,
);
$fields = array(
  'form_borders',
  'form_focus', 
  'form_error',
  'form_ok'
);
foreach ($fields as $field) {
  $form['forms'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
}

$form['footer'] = array(
  '#type' => 'fieldset',
  '#title' => t('Local Footer Settings'),
  '#collapsible' => TRUE,
);
$fields = array(
  'footer',
  'footer_text', 
);
foreach ($fields as $field) {
  $form['footer'][$field] = color_get_color_element($form['theme']['#value'], $field, $form);
}
