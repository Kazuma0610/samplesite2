<?php get_header(); ?>

    <section id="primary" class="content-area">
        <div class="news-sch-container">

                    <header class="page-header">
                      <?php the_title('<h1 class="entry-title">','</h1>'); ?>
                    </header><!-- .page-header -->

                    <div class="news-sch-wrapper">
                      <ul class="news-tab">
		                    <li class="tab__item"><a href="https://ec-daieirecord.com/news-all" class="js-tab-link">ALL</a></li>
		                    <li class="tab__item selected"><a href="#" class="js-tab-link selected">MEDIA</a></li>
		                    <li class="tab__item"><a href="https://ec-daieirecord.com/news-tv" class="js-tab-link">TV</a></li>
                            <li class="tab__item"><a href="https://ec-daieirecord.com/news-web" class="js-tab-link">WEB</a></li>
                            <li class="tab__item"><a href="https://ec-daieirecord.com/news-archive" class="js-tab-link">ARCHIVE</a></li>
	                    </ul>
                    </div>

                    <div id="all" class="news-list-area js-tab-box">
                      <div class="pagination">
                        <ul>
                        <?php
                          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                          $the_query = new WP_Query(array(
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'numberposts' => 30, // 情報を3件取得
                            'posts_per_page' => 5, // 表示させる投稿数を設定
                            'post_type'    => 'post', // カスタム投稿タイプ名
                            'category__in' => array(27),// 複数のカテゴリーを取得（IDで取得）
	                        'order'        => 'DESC', // 並び順を日程の近い順に
                            ));


                          // ここからループ
                          if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
                          ?>
                            <li>
                              <a href="<?php the_permalink(); ?>">
                                <div class="list-inner-news">
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
                                    </ul><!--tag-wrapper-->
                                  </div><!--info-inner-->
                                </div><!--list-inner-->
                              </a>
                            </li>

                            <?php endwhile;?>
                            <?php else://お知らせがない場合?>
                              <li class="no_news">新着情報はございません</li>
                            <? endif;
                            wp_reset_postdata(); ?>
                        </ul>


                        <div class="pnavi">
                        <?php //ページリスト表示処理
                          global $wp_rewrite;
                          $paginate_base = get_pagenum_link(1);
                          if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                            $paginate_format = '';
                            $paginate_base = add_query_arg('paged', '%#%');
                          } else {
                            $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                            user_trailingslashit('page/%#%/', 'paged');
                            $paginate_base .= '%_%';
                          }
                          echo paginate_links(array(
                            'base' => $paginate_base,  //URLのベース
                            'format' => $paginate_format,  //ページネーションのリンクの構造
                            'total' => $the_query->max_num_pages, //ページ数（全ページを指定）
                            'mid_size' => 2, //ページリスト表示処理
                            'current' => ($paged ? $paged : 1), //現在のページの位置
                            'prev_text' => '前へ',
                            'next_text' => '次へ',
                          ));
                        ?>
                        </div><!--pnavi--> 
                        <buttun>
                          <a href="https://ec-daieirecord.com/#area3" class="btn btn-flat btn-bottom"><span>BACK</span></a>
                        </buttun>
                      </div><!--pagination-->
		            </div><!--live-area-->

        </div><!--live-sch-container-->
        <div class="footer-contents-page">
          <p>DAVID JENNIFER</p>
        </div>
    </section><!--#primary-->
<?php get_footer();