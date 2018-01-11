<?php get_header();?>

<div id="centro">
  <div id="centro-1">
    <img class="fondo" src="<?php bloginfo( 'template_url' ); ?>/images/fondo-1.jpg" />
    <div id="radio" class="radio-fija">
    		<div class="radio-titulo">
				<h2 class="titulo-audio"><?php printf( __( 'Busqueda de: %s', 'twentytwelve' ), '<span>' . get_search_query() . '</span>' ); ?></h2>

				<div class="radio-descripcion">
				</div>
			</div>
    
    </div>
  </div>
  
	<div id="centro-2">

		<div class="columna-nota-simple">
		<?php if ( have_posts() ) : ?>


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();?>
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
						<?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
						<div class="featured-post">
							<?php _e( 'Featured post', 'twentytwelve' ); ?>
						</div>
						<?php endif; ?>
						<header class="entry-header">
							<?php if ( is_single() ) : ?>
							<h2 class="entry-title"><?php the_title(); ?></h2>
							<?php else : ?>
							<h2 class="entry-title">
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_date('d/m'); ?> | <?php the_title(); ?></a>
							</h2>
							<?php endif; // is_single() ?>
						</header><!-- .entry-header -->

						<?php if ( is_search() ) : // Only display Excerpts for Search ?>
							<div class="entry-summary">
								
								<?php the_excerpt(); ?>
							</div><!-- .entry-summary -->
							<?php else : ?>
							<div class="entry-content">
								<?php the_content( __( 'Continuar leyendo <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
								<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
							</div><!-- .entry-content -->
						<?php endif; ?>
						<hr/>

					</article><!-- #post -->


			<?php endwhile; ?>
			<div class="navigation">
				<div class="alignleft"><?php next_posts_link('&laquo; Resultados menos recientes') ?></div>
				<div class="alignright"><?php previous_posts_link('Resultados más recientes &raquo;') ?>
			</div>
		</div>

		<?php else : ?>

			<article id="post-0" class="post no-results not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Sin resultados', 'twentytwelve' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Lo siento, pero no hay ningún resultado para el concepto buscado.', 'twentytwelve' ); ?></p>
					<?php get_search_form(); ?>
				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		<?php endif; ?>


		</div>

	</div> <!-- fin centro-2 -->

  

</div>

<?php get_footer(); ?>