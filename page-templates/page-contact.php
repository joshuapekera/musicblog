<?php
/**
 * Template Name: Contact Page Builder
 *
 * @package WordPress
 * @subpackage NillNews
 * @since Nillnews 1.0
 */

get_header(); ?>

<?php // Start the Loop.
while ( have_posts() ) : the_post(); ?>


<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4><?php echo get_the_title(); ?></h4>
            </div>
        </div>
    </div>
</div>


<!-- Nill Track Player -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <!-- Nill Thumb --> 
        <div class="col-md-12">  
            <div class="nill-contactmap">
                
                <?php 
                $location = get_field('nill_contactpagemap');

                if( !empty($location) ):
                ?>
                <div class="acf-map">
                    <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                </div>
                <?php endif; ?>
                
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        
    </div>
</div>

<div class="clearfix" style="margin-bottom:-30px;"></div>

<!-- Nill Post Detail -->
<div class="container-fluid nill-padone nill-padheight">
    <div class="row">

        <!-- Nill Post Left -->
        <div class="col-md-12">
            <div class="nill-postdetailtitle">
                <h4><?php _e( 'Post', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Detail', 'nill' ); ?></span></h4>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="nill-postdetail">
                <?php
                    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nill' ) );
                    wp_link_pages();
                ?>
            </div>
            
            <div class="clearfix" style="margin-bottom:-40px;"></div>
            
        </div>
    
    </div>
</div>

<div class="clearfix"></div>

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

<?php endwhile; ?>

<?php
get_footer();
?>