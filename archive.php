<?php
/**
 * The template for displaying archive pages.
 *
 */

get_header(); 
?>

    <!-- HEADER TITLE BREADCRUBS SECTION -->
    <?php echo wp_kses_post(political_header_title_breadcrumbs()); ?>

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