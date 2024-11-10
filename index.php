<?php
/**
 * Main template file.
 *
 * @package rianxtheme
 */

get_header();
 
?>
<div id="primary">
	<main id="main" class="site-main mt-5" role="mail">
		<?php
		if ( have_posts() ) :
			?>
			<div class="container">
				<?php
				if ( is_home() && ! is_front_page() ) {
					?>
					<header class="mb-5">
						<h1 class="page-title screen-reader-text">
							<?php single_post_title(); ?>
						</h1>
					</header>
					<?php
				}
				?>

				<div class="row">
					<?php 
					$posts_count = wp_count_posts() -> publish;

					while( have_posts() ) : the_post(); 

						if( $posts_count == 1 ) { 
							?>
							<div class="col-md-12">
							<?php 
						} elseif ( $posts_count == 2 ) { 
							?>
							<div class="col-md-6 col-sm-12">
							<?php  
						} elseif ( $posts_count >= 2 ) { 
							?>
							<div class="col-lg-4 col-md-6 col-sm-12">
							<?php 
						} 

						// The inner content
						get_template_part( 'template_parts/content' );        
                        
                        ?>
						</div> <!-- End of the colomns -->            
					<?php 
					endwhile; 
					?>
				</div>

			</div>
			<?php

			else : 
				get_template_part( 'template_parts/content-none' );        

			endif;
		?>
	</main>
</div>

<?php
get_footer();