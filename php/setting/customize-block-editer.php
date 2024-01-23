<?php

add_theme_support( 'dark-editor-style' ); // ダークテーマ有効
// add_theme_support( 'align-wide' ); // 幅広・全幅画像のサポート設定
add_theme_support( 'responsive-embeds' ); // youtube等、埋め込みコンテンツをレスポンシブ対応にする

// カスタムブロックスタイル
register_block_style(
  'core/image',
  [
    'name'         => 'round',
    'label'        => '角丸20px',
    'inline_style' => '.wp-block-image.is-style-round img { border-radius: 20px; }',
  ]
);

register_block_style(
  'core/image',
  [
    'name'         => 'shadow',
    'label'        => 'ドロップシャドウ',
    'inline_style' => '.wp-block-image.is-style-shadow img { box-shadow: 0px 2px 3px rgba(0,0,0,.3); }',
  ]
);