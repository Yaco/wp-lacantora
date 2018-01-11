<?php
//get theme options
$options = get_option( 'theme_settings' ); ?>

<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width" />
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php // Loads HTML5 JavaScript file to add support for HTML5 elements in older IE versions. ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
	<![endif]-->
	
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

	<link href='http://fonts.googleapis.com/css?family=Rationale' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Economica:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
  
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>


	<script type="text/javascript">
	function newPopup(url) {
		popupWindow = window.open(
			url,'popUpWindow','height=460,width=450,left=10,top=10,resizable=yes,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no,status=yes')
	}
	</script>
	

	<?php wp_head(); ?>
	<?php $wp_version = get_bloginfo('version'); ?>
	<?php if ( $wp_version >= 3.8 ) : ?>
		<style> html {
		    margin-top: 0px !important;
		}</style>
	<?php endif; ?>
</head>

<body <?php body_class(); ?>>

<div id="cabecera">
    <div id="cabecera-medio">
		<a id="cabecera-link-home" href="<?php bloginfo('url');?>"></a>
		
		<div id="cabecera-medio-barra">
			<?php wp_nav_menu( array( 'menu' => 'menu-superior', 'container' => 'nav') ); ?>

			<form role="search" method="get" id="buscador" action="<?php bloginfo( 'url' ); ?>" method="get">
			        <input type="text" name="s" id="buscador-caja" value="<?php the_search_query(); ?>" />
			</form>

		    <a href="https://www.facebook.com/radiolacantora" class="cabecera-medio-barra-btn" id="btn-fb" title="La Cantora en Facebook"></a>
		    <a href="https://twitter.com/radiolacantora" class="cabecera-medio-barra-btn" id="btn-tw" title="La Cantora en Twitter"></a>
		    <a href="<?php bloginfo( 'url' ); ?>/feed/" class="cabecera-medio-barra-btn" id="btn-rss" title="Sindación de contenidos RSS"></a>
		    
		</div>
    </div>
</div><!-- FIN: cabecera -->
