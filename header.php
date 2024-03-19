<!DOCTYPE html><!--htmlで書かれていることを宣言-->
<html <?php language_attributes(); ?>><!--日本語のサイトであることを指定-->
<head>
<meta charset="<?php bloginfo('charset'); ?>"/><!--エンコードがUTF-8であることを指定-->
<meta name="viewport" content="width=device-width, initial-scale=1.0 "><!--viewportの設定-->
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>"><!--スタイルシートの呼び出し-->
<link href="//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"><!--fontawesomeの呼び出しCDNコード-->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css"><!--fontawesomeの呼び出しCDNコード-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"><!--6verの最新fontawesomeの呼び出しCDNコード-->
<link href="https://fonts.googleapis.com/css2?family=Noto+Serif+JP:wght@200&display=swap" rel="stylesheet"><!--notoserifjpフォント-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script><!--cookie用-->
<script src="js/5-1-11.js"></script><!--for--nav-js-->
<?php wp_head(); ?><!--システム・プラグイン用-->
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
  <div id="splash">
    <div id="splash_logo">
      <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/david-logo.png" alt="画像" class="fadeUp"/>
    </div>
  </div>
  <div class="splashbg"></div><!---画面遷移用-->
<header id="header">
<p class="test">Test</p>
<p class="test2">TestTest</p>
</header>