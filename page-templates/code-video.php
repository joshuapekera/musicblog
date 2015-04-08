<div class="nill-postvideopanel">
  
    <?php if (get_field('nill_postvidselchannell') == "upload"): ?>
    <div class="nill-framevideos">
        <video id="videostop" controls class="nill-videompeg">
          <source src="<?php echo esc_url(the_field('nill_trackyouruploadvid')); ?>" type="video/mp4">
          <source src="<?php echo esc_url(the_field('nill_trackyouruploadogg')); ?>" type="video/ogg">
            <?php _e( 'Your browser does not support the video tag.', 'nill' ); ?>
        </video>
    </div>
    <?php endif; ?>

    <?php if (get_field('nill_postvidselchannell') == "youtube"): ?>
    <div class="nill-framevideos">
        <iframe src="http://www.youtube.com/embed/<?php esc_html(the_field('nill_youtube')); ?>" class="nill-postvideo"></iframe>
    </div>
    <?php endif; ?>
        
    <?php if (get_field('nill_postvidselchannell') == "vimeo"): ?>
    <div class="nill-framevideos">
        <iframe src="http://player.vimeo.com/video/<?php esc_html(the_field('nill_vimeo')); ?>?title=0&amp;byline=0&amp;portrait=0" class="nill-postvideo"></iframe>
    </div>
    <?php endif; ?>
        
    <?php if (get_field('nill_postvidselchannell') == "custom"): ?>
    <div class="nill-framevideos">
    <?php echo esc_html(the_field('nill_custom')); ?>
    </div>
    <?php endif; ?>

</div>