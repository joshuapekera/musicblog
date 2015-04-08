<!-- Nill Page Title -->
<div class="container-fluid nill-padone">
    <div class="row">
        <div class="col-md-12 text-center">
            <div class="nill-pageheadertitle">
                <h4>
                    <?php
                        if ( is_day() ) :
                            printf( __( 'Daily Archives: %s', 'nill' ), get_the_date() );

                        elseif ( is_month() ) :
                            printf( __( 'Monthly Archives: %s', 'nill' ), get_the_date( _x( 'F', 'monthly archives date format', 'nill' ) ) );

                        elseif ( is_year() ) :
                            printf( __( 'Yearly Archives: %s', 'nill' ), get_the_date( _x( 'Y', 'yearly archives date format', 'nill' ) ) );

                        else :
                            _e( 'Archives', 'nill' );

                        endif;
                    ?>
                </h4>
            </div>
        </div>
    </div>
</div>

<!-- Nill Blog Loop -->
<div class="container-fluid nill-padone nill-backgrey nill-padheight">
    <div class="row">
        
        <div class="col-md-8">
            
            <div class="row">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

            <div class="col-md-12 nill-bloggogrid" style="margin-bottom:30px;">

                <div class="row">

                    <!-- Nill Blog Image -->
                    <div class="col-md-12">

                        <div class="nill-gridimage">

                            <?php if ( has_post_thumbnail() ) : ?>
                            <?php the_post_thumbnail( 'nill-thumbmedium' ); ?>
                            <?php else: ?>
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

                            <span class="nill-postdetailfav">
                                <ul>
                                    <li><?php if( function_exists('zilla_likes') ) zilla_likes(); ?></li>
                                    <li><i class="fa fa-comments"></i> <?php comments_number( '0', '1', '%' ); ?></li>
                                </ul>
                            </span>

                            <div class="clearfix"></div>

                            <div class="nill-readdetail" style="margin-bottom:-40px;">
                                <p>
                                    <?php
                                    if (is_sticky()) {
                                      global $more; 
                                      $more = 1;
                                      the_content();
                                    } else {
                                      global $more;
                                      $more = 0;
                                      the_content('Read More &rarr;');
                                    }
                                    ?>
                                </p>
                            </div>
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
            <?php else : 
            get_template_part( 'content', 'none' ); ?>
            <?php endif; ?>
            <?php wp_reset_query(); ?>
            </div>
            
        </div>
                
        <div class="col-md-4">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </div>
                
        <div class="clearfix"></div>
                
    </div>
</div>