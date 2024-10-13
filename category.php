<?php get_header(); ?>
<div class="live-cat-container">
  <div class="page-header">
    <h2 class="contents-header__title"><?php the_archive_title(); ?></h2>
  </div>
  <div class="cat-area">
    <ul>
      <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>
        <!-- 繰り返したい内容　ここから -->
        
          <li>
            <a href="<?php the_permalink(); ?>">
              <div class="cat-inner">
                <div class="info-inner">
                  <?php if(has_tag()==true) : ?>
                    <div class="cat-tag">
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
                  <figure class="post-thumbnail">
                    <?php if (has_post_thumbnail()) : ?>
                      <?php the_post_thumbnail(); ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/images/no-phot.png" alt="写真がありません">
                    <?php endif; ?>
                  </figure><!-- .post-thumbnail-->
                </div><!--info-inner-->
                <div class="block_date_inner">
                  <p class="product-title"><?php the_title(); ?></p>
                  <p class="live_date"><?php the_field('live_date'); ?></p>
                  <?php $cat = get_the_category(); $cat = $cat[0]; {echo '<p class="category '. $cat->category_nicename .'">'; 
                  } ?><?php $cat = get_the_category(); $cat = $cat[0]; { echo $cat->cat_name; } ?></p>
                </div><!--block_date_inner-->
              </div><!--block_date_inner-->
            </a>
          </li>
          <!-- 繰り返したい内容　ここまで -->
        
        <?php endwhile; ?>
      <?php else : ?>
        <p>現在LIVEはありません</p>
      <?php endif; ?>
    </ul>
  </div>
  <div class="btn-wrap">
    <buttun>
      <a href="https://ec-daieirecord.com/#area1" class="btn btn-flat btn-bottom"><span>BACK</span></a>
    </buttun>
  </div>
</div>
<div class="footer-contents-page">
  <p>DAVID JENNIFER</p>
</div>
<?php get_footer(); ?>
