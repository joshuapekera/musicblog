<style type="text/css">
    <?php if (get_field('nill_colorone', 'option')): ?> 
    /* Theme Background Color Default: #FFF */
    body,
    html,
    .st-content {
        background: <?php the_field('nill_colorone', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colortwo', 'option')): ?> 
    /* Theme Main Color Default: #81c9ad */
    a,
    .nill-loopblog:hover .nill-postdetailtitle a,
    #wp-calendar caption {
        color: <?php the_field('nill_colortwo', 'option'); ?>;
    }
    
    .audiojs .progress,
    .btnt-player ol li a.active,
    .md-content button,
    .btn-primary,
    .btn-default:hover,
    .nill-backmain,
    .nill-bloogdatetwo,
    .nill-navi ul li a:hover,
    .tagcloud a:hover,
    .widget_mc4wp_widget .nill-widgettitle,
    .btn-inverse:hover,
    .nill-slidertitle h1 a:hover,
    .nill-slidericon .fa,
    .nill-morebutton .fa,
    .btn-home:hover,
    .nillsidetabs li.active a,
    .main-nav li a:hover {
        background: <?php the_field('nill_colortwo', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colorthree', 'option')): ?> 
    /* Theme Main Hover Color Default: #73af98 */
    a:hover,
    .nill-singledate ul li a:hover,
    .audiojs .time strong,
    .nill-footersocial ul li a:hover,
    .nill-postdetailtitle a:hover,
    .nill-postdetailcategory ul li a:hover,
    .nill-gridtext h6 a:hover {
        color: <?php the_field('nill_colorthree', 'option'); ?>;
    }
    .md-content button:hover,
    .btn-primary:hover,
    .btn-default,
    .nill-singletags a:hover,
    .nill-relatedposttitletwo h6 a:hover,
    .nill-rellist:hover .nill-relatedposttitletwo h6 a,
    .mc4wp-form input[type="text"],
    .mc4wp-form input[type="email"],
    .nill-bloogdatepadtwo,
    .nill-navi ul li.current,
    .btn.active,
    .nill-sidesearch input:focus, 
    .nill-sidesearch textarea:focus,
    .nillsidetabs li a:hover,
    .main-nav a.parent-expanded,
    .nillsidetabs,
    .nillsidetabs li {
        background: <?php the_field('nill_colorthree', 'option'); ?>;
    }
    .form-control:focus {
        border-color: <?php the_field('nill_colorthree', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colorfour', 'option')): ?> 
    /* Theme P Color Default: #757575  */
    body,
    html,
    p,
    .btnt-player ol li a,
    .nill-likeit a,
    .nill-likeit a:hover {
        color: <?php the_field('nill_colorfour', 'option'); ?> ;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colorfive', 'option')): ?> 
    /* Theme H Color Default: #252525 */
    h1,
    h2,
    h3 {
        color: <?php the_field('nill_colorfive', 'option'); ?>;
    }
    <?php endif; ?>

    <?php if (get_field('nill_colorsix', 'option')): ?> 
    /* Theme H Color Default: #353535 */
    h4,
    h5,
    h6,
    .nill-downloadicon,
    .nill-postdetailtitle a {
        color: <?php the_field('nill_colorsix', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colorseven', 'option')): ?>
    /* Theme Dark Color Default: #555555 */
    .nill-relatedposttitletwo h6 a,
    .nill-postdetailcategory ul li a,
    .nill-gridtext h6 a,
    .photostack figcaption h2 {
        color: <?php the_field('nill_colorseven', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_coloreight', 'option')): ?>
    /* Theme Light Color #FFF */
    .btnt-player ol li.playing a,
    .btnt-player ol li a:hover,
    .pause,
    .btnt-player ol li a.active,
    .md-content h3,
    .nill-track-button button:hover,
    .tooltip,
    .md-content button,
    .nill-downloadinfo code,
    .btn-primary,
    .btnt-player .btn-primary,
    .btn-default,
    .btn-default:hover,
    .component nav a,
    .nill-singletags a:hover,
    .nill-pageheadertitlerel h4,
    .nill-pageheadertitletworel,
    .nill-relatedposttitletwo h6 a:hover,
    .nill-rellist:hover .nill-relatedposttitletwo h6 a,
    .mc4wp-form input:focus,
    .nill-footernews h1,
    .mc4wp-form input[type="submit"],
    .mc4wp-form input[type="submit"]:hover,
    .nill-footerreg,
    .nill-footersocial ul li a,
    .nill-event-countdown-list ul li,
    .nill-postgalleries a,
    .nill-quotepost h1,
    .nill-dateone,
    .nill-blogicons,
    .nill-navi ul li a,
    .nill-navi ul li a:hover,
    .nill-navi ul li.current,
    .nill-navi ul li.page_nums,
    .nill-widgettitle h1,
    .nill-widgettitle h1 a,
    .tagcloud a:hover,
    .btn-inverse,
    .btn-inverse:hover,
    .btn.active,
    .nill-filtericons,
    .nill-iconfilter,
    .nill-slidertitle h1 a,
    .nill-slidertitle h1 a:hover,
    .btn-home:hover,
    .nill-mixedtitle h4,
    .nill-sidesearch input:focus, 
    .nill-sidesearch textarea:focus,
    .nillsidetabs li.active a,
    .nillsidetabs li a,
    .main-nav a.parent-expanded,
    .main-nav a:hover {
        color: <?php the_field('nill_coloreight', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colornine', 'option')): ?>
    /* Theme Grey Color #AAA  */
    .nill-singledate ul li,
    .nill-singledate ul li a,
    .play,
    .audiojs .time,
    .nill-track-button button,
    .nill-singletags a,
    .play-comment-bigtitle p,
    .nill-quotepost p,
    .nill-postdetailcategory ul li,
    .nill-postdetailfav ul li a,
    .nill-postdetailfav ul li,
    .tagcloud a,
    .nill-buttonicons,
    .main-nav a {
        color: <?php the_field('nill_colornine', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colorten', 'option')): ?>
    /* Light #f5f5f5 */
    .nill-backgrey,
    .btnt-player ol li:before,
    .nill-track-button button,
    .nill-singletags a,
    .widget_search input[type="search"],
    .tagcloud a {
        background-color: <?php the_field('nill_colorten', 'option'); ?>;
    }
    
    .nill-postlike,
    .media-body,
    .nill-postdetailtitle,
    .widget ul li,
    #wp-calendar caption {
        border-color: <?php the_field('nill_colorten', 'option'); ?>;
    }
    <?php endif; ?>

    <?php if (get_field('nill_coloreleven', 'option')): ?>
    /* Light #fbfbfb */
    .md-content,
    .md-show.md-effect-12 ~ .md-overlay,
    .container,
    .nill-relatedposttitletwo a,
    .nill-blooglist,
    .nill-gridtext,
    .widget,
    .btn-home {
        background: <?php the_field('nill_coloreleven', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_colordone', 'option')): ?>
    /* Dark Background #151515 */
    .st-menu {
        background-color: <?php the_field('nill_colordone', 'option'); ?>;
    }
    <?php endif; ?>

    <?php if (get_field('nill_colordtwo', 'option')): ?>
    /* Dark Background #252525 */
    .md-overlay,
    .md-content h3,
    .nill-backblack,
    .mc4wp-form input[type="submit"]:hover,
    .nill-event-countdown-list ul li,
    .nill-quotefull,
    .nill-bloogdatepad,
    .nill-bloogdatepadgrid,
    .nill-widgettitle,
    .btn-inverse,
    .nill-filtericons,
    .component-fullwidth,
    .component nav a .fa,
    .nill-slidertitle h1 a,
    .photostack,
    .main-nav,
    .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active {
        background-color: <?php the_field('nill_colordtwo', 'option'); ?>;
    }
    .nillsidetabs li,
    .woocommerce #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li.active, .woocommerce-page div.product .woocommerce-tabs ul.tabs li.active {
        border-color: <?php the_field('nill_colordtwo', 'option'); ?>;
    }
    <?php endif; ?>

    <?php if (get_field('nill_colordthree', 'option')): ?>
    /* Dark Background #353535 */
    .audiojs .scrubber,
    .btnt-player ol li a:hover,
    .nill-track-button button:hover,
    .tooltip,
    .nill-downloadinfo code,
    .progress-bar,
    .mc4wp-form input:focus,
    .mc4wp-form input[type="submit"],
    .nill-galleryicons .fa,
    .nill-bloogdate,
    .nill-navi ul li a,
    .nill-navi ul li.page_nums,
    .nill-bloogdategrid,
    .component nav a .fa:hover,
    .nill-sidesearch input, .nill-sidesearch textarea {
        background-color: <?php the_field('nill_colordthree', 'option'); ?>;
    }
    .media-avatar-body img,
    .nill-event-countdown-list ul li,
    .nill-galleryicons {
        border-color: <?php the_field('nill_colordthree', 'option'); ?>;
    }
    <?php endif; ?>
    
    <?php if (get_field('nill_styleimportfonefam', 'option')): ?> 
    <?php the_field('nill_styleimportfone', 'option'); ?>
    body,
    html,
    p {
        <?php the_field('nill_styleimportfonefam', 'option'); ?>
    }
    <?php endif; ?>

    <?php if (get_field('nill_styleimportftwofam', 'option')): ?> 
    <?php the_field('nill_styleimportftwo', 'option'); ?>
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        <?php the_field('nill_styleimportftwofam', 'option'); ?>
    }
    <?php endif; ?>
</style>