<?php
/**
 * The Template for displaying all single posts
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */

get_header(); ?>

	<?php while (have_posts()) : the_post(); ?>
        
        <?php if ( ! class_exists( 'Acf' ) ) : ?>
        
        <!-- Content Normal Blog Single -->
        <?php include_once('page-templates/np-content-single.php'); ?>
        
        <?php else: ?>
        
        <!-- Content Event Single -->
        <?php if ( has_post_format( 'Aside' )) : ?>
        <?php include_once('page-templates/content-event.php'); ?>
           
        <!-- Content Gallery Single -->
        <?php elseif ( has_post_format( 'Gallery' )) : ?>
        <?php include_once('page-templates/content-gallery.php'); ?>
        
        <!-- Content Video Single -->
        <?php elseif ( has_post_format( 'Video' )) : ?>
        <?php include_once('page-templates/content-video.php'); ?>
        
        <!-- Content Music Single -->
        <?php elseif ( has_post_format( 'Audio' )) : ?>
        <?php include_once('page-templates/content-album.php'); ?>
        
        <!-- Content Image Single -->
        <?php elseif ( has_post_format( 'Image' )) : ?>
        <?php include_once('page-templates/content-image.php'); ?>
        
        <!-- Content Quote Single -->
        <?php elseif ( has_post_format( 'Quote' )) : ?>
        <?php include_once('page-templates/content-quote.php'); ?>
        
        <!-- Content Link Single -->
        <?php elseif ( has_post_format( 'Link' )) : ?>
        <?php include_once('page-templates/content-link.php'); ?>
        
        <?php else : ?>
           
        <!-- Content Normal Blog Single -->
        <?php include_once('page-templates/content-single.php'); ?>
        
        <?php endif; ?>
        
        <div class="single-paginate-link">
            <?php wp_link_pages(); ?>
        </div>
        
        <?php endif; ?>
        
        <div class="single-paginate-link">
            <?php wp_link_pages(); ?>
        </div>

        <div class="single-paginate-link">
            <?php paginate_links(); ?>
        </div>
        
        <!-- Page Links & Comments -->
        <div class="comment-form-box">
            <?php comment_form(); ?>
        </div>
        
    <?php  endwhile; ?>

<?php
get_footer();
