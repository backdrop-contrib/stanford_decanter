<?php
/**
 * @file
 * Enables modules and site configuration for a decanter site installation.
 */

/**
 * Implements hook_form_FORM_ID_alter() for install_configure_form().
 *
 * Allows the profile to alter the site configuration form.
 */
function decanter_profile_form_install_configure_form_alter(&$form, $form_state) {
  // Pre-populate the site name.
  $form['site_information']['site_name']['#default_value'] = st('Decanter 7 for Backdrop');

  $user = user_load(1);
  $form['admin_account']['account']['name']['#default_value'] = $user->name;
  $form['admin_account']['account']['mail']['#default_value'] = $user->mail;
  $form['admin_account']['account']['pass']['#default_value'] = $user->pass;
  $form['admin_account']['account']['pass']['#type'] = 'hidden';
  $form['update_notifications']['update_status_module']['#default_value'] = [];
  $form['update_notifications']['update_status_module']['#collapsible'] = TRUE;
  $form['update_notifications']['update_status_module']['#collapsed'] = TRUE;

  $form['#submit'][] = 'decanter_profile_form_install_configure_submit';
}

/**
 * Extra submit handler install_configure_form().
 */
function decanter_profile_form_install_configure_submit($form, &$form_state) {
}

# /**
#  * Implements hook_install_tasks_alter()
#  */
# function decanter_profile_install_tasks_alter(&$tasks, $install_state) {
#   unset($tasks['install_configure_form']);
#   $tasks += ['decanter_profile_install_finalize_user' => array()];
# }


# function decanter_profile_install_finalize_user() {
#   $user = user_load(1);
#   user_login_finalize();
# }
