<?php
get_header(); ?>
 
<!-- Nill Plugin Check -->
<?php if ( ! class_exists( 'Acf' ) ) : ?>
<?php include_once( 'page-templates/np-archive.php'); ?>
<?php else: ?>

<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4><?php _e( 'Shop', 'nill' ); ?> <span class="nill-pageheadertitletwo"><?php _e( 'Page', 'nill' ); ?></span></h4>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">

        <div class="col-md-8">
           <?php woocommerce_content(); ?>
        </div>
                
        <div class="col-md-4">
            <?php dynamic_sidebar( 'sidebar-5' ); ?>
        </div>
                
        <div class="clearfix"></div>
                
    </div>
</div>

<?php endif; ?>
<?php
get_footer();