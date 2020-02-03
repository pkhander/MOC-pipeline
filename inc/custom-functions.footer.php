<?php
/**
CUSTOM FOOTER FUNCTIONS
*/


// SITE PRELOADER ANIMATION: From theme options panel
function political_loader_animation(){
    
    $html = '';

        $html .= '<div class="bitwallet_preloader v8_ball_pulse_rise">
                        <div class="loaders">
                            <div class="loader">
                                <div class="loader-inner ball-pulse-rise">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                            </div>
                        </div>
                    </div>'; 

    return $html;
}


/**
Function name:              political_footer_row1()
Function description:       Footer row 1
*/
function political_footer_row1(){

    $footer_title1 = get_theme_mod( 'footer_title1_id' );
    $footer_title2 = get_theme_mod( 'footer_title2_id' );
    $footer_title3 = get_theme_mod( 'footer_title3_id' );
    $footer_title4 = get_theme_mod( 'footer_title4_id' );

    if(!empty($footer_title1) || !empty($footer_title2) || !empty($footer_title3) || !empty($footer_title4)) {

        echo '<div class="row">';
            echo '<div class="col-md-12 footer-row-1">';
                echo '<div class="row">';

                    echo '<div class="col-md-3 sidebar-1">';
                        echo '<h1 class="widget-title">';                          
                            echo esc_html($footer_title1);
                        echo '</h1>';
                        echo '<p class="description">';
                            $footer_widget_column1 = get_theme_mod( 'footer_widget_column1' );
                            if(!empty($footer_widget_column1)) {
                                the_widget($footer_widget_column1); 
                            }
                        echo '</p>';
                    echo '</div>';

                    echo '<div class="col-md-3 sidebar-2">';
                        echo '<h1 class="widget-title">';                           
                            echo esc_html($footer_title2);
                        echo '</h1>';
                        $footer_widget_column2 = get_theme_mod( 'footer_widget_column2' );
                        if(!empty($footer_widget_column2)) {
                            the_widget($footer_widget_column2); 
                        }
                    echo '</div>';

                    echo '<div class="col-md-3 sidebar-3">';
                        echo '<h1 class="widget-title">';                           
                            echo esc_html($footer_title3);
                        echo '</h1>';
                        $footer_widget_column3 = get_theme_mod( 'footer_widget_column3' );
                        if(!empty($footer_widget_column3)) {
                            the_widget($footer_widget_column3); 
                        }
                    echo '</div>';

                    echo '<div class="col-md-3 sidebar-4">';
                        echo '<h1 class="widget-title">';                          
                            echo esc_html($footer_title4);
                        echo '</h1>';
                        $footer_phone = get_theme_mod( 'footer_phone' );
                        if(!empty($footer_phone)) {
                            echo '<p class="social-phone"><span>Phone:</span> ';
                                echo esc_html($footer_phone);
                            echo '</p>';
                        }
                        $footer_email = get_theme_mod( 'footer_email' );
                        if(!empty($footer_email)) {
                            echo '<p class="social-email"><span>Email:</span> ';
                                echo esc_html($footer_email);
                            echo '</p>';
                        }
                        $footer_facebook = get_theme_mod( 'footer_facebook' );
                        $footer_twitter = get_theme_mod( 'footer_twitter' );
                        $footer_linkedin = get_theme_mod( 'footer_linkedin' );
                        $footer_telegram = get_theme_mod( 'footer_telegram' );
                        $footer_google = get_theme_mod( 'footer_google' );
                        echo '<ul class="social-links">';
                            if(!empty($footer_facebook)) {
                                echo '<li><a href="'.esc_url($footer_facebook).'"><i class="fa fa-facebook"></i></a></li>';
                            }
                            if(!empty($footer_twitter)) {
                                echo '<li><a href="'.esc_url($footer_twitter).'"><i class="fa fa-twitter"></i></a></li>';
                            }
                            if(!empty($footer_linkedin)) {
                                echo '<li><a href="'.esc_url($footer_linkedin).'"><i class="fa fa-linkedin"></i></a></li>';
                            }
                            if(!empty($footer_telegram)) {
                                echo '<li><a href="'.esc_url($footer_telegram).'"><i class="fa fa-telegram"></i></a></li>';
                            }
                            if(!empty($footer_google)) {
                                echo '<li><a href="'.esc_url($footer_google).'"><i class="fa fa-google-plus"></i></a></li>';
                            }                            
                        echo '</ul>';
                    echo '</div>';


                echo '</div>';
            echo '</div>';
        echo '</div>';
    }
}