<?php

// https://identity.stanford.edu/design-elements/color/

$su_colors = [
  'black'                 => '#2E2D29',
  'black_90'              => '#43423E',

  'text'                  => '#2E2D28',
  'bg'                    => '#FFFFFE',

  'identity'              => '#8C1517',
  'identity_text'         => '#FFFFFC',
  
  'form_focus'            => '#006CB7',
  
  'border'                => '#F0F0F0',
  'footer_text'           => '#2E2D25',
  'footer_bg'             => '#F4F4F4',

  'title'                 => '#B1040D',
  'link'                  => '#006CB8',

  'white'                 => '#FFFFFF',
  'black_true'            => '#000000',
  'cool_grey'             => '#53565A',

  'cardinal_red'          => '#8C1515',
  'cardinal_red_lt'       => '#B83A4B',
  'cardinal_red_dk'       => '#820000',

  'digital_red'           => '#B1040E',
  'digital_red_lt'        => '#E50808',
  'digital_red_dk'        => '#820000',

  'digital_blue'          => '#006CB8',
  'digital_blue_lt'       => '#6FC3FF',
  'digital_blue_dk'       => '#00548f',

  'digital_green'         => '#008566',
  'digital_green_lt'      => '#1AECBA',
  'digital_green_dk'      => '#006F54',

  // 'light_grey'            => '#F4F4F4',

  'palo_alto'             => '#175E54',
  'palo_verde'            => '#279989',
  'olive'                 => '#8F993E',

  'bay'                   => '#6FA287',
  'sky'                   => '#4298B5',
  'lagunita'              => '#007C92',

  'poppy'                 => '#E98300',
  'spirited'              => '#E04F39',
  'plum'                  => '#620059',
  'brick'                 => '#651C32',
  'archway'               => '#5D4B3C',

  'stone'                 => '#7F7776',
  'stone_lt'              => '#D4D1D1',
  'stone_dk'              => '#544948',

  'fog'                   => '#DAD7CB',
  'fog_lt'                => '#F4F4F4',
  'fog_dk'                => '#B6B1A9',

];

$info = array(
  // Available colors and color labels used in theme.
  'fields' => array(
    'identity'            => t('Global Identity'),
    'identity_text'       => t('Global Identity Contrast'),

    'bg'                  => t('Main background'),
    'text'                => t('Text color'),
  
    'link'                => t('Body link color'),
    'title'               => t('Title/Button color'),

    'footer'              => t('Local footer background'),
    'footer_text'         => t('Local footer text'),

    'form_borders'        => t('Form field borders'),
    'form_focus'          => t('Form focus'),
    'form_error'          => t('Form errors (coming soon)'),
    'form_ok'             => t('Form valid (coming soon)'),
  ),

  // Pre-defined color schemes.
  'schemes' => array(
    'default' => array(
      'title' => t('Stanford Cardinal (default)'),
      'colors' => array(
        'identity'          => $su_colors['identity'],
        'identity_text'     => $su_colors['identity_text'],

        'bg'                => $su_colors['bg'],
        'text'              => $su_colors['text'],
        'link'              => $su_colors['link'],
        'title'             => $su_colors['title'],

        'form_borders'      => $su_colors['cool_grey'],
        'form_focus'        => $su_colors['digital_blue'],
        'form_error'        => $su_colors['digital_red'],
        'form_ok'           => $su_colors['digital_green'],

        'footer'            => $su_colors['footer_bg'],
        'footer_text'        => $su_colors['footer_text'],
      ),
    ),
  ),

  'blend_target' => '#ffffff',

  'css' => array(
    'src/colors.css',
  ),
);

$info['schemes']['digital'] = $info['schemes']['default'];
$info['schemes']['digital']['title'] = t('Stanford Digital');
$info['schemes']['digital']['colors'] = [
  'identity'          => $su_colors['digital_red'],
  'link'              => $su_colors['digital_blue'],
  'title'              => $su_colors['digital_red']
] + $info['schemes']['digital']['colors'];

$info['schemes']['dark'] = $info['schemes']['default'];
$info['schemes']['dark']['title'] = t('Stanford Dark');
$info['schemes']['dark']['colors'] = [

  'identity'          => $su_colors['cardinal_red_dk'],
  'identity_text'     => $su_colors['white'],

  'bg'                => $su_colors['black_true'],
  'text'              => $su_colors['white'],
  'link'              => $su_colors['link'],
  'title'             => $su_colors['title'],

  'footer'            => $su_colors['black'],
  'footer_text'        => $su_colors['white'],

] + $info['schemes']['digital']['colors'];
$info['schemes']['dark']['blend_target'] = '#000000';

$info['schemes']['clown'] = $info['schemes']['default'];
$info['schemes']['clown']['title'] = t('Clownford University');
$info['schemes']['clown']['colors'] = [
  'bg'                => $su_colors['fog'],
  'text'              => $su_colors['lagunita'],
  'link'              => $su_colors['poppy'],
  'footer'            => $su_colors['stone'],
  'footer_text'       => $su_colors['stone_dk'],
  'identity'          => $su_colors['sky'],
  'identity_text'     => $su_colors['fog_dk'],
] + $info['schemes']['digital']['colors'];
