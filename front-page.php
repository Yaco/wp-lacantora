<?php
//get theme options
$options = get_option( 'theme_settings' ); ?>

<?php get_header();?>


<script>
		$(document).ready(function() {
			// Estado inicial
			$('#columna-nota-1').fadeIn(1, function() {});
			$('#columna-nota-2').fadeOut(1, function() {});
			$('#columna-nota-3').fadeOut(1, function() {});
			$('.notas-imagenes-botones').removeClass('notas-imagenes-activa');
			$(this).addClass('notas-imagenes-activa');
			
			$('#notas-imagenes-1').click(function() {
						$('#columna-nota-1').fadeIn(1, function() {});
						$('#columna-nota-2').fadeOut(1, function() {});
						$('#columna-nota-3').fadeOut(1, function() {});
						$('.notas-imagenes-botones').removeClass('notas-imagenes-activa');
						$(this).addClass('notas-imagenes-activa');
			});
			$('#notas-imagenes-2').click(function() {
						$('#columna-nota-2').fadeIn(1, function() {});
						$('#columna-nota-1').fadeOut(1, function() {});
						$('#columna-nota-3').fadeOut(1, function() {});
						$('.notas-imagenes-botones').removeClass('notas-imagenes-activa');
						$(this).addClass('notas-imagenes-activa');
			});						
			$('#notas-imagenes-3').click(function() {
						$('#columna-nota-3').fadeIn(1, function() {});
						$('#columna-nota-1').fadeOut(1, function() {});
						$('#columna-nota-2').fadeOut(1, function() {});
						$('.notas-imagenes-botones').removeClass('notas-imagenes-activa');
						$(this).addClass('notas-imagenes-activa');
			});
			
			$('.titulo-imagen').mouseover(function() {
						$('#columna-nota-tapa').fadeIn(1, function() {});
			});			
			$('#columna-nota-tapa').mouseout(function() {
						$('#columna-nota-tapa').fadeOut(1, function() {});
			});	
			$('#columna-central').mouseover(function() {
						$('#columna-nota-tapa').fadeOut(1, function() {});
			});		
			$('#cabecera').mouseover(function() {
						$('#columna-nota-tapa').fadeOut(1, function() {});
			});		
			
			// 			$('.titulo-imagen').mouseover(function() {
// 						$(this).animate({ b: 0.5, }, 500, function() {
// 							// Animation complete.
// 							});	
// 			
// 			});
			
		});

</script>


<div id="centro">
  <div id="centro-1">
    <img class="fondo" src="<?php bloginfo( 'template_url' ); ?>/images/fondo-1.jpg" />
    <div id="radio">
    		<div class="radio-titulo">
				<?php $loop = new WP_Query( array( 'post_type' => 'audios' ) ); ?>
				<?php while ( $loop->have_posts()  &&  $tipo != "Programas") : $loop->the_post(); ?>
					<?php 
					
					$tipo = get_post_meta( get_the_ID(), 'audio-tipo', true );
					if ( $tipo == "Programas" ) { ?>
						<div class="titulo-seccion" style="color:black;">Radio</div>
						<h2 class="titulo-audio"><a href="<?php the_permalink(); ?>"><?php the_date('d \d\e F'); ?></a></h2>

						<div class="radio-descripcion">
							<?php echo get_post_meta( get_the_ID(), 'audio-descripcion', true ) ?>
							  
						</div>
						<div id="radio-botones">
							<a title="Abrir el reproductor" id="radio-play" href="JavaScript:newPopup('<?php the_permalink();?>&popup');"></a>
							<a title="Detalles del programa" id="radio-mas" href="<?php the_permalink();?>"></a>
						</div>
				  <?php } ?>

				<?php endwhile; ?>
						<?php wp_reset_query(); // reset the query ?>
			</div>
    
    </div>
  </div>
  
  <div id="centro-2" style="left:50%;">
    <div id="columna-central">
	<div id="columna-notas">
	  <ul id="notas-imagenes">
				<?php $vuelta=0; $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '3' ) ); ?>
				<?php while ( $loop->have_posts()) : $loop->the_post(); $vuelta++; ?>
				<li>
					<?php 
					$post_id  = get_the_ID();
					$thumb_id = get_post_thumbnail_id( $post_id );
					$img_src  = wp_get_attachment_image_src( $thumb_id, 'portada-mini' );
					?>
					<img src="<?php echo $img_src[0]; ?>" id="notas-imagenes-<?php echo $vuelta; ?>" class="notas-imagenes-botones notas-imagenes-activa" />
				</li>


				<?php endwhile; ?>	  
	  

	    
	    </ul>
	</div>
    </div>
 <div style="width: 390px; float: left; margin-left: -100px;">
		<div id="columna-nota-tapa"><div id="columna-nota-tapa-foto"></div></div>
				<?php $vuelta=0; $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => '3' ) ); ?>
				<?php while ( $loop->have_posts()) : $loop->the_post(); $vuelta++?>
				
				<div id="columna-nota-<?php echo $vuelta; ?>" class="columna-nota">
					<?php 
						$post_id  = get_the_ID();
						$thumb_id = get_post_thumbnail_id( $post_id );
						$img_src  = wp_get_attachment_image_src( $thumb_id, 'portada-banner' );
					?>
				
					<div class="titulo-imagen" style="background: url(<?php echo $img_src[0]; ?>);">
						<div class="titulo-seccion">Grafica</div>
						<h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
						<div class="titulo-seccion"><?php the_date('d \d\e F'); ?></div>						
					</div>
					<div class="titulo-bajada">
						<?php the_excerpt(); ?>
						  
					</div>
				</div>

				<?php endwhile; ?>
    
    
</div>

</div> <!-- fin centro-2 -->


</div>

<?php get_footer(); ?>