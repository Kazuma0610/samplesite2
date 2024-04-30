<?php get_header(); ?>
    <section id="primary" class="content-area">
        <main id="main" class="site-main">
            
            <?php
            while ( have_posts() ) :
                the_post();

                get_template_part('template-parts/content');
                if ( comments_open() || get_comments_number() ) { ?>
                    <div id="comments" class="comments-area">
                    <?php comments_template(); ?>
                    </div><!-- #comments --><?php
                }
                
            endwhile;
            ?>
            
                <!--<div class="post__pagination">
                    <?php $prevpost = get_adjacent_post(false, '', true); if ($prevpost) : ?>
                    <div class="post__pagination__right">
                        <a href="<?php echo get_permalink($prevpost->ID); ?>">
                            <span class="next">Before Live</span>
                        </a>
                    </div>
                    <?php endif; ?>
                </div>-->

                <div class="btn-wrap">
                  <buttun>
                    <a href="https://ec-daieirecord.com/#area1" class="btn btn-flat btn-bottom"><span>BACK</span></a>
                  </buttun>
                </div>
        </main><!--#main-->
        <div class="footer-contents-page">
          <p>DAVID JENNIFER</p>
        </div>
    </section><!-- #primary-->
                  
<?php get_footer(); ?>