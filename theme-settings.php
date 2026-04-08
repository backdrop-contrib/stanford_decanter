<?php
/**
 * @file
 * Theme settings for Stanford Decanter.
 */

$form['styleguide'] = array(
  '#type' => 'fieldset',
  '#title' => t('Styleguide'),
  '#collapsible' => TRUE,
);
$form['styleguide']['link'] = array(
  '#type' => 'link',
  '#title' => t('View the styleguide'),
  '#href' => stanford_decanter_style_guide_path(),
  '#attributes' => array(
    'target' => '_blank',
    'class' => array('button btn-cta'),
  ),
);
$form['styleguide']['styleguide_public'] = array(
  '#type' => 'checkbox',
  '#title' => t('Make Styleguide Public'),
  '#default_value' => theme_get_setting('styleguide_public', 'stanford_decanter'),
  '#description' => t('Check this box to make the styleguide publicly accessible.'),
);

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
