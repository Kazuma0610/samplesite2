<article id="post-<?php the_ID(); ?>"<?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-post-title">','</h1>'); ?>
        <?php if ( is_singular('post')) { ?>
            <div class="date-post">
              <?php the_field('news_date'); ?>
            </div>
        <?php } // is_singlar('post') ?>
        <?php if ( is_singular('news')) { ?>
            <div class="date-flex">
                <i class="fas fa-sync-alt"></i><?php the_date('','' ); ?>
            </div>
        <?php } // is_singlar('news') ?>
    </header><!--entry-header-->

    <figure class="post-thumbnail">
        <?php the_post_thumbnail(); ?>
    </figure><!--.post-thumbnail-->



    <div class="entry-content">
        <?php
        the_content();//本文表示
        //カスタムフィールドは設定なし
        wp_link_pages(
            [
                'before' => '<div class="page-links">ページ:',
                'after' => '</div>',
            ]
        ); ?>

        <!--メインクエリはまだ未設定-->

    </div><!--entry-content-->
</article><!--#post-<?php the_ID(); ?>-->