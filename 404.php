<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */

get_header(); ?>

<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4><?php _e( 'Not Found', 'nill' ); ?></h4>
            </div>
        </div>
    </div>
</div>

<!-- Nill Loop -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        <div class="col-md-12">

            <div class="nill-notfound">
                <h6><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'nill' ); ?></h6>
            </div>

        </div>
    </div>
</div>

<div class="clearfix"></div>

<?php
get_footer();
