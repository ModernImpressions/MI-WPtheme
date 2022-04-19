<?php
/*
 * The template part for displaying content
 */

//Get Post meta icons
$bpkb_post_meta_icons = basepress_get_post_meta_icons();
$bpkb_post_views_icon = isset($bpkb_post_meta_icons[0]) ? $bpkb_post_meta_icons[0] : '';
$bpkb_post_post_like_icon = isset($bpkb_post_meta_icons[1]) ? $bpkb_post_meta_icons[1] : '';
$bpkb_post_post_dislike_icon = isset($bpkb_post_meta_icons[2]) ? $bpkb_post_meta_icons[2] : '';
$bpkb_post_post_date_icon = isset($bpkb_post_meta_icons[3]) ? $bpkb_post_meta_icons[3] : '';
$bpkb_post_introduction = get_field("introduction");

$bpkb_post_date = get_the_date();
$bpkb_updated_date = get_the_modified_date();

//Get the Knowledge Base objects
$bpkb_knowledge_base = basepress_kb();
$bpkb_section = basepress_sections();
?>

<article id="post-<?php the_ID(); ?>">
    <header class="bpress-post-header">
        <h1><?php the_title(); ?></h1>
        <div class="bpress-post-meta">
            <?php $bpkb_post_metas = basepress_get_post_meta(get_the_ID()); ?>
            <span class="bpress-post-views"><i class="far fa-eye"></i><?php echo $bpkb_post_metas['views']; ?></span>
            <span class="bpress-post-date">
                <div><i class="fas fa-calendar-day"></i><?php echo " Created: "; ?><?php echo $bpkb_post_date ?></div>
                <?php if ($bpkb_post_date == $bpkb_updated_date) { ?>
                <?php } else { ?>
                    <div><i class="fas fa-calendar-edit"></i><?php echo "  Last Update: "; ?><?php echo $bpkb_updated_date ?>
                    </div>
                <?php } ?>
            </span>
        </div>
    </header>
    <?php
    //Add the Article meta-date
    basepress_get_template_part('article-meta-data');
    ?>
    <div class="post-content row">
        <div class="content col introduction">
            <?php if (empty($bpkb_post_introduction) != true) { ?>
                <h4 id="preface">Introduction</h4>
                <p><?php echo $bpkb_post_introduction ?></p>
            <?php } ?>
            <?php if (empty($bpkb_post_introduction) != true) { ?>
                <hr />
            <?php } ?>
        </div>
    </div>
    <div class="post-content row">
        <div class="content col">
            <?php the_content(); ?>
        </div>
        <div class="post-toc col-auto">
            <div class="bpress-toc-wrapper">
                <?php echo get_the_table_of_contents(); ?>
            </div>
            <div class="placeholder"></div>
        </div>
    </div>
    <?php
    //Articles tag list
    if (basepress_article_has_tags()) :
    ?>
        <p><?php basepress_tag_list_title();
            basepress_article_tags(); ?></p>

    <?php endif; ?>

    <!-- Pagination -->
    <nav class="bpress-pagination">
        <?php basepress_post_pagination(); ?>
    </nav>

    <div class="bpress-grid">
        <div class="bpress-col bpress-col-2">
            <div class="bpress-prev-post">
                <span class="bpress-adjacent-title">Previous Article</span>
                <div class="bpress-adjacent-post show-icon">
                    <span class="bp-icon bp-search"><i class="far fa-link"></i></span>
                    <h4>
                        <?php previous_post_link('%link'); ?>
                    </h4>
                </div>
            </div>
        </div>
        <div class="bpress-col bpress-col-2">
            <div class="bpress-next-post">
                <span class="bpress-adjacent-title">Next Article</span>
                <div class="bpress-adjacent-post show-icon">
                    <span class="bp-icon bp-link"><i class="far fa-link"></i></span>
                    <h4>
                        <?php next_post_link('%link'); ?>
                    </h4>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</article>
