<?php
/*
* Template Name: Right Sidebar
*/

get_header(); 
?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php echo wp_kses_post(political_header_title_breadcrumbs()); ?>

    <!-- Page content -->
    <div id="primary" class="high-padding content-area no-sidebar">
        <!-- <div class=""> -->
        <div class="container">
            <div class="row">
                <main id="main" class="col-md-9 site-main main-content">
                    <?php while ( have_posts() ) : the_post(); ?>

                        <?php get_template_part( 'content', 'page' ); ?>

                        <?php
                            // If comments are open or we have at least one comment, load up the comment template
                            if ( comments_open() || get_comments_number() ) :
                                comments_template();
                            endif;
                        ?>

                    <?php endwhile; // end of the loop. ?>
                </main>
                <div class="col-md-3 sidebar-content">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>