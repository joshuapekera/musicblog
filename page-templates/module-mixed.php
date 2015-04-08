<!-- Nill Module Title -->
<div class="text-center">
    <div class="nill-pageheadertitle nill-mixedtitle">
        <h4>
            <?php echo esc_html(the_sub_field('nill_modtitlemix')); ?> 
                <span class="nill-pageheadertitletwo">
                    <?php echo esc_html(the_sub_field('nill_modtitlemixtwo')); ?>
                </span>
        </h4>
    </div>
</div>

<div id="photostack-3" class="photostack">
    <div>
                
        <?php
        $nill_sliderhomepost = get_sub_field('nill_modmixcat');
        $nill_sliderhomeposts = implode(',',$nill_sliderhomepost);
        $nill_sliderhomeshow = get_sub_field('nill_modmixshow');
        ?>

        <?php if (have_posts()) : ?>
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=$nill_sliderhomeposts&showposts=$nill_sliderhomeshow&somecat&paged=$paged"); ?>
        <?php while (have_posts()) : the_post(); ?>
        
        <figure>
            <a href="<?php the_permalink() ?>" class="photostack-img">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                <?php endif; ?>
            </a>
            
            <figcaption>
                <h2 class="photostack-title"><?php echo get_the_title(); ?></h2>
                <div class="photostack-back">
                    <div class="nill-loopread">
                            <?php
                            if (is_sticky()) {
                              global $more; 
                              $more = 1;
                              the_content();
                            } else {
                              global $more;
                              $more = 0;
                              the_content('');
                            }
                            ?>
                    </div>
                </div>
            </figcaption>
            
        </figure>
        
        <?php  endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php wp_reset_query(); ?>
        <?php endif; ?>
        
        <?php
        $nill_sliderhomepost = get_sub_field('nill_modmixcat');
        $nill_sliderhomeposts = implode(',',$nill_sliderhomepost);
        $nill_sliderhomeshow = get_sub_field('nill_modmixshow');
        ?>

        <?php if (have_posts()) : ?>
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=$nill_sliderhomeposts&showposts=$nill_sliderhomeshow&somecat&paged=$paged"); ?>
        <?php while (have_posts()) : the_post(); ?>
        
        <figure data-dummy>
            <a href="#" class="photostack-img">
                <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                <?php endif; ?>
            </a>
            <figcaption>
                <h2 class="photostack-title"><?php echo get_the_title(); ?></h2>
            </figcaption>
        </figure>
        
        <?php  endwhile; ?>
        <?php wp_reset_postdata(); ?>
        <?php wp_reset_query(); ?>
        <?php endif; ?>
        
    </div>
</div>

<div class="clearfix"></div>