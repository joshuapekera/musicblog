<?php
/**
 * The template for displaying Archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each specific one. For example, Nill
 * already has tag.php for Tag archives, category.php for Category archives,
 * and author.php for Author archives.
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
<?php include_once( 'page-templates/np-archive.php'); ?>
<?php else: ?>
	
<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4>
                    <?php
                        if ( is_day() ) :
                            printf( __( 'Daily Archives: %s', 'nill' ), get_the_date() );

                        elseif ( is_month() ) :
                            printf( __( 'Monthly Archives: %s', 'nill' ), get_the_date( _x( 'F', 'monthly archives date format', 'nill' ) ) );

                        elseif ( is_year() ) :
                            printf( __( 'Yearly Archives: %s', 'nill' ), get_the_date( _x( 'Y', 'yearly archives date format', 'nill' ) ) );

                        else :
                            _e( 'Archives', 'nill' );

                        endif;
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
