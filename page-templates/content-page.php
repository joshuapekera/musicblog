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

<?php if ( has_post_thumbnail() ) : ?>
<!-- Nill Track Player -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <!-- Nill Thumb --> 
        <div class="col-md-12">  
            <div class="nill-postimage">
                <div class="nill-postinner">
                    <span class="nill-postinnerimg">
                        <?php if ( has_post_thumbnail() ) : ?>
                        <?php the_post_thumbnail( 'nill-thumbxl' ); ?>
                        <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                        <?php endif; ?>
                    </span>
                    <div id="component" class="component component-small <?php echo esc_html(the_field('nill_picturestyles' , 'option')); ?>">
                        <ul class="itemwrap">
                            <li class="current">
                                <?php if ( has_post_thumbnail() ) : ?>
                                <?php the_post_thumbnail( 'nill-thumbxl' ); ?>
                                <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                                <?php endif; ?>
                            </li>
                            
                            <?php $images = get_field('nill_albumsinpicslider'); if( $images ): ?>
                            <?php foreach( $images as $image ): ?>
                            <li><img src="<?php echo esc_url($image['sizes']['nill-thumbxl']); ?>" alt="" /></li>
                            <?php endforeach; ?>
                            <?php wp_enqueue_script ( 'nill-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), null,true  ); ?>
                            <?php endif; ?>
                        </ul>
                        <?php $images = get_field('nill_albumsinpicslider'); if( $images ): ?>
                        <nav>
                            <a class="prev" href="#"><i class="fa fa-angle-left"></i></a>
                            <a class="next" href="#"><i class="fa fa-angle-right"></i></a>
                        </nav>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        
    </div>
</div>

<div class="clearfix" style="margin-bottom:-30px;"></div>

<?php else: ?>

<div class="clearfix" style="margin-bottom:-120px;"></div>

<?php endif; ?>

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
            </div>
            
            <div class="clearfix" style="margin-bottom:-25px;"></div>
            
        </div>
    
    </div>
</div>

<div class="clearfix"></div>

<?php if ( ! comments_open() ) : ?>
<?php else : ?>
<!-- Nill Post Detail -->
<div class="container-fluid nill-padone nill-padheightthree">
    <div class="row">

        <?php	if ( comments_open() || get_comments_number() ) {
            comments_template();
        } ?>
        
    </div>
</div>
<?php endif; ?>
<?php endif; ?>