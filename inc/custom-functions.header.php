<?php
/**
CUSTOM HEADER FUNCTIONS
*/




// Add specific CSS class by filter
if (!function_exists('political_body_classes')) {
    function political_body_classes( $classes ) {

    	$theme_init = new Political_Init_Class;
        $header_version = 'header2';

        // HEADER NAVIGATION HOVER STYLE
    	$header_nav_hover = $theme_init->political_navstyle_variant();
    	$header_nav_submenu_variant = $theme_init->political_get_header_nav_submenu_variant();
    	$sidebar_widgets_variant = $theme_init->political_get_sidebar_widgets_variant();

        $classes[] = esc_attr($header_nav_submenu_variant). ' ' .esc_attr($sidebar_widgets_variant).' ' .esc_attr($header_nav_hover).' '.esc_attr($header_version);

        return $classes;

    }
}
add_filter( 'body_class', 'political_body_classes' );


/**
||-> FUNCTION: GET DYNAMIC CSS
*/
if (!function_exists('political_dynamic_css')) {
    function political_dynamic_css(){

        $html = '';

        // THEME INIT
        $theme_init = new Political_Init_Class;

        // BEGIN: CUSTOMIZER COLORS ================================================================================
        $header_links_colors = get_theme_mod( 'header_links_colors' );
        $header_background_color = get_theme_mod( 'header_background_color' );
        if(empty($header_background_color)) {
            $header_background_color = '#E3111A';
        }

        // THEME OPTIONS STYLESHEET
        if(isset($header_links_colors)) {
            $html .= '.navbar-header .logo > a:hover, .navbar-header .logo > a{
                color:'.esc_html($header_links_colors).' !important;
            }';
        }
        
        if(empty($header_links_colors)) {
            $header_links_colors = '#ffffff';
        }

    	// BEGIN: REVAMP SKIN COLORS ===============================================================================
    	$skin_main_bg = $theme_init->political_get_fallback_primary_color(); //Fallback primary background color
    	$skin_main_bg_hover = $theme_init->political_get_fallback_primary_color_hover(); //Fallback primary background hover color
    	$skin_main_texts = $theme_init->political_get_fallback_main_texts(); //Fallback main text color
    	$skin_semitransparent_blocks = $theme_init->political_get_fallback_semitransparent_blocks(); //Fallback semitransparent blocks

    	// FALLBACKS
    	$breadcrumbs_delimitator = '/';
    	$logo_max_width = '270';
    	$text_selection_color = '#ffffff';
    	$body_global_bg = '#ffffff';


        $html .= '.breadcrumb a::after {
    	        	  content: "'.esc_html($breadcrumbs_delimitator).'";
    	    	}
    	    	body{
    		        background: '.esc_html($body_global_bg).';
    	    	}
        		.logo img,
    			.navbar-header .logo img {
    				max-width: '.esc_html($logo_max_width).'px;
    			}
    		    ::selection{
    		        color: '.esc_html($text_selection_color).';
    		        background: '.esc_html($skin_main_bg).';
    		    }
    		    ::-moz-selection { /* Code for Firefox */
    		        color: '.esc_html($text_selection_color).';
    		        background: '.esc_html($skin_main_bg).';
    		    }

    		    a{
    		        color: '.esc_html($skin_main_bg).';
    		    }
    		    a:focus,
    		    a:visited,
    		    a:hover{
    		        color: '.esc_html($skin_main_bg_hover).';
    		    }

    		    /*------------------------------------------------------------------
    		        COLOR
    		    ------------------------------------------------------------------*/
    		    a, 
    		    a:hover, 
    		    a:focus,
    		    .mt_listing--tax-type,
    		    span.amount,
    		    .widget_popular_recent_tabs .nav-tabs li.active a,
    		    .widget_archive li:hover,
    		    .widget_archive li a:hover,
    		    .widget_categories .cat-item:hover,
    		    .widget_categories li a:hover,
    		    .pricing-table.recomended .button.solid-button, 
    		    .pricing-table .table-content:hover .button.solid-button,
    		    .pricing-table.Recommended .button.solid-button, 
    		    .pricing-table.recommended .button.solid-button, 
    		    #sync2 .owl-item.synced .post_slider_title,
    		    #sync2 .owl-item:hover .post_slider_title,
    		    #sync2 .owl-item:active .post_slider_title,
    		    .pricing-table.recomended .button.solid-button, 
    		    .pricing-table .table-content:hover .button.solid-button,
    		    .testimonial-author,
    		    .testimonials-container blockquote::before,
    		    .testimonials-container blockquote::after,
    		    .post-author > a,
    		    h2 span,
    		    label.error,
    		    .author-name,
    		    .prev-next-post a:hover,
    		    .prev-text,
    		    .wpb_button.btn-filled:hover,
    		    .next-text,
    		    .social ul li a:hover i,
    		    .wpcf7-form span.wpcf7-not-valid-tip,
    		    .text-dark .statistics .stats-head *,
    		    .wpb_button.btn-filled,
    		    footer ul.menu li.menu-item a:hover,
    		    .widget_meta a:hover,
    		    .widget_pages a:hover,
    		    .blogloop-v1 .post-name a:hover,
    		    .blogloop-v2 .post-name a:hover,
    		    .blogloop-v3 .post-name a:hover,
    		    .blogloop-v4 .post-name a:hover,
    		    .blogloop-v5 .post-name a:hover,
    			.post-category-comment-date span a:hover,
    			.post-category-comment-date span:hover,
    			.list-view .post-details .post-category-comment-date i:hover,
    			.list-view .post-details .post-category-comment-date a:hover,
    		    .simple_sermon_content_top h4,
    		    .page_404_v1 h1,
    		    .mt_listings--single-main-pic .post-name > a,
    		    .widget_recent_comments li:hover a,
    		    .list-view .post-details .post-name a:hover,
    		    .blogloop-v5 .post-details .post-sticky-label i,
    		    header.header2 .header-info-group .header_text_title strong,
    		    .widget_recent_entries_with_thumbnail li:hover a,
    		    .widget_recent_entries li a:hover,
    		    .blogloop-v1 .post-details .post-sticky-label i,
    		    .blogloop-v2 .post-details .post-sticky-label i,
    		    .blogloop-v3 .post-details .post-sticky-label i,
    		    .blogloop-v4 .post-details .post-sticky-label i,
    		    .blogloop-v5 .post-details .post-sticky-label i,
                .mt_listing--price-day.mt_listing--price .mt_listing_price,
                .mt_listing--price-day.mt_listing--price .mt_listing_currency,
                .mt_listing--price-day.mt_listing--price .mt_listing_per,
    		    .error-404.not-found h1,
    		    .header-info-group i,     
    		    .action-expand::after,
                .posts_carousel_single__body h5:hover,
                .posts_carousel_single__body_recent h5:hover,
    		    .list-view .post-details .post-excerpt .more-link:hover,
    		    .header4 header .right-side-social-actions .social-links a:hover i,
    		    #navbar .menu-item.selected > a, #navbar .menu-item:hover > a,
    		    .sidebar-content .widget_nav_menu li a:hover{
    		        color: '.esc_html($skin_main_bg).';
    		    }


    		    /* NAVIGATION */
    		    .navstyle-v8.header3 #navbar .menu > .menu-item.current-menu-item > a, 
    		    .navstyle-v8.header3 #navbar .menu > .menu-item:hover > a,
    		    .navstyle-v1.header3 #navbar .menu > .menu-item:hover > a,
    		    .navstyle-v1.header2 #navbar .menu > .menu-item:hover > a,
    		    #navbar ul.sub-menu li a:hover,
    		    .navstyle-v4 #navbar .menu > .menu-item.current-menu-item > a,
    		    .navstyle-v4 #navbar .menu > .menu-item:hover > a,
    		    .navstyle-v3 #navbar .menu > .menu-item.current-menu-item > a, 
    		    .navstyle-v3 #navbar .menu > .menu-item:hover > a,
    		    .navstyle-v3 #navbar .menu > .menu-item > a::before, 
    			.navstyle-v3 #navbar .menu > .menu-item > a::after,
    			.navstyle-v2 #navbar .menu > .menu-item.current-menu-item > a,
    			.navstyle-v2 #navbar .menu > .menu-item:hover > a,
    		    #navbar .menu-item.selected > a, #navbar .menu-item:hover > a{
    		        color: '.esc_html($skin_main_bg).';
    			}
    			.nav-submenu-style1 #navbar .sub-menu .menu-item.selected > a, 
    			.nav-submenu-style1 #navbar .sub-menu .menu-item:hover > a,
    			.navstyle-v2.header3 #navbar .menu > .menu-item > a::before,
    			.navstyle-v2.header3 #navbar .menu > .menu-item > a::after,
    			.navstyle-v8 #navbar .menu > .menu-item > a::before,
    			.navstyle-v7 #navbar .menu > .menu-item .sub-menu > .menu-item > a:hover,
    			.navstyle-v7 #navbar .menu > .menu-item.current_page_item > a,
    			.navstyle-v7 #navbar .menu > .menu-item.current-menu-item > a,
    			.navstyle-v7 #navbar .menu > .menu-item:hover > a,
    			.navstyle-v6 #navbar .menu > .menu-item.current_page_item > a,
    			.navstyle-v6 #navbar .menu > .menu-item.current-menu-item > a,
    			.navstyle-v6 #navbar .menu > .menu-item:hover > a,
    			.navstyle-v5 #navbar .menu > .menu-item.current_page_item > a, 
    			.navstyle-v5 #navbar .menu > .menu-item.current-menu-item > a,
    			.navstyle-v5 #navbar .menu > .menu-item:hover > a,
    			.navstyle-v2 #navbar .menu > .menu-item > a::before, 
    			.navstyle-v2 #navbar .menu > .menu-item > a::after{
    				background: '.esc_html($header_links_colors).';
    			}


    			/* Color Dark / Hovers */
    			.related-posts .post-name:hover a{
    				color: '.esc_html($skin_main_bg_hover).';
    			}

    		    /*------------------------------------------------------------------
    		        BACKGROUND + BACKGROUND-COLOR
    		    ------------------------------------------------------------------*/
    		    .tagcloud > a:hover,
    		    .political-icon-search,
    		    .wpb_button::after,
    		    .rotate45,
    		    .latest-posts .post-date-day,
    		    .latest-posts h3, 
    		    .latest-tweets h3, 
    		    .latest-videos h3,
    		    .button.solid-button, 
    		    button.vc_btn,
    		    .pricing-table.recomended .table-content, 
    		    .pricing-table .table-content:hover,
    		    .pricing-table.Recommended .table-content, 
    		    .pricing-table.recommended .table-content, 
    		    .pricing-table.recomended .table-content, 
    		    .pricing-table .table-content:hover,
    		    .block-triangle,
    		    .owl-theme .owl-controls .owl-page span,
    		    body .vc_btn.vc_btn-blue, 
    		    body a.vc_btn.vc_btn-blue, 
    		    body button.vc_btn.vc_btn-blue,
    		    .pagination .page-numbers.current,
    		    .pagination .page-numbers:hover,
    		    #subscribe > button[type=\'submit\'],
    		    .social-sharer > li:hover,
    		    .prev-next-post a:hover .rotate45,
    		    .masonry_banner.default-skin,
    		    .form-submit input,
    		    .member-header::before, 
    		    .member-header::after,
    		    .member-footer .social::before, 
    		    .member-footer .social::after,
    		    .subscribe > button[type=\'submit\'],
    		    .no-results input[type=\'submit\'],
    		    h3#reply-title::after,
    		    .newspaper-info,
    		    .categories_shortcode .owl-controls .owl-buttons i:hover,
    		    .widget-title:after,
    		    h2.heading-bottom:after,
    		    .single .content-car-heading:after,
    		    .wpb_content_element .wpb_accordion_wrapper .wpb_accordion_header.ui-state-active,
    		    #primary .main-content ul li:not(.rotate45)::before,
    		    .wpcf7-form .wpcf7-submit,
    		    ul.ecs-event-list li span,
    		    #contact_form2 .solid-button.button,
    		    .navbar-default .navbar-toggle .icon-bar,
    		    .details-container > div.details-item .amount, .details-container > div.details-item ins,
    		    .political-search .search-submit,
    		    .pricing-table.recommended .table-content .title-pricing,
    		    .pricing-table .table-content:hover .title-pricing,
    		    .pricing-table.recommended .button.solid-button,
    		    #navbar ul.sub-menu li a:hover,
    		    .blogloop-v5 .absolute-date-badge span,
    		    .post-category-date a[rel="tag"],
    		    .political_preloader_holder,
    		    #navbar .mt-icon-list-item:hover,
    		    .mt_listing--single-gallery.mt_listing--featured-single-gallery:hover,
    		    footer .mc4wp-form-fields input[type="submit"],
    		    .political-pagination.pagination .page-numbers.current,
    		    .pricing-table .table-content:hover .button.solid-button,
    		    footer .footer-top .menu .menu-item a::before,
    		    .mt-car-search .submit .form-control,
    		    .blogloop-v4.list-view .post-date,
    		    header .top-header,
    		    .navbar-toggle .icon-bar,               
    		    .back-to-top,
                .posts_carousel_single__body span.post-tags,
                .posts_carousel_single__body_recent span.post-tags,
                .mt_listing--single-price-inner,
                input.wpcf7-form-control.wpcf7-submit,
    		    .post-password-form input[type="submit"],
    		    .search-form input[type="submit"],
                .btn-404-return,
    		    .post-password-form input[type=\'submit\'] {
    		        background: '.esc_html($skin_main_bg).';
    		    }
    		    .political-search.political-search-open .political-icon-search, 
    		    .no-js .political-search .political-icon-search,
    		    .political-icon-search:hover,
    		    .latest-posts .post-date-month,
    		    .button.solid-button:hover,
    		    body .vc_btn.vc_btn-blue:hover, 
    		    body a.vc_btn.vc_btn-blue:hover, 
    		    .post-category-date a[rel="tag"]:hover,
    		    .single-post-tags > a:hover,
    		    body button.vc_btn.vc_btn-blue:hover,
    		    .blogloop-v5 .absolute-date-badge span:hover,
    		    .mt-car-search .submit .form-control:hover,
    		    #contact_form2 .solid-button.button:hover,
    		    .subscribe > button[type=\'submit\']:hover,
    		    footer .mc4wp-form-fields input[type="submit"]:hover,
    		    .no-results.not-found .search-submit:hover,
    		    .no-results input[type=\'submit\']:hover,
    		    ul.ecs-event-list li span:hover,
    		    .pricing-table.recommended .table-content .price_circle,
    		    .pricing-table .table-content:hover .price_circle,
    		    #modal-search-form .modal-content input.search-input,
    		    .wpcf7-form .wpcf7-submit:hover,
    		    .form-submit input:hover,
    		    .blogloop-v4.list-view .post-date a:hover,
                .posts_carousel_single__body span.post-tags:hover,
                .posts_carousel_single__body_recent span.post-tags:hover,
    		    .pricing-table.recommended .button.solid-button:hover,
    		    .search-form input[type="submit"]:hover,
    		    .political-pagination.pagination .page-numbers.current:hover,
    		    .error-return-home.text-center > a:hover,
    		    .pricing-table .table-content:hover .button.solid-button:hover,
                input.wpcf7-form-control.wpcf7-submit:hover,
    		    .post-password-form input[type="submit"]:hover,
                .btn-404-return:hover,
    		    .navbar-toggle .navbar-toggle:hover .icon-bar,
    		    .back-to-top:hover,
    		    .post-password-form input[type=\'submit\']:hover {
    		        background: '.esc_html($skin_main_bg_hover).';
    		    }
    		    .tagcloud > a:hover{
    		        background: '.esc_html($skin_main_bg_hover).' !important;
    		    }
                .hover-components .component a:hover,
    		    .flickr_badge_image a::after,
    		    .thumbnail-overlay,
    		    .portfolio-hover,
    		    .pastor-image-content .details-holder,
    		    .item-description .holder-top,
    		    blockquote::before {
    		        background: '.esc_html($skin_semitransparent_blocks).';
    		    }

    		    /*------------------------------------------------------------------
    		        BORDER-COLOR
    		    ------------------------------------------------------------------*/
    		    .comment-form input, 
    		    .comment-form textarea,
    		    .author-bio,
    		    blockquote,
    		    .widget_popular_recent_tabs .nav-tabs > li.active,
    		    body .left-border, 
    		    body .right-border,
    		    body .member-header,
    		    body .member-footer .social,
    		    body .button[type=\'submit\'],
    		    .navbar ul li ul.sub-menu,
    		    .wpb_content_element .wpb_tabs_nav li.ui-tabs-active,
    		    #contact-us .form-control:focus,
    		    .sale_banner_holder:hover,
    		    .testimonial-img,
    		    .wpcf7-form input:focus, 
    		    .wpcf7-form textarea:focus,
    		    .navbar-default .navbar-toggle:hover, 
    		    .header_search_form,
    		    .list-view .post-details .post-excerpt .more-link:hover{
    		        border-color: '.esc_html($skin_main_bg).';
    		    }

    		    header .navbar-toggle,
    		    .navbar-default .navbar-toggle{
    		        border: 3px solid '.esc_html($skin_main_bg).';
    		    }
                .navstyle-v2.header2 #navbar .menu > .menu-item > a{
                    color:'.esc_html($header_links_colors).' !important;
                }
                .header2 #political-main-head {
                    background:'.esc_html($header_background_color).' !important;
                }
                ';

            $header_image = get_theme_mod( 'header_image' );
            if($header_image =! '') {
                $html .= 'header > .logo-infos {
                            background-image: url('.esc_url(get_theme_mod( 'header_image' )).');
                          }';
            }  


        wp_add_inline_style( 'political-mt-style', $html );
    }
}
add_action('wp_enqueue_scripts', 'political_dynamic_css' );