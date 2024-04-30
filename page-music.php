<?php get_header(); ?>

    <section id="primary" class="content-area">
        <div class="music-container">

                    <header class="page-header">
                      <?php the_title('<h1 class="entry-title">','</h1>'); ?>
                    </header><!-- .page-header -->


                    <div id="all" class="music-area js-tab-box">
                      <div class="pagination">
                        <ul>
                        <?php
                          $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                          $the_query = new WP_Query(array(
                            'post_status' => 'publish',
                            'paged' => $paged,
                            'numberposts' => 30, // 情報を30件取得
                            'posts_per_page' => 4, // 表示させる投稿数を設定
                            'category__in' => array(33),// 複数のカテゴリーを取得（IDで取得）
	                          
                            ));


                          // ここからループ
                          if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
                          ?>
                            <li>
                              <a href="<?php the_permalink(); ?>">
                                <div class="music-inner">
                                  <div class="info-inner">
                                      <?php if(has_tag()==true) : ?>
                                        <div class="product-tag">
                                          <?php $posttags = get_the_tags();
                                          if ($posttags) {
                                            foreach($posttags as $tag) {
                                            echo $tag->name . ' ';
                                            }
                                          }
                                          ?>
                                        </div>
                                      <?php else : ?>
                                      <?php endif; ?>
                                    <figure class="music-thumbnail">
                                      <?php the_post_thumbnail(); ?>
                                    </figure><!-- .post-thumbnail-->
                                  </div><!--info-inner-->
                                  <div class="block_date_inner">
                                    <p class="product-title"><?php the_title(); ?></p>
                                    <p class="product_date">発売日：<?php the_field('product_date'); ?></p>
                                    <?php $cat = get_the_category(); $cat = $cat[0]; {echo '<p class="category '. $cat->category_nicename .'">'; 
                                    } ?><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
                                  </div>
                                </div><!--list-inner-->
                              </a>
                            </li>

                            <?php endwhile;?>
                            <?php else://製品発売予定がない場合?>
                              <li class="no_product">新しい製品の発売予定はありません</li>
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
                      </div><!--pagination-->
                      <div class="btn-wrap">
                        <buttun>
                          <a href="https://ec-daieirecord.com/#area5" class="btn btn-flat btn-bottom"><span>BACK</span></a>
                        </buttun>
                      </div>
		            </div><!--live-area-->

        </div><!--music-container-->
        <div class="footer-contents-page">
          <p>DAVID JENNIFER</p>
        </div>
    </section><!--#primary-->
<?php get_footer();