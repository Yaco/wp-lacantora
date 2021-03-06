<?php
//get theme options
$miorden = $post->menu_order;
$options = get_option( 'theme_settings' ); ?>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />

	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/jplayer/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo( 'template_url' ); ?>/jplayer/css/jplayer.css">
	
	<style type="text/css">
		body{
			height:auto!important;
		      	overflow-x:hidden!important;overflow-y:hidden!important; 
		}
		.jp-repeat, .jp-repeat-off{
			right:34px!important;
		}

		.jp-shuffle, .jp-shuffle-off{
			right:10px!important;

		}
		a.wolf-jp-popup { display:none!important }
		
		.wolf-jplayer-playlist, .wolf-jplayer-playlist a{
			color: #ffffff;
		}

		.wolf-jplayer-playlist div.jp-type-playlist{
			background-color: #353535;
		}

		.wolf-jplayer-playlist .jp-play-bar, .wolf-jplayer-playlist .jp-volume-bar-value{
			background-color: #ffffff;
		}

	</style>


	<script type='text/javascript' src="<?php bloginfo( 'url' ); ?>/wp-includes/js/jquery/jquery.js"></script>
	<script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/jplayer/js/jquery.jplayer.min.js"></script>
	<script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/jplayer/js/jplayer.playlist.min.js"></script>
	<script type='text/javascript' src="<?php bloginfo( 'template_url' ); ?>/jplayer/js/jquery.jplayer.custom.js"></script>

	<script type="text/javascript">
		/* <![CDATA[ */
	var WolfJplayer = { "iTunesText": "Buy on iTunes", "amazonText": "Buy on amazon", "buyNowText": "Buy now", "downloadText": "Haz click derecho en el enlace para descargar el archivo" };
		/* ]]> */
	jQuery( function( $ ) {

		$( '.wolf-jplayer-playlist' ).find( 'span.close-wolf-jp-share' ).click( function() {
			$( this ).parent().parent().parent().fadeOut();
		} );

		$( '.wolf-jp-share-icon').click( function() {
			var container = $( this ).parent().parent().parent();
			container.find('.wolf-jp-overlay').fadeIn();
		} );

		jQuery('.wolf-share-jp-popup').click(function() {
			var url = jQuery( this ).attr('href');
			var popup = window.open( url, 'null', 'height=350,width=570, top=150, left=150');
			if ( window.focus ) {
				popup.focus();
			}
			return false; 
		} );
		

			
		var myPlaylist = new jPlayerPlaylist({
				jPlayer: "#jquery_jplayer",
				cssSelectorAncestor: "#jp_container"
			}, [
				<?php 
							// Primero muestra el padre
							echo "{";
						        $parent = get_post( $post->post_parent );

								$carpeta = get_the_time( 'Ymd', $parent );
 								$archivo = "$carpeta";
 								$base = $options['audios_url'];

								$titulo = $parent->post_title;
								$tipo = get_post_meta( $parent, 'audio-tipo', true );
								
								echo "
								title:\"$titulo\",
								artist:\"Programa completo\",
								mp3:\"$base/$carpeta.mp3\",
								download:\"$base/$carpeta.mp3\"";
							echo "},";


					query_posts(array('post_parent' => $parent->ID, 'post_type' => 'audios', 'order' => 'asc', 'orderby' => 'menu_order')); while (have_posts()) { the_post(); 

							echo "{";
								$carpeta = get_the_date('Ymd');
 								$orden = $post->menu_order;
								$slug = the_slug();
								$archivo = "$carpeta-$orden-$slug";
								$base = $options['audios_url'];
								
								$titulo = get_the_title();
								$tipo = get_post_meta( get_the_ID(), 'audio-tipo', true );
								
								echo "
								title:\"$orden. $titulo\",
								artist:\"$tipo\",
								mp3:\"$base/$carpeta/$archivo.mp3\",
								download:\"$base/$carpeta/$archivo.mp3\"";
							echo "},";
			        }?>
				
				
			
			], {
				playlistOptions: {
					enableRemoveControls: false
				},
				swfPath: "<?php bloginfo( 'template_url' ); ?>/jplayer/js",
				supplied: "webmv, ogv, m4v, oga, mp3",
				smoothPlayBar: true,
				keyEnabled: true,
				audioFullScreen: true
		});
		setTimeout(
		  function() 
		  {
		    			myPlaylist.play(<?php echo $miorden;?>);

		  }, 100);				
		$(window).load(function() {
// 			myPlaylist.play(<?php echo $miorden;?>);
		});
	
	});
				

		
	</script>
	<!-- HTML5 and media queries Fix for IE --> 
	<!--[if IE]>
		<script src="<?php bloginfo( 'template_url' ); ?>/jplayer/js/html5.js"></script>
	<![endif]-->
	<!-- End Fix for IE --> 


		<?php

		
		?>
    	
    	<div class="wolf-jplayer-playlist-container">
	<div class="wolf-jplayer-playlist">
	<div class="wolf-jp-overlay">
		<div class="wolf-jp-share-container">
			<div class="wolf-jp-share">
			<div>
				<p><strong>Share</strong></p>
			</div>
			<div class="wolf-share-input">
				<label>url : </label>
				<div>
					<input onclick="this.focus();this.select()" type="text" value="<?php bloginfo( 'template_url' ); ?>/jplayer/wolf-jplayer-single.php?playlist_id=1">
				</div>
			</div>
			<div class="wolf-share-input">
				<label>embed : </label>
				<div>
				<input onclick="this.focus();this.select()" type="text" value="&lt;iframe width=&quot;100%&quot; height=&quot;205&quot; scrolling=&quot;no&quot; frameborder=&quot;no&quot; src=&quot;<?php bloginfo( 'template_url' ); ?>/jplayer/wolf-jplayer-frame.php?playlist_id=1&amp;iframe=true&amp;wmode=transparent&quot;&gt;&lt;/iframe&gt;">
				</div>
			</div>
			<div class="clear"></div>
			<div class="wolf-jp-share-socials">
				<a class="wolf-share-jp-popup" href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" title="Compartir en Facebook" target="_blank">
				<span id="wolf-jplayer-facebook-button"></span>
				</a>
				<a class="wolf-share-jp-popup" href="http://twitter.com/home?status=<?php the_title(); ?>+-+<?php the_permalink(); ?>" title="Compartir en Twitter" target="_blank">
				<span id="wolf-jplayer-twitter-button"></span>
				</a>
			</div>
			<span class="close-wolf-jp-share" title="close">&times;</span>
		</div>
		</div>
	</div>
	<div id="jplayer_container" class="jplayer_container">
	<div style="display:none;"id="jquery_jplayer" class="jp-jplayer"></div>
		<div id="jp_container" class="jp-audio">
		<div class="jp-logo" style=""></div><span title="share" class="wolf-jp-share-icon"></span><div class="jp-type-playlist">
			<div class="jp-gui jp-interface">
				<ul class="jp-controls">
					<li><a href="javascript:;" class="jp-previous" tabindex="1"></a></li>
					<li><a href="javascript:;" class="jp-play" tabindex="1"></a></li>
					<li><a href="javascript:;" class="jp-pause" tabindex="1"></a></li>
					<li><a href="javascript:;" class="jp-next" tabindex="1"></a></li>
					<li><a href="javascript:;" class="jp-stop" tabindex="1"></a></li>
					<li class="wolf-volume">
						<a href="javascript:;" class="jp-mute" tabindex="1" title="mute"></a>
						<a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute"></a>
					</li>
					<li><a href="javascript:;" class="jp-volume-max wolf-volume" tabindex="1" title="max volume"></a></li>
				</ul>
				<div class="jp-progress">
					<div class="jp-seek-bar">
						<div class="jp-play-bar"></div>
					</div>
				</div>
				<div class="jp-volume-bar wolf-volume">
					<div class="jp-volume-bar-value"></div>
				</div>
				<div class="jp-current-time"></div>
				<div class="jp-duration"></div>

			</div>

			<div class="jp-playlist">
				<ul>
					<li></li>
				</ul>
			</div>

			<div class="jp-no-solution">
				<span>Necesitas actualizar el sistema</span>
				Tu navegador web no está actualizado. Para reproducir el contenido es necesario que actualices el plugin de <a href="http://get.adobe.com/flashplayer/" target="_blank">Adobe Flash</a>.
			</div>

                            </div>

		</div>
	</div>
	</div>
	</div>
	<!-- End jPlayer -->
