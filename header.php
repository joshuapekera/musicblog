<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Nill
 * @since Nill 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php if ( ! class_exists( 'Acf' ) ) : ?>
<div id="st-container" class="st-container">
    <div class="st-pusher">
        <div class="st-menu st-effect-3" id="menu-3">
            <div class="nill-sideheader">
                <div id="nill-container">
                    <ul class="nillsidetabs">
                        <li><a href="#1"><?php _e( 'Menu', 'nill' ); ?></a></li>
                        <li><a href="#2"><?php _e( 'Widget', 'nill' ); ?></a></li>
                    </ul>

                    <div id="main_content">
                      <div id="1">
                          <?php wp_nav_menu( array( 'theme_location'=>'primary', 'menu_class' => 'main-nav' ) ); ?>
                      </div>
                      
                      <div id="2">
                          <div class="nill-sidewidget">
                              <?php dynamic_sidebar( 'sidebar-4' ); ?>
                          </div>
                      </div>
                    </div>

                </div>
            </div>
            
            <div class="nill-sidesearch">
                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                    <input type="text" value="" name="s" id="s" placeholder="Search..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'" />
                </form>
            </div>
        </div>
        
        <div class="st-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    
                        <!-- Nill Logo -->  
                        <div class="nill-logo">
                            <a href="<?php echo home_url(); ?>">
                                <img src="<?php echo get_template_directory_uri(); ?>/images/theme/logo.png" alt="" />
                            </a>
                        </div>
                    
                        <!-- Nill Sidebar Menu -->  
                        <div id="st-trigger-effects" class="nill-toogle">
				            <button data-effect="st-effect-3"><i class="fa fa-bars"></i></button>
				        </div>

                    </div>
                    
                </div>
            </div>
        
<?php else: ?>

<?php
$nill_logo = get_field('nill_logoupload' , 'option');
$nill_sideselect = get_field('nill_sidebarstyle' , 'option');
?>

<div id="st-container" class="st-container">
    
    <!-- Nill Sidebar Menu -->   
    <?php if (($nill_sideselect == "3") || ($nill_sideselect == "6") || ($nill_sideselect == "7") || ($nill_sideselect == "8") || ($nill_sideselect == "14")) : ?>
    <div class="st-pusher">
    <?php endif; ?>

        <div class="st-menu st-effect-<?php echo esc_html($nill_sideselect); ?>" id="menu-<?php echo esc_html($nill_sideselect); ?>">
            
            <div class="nill-sideheader">
                <div id="nill-container">
                    <ul class="nillsidetabs">
                        <li><a href="#1"><?php _e( 'Menu', 'nill' ); ?></a></li>
                        <li><a href="#2"><?php _e( 'Widget', 'nill' ); ?></a></li>
                    </ul>

                    <div id="main_content">
                      <div id="1">
                          <?php wp_nav_menu( array( 'theme_location'=>'primary', 'menu_class' => 'main-nav' ) ); ?>
                      </div>
                      
                      <div id="2">
                          <div class="nill-sidewidget">
                              <?php dynamic_sidebar( 'sidebar-4' ); ?>
                          </div>
                      </div>
                    </div>

                </div>
            </div>
            
            <div class="nill-sidesearch">
                <form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
                    <input type="text" value="" name="s" id="s" placeholder="Search..." onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search...'" />
                </form>
            </div>
            
        </div>
    
    <!-- Nill Navigation Bar -->  
    <?php if (($nill_sideselect == "1") || ($nill_sideselect == "2") || ($nill_sideselect == "4") || ($nill_sideselect == "5") || ($nill_sideselect == "9") || ($nill_sideselect == "10") || ($nill_sideselect == "11") || ($nill_sideselect == "12") || ($nill_sideselect == "13")) : ?>
    <div class="st-pusher">
    <?php endif; ?>
			
        <div class="st-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                    
                        <!-- Nill Logo -->  
                        <div class="nill-logo">
                            <a href="<?php echo home_url(); ?>">
                                <?php if ($nill_logo) : ?>
                                <img src="<?php echo esc_url($nill_logo); ?>" alt="" />
                                <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/images/theme/logo.png" alt="" />
                                <?php endif; ?>
                            </a>
                        </div>
                    
                        <!-- Nill Sidebar Menu -->  
                        <div id="st-trigger-effects" class="nill-toogle">
				            <button data-effect="st-effect-<?php echo esc_html($nill_sideselect); ?>"><i class="fa fa-bars"></i></button>
				        </div>

                    </div>
                    
                </div>
            </div>
<?php endif; ?>