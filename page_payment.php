<?php

/**
 * Template Name: Payment Form - Authorize.net
 */

get_header();
require_once('vendor/authorizenet/authorizenet/autoload.php');
?>

<!-- Content Area
    ================================================== -->
<div id="full_page_area">
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>

    <?php if (has_post_thumbnail()) {
                the_post_thumbnail();
            } ?>

    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="original_content_area">
                    <div class="post_head">
                        <h1 class="entry-title"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
                        <p><i class="fa fa-user"></i>by <?php the_author_posts_link(); ?> Posted on <i
                                class="fa fa-calendar-alt "></i><?php echo the_time('F j, Y'); ?></p>
                    </div>

                    <?php the_content(); ?>
                </div>

                <?php endwhile; ?>
                <?php else : ?>
                <h3><?php _e('404 Error&#58; Not Found', 'alihossain'); ?></h3>
                <?php endif; ?>
            </div>
            <div class="col-md-4">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</div>



<!-- Footer Bottom area
    ================================================== -->
<?php get_footer(); ?>
