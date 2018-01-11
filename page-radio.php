<?php get_header();?>

<div id="centro">
  <div id="centro-1">
    <img class="fondo" src="<?php bloginfo( 'template_url' ); ?>/images/fondo-1.jpg" />
    <div id="radio" class="radio-fija">
    		<div class="radio-titulo">
				<h2 class="titulo-audio"><?php the_title(); ?></h2>
			<?php the_post(); ?>		

				<div class="radio-descripcion">
					<?php the_content();?>
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
		<?php smart_archives('', array( 'post_type' => 'audios' ) ); ?>


		</div>

	

	</div> <!-- fin centro-2 -->

  

</div>

<?php get_footer(); ?>