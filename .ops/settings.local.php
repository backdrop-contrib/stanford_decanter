<?php

$config_directories['staging'] = '/workspace/profiles/decanter_profile/config/';
$config['system.core']['config_sync_clear_staging'] = 0;

if (!empty($_ENV['CODESPACE_NAME'])) {
  $base_url = 'https://' . $_ENV['CODESPACE_NAME'] . '-8888.app.github.dev';
}
