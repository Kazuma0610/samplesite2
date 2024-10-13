<?php get_header(); ?>

    <section id="primary" class="content-area">
        <div class="live-sch-container">

                    <header class="page-header">
                      <?php the_title('<h1 class="entry-title">','</h1>'); ?>
                    </header><!-- .page-header -->

                    <div class="live-sch-wrapper">
                      <ul class="live-tab">
                        <li class="tab__item"><a href="https://ec-daieirecord.com/live-all" class="js-tab-link">ALL</a></li>
		                    <li class="tab__item"><a href="https://ec-daieirecord.com/live-live" class="js-tab-link">LIVE</a></li>
		                    <li class="tab__item"><a href="https://ec-daieirecord.com/live-tour" class="js-tab-link">TOUR</a></li>
                        <li class="tab__item"><a href="https://ec-daieirecord.com/live-event" class="js-tab-link">EVENT</a></li>
                        <li class="tab__item selected"><a href="#" class="js-tab-link selected">ARCHIVE</a></li>
	                    </ul>
                    </div>

                    <div id="all" class="live-area">
                      <div class="pagination">
                        <ul>
                        <?php
                          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                          $the_query = new WP_Query(array(
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'numberposts' => -1, // 情報を全部取得
                            'posts_per_page' => 5, // 表示させる投稿数を設定
                            'category__in' => array(20,21,22),// 複数のカテゴリーを取得（IDで取得）
	                          'orderby'      => 'live_date',  // 並び順を制御するカスタムフィールド(今回の場合はライブ日程)
	                          'order'        => 'DESC', // 並び順を最新のものから順に
	                          'meta_key'     => 'live_date', // 分岐の判定に使うカスタムフィールド(今回の場合はライブ日程)
	                          'meta_value'   => date( "Ymd" ), // 「今日」の日付を取得
	                          'meta_compare' => '<', // 昨日以前に条件分岐
                            ));


                          // ここからループ
                          if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
                          ?>
                            <li>
                              <a href="<?php the_permalink(); ?>">
                                <div class="list-inner-live">
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
                                    </ul><!--tag-wrapper-->
                                  </div><!--info-inner-->
                                </div><!--list-inner-->
                              </a>
                            </li>

                            <?php endwhile;
                            endif;
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
                          <a href="https://ec-daieirecord.com/#area2" class="btn btn-flat btn-bottom"><span>BACK</span></a>
                        </buttun>
                      </div><!--pagination-->
		            </div><!--live-area-->

        </div><!--live-sch-container-->
        <div class="footer-contents-page">
          <p>DAVID JENNIFER</p>
        </div>
    </section><!--#primary-->
<?php get_footer();