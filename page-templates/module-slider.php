<!-- Module Slider -->
<div id="component" class="component component-fullwidth <?php echo esc_html(the_sub_field('nill_modsliderefx')); ?>">
    <ul class="itemwrap">
        
        <?php if( have_rows('nill_addslide') ): ?>
        <?php while ( have_rows('nill_addslide') ) : the_row(); ?>
        
        <li <?php if (get_sub_field('nill_currentslide') == "true"): ?> class="current" <?php endif ?> style="background-image: url(<?php esc_url(the_sub_field('nill_sliderimage')); ?>);" >
            
            <div class="nill-slidertitle">
                <!-- Slider Icons -->
                <div class="nill-slidericon">
                    <i class="fa <?php esc_html(the_sub_field('nill_slidericons')); ?>"></i>
                </div>
                
                <!-- Slider Title -->
                <h1>
                    <a href="<?php esc_url(the_sub_field('nill_sliderlink')); ?>">
                        <?php esc_html(the_sub_field('nill_slidertitle')); ?>
                    </a>
                </h1>
            </div>
            
            <!-- Slider Image -->
            <img src="<?php esc_url(the_sub_field('nill_sliderimage')); ?>" alt="Slider" />
        </li>
        
        <?php endwhile; ?>
        <?php else : ?>
        <?php endif; ?> 
        
    </ul>
    <nav>
        <a class="prev" href="#"><i class="fa fa-angle-left"></i></a>
        <a class="next" href="#"><i class="fa fa-angle-right"></i></a>
    </nav>
</div>
    
<div class="clearfix"></div>


<?php wp_reset_postdata(); ?>
<?php wp_reset_query(); ?>