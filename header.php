<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php esc_attr(bloginfo( 'charset' )); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
    <a class="skip-link screen-reader-text" href="#main-content"><?php esc_html_e( 'Skip to content', 'political' ); ?></a>


    <?php
        echo '<div class="political_preloader_holder">'.wp_kses_post(political_loader_animation()).'</div>'; 
    ?>

    <?php /* SEARCH BLOCK */ ?>
    <!-- Fixed Search Form -->
    <div class="fixed-search-overlay">
        <!-- Close Sidebar Menu + Close Overlay -->
        <i class="icon-close icons"></i>
        <!-- INSIDE SEARCH OVERLAY -->
        <div class="fixed-search-inside">
            <div class="political-search">
                <?php echo get_search_form(); ?>
            </div>
        </div>
    </div>

    <!-- PAGE #page -->
    <div id="page" class="hfeed site">
        <?php          
            get_template_part( 'templates/template-header2');
        ?>