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
 * @see nillbox_custom_header_setup().
 *
 */

?>
<?php if( get_field('nill_googlecode', 'option')) : ?>
<!-- Google Code -->
<?php the_field('nill_googlecode' , 'option'); ?>
<!-- End -->
<?php endif; ?>