<?php
/**
 * The template for displaying 404 pages (not found).
 *
 */

get_header(); ?>

	<!-- Page content -->
	<div id="primary" class="content-area">
	    <main id="main" class="container blog-posts site-main">
	        <div class="col-md-12 main-content">
				<section class="error-404 not-found">
					<header class="page-header-404">
						<div class="high-padding row">
							<div class="col-md-12">
								<h1 class="page-404-digits text-center"><?php esc_html_e( '404', 'political' ); ?></h1>
								<h2 class="page-title text-center"><?php esc_html_e( 'Sorry, this page does not exist', 'political' ); ?></h2>
								<p class="text-center"><?php esc_html_e( 'The link you clicked might be corrupted, or the page may have been removed.', 'political' ); ?></p>
								<div class="text-center">
									<a href="<?php echo esc_url(home_url()); ?>" class="btn btn-404-return" role="button"><?php echo esc_html__('Return to Homepage', 'political'); ?></a>
								</div>
							</div>
						</div>
					</header>
				</section>
			</div>
		</main>
	</div>

<?php get_footer(); ?>