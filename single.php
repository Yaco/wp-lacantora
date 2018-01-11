<?php get_header();?>

<div id="centro">
  <div id="centro-1">
    <img class="fondo" src="<?php bloginfo( 'template_url' ); ?>/images/fondo-1.jpg" />
    <div id="radio" class="radio-fija">
    		<div class="radio-titulo">
				<div class="titulo-seccion" style="color:black;">Gráfica</div>
				<h2 class="titulo-audio"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php the_post(); ?>		
				<div class="titulo-seccion" style="color:black;"><?php the_date('d \d\e F'); ?></div>

				<div class="radio-descripcion">
					<?php the_excerpt(); ?>
				</div>
				<div class="categorias"><?php the_category() ?></div>

			</div>
    
    </div>
  </div>
  
	<div id="centro-2">

		<div class="columna-nota-simple">
		<?php the_post_thumbnail('nota-banner'); ?>

			<?php the_content();?>

		</div>

	

	</div> <!-- fin centro-2 -->

  

</div>

<?php get_footer(); ?>