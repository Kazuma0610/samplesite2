<?php

// bodyclassにクラス名を追加
add_filter( 'body_class', function( $classes ){
  $classes[] = 'my-body-class';
  return $classes;
} );

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
  wp_enqueue_style('header-style', get_template_directory_uri() . '/css/header.css', array(), $version);
  wp_enqueue_style('pc-sp-style', get_template_directory_uri() . '/css/pc-sp.css', array(), $version);
  wp_enqueue_style('index-style', get_template_directory_uri() . '/css/index.css', array(), $version);
  wp_enqueue_style('live-content-style', get_template_directory_uri() . '/css/live-content.css', array(), $version);
  wp_enqueue_style('live-list-style', get_template_directory_uri() . '/css/livelist.css', array(), $version);
  wp_enqueue_style('singular-style', get_template_directory_uri() . '/css/singular.css', array(), $version);
  wp_enqueue_style('category-style', get_template_directory_uri() . '/css/category.css', array(), $version);
  wp_enqueue_style('news-style', get_template_directory_uri() . '/css/news.css', array(), $version);
  wp_enqueue_style('profile-style', get_template_directory_uri() . '/css/profile.css', array(), $version);
  wp_enqueue_style('fanclub-style', get_template_directory_uri() . '/css/fanclub.css', array(), $version);
  wp_enqueue_style('contact-style', get_template_directory_uri() . '/css/contact.css', array(), $version);
  wp_enqueue_style('music-style', get_template_directory_uri() . '/css/music.css', array(), $version);
  wp_enqueue_style('footer-style', get_template_directory_uri() . '/css/footer.css', array(), $version);
  wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js', array('jquery'), $version, true);
  wp_enqueue_script('move-script', get_template_directory_uri() . '/js/move.js', array('jquery'), $version, true);
  wp_enqueue_script('multiscroll-script', get_template_directory_uri() . '/js/multiscroll.js', array('jquery'), $version, true);
  wp_enqueue_script('navi-script', get_template_directory_uri() . '/js/navi.js', array('jquery'), $version, true);
  wp_enqueue_script('particles-script', get_template_directory_uri() . '/js/particles.js', array('jquery'), $version, true);
}
add_action('wp_enqueue_scripts', 'my_enqueue_scripts');



function post_has_archive($args, $post_type){
  if('post'== $post_type){
    $args['rewrite']=true;
    $args ["label"] = '記事一覧'; /*「投稿」のラベル名 */
    $args['has_archive']='post'; /* アーカイブにつけるスラッグ名 */
  }
  return $args;
}

add_filter('register_post_type_args', 'post_has_archive', 10, 2);


/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
  if (is_category()) {
      $title = single_cat_title('',false);
  } elseif (is_tag()) {
      $title = single_tag_title('',false);
} elseif (is_tax()) {
    $title = single_term_title('',false);
} elseif (is_post_type_archive() ){
  $title = post_type_archive_title('',false);
} elseif (is_date()) {
    $title = get_the_time('Y年n月');
} elseif (is_search()) {
    $title = '検索結果：'.esc_html( get_search_query(false) );
} elseif (is_404()) {
    $title = '「404」ページが見つかりません';
} else {

}
  return $title;
});


//-----------------------------------------------------
// 検索対象にカテゴリやタグを含める
//-----------------------------------------------------
function custom_search($search, $wp_query) {
  global $wpdb;

  //検索ページ以外
  if (!$wp_query->is_search)
  return $search;

  if (!isset($wp_query->query_vars))
  return $search;

  $search_words = explode(' ', isset($wp_query->query_vars['s']) ? $wp_query->query_vars['s'] : '');
  if ( count($search_words) > 0 ) {
      $search = '';
      foreach ( $search_words as $word ) {
          if ( !empty($word) ) {
              $search_word = $wpdb-> _escape("%{$word}%");
              $search .= " AND (
                      {$wpdb->posts}.post_title LIKE '{$search_word}'
                      OR {$wpdb->posts}.post_content LIKE '{$search_word}'
          /*タグ名・カテゴリ名を検索対象に含める記述 start*/
                      OR {$wpdb->posts}.ID IN (
                          SELECT distinct r.object_id
                          FROM {$wpdb->term_relationships} AS r
                          INNER JOIN {$wpdb->term_taxonomy} AS tt ON r.term_taxonomy_id = tt.term_taxonomy_id
                          INNER JOIN {$wpdb->terms} AS t ON tt.term_id = t.term_id
                          WHERE t.name LIKE '{$search_word}'
                      OR t.slug LIKE '{$search_word}'
                      OR tt.description LIKE '{$search_word}'
                      )
        /*タグ名・カテゴリ名を検索対象に含める記述 end*/
              ) ";
          }
      }
  }

  return $search;
}
add_filter('posts_search','custom_search', 10, 2);


/*お知らせの設定*/
function create_post_type_news(){
  register_post_type( 
   'news',
   array(
    'labels' => array(
     'name' => 'お知らせ'
    ),
    'public' => true,
    'has_archive' => true,
    'supports' => array('title','editor','thumbnail','author'),
    'show_in_rest' => true,
   )
  );
 }
 add_action( 'init', 'create_post_type_news' );

function shortcode_news_list() {
  global $post;
  $args = array(
   'posts_per_page' => 3,  // 一覧に表示させる件数
   'post_type' => 'news',  // お知らせのスラッグ
   'post_status' => 'publish'
  );
  $the_query = new WP_Query( $args );
  // お知らせ一覧用HTMLコード作成
  if ( $the_query->have_posts() ) {
   $html .= '<ul>';
   while ( $the_query->have_posts() ) :
   $the_query->the_post();
   $url = get_permalink();
   $title = get_the_title();
   $date = get_the_date('Y/m/d');
   $html .= '<li>';
   $html .= '<a href="'.$url.'">';
   $html .= '<p class="news_date">'.$date.'</p>';
   $html .= '<div class="news_title">'.$title.'</div>';
   $html .= '</a></li>';
   endwhile;
   $html .= '</ul>';
  }
  return $html;
 }
 add_shortcode("news_list", "shortcode_news_list");