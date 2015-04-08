<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */
?>
    
<?php if ( ! class_exists( 'Acf' ) ) : ?>
        <!-- Nill Footer -->
            <div class="container-fluid nill-padone nill-backblack nill-padheightfour">
                <div class="row">
                
                    <div class="col-md-4">
                        <div class="nill-footerreg">
                            Nilltheme.net / 2014
                        </div>
                    </div>
                
                </div>
            </div>
            <div class="clearfix"></div>
            
        </div><!-- /st-content -->
    </div><!-- /st-pusher -->
</div><!-- /st-container -->
<?php else: ?>
            <?php if (get_field('nill_footnewsletter' , 'option') == "true"): ?>
            <!-- Nill Newsletter Widget -->
            <div class="container-fluid nill-padone nill-backmain nill-padheighttwo">
                <div class="row">
                    <div class="col-md-4 text-center">
                    </div>
                    
                    <div class="col-md-4 text-center">
                        <div class="nill-footernews">
                            <?php dynamic_sidebar( 'sidebar-3' ); ?>
                        </div>
                    </div>
                    
                    <div class="col-md-4 text-center">
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <?php endif; ?>
            
            <?php if (get_field('nill_footerbar' , 'option') == "true"): ?>
            <!-- Nill Footer -->
            <div class="container-fluid nill-padone nill-backblack nill-padheightfour">
                <div class="row">
                
                    <div class="col-md-4">
                        <div class="nill-footerreg">
                            <?php echo esc_html(the_field('nill_footerregistertext' , 'option')); ?>
                        </div>
                    </div>
                    
                    <div class="col-md-8 text-right">
                        
                        <?php if( have_rows('nill_footericons' , 'option') ): ?>
                        <div class="nill-footersocial">
                            <ul>
                                <?php while ( have_rows('nill_footericons' , 'option') ) : the_row(); ?>
                                <li>
                                    <a href="<?php echo esc_url(the_sub_field('add_icon_link')); ?>">
                                        <i class="fa <?php echo esc_html(the_sub_field('add_fa_icons')); ?>"></i>
                                    </a>
                                </li>
                                <?php endwhile; ?>
                                
                            </ul>
                        </div>
                        <?php endif; ?>
                        
                    </div>
                
                </div>
            </div>
            <div class="clearfix"></div>
            <?php endif; ?>
            
        </div><!-- /st-content -->
    </div><!-- /st-pusher -->
</div><!-- /st-container -->
<?php endif; ?>

<?php if ( ! class_exists( 'Acf' ) ) : ?>
<?php else: ?>

<?php require get_template_directory() . '/inc/theme-css.php'; ?>
<?php require get_template_directory() . '/inc/theme-custom-css.php'; ?>
<?php require get_template_directory() . '/inc/theme-google.php'; ?>

<?php endif; ?>

<?php wp_footer(); ?>
</body>
</html>