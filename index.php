<?php get_header(); ?>


<div id="wrapper">


  <div class="ms-left"><!--左側のコンテンツ-->
  

<!-------------------------section1------------------------------>
    
    <div class="ms-section only-pc" id="left1"> 
      <h1 class="eachTextAnime">NEW ALBUM 20XX NEW WORLD TOUR DAVID JENNIFER</h1>
      <div class="scrolldown-sp"><span>ScrollUp</span></div>
      <div class="particle" id="pt1"></div>
    </div><!--/left1-->

    

<!-------------------------section1------------------------------>


<!-------------------------section2------------------------------>

    <section class="ms-section" id="left2">
      <div class="sp-top"></div>
      <div class="sp-bottom">
        <div class="live-container">
          <h2>LIVE SCHEDULE</h2>
          <div class="live-wrapper">

	          <ul class="tab">
		          <li><a href="#live">LIVE</a></li>
		          <li><a href="#tour">TOUR</a></li>
		          <li><a href="#event">EVENT</a></li>
	          </ul>

		        <div id="live" class="area">
              <ul>
                <?php
                  $args = array (
                    'numberposts' => 3, // 情報を5件取得
	                  'post_type'    => 'post', // カスタム投稿タイプ名
                    'category_name' => 'LIVE',// カテゴリー名を指定
	                  'orderby'      => 'live_date',  // 並び順を制御するカスタムフィールド(今回の場合はライブ日程)
	                  'order'        => 'ASC', // 並び順を日程の近い順に
	                  'meta_key'     => 'live_date', // 分岐の判定に使うカスタムフィールド(今回の場合はライブ日程)
	                  'meta_value'   => date( "Ymd" ), // 「今日」の日付を取得
	                  'meta_compare' => '>=', // 今日以降に条件分岐
                  );
                  $posts = get_posts( $args );
                  if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <div class="list-inner">
                          <div class="block_date_inner">
                            <p class="live_date"><?php the_field('live_date'); ?><span class="sub-date">2024</span></p>
                            <?php $cat = get_the_category(); $cat = $cat[0]; {echo '<p class="category '. $cat->category_nicename .'">'; 
                            } ?><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
                          </div>
                          <div class="info-inner">
                            <p class="live-title"><?php the_title(); ?></p>
                            <ul class="tag-wrapper">
                              <?php
                                $posttags = get_the_tags();
                                if ($posttags) {
                                foreach($posttags as $tag) {
                                  echo '<li class="tag-info">' . $tag->name . '</li>';
                                }
                                }
                              ?>
                            </ul>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  <?php else://ライブ予定がない場合?>
			              <li class="no_live">現在ライブの予定はありません。</li>
                  <?php endif;wp_reset_postdata(); //クエリのリセット 
                ?>
		          </ul>
		        </div><!--/area-->

		        <div id="tour" class="area">
			        <ul>
                <?php
                  $args = array (
                    'numberposts' => 3, // 情報を5件取得
	                  'post_type'    => 'post', // カスタム投稿タイプ名
                    'category_name' => 'TOUR',// カテゴリー名を指定
	                  'orderby'      => 'live_date',  // 並び順を制御するカスタムフィールド(今回の場合はライブ日程)
	                  'order'        => 'ASC', // 並び順を日程の近い順に
	                  'meta_key'     => 'live_date', // 分岐の判定に使うカスタムフィールド(今回の場合はライブ日程)
	                  'meta_value'   => date( "Ymd" ), // 「今日」の日付を取得
	                  'meta_compare' => '>=', // 今日以降に条件分岐
                  );
                  $posts = get_posts( $args );
                  if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <div class="list-inner">
                          <div class="block_date_inner">
                            <p class="live_date"><?php the_field('live_date'); ?><span class="sub-date">2024</span></p>
                            <?php $cat = get_the_category(); $cat = $cat[0]; {echo '<p class="category '. $cat->category_nicename .'">'; 
                            } ?><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
                          </div>
                          <div class="info-inner">
                            <p class="live-title"><?php the_title(); ?></p>
                            <ul class="tag-wrapper">
                              <?php
                                $posttags = get_the_tags();
                                if ($posttags) {
                                foreach($posttags as $tag) {
                                  echo '<li class="tag-info">' . $tag->name . '</li>';
                                }
                                }
                              ?>
                            </ul>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  <?php else://ライブ予定がない場合?>
			              <li class="no_live">現在TOURの予定はありません。</li>
                  <?php endif;wp_reset_postdata(); //クエリのリセット 
                ?>
			        </ul>
		        </div><!--/area-->

		        <div id="event" class="area">
			        <ul>
                <?php
                  $args = array (
                    'numberposts' => 3, // 情報を5件取得
	                  'post_type'    => 'post', // カスタム投稿タイプ名
                    'category_name' => 'EVENT',// カテゴリー名を指定
	                  'orderby'      => 'live_date',  // 並び順を制御するカスタムフィールド(今回の場合はライブ日程)
	                  'order'        => 'ASC', // 並び順を日程の近い順に
	                  'meta_key'     => 'live_date', // 分岐の判定に使うカスタムフィールド(今回の場合はライブ日程)
	                  'meta_value'   => date( "Ymd" ), // 「今日」の日付を取得
	                  'meta_compare' => '>=', // 今日以降に条件分岐
                  );
                  $posts = get_posts( $args );
                  if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <div class="list-inner">
                          <div class="block_date_inner">
                            <p class="live_date"><?php the_field('live_date'); ?><span class="sub-date">2024</span></p>
                            <?php $cat = get_the_category(); $cat = $cat[0]; {echo '<p class="category '. $cat->category_nicename .'">'; 
                            } ?><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
                          </div>
                          <div class="info-inner">
                            <p class="live-title"><?php the_title(); ?></p>
                            <ul class="tag-wrapper">
                              <?php
                                $posttags = get_the_tags();
                                if ($posttags) {
                                foreach($posttags as $tag) {
                                  echo '<li class="tag-info">' . $tag->name . '</li>';
                                }
                                }
                              ?>
                            </ul>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  <?php else://ライブ予定がない場合?>
			              <li class="no_live">現在EVENT参加の予定はありません。</li>
                  <?php endif;wp_reset_postdata(); //クエリのリセット 
                ?>
			        </ul>
		        </div><!--/area-->

          </div><!--live-wrapper-->
          <buttun>
            <a href="https://ec-daieirecord.com/live-all" class="btn btn-flat"><span>VIEW-ALL</span></a>
          </buttun>
        </div><!--live-conttainer-->
      </div><!--sp-bottom-->
    </section><!--/left2-->

<!-------------------------section2------------------------------>


<!-------------------------section3------------------------------>

    <section class="ms-section" id="left3">
      <div class="sp-top"></div>
      <div class="sp-bottom">
      <div class="news-container">
          <h2>NEWS</h2>
          <div class="news-wrapper">

            <div id="news" class="news-area">
              <ul>
                <?php
                  $args = array (
                    'numberposts' => 3, // 情報を3件取得
	                  'post_type'    => 'post', // カスタム投稿タイプ名
                    'category__in' => array( 27,28,29),// 複数のカテゴリーを取得（IDで取得）
	                  'order'        => 'DESC', // 並び順を日程の近い順に
                  );
                  $posts = get_posts( $args );
                  if( $posts ) : foreach( $posts as $post ) : setup_postdata( $post ); ?>
                    <li>
                      <a href="<?php the_permalink(); ?>">
                        <div class="list-inner">
                          <div class="block_date_inner">
                            <p class="news_date"><?php echo get_the_date('m/d'); ?><span class="sub-date">2024</span></p>
                            <?php $cat = get_the_category(); $cat = $cat[0]; {echo '<p class="category '. $cat->category_nicename .'">'; 
                            } ?><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
                          </div>
                          <div class="info-inner">
                            <p class="live-title"><?php the_title(); ?></p>
                            <ul class="tag-wrapper">
                              <?php
                                $posttags = get_the_tags();
                                if ($posttags) {
                                foreach($posttags as $tag) {
                                  echo '<li class="tag-info">' . $tag->name . '</li>';
                                }
                                }
                              ?>
                            </ul>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php endforeach; ?>
                  <?php else://NEWSがない場合?>
			              <li class="no_news">新着情報はございません</li>
                  <?php endif;wp_reset_postdata(); //クエリのリセット 
                ?>
		          </ul>
		        </div><!--/area-->
	         

          </div><!--news-wrapper-->
          <buttun>
            <a href="https://ec-daieirecord.com/news-all" class="btn btn-flat btn-type-two"><span>VIEW-ALL</span></a>
          </buttun>
        </div><!--news-conttainer-->
      </div><!--sp-bottom-->
    <!--/left3--></section>

<!-------------------------section3------------------------------>


<!-------------------------section4------------------------------>

    <section class="ms-section" id="left4">
      <div class="sp-top"></div>
      <div class="sp-bottom">
        <div class="pro-container">
          <h2>PROFILE</h2>
          <div class="pro-wrapper">
            
          
            <div class="pro-contents">
              <div class="swiper swiperMain">
                <div class="swiper-wrapper">
                  <div class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/testprof1.png" alt="画像"/><span class="prof-name">DAVID JENNIFER</span></div>
                  <div class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/testprof2.png" alt="画像"/><span class="prof-name">DAVID JENNIFER</span></div>
                  <div class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/testprof3.png" alt="画像"/><span class="prof-name">DAVID JENNIFER</span></div>
                </div>
            </div> 

            <div class="swiper swiperThumbnail">
              <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/testprof1.png" alt="画像"/></div>
                <div class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/testprof2.png" alt="画像"/></div>
                <div class="swiper-slide"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/testprof3.png" alt="画像"/></div>
              </div>
            </div>
              
            </div><!--pro-contents-->
            <div class="sns-wrapper">
              <ul>
                <li class="x-icon"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/x.png" alt="画像"/></a></li>
                <li class="insta-icon"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/insta.png" alt="画像"/></a></li>
                <li class="facebook-icon"><a href="#"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="画像"/></a></li>
              </ul>
            </div><!--sns-wrapper-->

	         

          </div><!--pro-wrapper-->
        </div><!--pro-conttainer-->
      </div>
    <!--/left4--></section>

<!-------------------------section4------------------------------>


<!-------------------------section7------------------------------>

<section class="ms-section" id="left7">
      <div class="sp-top"></div>
      <div class="sp-bottom">
        <div id="video-area">
          <video id="video" poster="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-3-1/img/movie.jpg" webkit-playsinline playsinline muted autoplay loop>
          <!--
          poster：動画ファイルが利用できない環境で代替表示される画像
          webkit-playsinline：iOS 9までのSafari用インライン再生指定
          playsinline：iOS 10以降のSafari用インライン再生指定
          muted：音声をミュートさせる
          autoplay：動画を自動再生させる
          loop：動画をループさせる
          controls：コントロールバーを表示する
          -->
          <source src="https://ec-daieirecord.com/wp-content/themes/samplesite2/video/test1.mp4" type="video/mp4">
          <p>動画を再生できる環境ではありません。</p>
          </video>
        </div><!--/video-area-->

        <div class="music-text-sp">
          <p>DAVID JENIFFER <br>NEW ALBUM</p>
            <buttun>
              <a href="https://ec-daieirecord.com/music" class="btn btn-flat btn-type-two btn-music"><span>CLICK-HERE</span></a>
            </buttun>
        </div>
        
      </div>
      
    </section><!--/left7-->

<!-------------------------section7------------------------------>


<!-------------------------section5------------------------------>

    <section class="ms-section" id="left5">
      <div class="sp-top"></div>
      <div class="sp-bottom">
      <div class="fan-container">
          <h2>FAN-CLUB</h2>

            <buttun>
              <a href="https://ec-daieirecord.com/fan-club" class="btn btn-flat btn-type-two"><span>JOIN US</span></a>
            </buttun>
            
        </div><!--fan-conttainer-->
      </div>
    <!--/left5--></section>

<!-------------------------section5------------------------------>  


<!-------------------------section6------------------------------>

    <section class="ms-section" id="left6">
      <div class="sp-top"></div>
      <div class="sp-bottom">
        <div class="contact-container">
          <h2>CONTACT</h2>

          <buttun>
            <a href="https://ec-daieirecord.com/contact" class="btn btn-flat btn-type-two"><span>CONTACT</span></a>
          </buttun>

        </div><!--contact-conttainer-->
        <div class="footer-contents">
          <p>DAVID JENNIFER</p>
        </div>
      </div>
      
    </section><!--/left6-->

<!-------------------------section6------------------------------>


  <!--/ms-left--></div>




  <div class="ms-right"><!--右側のコンテンツ-->

<!-------------------------section1------------------------------>

    <div class="ms-section" id="right1"><div class="scrolldown1"><span>Scroll</span></div><div class="particle" id="pt2"></div></div><!--/right1-->
    

<!-------------------------section1------------------------------>


<!-------------------------section2------------------------------>

    <div class="ms-section" id="right2"></div><!--/right2-->

<!-------------------------section2------------------------------>


<!-------------------------section3------------------------------>

<div class="ms-section" id="right3"></div><!--/right3-->

<!-------------------------section3------------------------------>


<!-------------------------section4------------------------------>

    <div class="ms-section" id="right4"></div><!--/right4-->

<!-------------------------section4------------------------------>


<!-------------------------section7------------------------------>

<div class="ms-section" id="right7">
  <div class="sp-top"></div>
  <div class="sp-bottom">
    <div id="video-area">
      <video id="video2" poster="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/6-3-1/img/movie.jpg" webkit-playsinline playsinline muted autoplay loop>
      <!--
        poster：動画ファイルが利用できない環境で代替表示される画像
        webkit-playsinline：iOS 9までのSafari用インライン再生指定
        playsinline：iOS 10以降のSafari用インライン再生指定
        muted：音声をミュートさせる
        autoplay：動画を自動再生させる
        loop：動画をループさせる
        controls：コントロールバーを表示する
      -->
        <source src="https://ec-daieirecord.com/wp-content/themes/samplesite2/video/test3.mp4" type="video/mp4">
        <p>動画を再生できる環境ではありません。</p>
      </video>
    </div><!--/video-area-->
    <div class="music-text">
      <p>DAVID JENIFFER NEW ALBUM</p>
        <buttun>
          <a href="https://ec-daieirecord.com/music" class="btn btn-flat btn-type-two btn-music"><span>CLICK-HERE</span></a>
        </buttun>
    </div>
  </div>
</div><!--/right7-->

<!-------------------------section7------------------------------>


<!-------------------------section5------------------------------>

<div class="ms-section" id="right5"></div><!--/right5-->

<!-------------------------section5------------------------------>


<!-------------------------section6------------------------------>

    <div class="ms-section" id="right6"></div><!--/right6-->

<!-------------------------section6------------------------------>

  <!--/ms-right--></div> 

</div><!--wrapper-->
	              	        
<?php get_footer(); ?>