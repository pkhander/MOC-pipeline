<?php
/**
* Content Single
*/
?>


<!-- HEADER TITLE BREADCRUBS SECTION -->
<?php echo wp_kses_post(political_header_title_breadcrumbs()); ?>


<article id="main-content" <?php post_class('post high-padding'); ?>>
    <div class="container">
       <div class="row">

            <!-- POST CONTENT -->
            <div class="col-md-9 main-content">
                
                <!-- HEADER -->
                <div class="article-header">
                    <div class="article-details">

                        <?php 
                        $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'political_blog_900x550' ); 
                        if($thumbnail_src) { ?>
                            <?php the_post_thumbnail( 'political_blog_900x550' ); ?>
                        <?php } ?>
                        <div class="clearfix"></div>

                        <h1 class="post-title">
                            <strong><?php echo esc_html(get_the_title()); ?></strong>
                        </h1>

                        <div class="post-category-comment-date row">
                            <span class="post-date">
                                <i class="icon-calendar"></i>
                                <?php echo esc_html(get_the_date()); ?>
                            </span>
                            <span class="post-categories">
                                <?php echo wp_kses_post(get_the_term_list( get_the_ID(), 'category', '<i class="icon-tag"></i>', ', ' )); ?>
                            </span>
                            <span class="post-author">
                                <i class="icon-user icons"></i>
                                <a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo get_the_author(); ?></a>
                            </span>
                            <span class="post-comments">
                                <i class="icon-bubbles icons"></i>
                                <a href="<?php echo esc_url(get_the_permalink().'#comments'); ?>"><?php comments_number( '0', '1', '%' ); ?></a>
                            </span>  
                        </div>

                    </div>
                </div>
                <!-- CONTENT -->
                <div class="article-content">
                    <?php the_content(); ?>
                    <div class="clearfix"></div>

                    <?php
                        wp_link_pages( array(
                            'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'political' ),
                            'after'  => '</div>',
                        ) );
                    ?>
                    <div class="clearfix"></div>

                    <?php if (get_the_tags()) { ?>
                        <div class="single-post-tags">
                            <span><?php echo esc_html__('Tags:','political'); ?></span> <?php echo wp_kses_post(get_the_term_list( get_the_ID(), 'post_tag', '', ' ' )); ?>
                        </div>
                    <?php } ?>
                    <div class="clearfix"></div>

                    <!-- COMMENTS -->
                    <?php
                        // If comments are open or we have at least one comment, load up the comment template
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </div>
            </div>

            <div class="col-md-3 sidebar-content">
                <?php get_sidebar(); ?>
            </div>
            
        </div>
    </div>
</article>


<?php

$args=array(  
    'post__not_in'          => array(get_the_ID()),  
    'posts_per_page'        => 3, // Number of related posts to display.  
    'ignore_sticky_posts'   => 1,
    'post_status'           => 'publish',  
);  
$post_query = new wp_query( $args );
$post_ids = get_posts(array(
    'posts_per_page'=> -1,
    'fields'        => 'ids', // Only get post IDs
    'post_status'   => 'publish',
)); 
$count_ids = count($post_ids);
if($count_ids > 1) { ?>
    <div class="clearfix"></div>
    <div class="row post-details-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="related-posts sticky-posts high-padding-bottom">

                        <h2 class="heading-bottom"><?php esc_html_e('Related Posts', 'political'); ?></h2>
                        <div class="row">
                            <?php 
                            while( $post_query->have_posts() ) {  
                                $post_query->the_post(); 
                            ?>  
                                <div class="col-md-4 post">
                                    <div class="related_blog_custom">
                                        <?php $thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ),'political_related_post_pic500x300' ); ?>
                                        <?php if($thumbnail_src){ ?>
                                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="relative">
                                            <?php if($thumbnail_src) { ?>
                                                <img src="<?php echo esc_url($thumbnail_src[0]); ?>" class="img-responsive" alt="<?php the_title_attribute(); ?>" />
                                            <?php } ?>
                                        </a>
                                        <?php } ?>
                                        <div class="related_blog_details">
                                            <h4 class="post-name"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h4>
                                            <div class="post-author"><?php echo esc_html__('Posted by ','political'); ?><a href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) )); ?>"><?php echo esc_html(get_the_author()); ?></a> - <?php echo esc_html(get_the_date()); ?></div>
                                        </div>
                                    </div>
                                </div>

                            <?php 
                            } ?>
                        </div>
                    </div>

                    <?php 
                    wp_reset_postdata();  
                    ?>  
                </div>
            </div>
        </div>
    </div>
<?php } ?>