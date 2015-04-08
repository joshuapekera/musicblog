<?php
/**
 * Template Name: Home Page Builder
 *
 * @package WordPress
 * @subpackage NillNews
 * @since Nillnews 1.0
 */

get_header(); ?>

    <?php      
    while(has_sub_field("nill_modul_builder")): ?>
        
        <!-- Slider Modules -->
        <?php if(get_row_layout("nill_modul_builder") == "nill_moduleslider"): ?>     
            <?php include('module-slider.php'); ?>
            
        <!-- News Modules -->
        <?php elseif(get_row_layout("nill_modul_builder") == "nill_modulenews"): ?>     
            <?php include('module-news.php'); ?>
            
        <!-- Mixed Photo Modules -->
        <?php elseif(get_row_layout("nill_modul_builder") == "nill_modulemixed"): ?>     
            <?php include('module-mixed.php'); ?>
            
        <?php else: ?>
        <?php endif; ?>
        
    <?php endwhile; ?>
    <?php 
    wp_enqueue_script ( 'nill-photostack', get_template_directory_uri() . '/js/photostack.js', array('jquery'), null,true  );
    wp_enqueue_script ( 'nill-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), null,true  );
    ?>

<?php
get_footer();
?>