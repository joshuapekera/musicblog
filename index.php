<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme and one
 * of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query,
 * e.g., it puts together the home page when no home.php file exists.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */

get_header(); ?>

<?php if ( ! class_exists( 'Acf' ) ) : ?>

<!-- Content Defaulut Index Page -->
<?php include_once('page-templates/np-content-default.php'); ?>

<?php else: ?>
<!-- Content Defaulut Index Page -->
<?php include_once('page-templates/content-default.php'); ?>

<?php endif; ?>


<?php
get_footer();