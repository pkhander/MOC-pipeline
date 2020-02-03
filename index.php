<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 */

get_header(); 
?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php

        $first_post_slide = get_theme_mod( 'first_post_slide' );
        $second_post_slide = get_theme_mod( 'second_post_slide' );
        $third_post_slide = get_theme_mod( 'third_post_slide' );
        $first_post = get_page_by_title($first_post_slide, OBJECT, 'post');
        $second_post = get_page_by_title($second_post_slide, OBJECT, 'post');
        $third_post = get_page_by_title($third_post_slide, OBJECT, 'post');

        $themecheck_checkbox_setting_id = get_theme_mod( 'themecheck_checkbox_setting_id' );
        if($themecheck_checkbox_setting_id != 0) {
            if(!empty($first_post) && !empty($second_post) && !empty($third_post)) {
                
                $thumbnail_src_first_post = wp_get_attachment_image_src( get_post_thumbnail_id( $first_post->ID ),'political_blog_1400x350' ); 
                $thumbnail_src_second_post = wp_get_attachment_image_src( get_post_thumbnail_id( $second_post->ID ),'political_blog_1400x350' ); 
                $thumbnail_src_third_post = wp_get_attachment_image_src( get_post_thumbnail_id( $third_post->ID ),'political_blog_1400x350' );         
                ?>

                <div class="political-homepage-slider">
                    <div id="political-homepage-slider-owl-top" class="owl-carousel owl-theme">
                        <div class="item">
                            <div class="posts_carousel_single__body">
                                <div class="posts_carousel_single__body__div">
                                    <span class="post-date-author">
                                        <span class="date"><i class="icon-calendar"></i> <?php echo esc_html(get_the_date(get_option('date_format'),$first_post->ID)); ?></span>
                                        <?php $author_id_1 = $first_post->post_author; ?>
                                        <?php esc_html_e('| ','political') ?> <span class="author"> <?php the_author_meta( 'display_name' , $author_id_1 ); ?></span>
                                    </span>
                                    <a href="<?php esc_url(the_permalink($first_post->ID)); ?>" class="relative">
                                        <h5><?php echo esc_html(get_the_title($first_post->ID)); ?></h5>
                                    </a> 
                                    <span class="post-tags">
                                        <?php echo get_the_term_list( $first_post->ID, 'category', '', ', ' ); ?>
                                    </span>
                                </div>
                            </div>
                            <?php if($thumbnail_src_first_post) { ?> 
                                <div class="item-image"><img class="blog_post_image" src="<?php echo esc_url($thumbnail_src_first_post[0]); ?>" alt="<?php echo esc_attr(get_the_title($first_post->ID)); ?>" /></div>                              
                            <?php } ?>                   
                        </div>
                        <div class="item">
                            <div class="posts_carousel_single__body">
                                <div class="posts_carousel_single__body__div">
                                    <span class="post-date-author">
                                        <span class="date"><i class="icon-calendar"></i> <?php echo esc_html(get_the_date(get_option('date_format'),$second_post->ID)); ?></span>
                                        <?php $author_id_2 = $second_post->post_author; ?>
                                        <?php esc_html_e('| ','political') ?> <span class="author"> <?php the_author_meta( 'display_name' , $author_id_2 ); ?></span>
                                    </span>
                                    <a href="<?php esc_url(the_permalink($second_post->ID)); ?>" class="relative">
                                        <h5><?php echo esc_html(get_the_title($second_post->ID)); ?></h5>
                                    </a> 
                                    <span class="post-tags">
                                        <?php echo get_the_term_list( $second_post->ID, 'category', '', ', ' ); ?>
                                    </span>
                                </div>
                            </div>
                            <?php if($thumbnail_src_second_post) { ?> 
                                <div class="item-image"><img class="blog_post_image" src="<?php echo esc_url($thumbnail_src_second_post[0]); ?>" alt="<?php echo esc_attr(get_the_title($second_post->ID)); ?>" /></div>                              
                            <?php } ?>                     
                        </div>
                        <div class="item">
                            <div class="posts_carousel_single__body">
                                <div class="posts_carousel_single__body__div">
                                    <span class="post-date-author">
                                        <span class="date"><i class="icon-calendar"></i> <?php echo esc_html(get_the_date(get_option('date_format'),$third_post->ID)); ?></span>
                                        <?php $author_id_3 = $third_post->post_author; ?>
                                        <?php esc_html_e('| ','political') ?> <span class="author"> <?php the_author_meta( 'display_name' , $author_id_3 ); ?></span>
                                    </span>
                                    <a href="<?php esc_url(the_permalink($third_post->ID)); ?>" class="relative">
                                        <h5><?php echo esc_html(get_the_title($third_post->ID)); ?></h5>
                                    </a> 
                                    <span class="post-tags">
                                        <?php echo get_the_term_list( $third_post->ID, 'category', '', ', ' ); ?>
                                    </span>
                                </div>
                            </div>
                            <?php if($thumbnail_src_third_post) { ?> 
                                <div class="item-image"><img class="blog_post_image" src="<?php echo esc_url($thumbnail_src_third_post[0]); ?>" alt="<?php echo esc_attr(get_the_title($third_post->ID)); ?>" /></div>                              
                            <?php } ?>
                        </div>
                    </div>
                    <div id="political-homepage-slider-owl-bottom" class="owl-carousel owl-theme">
                       <div class="item">
                            <div class="posts_carousel_single__body_recent">
                                <span class="post-date-author">
                                    <span class="date"><i class="icon-calendar"></i> <?php echo esc_html(get_the_date(get_option('date_format'),$first_post->ID)); ?></span>
                                    <?php $author_id_1 = $first_post->post_author; ?>
                                    <?php esc_html_e('| ','political') ?> <span class="author"> <?php the_author_meta( 'display_name' , $author_id_1 ); ?></span>
                                </span>
                                <a href="<?php esc_url(the_permalink($first_post->ID)); ?>" class="relative">
                                    <h5><?php echo esc_html(get_the_title($first_post->ID)); ?></h5>
                                </a> 
                                <span class="post-tags">
                                    <?php echo get_the_term_list( $first_post->ID, 'category', '', ', ' ); ?>
                                </span>
                            </div>                           
                       </div>
                       <div class="item">
                            <div class="posts_carousel_single__body_recent">
                                <span class="post-date-author">
                                    <span class="date"><i class="icon-calendar"></i> <?php echo esc_html(get_the_date(get_option('date_format'),$second_post->ID)); ?></span>
                                    <?php $author_id_2 = $second_post->post_author; ?>
                                    <?php esc_html_e('| ','political') ?> <span class="author"> <?php the_author_meta( 'display_name' , $author_id_2 ); ?></span>
                                </span>
                                <a href="<?php esc_url(the_permalink($second_post->ID)); ?>" class="relative">
                                    <h5><?php echo esc_html(get_the_title($second_post->ID)); ?></h5>
                                </a>
                                <span class="post-tags">
                                    <?php echo get_the_term_list( $second_post->ID, 'category', '', ', ' ); ?>
                                </span> 
                            </div>                       
                       </div>
                       <div class="item">
                            <div class="posts_carousel_single__body_recent">
                                <span class="post-date-author">
                                    <span class="date"><i class="icon-calendar"></i> <?php echo esc_html(get_the_date(get_option('date_format'),$third_post->ID)); ?></span>
                                    <?php $author_id_3 = $third_post->post_author; ?>
                                    <?php esc_html_e('| ','political') ?> <span class="author"> <?php the_author_meta( 'display_name' , $author_id_3 ); ?></span>
                                </span>
                                <a href="<?php esc_url(the_permalink($third_post->ID)); ?>" class="relative">
                                    <h5><?php echo esc_html(get_the_title($third_post->ID)); ?></h5>
                                </a> 
                                 <span class="post-tags">
                                    <?php echo get_the_term_list( $third_post->ID, 'category', '', ', ' ); ?>
                                </span>
                            </div>                  
                      </div>
                    </div>
                </div>

                <?php

            } 
        }

    ?>

    <!-- Page content -->
    <div class="high-padding" id="main-content">
        <!-- Blog content -->
        <div class="container blog-posts">
            <div class="row">

                <div class="col-md-9 main-content">
                <?php if ( have_posts() ) : ?>
                    <div class="row">

                        <?php /* Start the Loop */ ?>
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php /* Loop - Variant 1 */ ?>
                            <?php get_template_part( 'content', 'blogloop-v3' ); ?>
                        <?php endwhile; ?>

                        <div class="political-pagination-holder col-md-12">             
                            <div class="political-pagination pagination">             
                                <?php the_posts_pagination(); ?>
                            </div>
                        </div>
                    </div>
                <?php else : ?>
                    <?php get_template_part( 'content', 'none' ); ?>
                <?php endif; ?>
                </div>

                <div class="col-md-3 sidebar-content">
                    <?php get_sidebar(); ?>
                </div>

            </div>
        </div>
    </div>
<?php get_footer(); ?>