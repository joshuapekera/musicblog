<!-- Nill Plugin Check -->
<?php if ( ! class_exists( 'Acf' ) ) : ?>
<?php include_once('np-content-single.php'); ?>
<?php else: ?>

<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4><?php _e( 'Image', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Information', 'nill' ); ?></span></h4>
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
        
        <!-- Nill Thumb --> 
        <div class="col-md-12">  
            <div class="nill-quotepost" style="background-image: url(<?php $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), array( 600,450 ), false, '' ); echo $src[0]; ?>);">
                
                <h1><?php echo esc_html(the_field('nill_quotetext')); ?></h1>
                <p><?php echo esc_html(the_field('nill_quotesays')); ?></p>
                <div class="nill-quotefull"></div>
                
            </div>
        </div>
        
        <div class="clearfix"></div>
        
    </div>
</div>

<div class="clearfix"></div>

<?php if (get_field('nill_hideimrelatedposts') == "true"): ?>
<?php else: ?>
<!-- Nill Related Post -->
<div class="container-fluid nill-padone nill-backblack nill-padheight">
    <div class="row">

        <!-- Nill Related Title -->
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitlerel">
                <h4><?php _e( 'Related', 'nill' ); ?> <span class="nill-pageheadertitletworel"><?php _e( 'Quotes', 'nill' ); ?></span></h4>
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