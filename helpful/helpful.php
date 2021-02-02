<?php if ( ! defined( 'ABSPATH' ) ) exit; ?>

<div class="helpful <?php echo esc_attr( $class ); ?>">
	<?php if ( false === $hidden ) : ?>
	<div class="helpful-header">
		<?php echo apply_filters( 'helpful_headline_html', '<h3 class="helpful-headline">' . $helpful['heading'] . '</h3>' ); ?>
	</div><!-- .helpful-header -->
	<?php endif; ?>

	<div class="helpful-content" role="alert">
		<span><?php echo $helpful['content']; ?></span>
	</div><!-- .helpful-content -->
	<?php if ( false === $hidden ) : ?>
	<div class="helpful-controls">
		<div>
			<button class="helpful-pro helpful-button" type="button" data-value="pro" data-post="<?php echo $helpful['post_id']; ?>" role="button">
				<?php echo $helpful['button_pro']; ?>
				<?php echo $helpful['counter'] ? sprintf( '<span class="helpful-counter">%s</span>', $helpful['count_pro'], '<i class="fas fa-thumbs-up"></i>' ) : ''; ?>
			</button>
		</div>

		<div>
			<button class="helpful-contra helpful-button" type="button" data-value="contra" data-post="<?php echo $helpful['post_id']; ?>" role="button">
				<?php echo $helpful['button_contra']; ?>
				<?php echo $helpful['counter'] ? sprintf( '<span class="helpful-counter">%s</span>', $helpful['count_contra'], '<i class="fas fa-thumbs-down"></i>' ) : ''; ?>
			</button>
		</div>

	</div><!-- .helpful-controls -->
	<?php endif; ?>
</div><!-- .helpful -->
