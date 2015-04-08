<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4><?php _e( 'Blog', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Post', 'nill' ); ?></span></h4>
            </div>
        </div>
    </div>
</div>

<!-- Nill Track Player -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <!-- Nill Title -->
        <div class="col-md-12">
            <div class="nill-singletitle">
                <h1><?php echo get_the_title(); ?></h1>
                <div class="nill-singledate">
                    <ul>
                        <li><i class="fa fa-clock-o"></i> <?php the_date(); ?></li>
                    </ul>
                </div>
            </div>
            <?php if ( has_post_thumbnail() ) : ?>
            <div class="clearfix nill-spaceone"></div>
            <?php else: ?>
            <div class="clearfix"></div>
            <?php endif; ?>
        </div>
        
        <?php if ( has_post_thumbnail() ) : ?>
        <!-- Nill Thumb --> 
        <div class="col-md-12">  
            <div class="nill-postimage">
                <div class="nill-postinner">
                    <span class="nill-postinnerimgtwo">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'nill-thumbxl' ); ?>
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                        <?php endif; ?>
                    </span>
                </div>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        <?php endif; ?>
        
    </div>
</div>

<div class="clearfix"></div>

<!-- Nill Post Detail -->
<div class="container-fluid nill-padone nill-padheight">
    <div class="row">

        <!-- Nill Post Left -->
        <div class="col-md-12">
            <div class="nill-postdetailtitle">
                <h4><?php _e( 'Post', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Detail', 'nill' ); ?></span></h4>
            </div>
            
            <div class="clearfix"></div>
            
            <div class="nill-postdetail">
                <?php
                    the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'nill' ) );
                    wp_link_pages();
                ?>
                <div class="clearfix"></div>
            </div>
            
            <div class="clearfix"></div>
            
        </div>
    
    </div>
</div>

<div class="clearfix"></div>


<?php if ( ! comments_open() ) : ?>
<?php else : ?>
<!-- Nill Post Detail -->
<div class="container-fluid nill-padone nill-backgrey nill-padheightthree">
    <div class="row">

        <?php	if ( comments_open() || get_comments_number() ) {
            comments_template();
        } ?>
        
    </div>
</div>
<?php endif; ?>