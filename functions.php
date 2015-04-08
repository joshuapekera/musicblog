<?php

// Nillplay - Admin Options Panel
define( 'ACF_LITE', true );

// Nillplay - Admin Options General
include_once('inc/theme-admin.php');

/**********************************************************************
*
* Set up JS and CSS Enqueque Script
* @Nill
*
***********************************************************************/
function nill_head() { 
    if( !is_admin())
	{
    wp_enqueue_script('jquery');
    if ( ! class_exists( 'Acf' ) ) :
    else:
    if (get_field('nill_appload' , 'option') == "true"):
    wp_enqueue_script ( 'nill-ajaxload', get_template_directory_uri() . '/js/pace.min.js', array('jquery'), null,false  );
    endif;
    endif;
    wp_enqueue_script ( 'nill-thememain', get_template_directory_uri() . '/js/photosliders.min.js', array('jquery'), null,false  );
    wp_enqueue_script ( 'nill-bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), null,true  );
    wp_enqueue_script ( 'nill-theme', get_template_directory_uri() . '/js/theme.js', array('jquery'), null,false  );
    wp_enqueue_script ( 'nill-theme-two', get_template_directory_uri() . '/js/themetwo.js', array('jquery'), null,true  );
    wp_enqueue_script ( 'nill-googlemap', 'https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false', array('jquery'), null,true  );
    wp_enqueue_script ( 'nill-modernizr', get_template_directory_uri() . '/js/modernizr.custom.js', array('jquery'), null,false  );
    wp_enqueue_script ( 'nill-classie', get_template_directory_uri() . '/js/classie.js', array('jquery'), null,true  );
    wp_enqueue_script ( 'nill-sidebar', get_template_directory_uri() . '/js/sidebarEffects.js', array('jquery'), null,true  );
    wp_enqueue_script ( 'nill-modalbox', get_template_directory_uri() . '/js/modalEffects.js', array('jquery'), null,true  );
    
    if ( has_post_format( 'Audio' )) {
    wp_enqueue_script ( 'nill-audiomin', get_template_directory_uri() . '/js/audio.min.js', array('jquery'), null,true  );
    }
    wp_enqueue_script ( 'nill-fancy', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), null,true  );
    
    if ( is_page_template('page-templates/page-filter.php') ) {
    wp_enqueue_script ( 'nill-mixitup', get_template_directory_uri() . '/js/jquery.mixitup.js', array('jquery'), null,true  );
    }

    wp_enqueue_style ( 'nill-bootstrapcss', get_template_directory_uri() . '/css/bootstrap.min.css' );
    wp_enqueue_style ( 'nill-fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css' );
    wp_enqueue_style ( 'nill-fancycss', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css' );
    wp_enqueue_style ( 'nill-themecss', get_template_directory_uri() . '/css/theme.css' );
    wp_enqueue_style ( 'nill-colorcss', get_template_directory_uri() . '/css/color.css' );
    }

}
add_action( 'wp_enqueue_scripts', 'nill_head' );

/**********************************************************************
*
* Theme After Install Setup
* @Nill
*
***********************************************************************/

// Theme Setup
if ( ! isset( $content_width ) ) {
	$content_width = 474;
}

if ( version_compare( $GLOBALS['wp_version'], '3.6', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}

if ( ! function_exists( 'nill_setup' ) ) :
function nill_setup() {

    // Woocommerce
    add_theme_support( 'woocommerce' );
    
    // Thumbnail Settings
    add_image_size( 'nill-thumbxl', 1500, 9999, array( 'center', 'center', true ) );
    add_image_size( 'nill-thumb', 600, 600, array( 'center', 'center', true ) );
    add_image_size( 'nill-thumbmedium', 350, 350, array( 'center', 'center' ) );
    add_image_size( 'nill-thumbsmall', 150, 150, array( 'center', 'center' ) );

	// Lang Setting
	load_theme_textdomain( 'nill', get_template_directory() . '/languages' );

	// This theme styles the visual editor to resemble the theme style.
	add_editor_style( array( 'css/editor-style.css', nill_font_url() ) );

	// Add RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// Enable support for Post Thumbnails, and declare two sizes.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 672, 372, true );
	add_image_size( 'nill-full-width', 1038, 576, true );

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary'   => __( 'Top primary menu', 'nill' ),
	) );

	// HTML 5
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );

	// Post Formats
	add_theme_support( 'post-formats', array(
		'aside', 'video', 'audio', 'quote', 'link', 'gallery', 'image',
	) );

	// This theme allows users to set a custom background.
	add_theme_support( 'custom-background', apply_filters( 'nill_custom_background_args', array(
		'default-color' => 'f5f5f5',
	) ) );

	// Add support for featured content.
	add_theme_support( 'featured-content', array(
		'featured_content_filter' => 'nill_get_featured_posts',
		'max_posts' => 6,
	) );

	// This theme uses its own gallery styles.
	add_filter( 'use_default_gallery_style', '__return_false' );
}
endif; // nill_setup
add_action( 'after_setup_theme', 'nill_setup' );
 
 /**********************************************************************
*
* Theme Image Attachment
* @Nill
*
***********************************************************************/
function nill_content_width() {
	if ( is_attachment() && wp_attachment_is_image() ) {
		$GLOBALS['content_width'] = 810;
	}
}
add_action( 'template_redirect', 'nill_content_width' );

 /**********************************************************************
*
* Theme Featured Post
* @Nill
*
***********************************************************************/
function nill_get_featured_posts() {
	return apply_filters( 'nill_get_featured_posts', array() );
}

function nill_has_featured_posts() {
	return ! is_paged() && (bool) nill_get_featured_posts();
}

/**********************************************************************
*
* Theme Widget Register
* @Nill
*
***********************************************************************/
function nill_widgets_init() {
	require get_template_directory() . '/inc/widgets.php';
	register_sidebar( array(
		'name'          => __( 'Main Widget', 'nill' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Main sidebar that appears on the blogpage column 1.', 'nill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="nill-widgettitle"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Blog Widget', 'nill' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Main sidebar that appears on the blog column 2.', 'nill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="nill-widgettitle"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Newsletter Footer Widget', 'nill' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Main sidebar that appears on the footer column 2.', 'nill' ),
		'before_widget' => '<aside id="%1$s" class="widgetnews %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="nill-widgettitle"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Sidebar Popup Widget', 'nill' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Main sidebar that appears on the sidebar column 2.', 'nill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="nill-widgettitle"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
	register_sidebar( array(
		'name'          => __( 'Shop Widget', 'nill' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Main sidebar that appears on the shop column 2.', 'nill' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<div class="nill-widgettitle"><h1 class="widget-title">',
		'after_title'   => '</h1></div>',
	) );
}
add_action( 'widgets_init', 'nill_widgets_init' );

/**********************************************************************
*
* Theme Lato Setup
* @Nill
*
***********************************************************************/
function nill_font_url() {
	$font_url = '';
	if ( 'off' !== _x( 'on', 'Lato font: on or off', 'nill' ) ) {
		$font_url = add_query_arg( 'family', urlencode( 'Lato:300,400,700,900,300italic,400italic,700italic' ), "//fonts.googleapis.com/css" );
	}
	return $font_url;
}

/**********************************************************************
*
* Theme WP Settings
* @Nill
*
***********************************************************************/
function nill_scripts() {
	wp_enqueue_style( 'nill-lato', nill_font_url(), array(), null );
	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.0.2' );
	wp_enqueue_style( 'nill-style', get_stylesheet_uri(), array( 'genericons' ) );
	wp_enqueue_style( 'nill-ie', get_template_directory_uri() . '/css/ie.css', array( 'nill-style', 'genericons' ), '20131205' );
	wp_style_add_data( 'nill-ie', 'conditional', 'lt IE 9' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'nill-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20130402' );
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		wp_enqueue_script( 'nill-slider', get_template_directory_uri() . '/js/slider.js', array( 'jquery' ), '20131205', true );
		wp_localize_script( 'nill-slider', 'featuredSliderDefaults', array(
			'prevText' => __( 'Previous', 'nill' ),
			'nextText' => __( 'Next', 'nill' )
		) );
	}

	wp_enqueue_script( 'nill-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20140319', true );
}
add_action( 'wp_enqueue_scripts', 'nill_scripts' );

/**********************************************************************
*
* Theme Google Fonts
* @Nill
*
***********************************************************************/
function nill_admin_fonts() {
	wp_enqueue_style( 'nill-lato', nill_font_url(), array(), null );
}
add_action( 'admin_print_scripts-appearance_page_custom-header', 'nill_admin_fonts' );

if ( ! function_exists( 'nill_the_attached_image' ) ) :

/**********************************************************************
*
* Theme Next Post Attachment
* @Nill
*
***********************************************************************/
function nill_the_attached_image() {
	$post                = get_post();
	$attachment_size     = apply_filters( 'nill_attachment_size', array( 810, 810 ) );
	$next_attachment_url = wp_get_attachment_url();
	$attachment_ids = get_posts( array(
		'post_parent'    => $post->post_parent,
		'fields'         => 'ids',
		'numberposts'    => -1,
		'post_status'    => 'inherit',
		'post_type'      => 'attachment',
		'post_mime_type' => 'image',
		'order'          => 'ASC',
		'orderby'        => 'menu_order ID',
	) );

	if ( count( $attachment_ids ) > 1 ) {
		foreach ( $attachment_ids as $attachment_id ) {
			if ( $attachment_id == $post->ID ) {
				$next_id = current( $attachment_ids );
				break;
			}
		}

		if ( $next_id ) {
			$next_attachment_url = get_attachment_link( $next_id );
		}

		else {
			$next_attachment_url = get_attachment_link( array_shift( $attachment_ids ) );
		}
	}

	printf( '<a href="%1$s" rel="attachment">%2$s</a>',
		esc_url( $next_attachment_url ),
		wp_get_attachment_image( $post->ID, $attachment_size )
	);
}
endif;

if ( ! function_exists( 'nill_list_authors' ) ) :
function nill_list_authors() {
	$contributor_ids = get_users( array(
		'fields'  => 'ID',
		'orderby' => 'post_count',
		'order'   => 'DESC',
		'who'     => 'authors',
	) );

	foreach ( $contributor_ids as $contributor_id ) :
		$post_count = count_user_posts( $contributor_id );

		if ( ! $post_count ) {
			continue;
		}
	?>

	<div class="contributor">
		<div class="contributor-info">
			<div class="contributor-avatar"><?php echo get_avatar( $contributor_id, 132 ); ?></div>
			<div class="contributor-summary">
				<h2 class="contributor-name"><?php echo get_the_author_meta( 'display_name', $contributor_id ); ?></h2>
				<p class="contributor-bio">
					<?php echo get_the_author_meta( 'description', $contributor_id ); ?>
				</p>
				<a class="button contributor-posts-link" href="<?php echo esc_url( get_author_posts_url( $contributor_id ) ); ?>">
					<?php printf( _n( '%d Article', '%d Articles', $post_count, 'nill' ), $post_count ); ?>
				</a>
			</div>
		</div>
	</div>

	<?php
	endforeach;
}
endif;

/**********************************************************************
*
* Theme Body Class
* @Nill
*
***********************************************************************/
function nill_body_classes( $classes ) {
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	if ( get_header_image() ) {
		$classes[] = 'header-image';
	} else {
		$classes[] = 'masthead-fixed';
	}

	if ( is_archive() || is_search() || is_home() ) {
		$classes[] = 'list-view';
	}

	if ( ( ! is_active_sidebar( 'sidebar-2' ) )
		|| is_page_template( 'page-templates/full-width.php' )
		|| is_page_template( 'page-templates/contributors.php' )
		|| is_attachment() ) {
		$classes[] = 'full-width';
	}

	if ( is_active_sidebar( 'sidebar-3' ) ) {
		$classes[] = 'footer-widgets';
	}

	if ( is_singular() && ! is_front_page() ) {
		$classes[] = 'singular';
	}

	if ( is_front_page() && 'slider' == get_theme_mod( 'featured_content_layout' ) ) {
		$classes[] = 'slider';
	} elseif ( is_front_page() ) {
		$classes[] = 'grid';
	}

	return $classes;
}
add_filter( 'body_class', 'nill_body_classes' );

 /**********************************************************************
*
* Theme Post Classes
* @Nill
*
***********************************************************************/
function nill_post_classes( $classes ) {
	if ( ! post_password_required() && ! is_attachment() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	}

	return $classes;
}
add_filter( 'post_class', 'nill_post_classes' );

/**********************************************************************
*
* Theme Site Title
* @Nill
*
***********************************************************************/
function nill_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}
	
	if ( $paged >= 2 || $page >= 2 ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'nill' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'nill_wp_title', 10, 2 );

/**********************************************************************
*
* @Nill - Admin Theme Settings
*
***********************************************************************/
// Admin Page Setting
function nill_options_page_settings( $settings )
{
    $settings['title'] = 'Nill Theme';
    $settings['pages'] = array('General Options' , 'Theme Style', 'Custom Code');
 
    return $settings;
}
add_filter('acf/options_page/settings', 'nill_options_page_settings');

/**********************************************************************
 *
 * Set up Nill Post & Page Setting
 *
 * @Nill - Limit
 *
 ***********************************************************************/
function content($num) {
$nill_theContent = get_the_content();
$output = preg_replace('/<img[^>]+./','', $nill_theContent);
$output = preg_replace( '/<blockquote>.*<\/blockquote>/', '', $output );
$output = preg_replace( '|\[(.+?)\](.+?\[/\\1\])?|s', '', $output );
$limit = $num+1;
$content = explode(' ', $output, $limit);
array_pop($content);
$content = implode(" ",$content)."...";
echo $content;
}

function the_titlesmall($before = '', $after = '', $echo = true, $length = false) { $title = get_the_title();
if ( $length && is_numeric($length) ) {
$title = substr( $title, 0, $length );
}
if ( strlen($title)> 0 ) {
$title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
if ( $echo )
    echo $title;
else
    return $title;
}
}

/**********************************************************************
*
* Set up Nill Tags Widget
*
* @Nill - Tags Widget
*
***********************************************************************/
add_filter('widget_tag_cloud_args','nill_set_cloud_tag_size');
function nill_set_cloud_tag_size($args) {
$args = array('smallest'    => 10, 'largest'    => 10);
return $args;
}

/**********************************************************************
*
* Set up Nill Theme Page Navi
*
* @Nill - Pagenavi
*
***********************************************************************/ 
class nill_prime_strategy_page_navi {
public function page_navi( $args = '' ) {
	global $wp_query;

	if ( ! ( is_archive() || is_home() || is_search() ) ) { return; }
	$default = array(
		'items'				=> 11,
		'edge_type'			=> 'none',
		'show_adjacent'		=> true,
		'prev_label'		=> '&lt;',
		'next_label'		=> '&gt;',
		'show_boundary'		=> true,
		'first_label'		=> '&laquo;',
		'last_label'		=> '&raquo;',
		'show_num'			=> false,
		'num_position'		=> 'before',
		'num_format'		=> '<span>%d/%d</span>',
		'echo'				=> true,
		'navi_element'		=> '',
		'elm_class'			=> 'page_navi',
		'elm_id'			=> '',
		'li_class'			=> '',
		'current_class'		=> 'current',
		'current_format'	=> '<span>%d</span>',
		'class_prefix'		=> '',
		'indent'			=> 0
	);
	$default = apply_filters( 'page_navi_default', $default );

	$args = wp_parse_args( $args, $default );

	$max_page_num = $wp_query->max_num_pages;
	$current_page_num = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

	$elm = in_array( $args['navi_element'], array( 'nav', 'div', '' ) ) ? $args['navi_element'] : 'div';
 
	$args['items'] = absint( $args['items'] ) ? absint( $args['items'] ) : $default['items'];
	$args['elm_id'] = is_array( $args['elm_id'] ) ? $default['elm_id'] : $args['elm_id'];
	$args['elm_id'] = preg_replace( '/[^\w_-]+/', '', $args['elm_id'] );
	$args['elm_id'] = preg_replace( '/^[\d_-]+/', '', $args['elm_id'] );
 
	$args['class_prefix'] = is_array( $args['class_prefix'] ) ? $default['class_prefix'] : $args['class_prefix'];
	$args['class_prefix'] = preg_replace( '/[^\w_-]+/', '', $args['class_prefix'] );
	$args['class_prefix'] = preg_replace( '/^[\d_-]+/', '', $args['class_prefix'] );
 
	$args['elm_class'] = $this->sanitize_attr_classes( $args['elm_class'], $args['class_prefix'] );
	$args['li_class'] = $this->sanitize_attr_classes( $args['li_class'], $args['class_prefix'] );
	$args['current_class'] = $this->sanitize_attr_classes( $args['current_class'], $args['class_prefix'] );
	$args['current_class'] = $args['current_class'] ? $args['current_class'] : $default['current_class'];
	$args['show_adjacent'] = $this->uniform_boolean( $args['show_adjacent'], $default['show_adjacent'] );
	$args['show_boundary'] = $this->uniform_boolean( $args['show_boundary'], $default['show_boundary'] );
	$args['show_num'] = $this->uniform_boolean( $args['show_num'], $default['show_num'] );
	$args['echo'] = $this->uniform_boolean( $args['echo'], $default['echo'] );

	$tabs = str_repeat( "\t", (int)$args['indent'] );
	$elm_tabs = '';

	$befores = $current_page_num - floor( ( $args['items'] - 1 ) / 2 );
	$afters = $current_page_num + ceil( ( $args['items'] - 1 ) / 2 );

	if ( $max_page_num <= $args['items'] ) {
		$start = 1;
		$end = $max_page_num;
	} elseif ( $befores <= 1 ) {
		$start = 1;
		$end = $args['items'];
	} elseif ( $afters >= $max_page_num ) {
		$start = $max_page_num - $args['items'] + 1;
		$end = $max_page_num;
	} else {
		$start = $befores;
		$end = $afters;
	}

	$elm_attrs = '';
	if ( $args['elm_id'] ) {
		$elm_attrs = ' id="' . $args['elm_id'] . '"';
	}
	if ( $args['elm_class'] ) {
		$elm_attrs .= ' class="' . $args['elm_class'] . '"';
	}

	$num_list_item = '';
	if ( $args['show_num'] ) {
		$num_list_item = '<li class="page_nums';
		if ( $args['li_class'] ) {
			$num_list_item .= ' ' . $args['li_class'];
		}
		$num_list_item .= '">' . sprintf( $args['num_format'], $current_page_num, $max_page_num ) . "</li>\n";
	}

	$page_navi = '';
	if ( $elm ) {
		$elm_tabs = "\t";
		$page_navi = $tabs . '<' . $elm;
		if ( $elm_attrs ) {
			$page_navi .= $elm_attrs . ">\n";
		}
	}

	$page_navi .= $elm_tabs . $tabs . '<ul';
	if ( ! $elm && $elm_attrs ) {
		$page_navi .= $elm_attrs;
	}
	$page_navi .= ">\n";

	if ($args['num_position'] != 'after' && $num_list_item ) {
		$page_navi .= "\t" . $elm_tabs . $tabs . $num_list_item;
	}
	if ( $args['show_boundary'] && ( $current_page_num != 1 || in_array( $args['edge_type'], array( 'span', 'link' ) ) ) ) {
		$page_navi .= "\t" . $elm_tabs . $tabs . '<li class="' . $args['class_prefix'] . 'first';
		if ( $args['li_class'] ) {
			$page_navi .= ' ' . $args['li_class'];
		}
		if ( $args['edge_type'] == 'span' && $current_page_num == 1 ) {
			$page_navi .= '"><span>' . esc_html( $args['first_label'] ) . '</span></li>' . "\n";
		} else {
			$page_navi .= '"><a href="' . get_pagenum_link() . '">' . esc_html( $args['first_label'] ) . '</a></li>' . "\n";
		}
	}

	if ( $args['show_adjacent'] && ( $current_page_num != 1 || in_array( $args['edge_type'], array( 'span', 'link' ) ) ) ) {
		$previous_num = max( 1, $current_page_num - 1 );
		$page_navi .= "\t" . $elm_tabs . $tabs . '<li class="' . $args['class_prefix'] . 'previous';
		if ( $args['li_class'] ) {
			$page_navi .= ' ' . $args['li_class'];
		}
		if ( $args['edge_type'] == 'span' && $current_page_num == 1 ) {
			$page_navi .= '"><span>' . esc_html( $args['prev_label'] ) . '</span></li>' . "\n";
		} else {
			$page_navi .= '"><a href="' . get_pagenum_link( $previous_num ) . '">' . esc_html( $args['prev_label'] ) . '</a></li>' . "\n";
		}
	}

	for ( $i = $start; $i <= $end; $i++ ) {
		$page_navi .= "\t" . $elm_tabs . $tabs . '<li class="';
		if ( $i == $current_page_num ) {
			$page_navi .= $args['current_class'];
			if ( $args['li_class'] ) {
				$page_navi .= ' ' . $args['li_class'];
			}
			$page_navi .= '">' . sprintf( $args['current_format'], $i ) . "</li>\n";
		} else {
			$delta = absint( $i - $current_page_num );
			$b_f = $i < $current_page_num ? 'before' : 'after';
			$page_navi .= $args['class_prefix'] . $b_f . ' ' . $args['class_prefix'] . 'delta-' . $delta;
			if ( $i == $start ) {
				$page_navi .= ' ' . $args['class_prefix'] . 'head';
			} elseif ( $i == $end ) {
				$page_navi .= ' ' . $args['class_prefix'] . 'tail';
			}
			if ( $args['li_class'] ) {
				$page_navi .= ' ' . $args['li_class'] . '"';
			}
			$page_navi .= '"><a href="' . get_pagenum_link( $i ) . '">' . $i . "</a></li>\n";
		}
	}

	if ( $args['show_adjacent'] && ( $current_page_num != $max_page_num || in_array( $args['edge_type'], array( 'span', 'link' ) ) ) ) {
		$next_num = min( $max_page_num, $current_page_num + 1 );
		$page_navi .= "\t" . $elm_tabs . $tabs . '<li class="' . $args['class_prefix'] . 'next';
		if ( $args['li_class'] ) {
			$page_navi .= ' ' . $args['li_class'];
		}
		if ( $args['edge_type'] == 'span' && $current_page_num == $max_page_num ) {
			$page_navi .= '"><span>' . esc_html( $args['next_label'] ) . '</span></li>' . "\n";
		} else {
			$page_navi .= '"><a href="' . get_pagenum_link( $next_num ) . '">' . esc_html( $args['next_label'] ) . '</a></li>' . "\n";

		}
	}

	if ( $args['show_boundary'] && ( $current_page_num != $max_page_num || in_array( $args['edge_type'], array( 'span', 'link' ) ) ) ) {
		$page_navi .= "\t" . $elm_tabs . $tabs . '<li class="' . $args['class_prefix'] . 'last';
		if ( $args['li_class'] ) {
			$page_navi .= ' ' . $args['li_class'];
		}
		if ( $args['edge_type'] == 'span' && $current_page_num == $max_page_num ) {
			$page_navi .= '"><span>' . esc_html( $args['last_label'] ) . '</span></li>' . "\n";
		} else {
			$page_navi .= '"><a href="' . get_pagenum_link( $max_page_num ) . '">' . esc_html( $args['last_label'] ) . '</a></li>' . "\n";
		}
	}

	if ($args['num_position'] == 'after' && $num_list_item ) {
		$page_navi .= "\t" . $elm_tabs . $tabs . $num_list_item;
	}

	$page_navi .= $elm_tabs . $tabs . "</ul>\n";

	if ( $elm ) {
		$page_navi .= $tabs . '</' . $elm . ">\n";
	}

	$page_navi = apply_filters( 'page_navi', $page_navi );

	if ( $args['echo'] ) {
		echo $page_navi;
	} else {
		return $page_navi;
	}
}
private function sanitize_attr_classes( $classes, $prefix = '' ) {
	if ( ! is_array( $classes ) ) {
		$classes = preg_replace( '/[^\s\w_-]+/', '', $classes );
		$classes = preg_split( '/[\s]+/', $classes );
	}

	foreach ( $classes as $key => $class ) {
		if ( is_array( $class ) ) {
			unset( $classes[$key] );
		} else {
			$class = preg_replace( '/[^\w_-]+/', '', $class );
			$class = preg_replace( '/^[\d_-]+/', '', $class );
			if ( $class ) {
				$classes[$key] = $prefix . $class;
			}
		}
	}
	$classes = implode( ' ', $classes );

	return $classes;
}
private function uniform_boolean( $arg, $default = true ) {
	if ( is_numeric( $arg ) ) {
		$arg = (int)$arg;
	}
	if ( is_string( $arg ) ) {
		$arg = strtolower( $arg );
		if ( $arg == 'false' ) {
			$arg = false;
		} elseif ( $arg == 'true' ) {
			$arg = true;
		} else {
			$arg = $default;
		}
	}
	return $arg;
}
}
$nill_prime_strategy_page_navi = new nill_prime_strategy_page_navi();

if ( ! function_exists( 'page_navi' ) ) {
	function page_navi( $args = '' ) {
		global $nill_prime_strategy_page_navi;
		return $nill_prime_strategy_page_navi->page_navi( $args );
	}
}

/**********************************************************************
*
* Set up Nill Comment Themplate
*
* @Nill - Comment Form
*
***********************************************************************/ 
add_filter('get_avatar','nill_change_avatar_css');
function nill_change_avatar_css($class) {
$class = str_replace("class='avatar", "class='media-object comment-img img-circle ", $class) ;
return $class;
}

function nill_comment($comment, $args, $depth) {
$GLOBALS['comment'] = $comment;
extract($args, EXTR_SKIP);

if ( 'div' == $args['style'] ) {
    $tag = 'div';
    $add_below = 'comment';
} else {
    $tag = 'li';
    $add_below = 'div-comment';
}
?>
<li>
    <div class="media-avatar-body">
    <a class="pull-left" href="#">
        <?php echo get_avatar($comment,$size='80'); ?>
    </a>
    </div>
    
    <div class="media-body">
        <h6>
            <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>'), get_comment_author_link()) ?>
        </h6>
            
        <small>
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>" class="comment-icon-link">
                <i class="fa fa-clock-o comment-button"></i> 
                <?php printf( ('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?>
            </a>
                
            <a class="comment-icon-link">
                <i class="fa fa-scissors comment-button-two"></i>
                <?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
            </a>
           
            <a  class="comment-icon-link">
                <i class="fa fa-floppy-o comment-button-two"></i>
                <?php edit_comment_link( ('Edit'),'  ','' ); ?>
            </a>
    
        </small>
        
        <div class="clearfix"></div>
            
        <?php if ($comment->comment_approved == '0') : ?>
            <em class="comment-awaiting-moderation"><?php ('Your comment is awaiting moderation.') ?></em>
            <br />
        <?php endif; ?>
        
        <p><?php comment_text() ?></p>
    </div>
</li>
<?php
}

/**********************************************************************
*
* Set up TGM Plugin
*
* @Nillplay
*
***********************************************************************/   
require_once dirname( __FILE__ ) . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'nillplay_register_required_plugins' );

function nillplay_register_required_plugins() {
	$plugins = array(
		
		array(
			'name'     				=> 'Advanced Custom Fields', // The plugin name
			'slug'     				=> 'advanced-custom-fields', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/advanced-custom-fields.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.3.8', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Advanced Custom Fields: Flexible Content Field', // The plugin name
			'slug'     				=> 'acf-flexible-content', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/acf-flexible-content.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Advanced Custom Fields: Gallery Field', // The plugin name
			'slug'     				=> 'acf-gallery', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/acf-gallery.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Advanced Custom Fields: Options Page', // The plugin name
			'slug'     				=> 'acf-options-page', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/acf-options-page.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.2.0', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Advanced Custom Fields: Repeater Field', // The plugin name
			'slug'     				=> 'acf-repeater', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/acf-repeater.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> true, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> true, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Simple Share Buttons', // The plugin name
			'slug'     				=> 'simple-share-buttons-adder', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/simple-share-buttons-adder.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.4', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Envato WordPress Toolkit', // The plugin name
			'slug'     				=> 'envato-wordpress-toolkit', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/envato-wordpress-toolkit-master.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.5', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Easy Bootstrap Shortcode', // The plugin name
			'slug'     				=> 'easy-bootstrap-shortcode', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/easy-bootstrap-shortcodes.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '4.3.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Zilla Likes', // The plugin name
			'slug'     				=> 'zilla-likes-1.1', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/zilla-likes-1.1.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '1.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7.zip', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/contact-form-7.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '3.8.1', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Mailchimp For Wp', // The plugin name
			'slug'     				=> 'mailchimp-for-wp.zip', // The plugin slug (typically the folder name)
			'source'   				=> get_template_directory() . '/framework/plugins/mailchimp-for-wp.zip', // The plugin source
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '2.0.2', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),

	);
	$theme_text_domain = 'tgmpa';
	$config = array(
        'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
	);

	tgmpa( $plugins, $config );
} 