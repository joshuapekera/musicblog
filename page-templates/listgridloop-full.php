<div class="row">
<?php
$nill_sliderhomepost = get_field('nill_homeblogcat');
$nill_sliderhomeposts = implode(',',$nill_sliderhomepost);
$nill_sliderhomeshow = get_field('nill_homeblogshows');
?>
<?php if (have_posts()) : ?>
<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=$nill_sliderhomeposts&showposts=$nill_sliderhomeshow&somecat&paged=$paged"); ?>
<?php while (have_posts()) : the_post(); ?>

<div class="col-md-6 col-lg-4 nill-loopblog" style="margin-bottom:30px;">

    <div class="row">

        <!-- Nill Blog Image -->
        <div class="col-md-6 col-lg-6">
            <div class="nill-blogimage">

                <div class="nill-main-ghostimg">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                    <?php endif; ?>
                </div>

                <div class="nill-bigimage">
                    <?php if ( has_post_thumbnail() ) : ?>
                    <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                    <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                    <?php endif; ?>
                </div>
                
                <a href="<?php the_permalink() ?>">
                    <div class="nill-blogimgdate">
                        <div class="nill-bloogdate">
                            <div class="nill-bloogdatepad">
                                <div class="nill-dateone"><?php echo get_the_time('d', $post->ID); ?></div>
                                <div class="nill-datetwo"><?php echo get_the_time('M', $post->ID); ?></div>
                            </div>
                        </div>
                    </div>
                </a>

                <div class="visible-xs visible-sm nill-bloogdatesmall">
                    <div class="nill-bloogdate">
                        <div class="nill-bloogdatepad">
                            <div class="nill-dateone"><?php echo get_the_time('d', $post->ID); ?></div>
                            <div class="nill-datetwo"><?php echo get_the_time('M', $post->ID); ?></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!-- Nill Blog Date -->
        <div class="col-md-6 col-lg-6">
            <div class="nill-blogdates">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                <?php endif; ?>
                <div class="nill-blogindate">
                    <div class="nill-bloogdate">
                        <div class="nill-bloogdatepad">
                            <div class="nill-dateone"><?php echo get_the_time('d', $post->ID); ?></div>
                            <div class="nill-datetwo"><?php echo get_the_time('M', $post->ID); ?></div>
                        </div>
                    </div>
                </div>
                
                <a href="<?php the_permalink() ?>">
                <div class="nill-blogicons">
                    <div class="nill-bloogdatetwo">
                        <div class="nill-bloogdatepadtwo">
                            <div class="nill-blogicon">
                                <?php if ( has_post_format( 'Aside' )) : ?>
                                <i class="fa fa-map-marker"></i>

                                <?php elseif ( has_post_format( 'Gallery' )) : ?>
                                <i class="fa fa-camera"></i>

                                <?php elseif ( has_post_format( 'Image' )) : ?>
                                <i class="fa fa-picture-o"></i>

                                <?php elseif ( has_post_format( 'Video' )) : ?>
                                <i class="fa fa-video-camera"></i>

                                <?php elseif ( has_post_format( 'Audio' )) : ?>
                                <i class="fa fa-music"></i>

                                <?php elseif ( has_post_format( 'Quote' )) : ?>
                                <i class="fa fa-quote-left"></i>

                                <?php elseif ( has_post_format( 'Link' )) : ?>
                                <i class="fa fa-link"></i>

                                <?php else : ?>
                                <i class="fa fa-file"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                </a>
                
            </div>
        </div>

    </div>

</div>
<?php  endwhile; ?>
<div class="col-md-12">
    <div class="nill-pagenavi">
        <div class="pagination nill-navi">
            <?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=5&first_label=First&last_label=Last&show_num=1&num_position=after' ); ?>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<?php else : ?>
<?php get_template_part( 'content', 'none' ); ?> 
<?php endif; ?>
<?php wp_reset_query(); ?>
</div>