<?php

//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );

//CSSの読み込み
function my_enqueue_scripts()
{
  $version = wp_get_theme()->get( 'Version' );

  wp_enqueue_style('move-style', get_template_directory_uri() . '/css/move.css', array(), $version);
  wp_enqueue_style('test-style', get_template_directory_uri() . '/css/test.css', array(), $version);
  wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), $version, true);
  wp_enqueue_script('move-script', get_template_directory_uri() . '/js/move.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');

