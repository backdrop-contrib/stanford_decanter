<?php

// https://identity.stanford.edu/design-elements/color/

$su_colors = [
  'black'                 => '#2E2D29',
  'black_90'              => '#43423E',

  'body_text'             => '#2E2D28',
  'body_bg'               => '#FFFFFE',

  'header_text'           => '#2E2D27',
  'header_bg'             => '#FFFFFD',

  'logo'                  => '#8C1516',
  'border'                => '#F0F0F0',

  'form_focus'            => '#006CB7',

  'menu_text'             => '#2E2D26',
  'menu_bg'               => '#FFFFFB',
  'menu_hover'            => '#8C1518',

  'footer_text'           => '#2E2D25',
  'footer_bg'             => '#F4F4F4',

  'action'                => '#B1040F',
  'digital'               => '#B1040E',

  'title'                 => '#B1040D',
  'link'                  => '#006CB8',

  'identity'              => '#8C1517',
  'identity_text'         => '#FFFFFC',

  'white'                 => '#FFFFFF',
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
    'header_bg'           => t('Header background'),
    'header_text'         => t('Header text'),
    'logo'                => t('Stanford Logo'),

    'menubg'              => t('Menu background'),
    'menutext'            => t('Menu link'),
    'menuhover'           => t('Menu hover'),

    'bg'                  => t('Main background'),
    'text'                => t('Text color'),
    'link'                => t('Body link color'),
    'title'               => t('Title/Button color'),

    'footer'              => t('Local footer background'),
    'footertext'          => t('Local footer text'),
    'footerborder'        => t('Local footer border'),

    'identitybg'          => t('Global head/foot bg'),
    'identitytext'        => t('Global head/foot text'),

    'form_borders'        => t('Form field borders'),
    'form_focus'          => t('Form focus'),

  ),

  // Pre-defined color schemes.
  'schemes' => array(
    'default' => array(
      'title' => t('Stanford Cardinal (default)'),
      'colors' => array(
        'header_bg'         => $su_colors['header_bg'],
        'header_text'       => $su_colors['header_text'],
        'logo'              => $su_colors['logo'],

        'bg'                => $su_colors['body_bg'],
        'text'              => $su_colors['body_text'],
        'link'              => $su_colors['link'],
        'title'             => $su_colors['title'],

        'form_borders'      => $su_colors['cool_grey'],
        'form_focus'        => $su_colors['digital_blue'],

        'menubg'            => $su_colors['menu_bg'],
        'menutext'          => $su_colors['menu_text'],
        'menuhover'         => $su_colors['menu_hover'],

        'footer'            => $su_colors['footer_bg'],
        'footertext'        => $su_colors['footer_text'],

        'identitybg'        => $su_colors['identity'],
        'identitytext'      => $su_colors['identity_text'],
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
  'logo'  => $su_colors['digital_red'],
  'link'              => $su_colors['digital_blue'],
  'title'             => $su_colors['digital_red'],
  'formfocusborder'   => $su_colors['digital_blue'],
  'menuhover'         => $su_colors['digital_red'],
  'footer'            => $su_colors['cool_grey'],
  'footertext'        => $su_colors['white'],
  'identitybg'        => $su_colors['digital_red'],
] + $info['schemes']['digital']['colors'];

$info['schemes']['dark'] = $info['schemes']['default'];
$info['schemes']['dark']['title'] = t('Stanford Dark');
$info['schemes']['dark']['colors'] = [
  'header_bg'         => $su_colors['black'],
  'header_text'       => $su_colors['white'],
  'logo'              => $su_colors['white'],
  'bg'                => $su_colors['stone'],
  'text'              => $su_colors['white'],
  'link'              => $su_colors['digital_blue_lt'],
  'menubg'            => $su_colors['black'],
  'menutext'          => $su_colors['white'],
  'menuhover'         => $su_colors['cardinal_red_lt'],
  'footer'            => $su_colors['stone_dk'],
  'footertext'        => $su_colors['white'],
  'identitybg'        => $su_colors['black_90'],
  'identitytext'      => $su_colors['white'],
  'form_borders'      => $su_colors['white'],
  'form_focus'        => $su_colors['digital_blue'],
] + $info['schemes']['digital']['colors'];

$info['schemes']['clown'] = $info['schemes']['default'];
$info['schemes']['clown']['title'] = t('Clownford University');
$info['schemes']['clown']['colors'] = [
  'header_bg'         => $su_colors['palo_alto'],
  'header_text'       => $su_colors['olive'],
  'logo'              => $su_colors['bay'],
  'bg'                => $su_colors['fog'],
  'text'              => $su_colors['lagunita'],
  'link'              => $su_colors['poppy'],
  'menubg'            => $su_colors['spirited'],
  'menutext'          => $su_colors['plum'],
  'menuhover'         => $su_colors['brick'],
  'footer'            => $su_colors['stone'],
  'footertext'        => $su_colors['stone_dk'],
  'identitybg'        => $su_colors['sky'],
  'identitytext'      => $su_colors['fog_dk'],
] + $info['schemes']['digital']['colors'];
