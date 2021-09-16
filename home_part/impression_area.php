        <section id="impression_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-10">
                        <?php if (function_exists('get_option_tree')) : if (get_option_tree('impression_textarea')) : ?>
                        <?php get_option_tree('impression_textarea', '', 'true'); ?>
                        <div class="su-youtube su-u-responsive-media-yes"><iframe allowfullscreen=""
                                allow="autoplay; encrypted-media; picture-in-picture"
                                title="Introduction to Modern Impressions"
                                data-src="https://www.youtube.com/watch?v=USgOhNJGxjs?autohide=1&amp;autoplay=0&amp;mute=0&amp;controls=1&amp;fs=1&amp;loop=1&amp;modestbranding=1&amp;playlist=VXYd89PQe7w&amp;rel=1&amp;showinfo=1&amp;theme=light&amp;wmode=&amp;playsinline=1"
                                class=" lazyloaded" width="600" height="400" frameborder="0"></iframe></div>
                        <?php else : ?>
                        <?php endif;
                        endif; ?>
                    </div>
                </div>

                <?php
                $list_item = ot_get_option('impression_list', array());
                if (!empty($list_item)) {
                    echo '<div class="row">';
                    foreach ($list_item as $type) {
                        echo '
                            <div class="col-md-3">
                                <div class="child_impression">
                                    <h2>' . $type['impression_number'] . '</h2>
                                    <h5>' . $type['impression_title'] . '</h5>
                                    <p>' . $type['impression_textarea'] . '</p>
                                </div>
                            </div>';
                    }
                    echo '</div>';
                }
                ?>
            </div>
        </section>
