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
			<?php if ( basepress_show_post_votes() ){ ?>
			<span class="bpress-post-likes"><i class="fas fa-thumbs-up"></i><?php echo $bpkb_post_metas['votes']['like']; ?></span>
			<span class="bpress-post-dislikes"><i class="fas fa-thumbs-down"></i><?php echo $bpkb_post_metas['votes']['dislike']; ?></span>
			<?php } ?>
			<?php
// This will display "0 votes" and increase as votes are added
$votes = get_post_meta($post->ID, "votes", true);
$votes = !empty($votes) ? $votes : "0";
if($votes == 1) $plural = ""; else $plural = "s";
echo '<div id="votecounter">'.$votes.' vote'.$plural.'</div>';
?>

<?php
// This will display the vote button and disable it if a cookie has already
// been set. We also add the security nonce here. 
$hasvoted = $_COOKIE['better_votes'];
$hasvoted = explode(",", $hasvoted);
if(in_array($post->ID, $hasvoted)) {
	$vtext = "VOTED";
	$class = ' class="disabled"';
} else {
	$vtext = "VOTE";
	$class = "";
}
?>
<a href="javascript:void(0)" id="vote"<?php echo $class; ?>><?php echo $vtext; ?></a>
<?php if(function_exists('wp_nonce_field')) wp_nonce_field('voting_nonce', 'voting_nonce'); ?>
			<span class="bpress-post-date">
					<div><i class="fas fa-calendar-day"></i><?php echo " Created: "; ?><?php echo $bpkb_post_date ?></div>
				<?php if ( $bpkb_post_date == $bpkb_updated_date ){ ?>
				<?php } else { ?>
					<div><i class="fas fa-calendar-edit"></i><?php echo "  Last Update: "; ?><?php echo $bpkb_updated_date ?></div>
				<?php } ?>
			</span>
		</div>

		<script type="text/javascript">
/* <![CDATA[ */	
(function($) {
	function setCookie(name,value,days) {
	    if (days) {
	        var date = new Date();
	        date.setTime(date.getTime()+(days*24*60*60*1000));
	        var expires = "; expires="+date.toGMTString();
	    }
	    else var expires = "";
	    document.cookie = name+"="+value+expires+"; path=/";
	}
	
	function getCookie(name) {
	    var nameEQ = name + "=";
	    var ca = document.cookie.split(';');
	    for(var i=0;i < ca.length;i++) {
	        var c = ca[i];
	        while (c.charAt(0)==' ') c = c.substring(1,c.length);
	        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	    }
	    return null;
	}

	$("#vote").not(".disabled").click(function() {
		var el = $(this);
		el.html('<span id="loader"></span>');
		var nonce = $("input#voting_nonce").val();
		var data = {
			action: 'add_votes_options',
			nonce: nonce,
			postid: '<?php echo $post->ID; ?>',
			ip: '<?php echo $_SERVER['REMOTE_ADDR']; ?>'			
		};
		$.post('<?php echo admin_url('admin-ajax.php'); ?>', data,
		function(response){
			if(response!="-1") {
				el.html("VOTED").unbind("click");
				if(response=="null") {
					alert("A vote has already been registered to this IP address.");
				} else {
					$("#votecounter").html(response);
					alert("Thanks for your vote.");
				}
				var cookie = getCookie("better_votes");
				if(!cookie) {
					var newcookie = "<?php echo $post->ID; ?>";
				} else {
					var newcookie = cookie + ",<?php echo $post->ID; ?>";
				}
				setCookie("better_votes", newcookie, 365);
			} else {
				alert("There was a problem registering your vote. Please try again later.");
			}
		});
		return false;
	});	
})(jQuery);
/* ]]> */
</script>
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
                <?= get_the_table_of_contents(); ?>
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

</article>
