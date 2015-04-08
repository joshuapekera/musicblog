<?php
/**
 * The template for displaying Author archive pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */

get_header(); ?>

<!-- Nill Plugin Check -->
<?php if ( ! class_exists( 'Acf' ) ) : ?>
<?php include_once( 'page-templates/np-author.php'); ?>
<?php else: ?>
	
<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4>
                    <?php
						/*
						 * Queue the first post, that way we know what author
						 * we're dealing with (if that is the case).
						 *
						 * We reset this later so we can run the loop properly
						 * with a call to rewind_posts().
						 */
						the_post();

						printf( __( 'All posts by %s', 'nill' ), get_the_author() );
					?>
                </h4>
            </div>
        </div>
    </div>
</div>

<!-- Nill Blog Loop -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <?php if (get_field('nill_blogselectlay' , 'option') == "full"): ?>
        <!-- Blog Full -->
        <div class="col-md-12">
            <?php if (get_field('nill_blogselectstyle' , 'option') == "list"): ?>
            <?php include_once('page-templates/archive-listloop-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "listgrid"): ?>
            <?php include_once('page-templates/archive-listgridloop-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "grid"): ?>
            <?php include_once('page-templates/archive-listgrid-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "read"): ?>
            <?php include_once('page-templates/archive-listread-full.php'); ?>
            <?php endif; ?> 
        </div>
                
        <div class="clearfix"></div>
                
        <?php elseif (get_field('nill_blogselectlay' , 'option') == "right"): ?>
                
        <!-- Blog Sidebar Right -->
        <div class="col-md-8">
            <?php if (get_field('nill_blogselectstyle' , 'option') == "list"): ?>
            <?php include_once('page-templates/archive-listloopside-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "listgrid"): ?>
            <?php include_once('page-templates/archive-listgridloopside-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "grid"): ?>
            <?php include_once('page-templates/archive-listgrid-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "read"): ?>
            <?php include_once('page-templates/archive-listread-full.php'); ?>
            <?php endif; ?> 
        </div>
                
        <div class="col-md-4">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
                
        <div class="clearfix"></div>
                
        <?php elseif (get_field('nill_blogselectlay' , 'option') == "left"): ?>
                
        <!-- Blog Sidebar Left -->
        <div class="col-md-4">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
        
        <div class="col-md-8">
            <?php if (get_field('nill_blogselectstyle' , 'option') == "list"): ?>
            <?php include_once('page-templates/archive-listloopside-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "listgrid"): ?>
            <?php include_once('page-templates/archive-listgridloopside-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "grid"): ?>
            <?php include_once('page-templates/archive-listgrid-full.php'); ?>
            
            <?php elseif (get_field('nill_blogselectstyle' , 'option') == "read"): ?>
            <?php include_once('page-templates/archive-listread-full.php'); ?>
            <?php endif; ?> 
        </div>
                
        <div class="clearfix"></div>
                
        <?php endif; ?>
                
    </div>
</div>

<?php endif; ?>

<?php
get_footer();
