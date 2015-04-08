<?php
/**
 * The template for displaying Comments
 *
 * The area of the page that contains comments and the comment form.
 *
 * @package WordPress
 * @subpackage nillplay
 * @since nillplay Corporate 1.0
 */

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

    <div class="play-comment-bigtitle">
        <h3>
            <?php _e( 'Leave', 'nill' ); ?>
            <span class="play-comment-bigtitle-pink"><?php _e( 'Comment', 'nill' ); ?></span>
        </h3>
        <p><?php printf( _n( '%1$s', '%1$s', get_comments_number(), 'nill' ), number_format_i18n( get_comments_number() ), get_the_title() ); ?> Comments

            <?php if ( ! comments_open() ) : ?>
                / <?php _e( 'Comments are closed.', 'nill' ); ?>
            <?php endif; ?> 
        </p>
    </div>

    <div class="play-comments-list">
        <ul class="media-list">
            <?php wp_list_comments('type=comment&callback=nill_comment'); ?>    
        </ul>
    </div>

    <?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text"><?php _e( 'Comment navigation', 'nill' ); ?></h1>
        <div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'nill' ) ); ?></div>
        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'nill' ) ); ?></div>
    </nav><!-- #comment-nav-above -->
    <?php endif; // Check for comment navigation. ?> 

</div>



<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
    <?php if ('open' == $post->comment_status) : ?>
    <div class="play-comment-bigtitle">
        <h3>
            <?php _e( 'Leave', 'nill' ); ?>
            <span class="play-comment-bigtitle-pink"><?php comment_form_title( 'Reply', 'Reply to %s' ); ?></span>
        </h3>
        <p>
            <?php cancel_comment_reply_link(); ?>
            <?php if ( get_option('comment_registration') && !$user_ID ) : ?>
                You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.
            <?php else : ?>
                <?php if ( $user_ID ) : ?>
                Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a>
                <?php else : ?>
                <?php _e( 'Do you want to write something?', 'nill' ); ?>
                <?php endif; ?> 

        </p>
    </div>

    <div class="row">

    <div class="comment-forms">
        <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
        <?php if ( $user_ID ) : ?>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">	        	
                <textarea  name="comment" id="comment" tabindex="4" rows="8" placeholder="Add comment..." class="form-control"></textarea>   	
            </div>
            <div class="form-group">	        	
                <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="btn btn-primary play-comment-button" />	
            </div>
        </div>

        <div class="clearfix" style="margin-bottom:12px;"></div>               

        <?php else : ?>

        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">	        	
                <div class="input-group input-group">	            
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>	            
                    <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" class="form-control" placeholder="Name: <?php if ($req) echo "(required)"; ?>">	          
                </div>      	
            </div>

            <div class="form-group">	        	
                <div class="input-group input-group">	            
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>	            
                    <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" class="form-control"  placeholder="Mail (will not be published) <?php if ($req) echo "(required)"; ?>">	          
                </div>       	
            </div>

            <div class="form-group">	        	
                <div class="input-group input-group">	            
                    <span class="input-group-addon"><i class="fa fa-link"></i></span>	            
                    <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" class="form-control" placeholder="Website:">	          
                </div>       	
            </div>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">	        	
                <textarea  name="comment" id="comment" tabindex="4" rows="8" placeholder="Add comment..." class="form-control"></textarea>   	
            </div>
            <div class="form-group">	        	
                <input name="submit" type="submit" id="submit" tabindex="5" value="Submit Comment" class="btn btn-primary play-comment-button" />	
            </div>
        </div>

        <div class="clearfix" style="margin-bottom:12px;"></div>

        <?php endif; ?>                                            


        <?php comment_id_fields(); ?>
        <?php do_action('comment_form', $post->ID); ?>
        </form> 

    </div>  
    </div>

    <?php endif; // If registration required and not logged in ?>
    <?php endif; // if you delete this the sky will fall on your head ?>
</div>