<?php
/**
 * Functions to extend the Modern Theme
 */

// Exit if called directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! function_exists( 'basepress_modern_theme' ) ) {

	class basepress_modern_theme {

		private $settings = '';

		function __construct() {

			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			add_action( 'init', array( $this, 'load_theme_settings' ) );

		}


		public function load_theme_settings() {
			$this->settings = get_option( 'basepress_modern_theme' );
		}


		public function enqueue_scripts() {
			global $wp_query,$basepress_utils;

			$options = $basepress_utils->get_options();
			$entry_page = isset( $options['entry_page'] ) ? $options['entry_page'] : '';

			if ( 'knowledgebase' == get_post_type()
				|| ( isset($wp_query->query_vars['post_type']) && 'knowledgebase' == $wp_query->query_vars['post_type'] )
				|| is_tax( 'knowledgebase_cat' ) || is_page( $entry_page )
				|| ( isset( $wp_query->query['taxonomy'] ) && 'knowledgebase_cat' == $wp_query->query['taxonomy'] ) )
			{
				$minified = isset( $_REQUEST['basepress_debug'] ) ? '': 'min.';
				$js_path = $basepress_utils->get_theme_file_path( 'js/modern.js' );
				$js_url = $basepress_utils->get_theme_file_uri( 'js/modern.' . $minified . 'js' );
				$fixed_sticky_url = $basepress_utils->get_theme_file_uri( 'js/fixedsticky.' . $minified . 'js' );
				$js_ver = filemtime( $js_path );
				wp_enqueue_script( 'stickyfixed-js', $fixed_sticky_url, array( 'jquery' ), $js_ver, true );
				wp_enqueue_script( 'basepress-modern-js', $js_url, array( 'stickyfixed-js' ), $js_ver, true );

				//Settings Styles
				$settings = $this->settings;

				if( empty( $settings ) || ( isset( $settings['enable_settings'] ) && ! $settings['enable_settings'] ) ){
					return;
				}

				$header_image = $settings['header_image'] ? wp_get_attachment_image_src( $settings['header_image'], 'full' ) : '';

				$styles = '';

				if ( $settings['font_family'] ) {
					$styles .= stripslashes( $settings['font_family'] );
				}

				if ( isset( $settings['full_width_header'] ) ) {
					$styles .= 'body{overflow-x:hidden;}';
				}

				if ( $settings['font_size'] || $settings['font_family'] ) {

					if ( $settings['font_size'] ) {
						$styles .= '.bpress-wrap{font-size:' . $settings['font_size'] . 'px;}';
					}
					if ( $settings['font_family'] ) {
						$styles .= '.bpress-wrap *{';
						preg_match( '/family=([a-zA-Z+]*)/', $settings['font_family'], $font_family );
						$font_family = str_replace( '+', ' ', $font_family[1] );
						$styles .= isset( $font_family ) ? 'font-family:"' . $font_family . '";' : '';
						$styles .= '}';
					}
				}

				//Page header
				$styles .= '.bpress-page-header{';
				if ( $header_image ) {
					$styles .= 'background-image: url(' . $header_image[0] . ');';
				}
				if ( $settings['header_offset'] && '' != $settings['header_offset'] ) {
					$styles .= 'margin-top:' . $settings['header_offset'] . ';';
				}
				if ( isset( $settings['full_width_header'] ) ) {
					$styles .= 'position: relative; width: 100vw; margin-left: -50vw; left: 50%;';
				}

				$styles .= '}';

				//Breadcrumbs
				if ( isset( $settings['full_width_header'] ) ) {
					$styles .= '.bpress-crumbs-wrap{';
					$styles .= 'width: 100vw; position: relative; margin-left: -50vw; left: 50%;';
					$styles .= '}';
				}

				//Sidebar
				if ( isset( $settings['sticky_sidebar'] ) ) {
					$sidebar_threshold = isset( $settings['sidebar_threshold'] ) && '' != $settings['sidebar_threshold'] ? $settings['sidebar_threshold'] : 0;
					$styles .= '.bpress-sidebar{position:sticky;top:' . $sidebar_threshold . ';}';
				}

				//Custom colors
				if ( isset( $settings['enable_custom_colors'] ) && $settings['enable_custom_colors'] ){
					$header_color = $settings['header_color'];
					$header_text_color = $settings['header_text_color'];
					$containers_color = '#f2f2f2';
					$containers_color_dk = '#e6e6e6';
					$accent_color = $settings['accent_color'];
					$accent_color_dk = basepress_color_brightness( $accent_color, -30 );
					$buttons_text_color = $settings['buttons_text_color'];

					$colors = array(
						'header_color'        => $header_color,
						'header_text_color'   => $header_text_color,
						'accent_color'        => $accent_color,
						'accent_color_dk'     => $accent_color_dk,
						'containers_color'    => $containers_color,
						'containers_color_dk' => $containers_color_dk,
						'buttons_text_color'  => $buttons_text_color,
					);

					$color_styles = array(
						'header_color' => array(
								'background-color' => array(
										'.bpress-page-header',
										'.bpress-post-count'
								)
						),
						'header_text_color' => array(
								'color' => array(
										'.bpress-page-header h1',
										'.bpress-page-header h2',
										'.bpress-page-header p',
										'.bpress-post-count'
								)
						),
						'accent_color' => array(
								'color'              => array(
										'.bpress-breadcrumb-arrow',
										'.bpress-crumbs li a:hover',
										'.bpress-totop',
										'.bpress-totop:hover',
										'.bpress-comments-area a',
										'.bpress-search-suggest ul li b',
										'.bpress-heading span[class^="bp-"].colored',
										'.bpress-heading .bpress-heading-icon.colored',
										'.bpress-section a.bpress-viewall',
										'.bpress-section a.bpress-viewall:hover',
										'.bpress-section-boxed .bpress-section-icon',
										'.bpress-section-boxed .bpress-viewall',
										'.bpress-section-boxed .bpress-viewall:hover',
										'.bpress-search-form:before',
								),
								'background-color'   => array(
										'.bpress-search-submit input[type="submit"]',
										'button.bpress-btn',
										'.bpress-comments-area .comment-reply-link',
										'.bpress-comments-area .comment-respond #submit',
										'.bpress-sidebar .wp-tag-cloud li:hover',
										'.bpress-pagination .page-numbers.current',
										'.bpress-pagination .page-numbers:hover',
										'.bpress-pagination .page-numbers.next:hover',
										'.bpress-pagination .page-numbers.prev:hover',
										'.bpress-search-section',
								),
								'border-top-color' => array(
									'.bpress-search-form.searching:before'
								)
						),
						'accent_color_dk' => array(
							'background-color' => array(
								'.bpress-search-submit input[type="submit"]:hover',
								'button.bpress-btn:hover',
								'button.bpress-btn:disabled:hover',
								'.bpress-comments-area .reply a:hover',
								'.bpress-comments-area .comment-respond #submit:hover'
							),
							'border-color' => array(
								'.bpress-search-section'
							)
						),
						'containers_color' => array(
								'background-color'        => array(
										'.bpress-crumbs-wrap',
										'.bpress-sidebar .widget',
										'.bpress-toc',
										'.bpress-prev-post',
										'.bpress-next-post',
										'.bpress-comments-area .comment-respond',
										'.bpress-post-link:hover'
								)
						),
						'containers_color_dk' => array(
								'background-color' => array(
									'.widget ul li.bpress-widget-item:hover',
									'.widget ul a.bpress-widget-item:hover',
									'.widget ol a.bpress-widget-item:hover',
									'.widget ul li.bpress-widget-item.active',
									'.widget ul a.bpress-widget-item.active',
									'.widget ol a.bpress-widget-item.active',
									'.bpress-sidebar .wp-tag-cloud li',
									'.bpress-toc li a:hover',
									'.bpress-prev-post:hover',
									'.bpress-next-post:hover',
									'.bpress-nav-section.active > .bpress-nav-item',
									'.bpress-nav-section .bpress-nav-item:hover',
									'.bpress-nav-article.active > .bpress-nav-item',
									'.bpress-nav-article .bpress-nav-item:hover'
								),
								'border-color' => array(
										'.bpress-toc',
										'.bpress-sidebar .widget',
								)
						),
						'buttons_text_color' => array(
								'color' => array(
										'.bpress-sidebar .wp-tag-cloud li:hover a',
										'.bpress-pagination .page-numbers.current',
										'.bpress-pagination .page-numbers:hover',
										'.bpress-pagination .page-numbers.next:hover',
										'.bpress-pagination .page-numbers.prev:hover',
										'.bpress-search-submit input[type="submit"]',
										'.bpress-search-submit input[type="submit"]:hover',
										'button.bpress-btn',
										'button.bpress-btn:disabled',
										'button.bpress-btn:hover',
										'button.bpress-btn:disabled:hover',
										'.bpress-comments-area .reply a:hover',
										'.bpress-comments-area .comment-respond #submit:hover',
										'#comments.bpress-comments-area a.comment-reply-link',
										'.bpress-comments-area .comment-respond #submit',
										'a.bpress-search-section',
										'a.bpress-search-section:hover',
								)
						)
					);

					foreach( $color_styles as $color => $atts ){
						foreach( $atts as $att => $elements ){
							if( empty( $elements ) ) continue;
							$css_elements = implode( ',', $elements );
							$styles .= "\n" . $css_elements . '{' . $att . ':' . $colors[$color] . ';}';
						}
					}
				}

				//Custom Css
				$styles .= $settings['custom_css'];

				wp_add_inline_style( 'basepress-styles', $styles );
			}
		}

	} //End Class

	new basepress_modern_theme;
}

// filter function to generate the table of content (from webdeasy.de)
function get_table_of_content($content) {
    ob_start();

    preg_match_all("/<h[2,3](?:\sid=\"(.*)\")?(?:.*)?>(.*)<\/h[2,3]>/", $content, $matches);
    $tags = $matches[0];
    $ids = $matches[1];
    $names = $matches[2];

    ?>
    <ul class="table-of-contents">
        <li><strong>Inhaltsverzeichnis</strong></li>
        <!-- Table of contents by webdeasy.de (LH) -->
        <?php for($i = 0; $i < count($names); $i++) { ?>
            <?php if(strpos($tags[$i], "h2") === false || strpos($tags[$i], "class=\"nitoc\"") !== false) continue; ?>
            
                <li>
                    <?php if(!empty($ids[$i])) { ?>
                        <a href="#<?php echo $ids[$i]; ?>"><?php echo $names[$i]; ?></a>
                    <?php } else { ?>
                        <?php echo $names[$i]; ?>  
                    <?php } ?>
        
                    <?php if($i !== count($names) && strpos($tags[$i+1], "h3") !== false) { ?>
                        <ul>
                            <?php for($j = 0; $j < count($names) - 1; $j++) { ?>
                                <?php $sub_index = $i + $j; ?>
                                <?php if($j != 0 && strpos($tags[$sub_index], "h2") !== false) break; ?>
                                <?php if(strpos($tags[$sub_index], "h3") === false || strpos($tags[$sub_index], "class=\"nitoc\"") !== false) continue; ?>

                                <li>
                                    <?php if(!empty($ids[$sub_index])) { ?>
                                        <a href="#<?php echo $ids[$sub_index]; ?>"><?php echo $names[$sub_index]; ?></a>
                                    <?php } else { ?>
                                        <?php echo $names[$sub_index]; ?>  
                                    <?php } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </li>

        <?php } ?>
    </ul>
    <?php
    return ob_get_clean();
}

function add_table_of_content($content) {
    return str_replace("<p>{{TABLE_OF_CONTENTS}}</p>", get_table_of_content($content), $content);
}
// add our table of contents filter (from webdeasy.de)
add_filter('the_content', 'add_table_of_content');

add_filter( 'basepress_modern_theme_header_title', function( $default = false ){
	$options = get_option( 'basepress_modern_theme' );
	$default = $default ? $default : 'Knowledge Base';
	$has_title = isset( $options['enable_settings'] ) && $options['enable_settings'] && isset( $options['header_title'] ) && $options['header_title'];
	return  $has_title ? stripslashes( $options['header_title'] ) : $default;
});