<?php
/**
 * Theme Info
 *
 * Adds a simple Theme Info page to the Appearance section of the WordPress Dashboard.
 *
 * @package political
 */
/**
 * Add Theme Info page to admin menu
 */
function political_theme_info_menu_link() {
	// Get theme details.
	$theme = wp_get_theme();
	add_theme_page(
		sprintf( esc_html__( 'Welcome to %1$s %2$s', 'political' ), esc_html($theme->display( 'Name' )), esc_html($theme->display( 'Version' )) ),
		esc_html__( 'Political Lite', 'political' ),
		'edit_theme_options',
		'political',
		'political_theme_info_page'
	);
}
add_action( 'admin_menu', 'political_theme_info_menu_link' );
/**
 * Display Theme Info page
 */
function political_theme_info_page() {
	// Get theme details.
	$theme = wp_get_theme();
	?>
	<div class="wrap theme-info-wrap">
		<h1><?php printf( esc_html__( 'Welcome to %1$s %2$s', 'political' ), esc_html($theme->display( 'Name' )), esc_html($theme->display( 'Version' ) )); ?></h1>
		<div class="theme-description"><p><?php echo esc_html($theme->display( 'Description' )); ?></p></div>
		<h2 class="nav-tab-wrapper wp-clearfix">
			<a target="_blank" href="<?php echo esc_url('https://wpcomb.com/political-theme/'); ?>" class="nav-tab"><?php echo esc_html__('Free vs PRO', 'political'); ?></a>
			<a target="_blank" href="<?php echo esc_url('http://wpcomb.com/themes/political/'); ?>" class="nav-tab"><?php echo esc_html__('Live Demo', 'political'); ?></a>
			<a target="_blank" href="<?php echo esc_url('http://docs.wpcomb.com/political'); ?>" class="nav-tab"><?php echo esc_html__('Documentation', 'political'); ?></a>
			<a href="https://wordpress.org/support/theme/political/reviews/#new-post" class="nav-tab"><?php echo esc_html__('Rate this Theme', 'political'); ?></a>
			<a href="<?php echo esc_url(home_url().'/wp-admin/themes.php?page=tgmpa-install-plugins'); ?>" class="nav-tab"><?php echo esc_html__('Recomended Plugins', 'political'); ?></a>
		</h2>
		<div id="getting-started">
			<div class="columns-wrapper clearfix">
				<div class="column column-half clearfix">
					<div class="section">
						<h3 class="title"><?php printf( esc_html__( 'Getting Started with %s', 'political' ), esc_html($theme->display( 'Name' )) ); ?></h3>
						<p>
							<a href="https://wpcomb.com/political-theme/" target="_blank" class="button button-primary button-hero"><?php esc_html_e( 'Get Political PRO now', 'political' ); ?></a>
						</p>
					</div>
					<div class="section">
						<h4><?php esc_html_e( 'Theme Options', 'political' ); ?></h4>
						<p class="about">
							<?php printf( esc_html__( '%s makes use of the Customizer for all theme settings. Click on "Customize Theme" to open the Customizer now.', 'political' ), esc_html($theme->display( 'Name' )) ); ?>
						</p>
						<p>
							<a href="<?php echo esc_url(wp_customize_url()); ?>" class="button button-primary"><?php esc_html_e( 'Customize Theme', 'political' ); ?></a>
						</p>
					</div>
				</div>
				<div class="column column-half clearfix">
					<img class="screenshot" width="500" src="<?php echo esc_url(get_template_directory_uri() . '/screenshot.png'); ?>" />
				</div>
			</div>
		</div>
	</div>
	<?php
}