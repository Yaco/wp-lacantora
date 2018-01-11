<?php get_header();?>

<div id="centro">
  <div id="centro-1">
    <img class="fondo" src="<?php bloginfo( 'template_url' ); ?>/images/fondo-1.jpg" />
    <div id="radio" class="radio-fija">
    		<div class="radio-titulo">
				<h2 class="titulo-audio"><p>Palabra clave: <?php single_tag_title(); ?></p></h2>

				<div class="radio-descripcion">
				</div>
			</div>
    
    </div>
  </div>
  
	<div id="centro-2">

		<div class="columna-nota-simple">
		<?php 
				global $wp_query;
				$tag = $wp_query->get_queried_object();
				$current_tag = $tag->cat_ID;
		    query_posts(array( 
		        'post_type' => 'post',
		        'cat' => $current_tag
		    ) );  
		?>
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
								<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
							</h2>
							<?php endif; // is_single() ?>
						</header><!-- .entry-header -->

						<?php if ( is_search() ) : // Only display Excerpts for Search ?>
						<div class="entry-summary">
							
						</div><!-- .entry-summary -->
						<?php else : ?>
						<div class="entry-content">

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