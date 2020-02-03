/*
 File name:          Custom JS
*/

(function ($) {
    'use strict';


    // jQuery preloader
    jQuery(window).load(function(){
        jQuery( '.political_preloader_holder' ).fadeOut( 1000, function() {
            jQuery( this ).fadeOut();
        });
    });


    jQuery( document ).ready(function() {

        jQuery('[data-toggle="tooltip"]').tooltip();

        // virtual tour
        if (jQuery('.popup-vimeo-youtube').length) {
            jQuery(".popup-vimeo-youtube").magnificPopup({
                type:"iframe",
                disableOn: 700,
                removalDelay: 160,
                preloader: false,
                fixedContentPos: false
            });
        }
        

        // FIXED SEARCH FORM
        jQuery('.mt-search-icon').on( "click", function() {
            jQuery('.fixed-search-overlay').toggleClass('visible');
        });

        jQuery('.fixed-search-overlay .icon-close').on( "click", function() {
            jQuery('.fixed-search-overlay').removeClass('visible');
        });
        jQuery(document).keyup(function(e) {
             if (e.keyCode == 27) { // escape key maps to keycode `27`
                jQuery('.fixed-search-overlay').removeClass('visible');
                jQuery('.fixed-sidebar-menu').removeClass('open');
                jQuery('.fixed-sidebar-menu-overlay').removeClass('visible');
            }
        });



        jQuery('#mt-nav-burger').on( "click", function() {
            // jQuery(this).toggleClass('open');
            jQuery('.fixed-sidebar-menu').toggleClass('open');
            jQuery(this).parent().find('#navbar').toggleClass('hidden');
            jQuery('.fixed-sidebar-menu-overlay').addClass('visible');
        });

        /* Click on Overlay - Hide Overline / Slide Back the Sidebar header */
        jQuery('.fixed-sidebar-menu-overlay').on( "click", function() {
            jQuery('.fixed-sidebar-menu').removeClass('open');
            jQuery(this).removeClass('visible');
        });    
        /* Click on Overlay - Hide Overline / Slide Back the Sidebar header */
        jQuery('.fixed-sidebar-menu .icon-close').on( "click", function() {
            jQuery('.fixed-sidebar-menu').removeClass('open');
            jQuery('.fixed-sidebar-menu-overlay').removeClass('visible');
        });




        // 9th MENU Toggle - Hamburger
        var toggles = document.querySelectorAll(".c-hamburger");

        for (var i = toggles.length - 1; i >= 0; i--) {
          var toggle = toggles[i];
          toggleHandler(toggle);
        };

        function toggleHandler(toggle) {
          toggle.addEventListener( "click", function(e) {
            e.preventDefault();
            (this.classList.contains("is-btn-active") === true) ? this.classList.remove("is-btn-active") : this.classList.add("is-btn-active");
          });
        }



        jQuery( ".see_map_button" ).on( "click", function() {
            jQuery( "#map_wrapper_overlay" ).fadeOut('slow');
        });


        jQuery( ".fixed-sidebar-menu .menu-button" ).on( "click", function() {
            jQuery(this).parent().parent().parent().parent().toggleClass('open');
            jQuery(this).toggleClass('open');
        });


        if (jQuery(window).width() < 768) {

            var expand = '<span class="expand"><a class="action-expand"></a></span>';
            jQuery('.navbar-collapse .menu-item-has-children').append(expand);
            jQuery(".menu-item-has-children .expand a").click(function() {
                jQuery(this).parent().parent().find(' > ul').toggle();
                jQuery(this).toggleClass("show-menu");
            });
        }
        
        //End: Validate and Submit contact form via Ajax

        
        //Begin: Sticky Head
        jQuery(function(){
           if (jQuery('body').hasClass('is_nav_sticky')) {
                jQuery(window).resize(function() {
                    if (jQuery(window).width() <= 768) {
                    // console.log('smaller-than-767');
                    } else {
                        jQuery("#political-main-head").sticky({
                            topSpacing:0
                        });
                    }
                });
                if (jQuery(window).width() >= 768) {
                    jQuery("#political-main-head").sticky({
                        topSpacing:0
                    });
                }
           }
        });



        /**
         * Skin Link Focus Fix
        **/
        ( function() {
            var is_webkit = navigator.userAgent.toLowerCase().indexOf( 'webkit' ) > -1,
                is_opera  = navigator.userAgent.toLowerCase().indexOf( 'opera' )  > -1,
                is_ie     = navigator.userAgent.toLowerCase().indexOf( 'msie' )   > -1;

            if ( ( is_webkit || is_opera || is_ie ) && document.getElementById && window.addEventListener ) {
                window.addEventListener( 'hashchange', function() {
                    var element = document.getElementById( location.hash.substring( 1 ) );

                    if ( element ) {
                        if ( ! /^(?:a|select|input|button|textarea)$/i.test( element.tagName ) ) {
                            element.tabIndex = -1;
                        }

                        element.focus();
                    }
                }, false );
            }
        })();

        
        /*End: Pastors slider*/
        /*Begin: Products by category*/
        var owl = jQuery(".post_thumbnails_slider");
        jQuery( ".next" ).on( "click", function() {
            owl.trigger('owl.next');
        })
        jQuery( ".prev" ).on( "click", function() {
            owl.trigger('owl.prev');
        })
        /*End: Testimonials slider*/
        
        /*Begin: Testimonials slider*/
        jQuery(".testimonials_slider").owlCarousel({
            navigation      : true, // Show next and prev buttons
            pagination      : true,
            autoPlay        : false,
            slideSpeed      : 700,
            paginationSpeed : 700,
            singleItem      : true
        });
        /*End: Testimonials slider*/
        // browser window scroll (in pixels) after which the "back to top" link is shown
        var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
        offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
        scroll_top_duration = 700,
        //grab the "back to top" link
        $back_to_top = jQuery('.back-to-top');




        //hide or show the "back to top" link
        jQuery(window).scroll(function(){
            ( jQuery(this).scrollTop() > offset ) ? $back_to_top.addClass('political-is-visible') : $back_to_top.removeClass('political-is-visible political-fade-out');
            if( jQuery(this).scrollTop() > offset_opacity ) { 
                $back_to_top.addClass('political-fade-out');
            }
        });


        // SITE NAVIGATION
        ( function() {
            var container, button, menu;

            container = document.getElementById( 'site-navigation' );
            if ( ! container ) {
                return;
            }

            button = container.getElementsByTagName( 'button' )[0];
            if ( 'undefined' === typeof button ) {
                return;
            }

            menu = container.getElementsByTagName( 'ul' )[0];

            // Hide menu toggle button if menu is empty and return early.
            if ( 'undefined' === typeof menu ) {
                button.style.display = 'none';
                return;
            }

            menu.setAttribute( 'aria-expanded', 'false' );

            if ( -1 === menu.className.indexOf( 'nav-menu' ) ) {
                menu.className += ' nav-menu';
            }

            button.onclick = function() {
                if ( -1 !== container.className.indexOf( 'toggled' ) ) {
                    container.className = container.className.replace( ' toggled', '' );
                    button.setAttribute( 'aria-expanded', 'false' );
                    menu.setAttribute( 'aria-expanded', 'false' );
                } else {
                    container.className += ' toggled';
                    button.setAttribute( 'aria-expanded', 'true' );
                    menu.setAttribute( 'aria-expanded', 'true' );
                }
            };
        } )();


        //smooth scroll to top
        $back_to_top.on('click', function(event){
            event.preventDefault();
            $('body,html').animate({
                scrollTop: 0 ,
                }, scroll_top_duration
            );
        });


        // contact form effect
        (function() {
            if (!String.prototype.trim) {
              (function() {
                // Make sure we trim BOM and NBSP
                var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
                String.prototype.trim = function() {
                  return this.replace(rtrim, '');
                };
              })();
            }

            [].slice.call( document.querySelectorAll( 'input.input__field' ) ).forEach( function( inputEl ) {
              // in case the input is already filled..
              if( inputEl.value.trim() !== '' ) {
                classie.add( inputEl.parentNode, 'input--filled' );
              }

              // events:
              inputEl.addEventListener( 'focus', onInputFocus );
              inputEl.addEventListener( 'blur', onInputBlur );
            } );

            function onInputFocus( ev ) {
              classie.add( ev.target.parentNode, 'input--filled' );
            }

            function onInputBlur( ev ) {
              if( ev.target.value.trim() === '' ) {
                classie.remove( ev.target.parentNode, 'input--filled' );
              }
            }
          })();



        /* Slider homepage */ 
          var sync1 = jQuery("#political-homepage-slider-owl-top");
          var sync2 = jQuery("#political-homepage-slider-owl-bottom");
         
          sync1.owlCarousel({
            singleItem : true,
            navigation: false,
            pagination:false,
            afterAction : syncPosition,
            responsiveRefreshRate : 200,
            transitionStyle : "fade",
          });
         
          sync2.owlCarousel({
            items : 3,
            itemsDesktop      : [1199,3],
            itemsDesktopSmall : [979,3],
            itemsTablet       : [768,2],
            itemsMobile       : [479,1],
            pagination:false,
            responsiveRefreshRate : 100,
            afterInit : function(el){
              el.find(".owl-item").eq(0).addClass("synced");
            }
          });
         
          function syncPosition(el){
            var current = this.currentItem;
            jQuery("#political-homepage-slider-owl-bottom")
              .find(".owl-item")
              .removeClass("synced")
              .eq(current)
              .addClass("synced")
            if(jQuery("#political-homepage-slider-owl-bottom").data("owlCarousel") !== undefined){
              center(current)
            }
          }
         
          jQuery("#political-homepage-slider-owl-bottom").on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = jQuery(this).data("owlItem");
            sync1.trigger("owl.goTo",number);
          });
         
          function center(number){
            var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
            var num = number;
            var found = false;
            for(var i in sync2visible){
              if(num === sync2visible[i]){
                var found = true;
              }
            }
         
            if(found===false){
              if(num>sync2visible[sync2visible.length-1]){
                sync2.trigger("owl.goTo", num - sync2visible.length+2)
              }else{
                if(num - 1 === -1){
                  num = 0;
                }
                sync2.trigger("owl.goTo", num);
              }
            } else if(num === sync2visible[sync2visible.length-1]){
              sync2.trigger("owl.goTo", sync2visible[1])
            } else if(num === sync2visible[0]){
              sync2.trigger("owl.goTo", num-1)
            }
            
          }
         


    })
} (jQuery) )
