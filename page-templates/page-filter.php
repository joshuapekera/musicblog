<?php
/**
 * Template Name: Filterable Page Builder
 *
 * @package WordPress
 * @subpackage NillNews
 * @since Nillnews 1.0
 */

get_header(); ?>

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

<?php
$nill_filterlay = get_field('nill_filterselgrid');
$nill_sliderhomepost = get_field('nill_filtercat');
$nill_sliderhomeposts = implode(',',$nill_sliderhomepost);
$nill_sliderhomeshow = get_field('nill_filterableshows');
?>

<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <!-- Filter Buttons -->
        <div class="col-md-12">
            <div class="controls">
                <button class="filter btn btn-inverse" data-filter="all">All</button>

                <?php if( have_rows('nill_filterstab') ): ?>
                <?php while ( have_rows('nill_filterstab') ) : the_row(); ?>
                <button class="filter btn btn-inverse" data-filter=".<?php esc_html(the_sub_field('nill_filtername')); ?>"><?php esc_html(the_sub_field('nill_filtername')); ?></button>
                <?php endwhile; ?>
                <?php else : ?>
                <?php endif; ?> 

                <button class="sort btn btn-inverse" data-sort="myorder:asc"><i class="fa fa-sort-alpha-asc"></i></button>
                <button class="sort btn btn-inverse" data-sort="myorder:desc"><i class="fa fa-sort-alpha-desc"></i></button>
            </div>
        </div>
        
        <div class="clearfix"></div>
        
        
        <div id="Container" class="nill-related">
        <?php if (have_posts()) : ?>
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=$nill_sliderhomeposts&showposts=$nill_sliderhomeshow&somecat&paged=$paged"); ?>
        <?php while (have_posts()) : the_post(); ?>
        <?php
        $nillplay_postfilters = get_field('nill_filtername');
        ?>

            <div class="nill-bloggogrid col-xs-12 col-sm-12 col-md-<?php echo esc_html($nill_filterlay); ?> mix <?php echo esc_html($nillplay_postfilters); ?>" data-myorder="<?php the_titlesmall('', '', true, 50 ) ?>" style="margin-bottom:30px;">

                <div class="row">

                    <!-- Nill Blog Image -->
                    <div class="col-md-12">

                        <div class="nill-gridimage">

                            <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/images/space.png" />
                            <?php endif; ?>
                            
                            <div class="nill-bloggridgdate">
                                <div class="nill-bloogdategrid">
                                    <div class="nill-bloogdatepadgrid">
                                        <div class="nill-dateone"><?php echo get_the_time('d', $post->ID); ?></div>
                                        <div class="nill-datetwo"><?php echo get_the_time('M', $post->ID); ?></div>
                                    </div>
                                </div>
                            </div>


                            

                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="nill-gridtext">
                            <span class="nill-postspantext">
                                <h6>
                                    <a href="<?php the_permalink() ?>"><?php echo get_the_title(); ?></a>
                                </h6>
                            </span>

                            <span class="hidden-md nill-postdetailfavtwo">
                                <ul>
                                    <li><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></li>
                                    <li><i class="fa fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?></li>
                                </ul>
                            </span>
                            
                            <div class="clearfix"></div>
                        </div>
                    </div>


                </div>

            </div>

        <?php  endwhile; ?>
        
        <div class="col-md-12">
            <div class="nill-pagenavi">
                <div class="pagination nill-navi">
                    <?php if ( function_exists( 'page_navi' ) ) page_navi( 'items=5&first_label=First&last_label=Last&show_num=1&num_position=after' ); ?>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

        <div class="clearfix"></div>

        <?php endif; ?>
        </div>

        <script>
            $(function() {
                $('#Container').mixItUp();
            });
        </script>
        
        <div class="clearfix"></div>
        
    </div>
</div>

<?php endif; ?>

<?php
get_footer();
?>