<div class="row">
    
    <?php $images = get_field('nill_postgallery'); if( $images ): ?>
    <?php foreach( $images as $image ): ?>
    <div class="col-xs-4">
        <div class="nill-postgalleries">
            <a class="fancybox" rel="group" title="<?php echo esc_html($image['title']); ?>" href="<?php echo esc_url($image['url']); ?>">
                <img src="<?php echo esc_url($image['sizes']['nill-thumbmedium']); ?>" alt="" />
                <div class="nill-galleryicons">
                    <i class="fa fa-plus"></i>
                </div>
            </a>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
    
</div>