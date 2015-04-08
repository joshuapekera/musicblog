<?php
/**
 * Template Name: Blog Page Builder
 *
 * @package WordPress
 * @subpackage NillNews
 * @since Nillnews 1.0
 */

get_header(); ?>

<!-- Nill Plugin Check -->
<?php if ( ! class_exists( 'Acf' ) ) : ?>
<?php include_once('np-content-single.php'); ?>
<?php else: ?>

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

<!-- Nill Blog Loop -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <?php if (get_field('nill_selbloglayouts') == "full"): ?>
        <!-- Blog Full -->
        <div class="col-md-12">
            <?php if (get_field('nill_selectblogstyle') == "list"): ?>
            <?php include_once('listloop-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "listgrid"): ?>
            <?php include_once('listgridloop-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "grid"): ?>
            <?php include_once('listgrid-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "read"): ?>
            <?php include_once('listread-full.php'); ?>
            <?php endif; ?> 
        </div>
                
        <div class="clearfix"></div>
                
        <?php elseif (get_field('nill_selbloglayouts') == "right"): ?>
                
        <!-- Blog Sidebar Right -->
        <div class="col-md-8">
            <?php if (get_field('nill_selectblogstyle') == "list"): ?>
            <?php include_once('listloopside-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "listgrid"): ?>
            <?php include_once('listgridloopside-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "grid"): ?>
            <?php include_once('listgrid-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "read"): ?>
            <?php include_once('listread-full.php'); ?>
            <?php endif; ?> 
        </div>
                
        <div class="col-md-4">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
                
        <div class="clearfix"></div>
                
        <?php elseif (get_field('nill_selbloglayouts') == "left"): ?>
                
        <!-- Blog Sidebar Left -->
        <div class="col-md-4">
            <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div>
        
        <div class="col-md-8">
            <?php if (get_field('nill_selectblogstyle') == "list"): ?>
            <?php include_once('listloopside-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "listgrid"): ?>
            <?php include_once('listgridloopside-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "grid"): ?>
            <?php include_once('listgrid-full.php'); ?>
            <?php elseif (get_field('nill_selectblogstyle') == "read"): ?>
            <?php include_once('listread-full.php'); ?>
            <?php endif; ?> 
        </div>
                
        <div class="clearfix"></div>
                
        <?php endif; ?>
                
    </div>
</div>

<?php endif; ?>
<?php
get_footer();
?>