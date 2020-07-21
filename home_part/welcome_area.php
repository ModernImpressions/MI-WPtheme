        <section id="welcome_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'anniversary_image') ) : ?>
                            <img src="<?php get_option_tree( 'anniversary_image', '', 'true' ); ?>" alt="logo" class="anniversary style-svg" style="max-height: 165px; max-width: 209px;"/>
                        <?php else : ?>
                        <?php endif; endif; ?>
                        
                        
                        <?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'welcome_textarea') ) : ?>
                            <?php get_option_tree( 'welcome_textarea', '', 'true' ); ?>
                        <?php else : ?>
                        <?php endif; endif; ?>  
                    </div>
                </div>
            </div>
        </section>
        