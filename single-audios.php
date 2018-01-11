<?php
if (isset($_GET['popup'])) {
    include('player.php');
} else {
?>

<?php get_header();?>

<div id="centro">
  <div id="centro-1">
    <img class="fondo" src="<?php bloginfo( 'template_url' ); ?>/images/fondo-1.jpg" />
    <div id="radio" class="radio-fija">
    		<div class="radio-titulo">
				<h2 class="titulo-audio"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_post(); ?>

				<div class="radio-descripcion">
					<?php echo get_post_meta( get_the_ID(), 'audio-descripcion', true );?>
					<br/>
					<?php 
					// Nube de tags
					$tag_ids = wp_get_post_tags( $post->ID, array( 'fields' => 'ids' ) );
					$str = implode (", ", $tag_ids);					wp_tag_cloud("smallest=8&largest=32&include=$str"); 
					?>
				</div>
						
				</div>
    
    </div>
  </div>
  
	<div id="centro-2">

		<div class="columna-nota-simple">
			
			<?php include('player.php'); ?>
			
			<a href="<?php bloginfo('url');?>/radio">Ingresar al archivo de audios</a>

		</div>

	
		<div id="pie">
				<div id="pie-contenido">
					<div id="pie-licencia"><b>Copyright 1993-2013 | Asociación Civil "La Cantora"</b><br/>
					Se permite y alienta al copia, derivación y redistribución<br/>
					de los contenidos de este sitio bajo las siguientes condiciones.
					</div>
					<div id="pie-boletin"><a href="#">Suscribirme al boletín de novedades</a>
					</div>
				</div>

		</div>
	</div> <!-- fin centro-2 -->

  

</div>

<?php get_footer(); ?>

<?php } ?>
