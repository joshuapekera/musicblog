<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */

get_header(); ?>

<?php
    // Start the Loop.
    while ( have_posts() ) : the_post();

        if ( ! class_exists( 'Acf' ) ) :

        include_once('page-templates/np-content-page.php');

        else :

        // Include the page content template.
        include_once('page-templates/content-page.php');

        endif;

    endwhile;
?>

<?php
get_footer();