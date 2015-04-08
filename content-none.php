<?php
/**
 * The template for displaying a "No posts found" message
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */
?>

<div class="col-md-12">
    
    <div class="nill-nopage">
        
        <h1><?php _e( 'Nothing Found', 'nill' ); ?></h1>

        <?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

        <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'nill' ), admin_url( 'post-new.php' ) ); ?></p>

        <?php elseif ( is_search() ) : ?>

        <p><?php _e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'nill' ); ?></p>

        <?php else : ?>

        <p><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'nill' ); ?></p>

        <?php endif; ?>
        
    </div>
    
</div>
