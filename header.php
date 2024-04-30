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
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap" rel="stylesheet"><!--Oswaldフォント-->
<link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/><!--SwiperのCSS-->
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script><!--SwiperのCDN-->
<?php if ( is_home() ): ?>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/multiscroll.js/0.2.2/jquery.multiscroll.css"><!--画面2分割のcss-->
<?php endif; ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.js"></script><!--cookie用-->
<?php if ( is_home() ): ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/multiscroll.js/0.2.2/jquery.multiscroll.min.js"></script><!--画面2分割用のJS-->
<?php endif; ?>
<?php if ( is_home() ): ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script><!--画面2分割用(2)のJS-->
<?php endif; ?>
<script src="js/5-1-11.js"></script><!--for--nav-js-->
<script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<style type="text/css">
  <?php if ( is_home() ): ?>
    .site-header{
      background-color: rgba(255, 0, 0, 0)!important;
    }
  <?php endif; ?>
</style><!--site-headerの色変更-->
<style type="text/css">
  <?php if ( is_home() ): ?>
    .my-body-class {
      background: #fff!important;
    }
  <?php endif; ?>
</style><!--bodyの色変更-->
<style type="text/css">
  <?php if ( !is_home() ): ?>
    .my-body-class {
      position: relative!important;/*フッターが一番下に配置できない現象が起こりこれで対策*/
    }
  <?php endif; ?>
</style><!--フッターが一番下に配置できない現象が起こりこれで対-->
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
<header id="header" class="site-header">
  <nav class="pc-only">
    <ul id="navi-menu" class="pc-navi-menu pc-only">
      <li data-menuanchor="area1" class="active current"><a href="https://ec-daieirecord.com/#area1">TOP</a></li>
      <li data-menuanchor="area2"><a href="https://ec-daieirecord.com/#area2">LIVE</a></li>
      <li data-menuanchor="area3"><a href="https://ec-daieirecord.com/#area3">NEWS</a></li>
      <li data-menuanchor="area4"><a href="https://ec-daieirecord.com/#area4">PROFILE</a></li>
      <li data-menuanchor="area5"><a href="https://ec-daieirecord.com/#area5">MUSIC</a></li>
      <li data-menuanchor="area6"><a href="https://ec-daieirecord.com/#area6">FAN-CLUB</a></li>
      <li data-menuanchor="area7"><a href="https://ec-daieirecord.com/#area7">CONTACT</a></li>
    </ul>
  </nav>
  <!---SP用ハンバーガーやナビ-->
  <div class="sp_logo">
    <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/david-sp-logo.png" alt="画像"/>
  </div>
  <div class="openbtn sp-only"><span></span><span></span><span></span></div>
  <nav id="g-nav" class="sp-only">
    <div id="g-nav-list">
      <ul>
        <li><a href="https://ec-daieirecord.com/#area1">TOP</a></li>
        <li><a href="https://ec-daieirecord.com/#area2">LIVE</a></li>
        <li><a href="https://ec-daieirecord.com/#area3">NEWS</a></li>
        <li><a href="https://ec-daieirecord.com/#area4">PROFILE</a></li>
        <li><a href="https://ec-daieirecord.com/#area5">MUSIC</a></li>
        <li><a href="https://ec-daieirecord.com/#area6">FAN-CLUB</a></li>
        <li><a href="https://ec-daieirecord.com/#area7">CONTACT</a></li>
      </ul>
    </div>
  </nav>
</header>

<!--パンクズ＊ヘッダー枠外に設置-->
<?php if(!is_home()): ?>

<div class="breadcrumb">
    <?php
        if(function_exists( 'yoast_breadcrumb' )){
        yoast_breadcrumb( '<p id="breadcrumbs">', '</p>');
        }
    ?>
</div>

<?php endif; ?>