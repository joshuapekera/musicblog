<!-- Nill Plugin Check -->
<?php if ( ! class_exists( 'Acf' ) ) : ?>
<?php include_once('np-content-single.php'); ?>
<?php else: ?>

<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4><?php _e( 'Event', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Information', 'nill' ); ?></span></h4>
            </div>
        </div>
    </div>
</div>

<!-- Nill Track Player -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <!-- Nill Title -->
        <div class="col-md-12">
            <div class="nill-singletitle">
                <h1><?php echo get_the_title(); ?></h1>
                <div class="nill-singledate">
                    <ul>
                        <li><i class="fa fa-clock-o"></i> <?php the_date(); ?></li>
                        <li><i class="fa fa-folder"></i> <?php the_category(', ') ?></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix nill-spaceone"></div>
        </div>
        
        <!-- Nill Code Player -->
        <div class="col-md-12">
            <?php include_once('code-event.php'); ?>
        </div>
        
        <div class="clearfix"></div>
        
    </div>
</div>

<div class="clearfix"></div>

<?php if (get_field('nill_hideevpostdetail') == "true"): ?>
<?php else: ?>
<!-- Nill Post Detail -->
<div class="container-fluid nill-padone nill-padheight">
    <div class="row">

        <!-- Nill Post Left -->
        <div <?php if (get_field('nill_hideeveposttags') == "true"): ?>class="col-md-12" <?php else: ?> class="col-md-6" <?php endif ; ?>>
            <div class="nill-postdetailtitle">
                <h4><?php _e( 'Event', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Detail', 'nill' ); ?></span></h4>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="nill-postdetail">
                <?php
                    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nill' ) );
                    wp_link_pages();
                ?>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="nill-postlike">
                <div class="row">
                    <div class="col-xs-4">
                        <div class="nill-likeit">
                            <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
                        </div>
                    </div>

                    <div class="col-xs-8">
                        <div class="nill-shareit">
                            <?php if( function_exists('ssba_activate') ) : ?>
                            <?php echo do_shortcode('[ssba]'); ?>
                            <?php endif ; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="clearfix nill-phoneone"></div>
            
        </div>
        
        <?php if (get_field('nill_hideeveposttags') == "true"): ?>
        <?php else: ?>
        <!-- Nill Post Left -->
        <div class="col-md-6">
        
            <!-- Nill Reviews -->
            <?php if( have_rows('nill_albumreviews') ): ?>
            <div class="nill-postdetailtitle">
                <h4><?php _e( 'Event', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Reviews', 'nill' ); ?></span></h4>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="nill-reviews">
                <ul>
                    <?php while ( have_rows('nill_albumreviews') ) : the_row(); ?>
                    <li>
                        <h6><?php esc_html(the_sub_field('nill_postpointtitle')); ?></h6>
                        <p><?php _e( '0 Point / 100 Point', 'nill' ); ?></p>

                        <div class="clearfix nill-pointbr"></div>
                        <div class="progress progress-striped active">
                            <div class="progress-bar" style="width: <?php esc_html(the_sub_field('nill_postpointnumber')); ?>%;">
                                <div class="nill-stickpoint">
                                    <?php esc_html(the_sub_field('nill_postpointnumber')); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <?php endwhile; ?>
                </ul>
            </div>
            
            <div class="clearfix" style="margin-bottom:65px;"></div>
            <?php else : ?>
            <?php endif; ?>
            
            <!-- Nill Post Tags -->
            <div class="nill-postdetailtitle">
                <h4><?php _e( 'Event', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Tags', 'nill' ); ?></span></h4>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="nill-singletags">
                <?php the_tags('','') ?>
            </div>
        
        </div>
        <?php endif ; ?>
    
    </div>
</div>

<div class="clearfix"></div>
<?php endif; ?>

<?php if (get_field('nill_hideevrelatedposts') == "true"): ?>
<?php else: ?>
<!-- Nill Related Post -->
<div class="container-fluid nill-padone nill-backblack nill-padheight">
    <div class="row">

        <!-- Nill Related Title -->
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitlerel">
                <h4><?php _e( 'Related', 'nill' ); ?> <span class="nill-pageheadertitletworel"><?php _e( 'Events', 'nill' ); ?></span></h4>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <?php
                $tags = wp_get_post_categories($post->ID);  
                if ($tags) {  
                $tag_ids = array();  
                foreach($tags as $c) $tag_ids[] = get_cat_name( $c );
                  $lister = implode(",", $tag_ids);

                $args=array(  
                'category__in' => $tags, 
                'post__not_in' => array($post->ID),  
                'showposts'=>3,  // Number of related posts that will be shown.  
                'ignore_sticky_posts'=>1  
                );  

                $my_query = new wp_query($args);  
                if( $my_query->have_posts() ) {  
                echo '';  
                while ($my_query->have_posts()) {  
                $my_query->the_post();  
            ?>

            <?php if ( has_post_thumbnail() ) : ?>

            <div class="col-md-4 nill-phoneone">
                <div class="nill-rellist">
                    <a href="<?php the_permalink() ?>">
                        <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                    </a>
                    <div class="nill-relatedposts">
                        <div class="nill-relatedposttitletwo">
                            <h6><a href="<?php the_permalink() ?>"><?php the_titlesmall('', '', true, 50 ) ?></a></h6>
                        </div>
                    </div>
                </div>
            </div>

            <?php else: ?>
            <?php endif; ?>

            <?php } ?>                                         
            <?php  }  
                echo '';  
            }   
            wp_reset_query();  
            ?> 
        
    </div>
</div>

<div class="clearfix"></div>
<?php endif; ?>

<?php if ( ! comments_open() ) : ?>
<?php else : ?>
<!-- Nill Post Detail -->
<div class="container-fluid nill-padone nill-padheightthree">
    <div class="row">

        <?php	if ( comments_open() || get_comments_number() ) {
            comments_template();
        } ?>
        
    </div>
</div>
<?php endif; ?>

<?php endif; ?>