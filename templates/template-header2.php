<header class="header2">
  <div class="logo-infos">
    <div class="row">
      <!-- BOTTOM BAR -->
      <div class="container">
        <div class="row">

          <!-- LOGO -->
          <div class="navbar-header col-md-3 col-sm-4">
            <!-- NAVIGATION BURGER MENU -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php $custom_logo_id = get_theme_mod( 'custom_logo' );
            $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
            if ( !empty($logo) ) { ?>
              <h1 class="logo">
                <a href="<?php echo esc_url(home_url()); ?>">
                  <img src="<?php echo esc_url( $logo[0] ); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                </a>
              </h1>
            <?php } else { ?>
              <h1 class="logo no-logo">
                <a href="<?php echo esc_url(home_url()); ?>">
                  <?php echo esc_html(get_bloginfo()); ?>
                </a>
              </h1>
            <?php } ?>

            <div class="clearfix"></div>
            <?php if ( display_header_text() ) { ?>
              <h2 class="logo-desc">
                <?php echo esc_html(get_bloginfo('description')); ?>
              </h2>
            <?php } ?>
          </div>

          
          <?php if (get_theme_mod( 'political_ad_image' ) && get_theme_mod('political_ad_link')) { ?>
	          <div class="col-md-9 col-sm-8">
	            <div class="header-infos header-light-holder text-right">
	              <a href="<?php echo esc_url(get_theme_mod( 'political_ad_link' )); ?>"><img alt="ad-image" src="<?php echo esc_url(get_theme_mod( 'political_ad_image' )); ?>"></a>
	            </div>
	          </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>



  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="political-main-head">
    <div class="container">
      <div class="row">
        <!-- NAV MENU -->
        <div id="navbar" class="navbar-collapse collapse col-md-9 col-sm-9">
          <ul class="menu nav navbar-nav pull-left nav-effect nav-menu">
            <?php
              if ( has_nav_menu( 'primary' ) ) {
                $defaults = array(
                  'menu'            => '',
                  'container'       => false,
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => 'menu',
                  'menu_id'         => '',
                  'echo'            => true,
                  'fallback_cb'     => false,
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '%3$s',
                  'depth'           => 0,
                  'walker'          => ''
                );

                $defaults['theme_location'] = 'primary';

                wp_nav_menu( $defaults );
              }else{
				$user = wp_get_current_user();
				if ( in_array( 'administrator', (array) $user->roles ) ) {
	                echo '<p class="no-menu text-right">';
	                  echo esc_html__('Primary navigation menu is missing. Add one from ', 'political');
	                  echo '<strong>'.esc_html__(' Appearance -> Menus','political').'</strong>';
	                echo '</p>';
				}
              }
            ?>
          </ul>
        </div>
        <div class="col-md-3 col-sm-3 right-side-social-actions">
          <!-- ACTIONS BUTTONS GROUP -->
          <div class="pull-right actions-group">
            <!-- SEARCH ICON -->
            <a href="<?php echo esc_url('#'); ?>" class="mt-search-icon">
              <i class="fa fa-search" aria-hidden="true"></i>
            </a>
          </div>
        </div>

      </div>
    </div>
  </nav>
</header>