<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*Print the <title> tag based on what is being viewed.*/
	global $page, $paged;

	wp_title( '|', true, 'right' );
	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		echo bloginfo('name')." $site_description";
    } else {
        echo bloginfo('name')." $site_description";
    }
	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'jeen' ), max( array($paged, $page) ) );
	?></title>
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
<div class="outer-wrapper">
	<div class="outer-pad">

		<div id="header" class="header-wrapper">

			<div class="header-pad container global-width global-width-helper">
				<div class="row">
					<div class="logo-wrapper col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<div id="logo" class="logo">
							<a href="<?php echo get_home_url(); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php bloginfo('template_url'); ?>/images/logo2.png" alt="<?php bloginfo('name'); ?>" /></a>
						</div>
					</div>
					<div class="headermenu desktop-view col-lg-7 col-md-7 col-sm-12 col-xs-12">
						<?php
							wp_nav_menu( array( 'menu' => 'Top Menu', 'container_class' => 'top-menu', 'container_id' => 'top-menu', 'theme_location' => 'primary', 'before' => '','after' => '','items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>' ) );
						?> 
					</div>
				</div>
			</div>
            
		</div>
		
		<div class="menu-wrapper responsivemenu">
			<div class="menu-pad container global-width global-width-helper">
				<div class="navbar">
					<div class="navbar-header ">
						<button type="button" class="navbar-toggle nav-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="menu-toogle">Menu</span>
							<span class="bar">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</span>
						</button>
					</div>
					<div class="collapse navbar-collapse">
						<?php
							wp_nav_menu( array( 'menu' => 'Top Menu', 'container_class' => 'top-menu', 'container_id' => 'top-menu', 'theme_location' => 'primary', 'before' => '','after' => '','items_wrap' => '<ul id="%1$s" class="%2$s nav navbar-nav">%3$s</ul>' ) );
						?>
					</div>
				</div>
			</div>
		</div>
		
        <?php if( is_front_page() ) { ?>
        	 <div class="banner-wrapper">
    			<div class="banner-pad">
    
    				<div id="banner" class="banner-wrap">
    					<div class="banner banner-slide">
    						<?php
    							$a_args = array(
    								'post_type'			=> 'banner-slide',
    								'orderby'			=> 'menu_order',
    								'order'				=> 'ASC',
    								'posts_per_page'	=> 8,
    								'meta_key'			=> '_thumbnail_id'
    							);
    							$a_posts = get_posts( $a_args );
    
    							foreach( $a_posts as $o_post ) {
    							//$page_link = get_field( 'page_link', $o_post->ID);
    						?>
    							<div class="banner-slide-item">
    								<?php	
    									if( is_front_page() ) {
    									
    										if ( has_post_thumbnail($o_post->ID) ) { 
    											echo get_the_post_thumbnail($o_post->ID,'slick-banner-slide' , array('alt' => the_title_attribute('echo=0'),'title' =>the_title_attribute('echo=0'))); 
    										} 
    									
    									}
    								?>
    								<div class="banner-content">
    									<div class="banner-content-pad container global-width global-width-helper">
    										<div class="banner-title valign-parent">
    											<div class="valign-item"><?php echo get_the_title( $o_post->ID ); ?></div>
    											<div class="valign-helper"></div>
    										</div>
    									</div>
    								</div>
    							</div>
    						<?php 
    							}
    						?>
							<div class="banner-slide-item">
    								
									<img src="<?php bloginfo('template_url'); ?>/images/Penguins.jpg" alt="<?php bloginfo('name'); ?>" class="img-responsive"/>
    								<div class="banner-content">
    									<div class="banner-content-pad container global-width global-width-helper">
    										<div class="banner-title valign-parent">
    											<div class="valign-item"><?php echo get_the_title( $o_post->ID ); ?></div>
    											<div class="valign-helper"></div>
    										</div>
    									</div>
    								</div>
    							</div>
								
								<div class="banner-slide-item">
    								
									<img src="<?php bloginfo('template_url'); ?>/images/Penguins.jpg" alt="<?php bloginfo('name'); ?>" class="img-responsive"/>
    								<div class="banner-content">
    									<div class="banner-content-pad container global-width global-width-helper">
    										<div class="banner-title valign-parent">
    											<div class="valign-item"><?php echo get_the_title( $o_post->ID ); ?></div>
    											<div class="valign-helper"></div>
    										</div>
    									</div>
    								</div>
    							</div>
    					</div>
    				</div>
    
    			</div>
    		</div>
        <?php } ?>

		<div class="mid-wrapper">
			<div class="mid-pad container global-width global-width-helper">

				<div id="content" class="content-wrapper">
					<div class="content-pad">

						<div class="content <?php echo $pageClass; ?>">