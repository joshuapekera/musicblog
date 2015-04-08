<?php
/**
 * Implement Custom Header functionality for Nillplay
 *
 * @package WordPress
 * @subpackage Nillplay
 * @since Nillplay Magazine
 */

/**
 * Styles the header image and text displayed on the blog
 *
 * @see nillplay_custom_header_setup().
 *
 */

?>
<?php if( get_field('nill_custom_css', 'option')) : ?>
<style type="text/css"  rel="stylesheet" media="screen">
    <?php the_field('nill_custom_css' , 'option'); ?>
</style>
<?php endif; ?>