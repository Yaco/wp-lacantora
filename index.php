<?php get_header();?>

<div id="centro">
  <div id="centro-1">
    <img class="fondo" src="<?php bloginfo( 'template_url' ); ?>/images/fondo-1.jpg" />
    <div id="radio" class="radio-fija">
    		<div class="radio-titulo">
				<h2 class="titulo-audio"></h2>

				<div class="radio-descripcion">
				</div>
			</div>
    
    </div>
  </div>
  
	<div id="centro-2">

		<div class="columna-nota-simple">
		<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php printf( __( 'Resultados de la busqueda: %s', 'twentytwelve' ), '<span>' . single_tag_title( '', false ) . '</span>' ); ?></h1>

			<?php if ( tag_description() ) : // Show an optional tag description ?>
				<div class="archive-meta"><?php echo tag_description(); ?></div>
			<?php endif; ?>
			</header><!-- .archive-header -->

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
							<?php the_post_thumbnail(); ?>
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
							<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentytwelve' ) ); ?>
							<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'twentytwelve' ), 'after' => '</div>' ) ); ?>
						</div><!-- .entry-content -->
						<?php endif; ?>


					</article><!-- #post -->


			<?php endwhile;


			?>

		<?php else : ?>
			<?php 
			echo "NADA"; ?>
		<?php endif; ?>


		</div>

	</div> <!-- fin centro-2 -->

  

</div>

<?php get_footer(); ?>