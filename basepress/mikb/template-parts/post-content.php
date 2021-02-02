<?php
/*
 * The template part for displaying content
 */

//Get Post meta icons
$bpkb_post_meta_icons = basepress_get_post_meta_icons();
$bpkb_post_views_icon = isset( $bpkb_post_meta_icons[0] ) ? $bpkb_post_meta_icons[0] : '';
$bpkb_post_post_like_icon = isset( $bpkb_post_meta_icons[1] ) ? $bpkb_post_meta_icons[1] : '';
$bpkb_post_post_dislike_icon = isset( $bpkb_post_meta_icons[2] ) ? $bpkb_post_meta_icons[2] : '';
$bpkb_post_post_date_icon = isset( $bpkb_post_meta_icons[3] ) ? $bpkb_post_meta_icons[3] : '';
$bpkb_post_introduction = get_field( "introduction" );

$bpkb_post_date = get_the_date();
$bpkb_updated_date = get_the_modified_date();
?>

<article id="post-<?php the_ID(); ?>">
	<header class="bpress-post-header">
		<h1><?php the_title(); ?></h1>
		<div class="bpress-post-meta">
			<?php $bpkb_post_metas = basepress_get_post_meta( get_the_ID() ); ?>
			<span class="bpress-post-views"><i class="far fa-eye"></i><?php echo getPostViews(get_the_ID()); ?></span>
			<span class="bpress-post-date">
					<div><i class="fas fa-calendar-day"></i><?php echo " Created: "; ?><?php echo $bpkb_post_date ?></div>
				<?php if ( $bpkb_post_date == $bpkb_updated_date ){ ?>
				<?php } else { ?>
					<div><i class="fas fa-calendar-edit"></i><?php echo "  Last Update: "; ?><?php echo $bpkb_updated_date ?></div>
				<?php } ?>
			</span>
		</div>
	</header>

	<?php
	//Add the Article meta-date
	basepress_get_template_part( 'article-meta-data' );
	?>

	<?php
	//Add the table of content
	basepress_get_template_part( 'table-of-content' );
	?>

	<div id="preface" class="post-content row">
		<p><?php echo $bpkb_post_introduction ?></p>
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
	if( basepress_article_has_tags() ) :
	?>
	<p><?php basepress_tag_list_title(); basepress_article_tags(); ?></p>

	<?php endif; ?>

	<!-- Pagination -->
	<nav class="bpress-pagination">
		<?php basepress_post_pagination(); ?>
	</nav>
	<?php 
//Get Previous and Next articles
$bpkb_prev_article = basepress_prev_article();
$bpkb_next_article = basepress_next_article();
$bpkb_show_icon = basepress_show_post_icon();
$bpkb_post_class = $bpkb_show_icon ? ' show-icon' : '';
$bpkb_grid_align = $bpkb_next_article && ! $bpkb_prev_article ? ' bpress-align-right' : '';

if ( $bpkb_prev_article || $bpkb_next_article ) { ?>

	<div class="bpress-grid<?php echo $bpkb_grid_align; ?>">

		<?php
		if ( $bpkb_prev_article ) {
			$bpkb_prev_link = get_permalink( $bpkb_prev_article->ID );
		?>
		<div class="bpress-col bpress-col-2">
			<div class="bpress-prev-post">
				<span class="bpress-adjacent-title"><?php echo basepress_prev_article_text(); ?></span>

				<div class="bpress-adjacent-post<?php echo $bpkb_post_class; ?>">
					<?php if ( basepress_show_post_icon() ) { ?>
						<span class="bp-icon <?php echo $bpkb_prev_article->icon; ?>"></span>
					<?php } ?>
					<h4>
						<a href="<?php echo $bpkb_prev_link; ?>"><?php echo $bpkb_prev_article->post_title; ?></a>
					</h4>
				</div>
			</div>
		</div>
		<?php } ?>




	<?php
	if ( $bpkb_next_article ) {
		$bpkb_next_link = get_permalink( $bpkb_next_article->ID );
	?>
	<div class="bpress-col bpress-col-2">
		<div class="bpress-next-post">
			<span class="bpress-adjacent-title"><?php echo basepress_next_article_text(); ?></span>

			<div class="bpress-adjacent-post<?php echo $bpkb_post_class; ?>">
				<?php if ( basepress_show_post_icon() ) { ?>
					<span class="bp-icon <?php echo $bpkb_next_article->icon; ?>"></span>
				<?php } ?>
				<h4>
					<a href="<?php echo $bpkb_next_link; ?>"><?php echo $bpkb_next_article->post_title; ?></a>
				</h4>
			</div>
		</div>
	</div>
	<?php } ?>

</div>
<?php } ?>
	?>
	<div class="clearfix"></div>
</article>
