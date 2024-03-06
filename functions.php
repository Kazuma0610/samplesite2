<?php

//テーマのセットアップ
// HTML5でマークアップさせる
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption' ) );
// Feedのリンクを自動で生成する
add_theme_support( 'automatic-feed-links' );
//アイキャッチ画像を使用する設定
add_theme_support( 'post-thumbnails' );

//CSSの読み込み
add_action('wp_enqueue_scripts', 'add_styles');
  function add_styles() {
    // スタイルシートの登録と読み込み
    wp_register_style(
        'main_style',
        get_template_directory_uri() . '/css/style.css',
        array(),
        '1.0' 
      ); 
  }

//JSの読み込み//
function my_scripts() {
    wp_enqueue_script( 'script-main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );
  }
add_action( 'wp_enqueue_scripts', 'my_scripts' );

?>