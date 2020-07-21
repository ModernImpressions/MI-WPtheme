<?php
/**
 * The template for displaying the footer
 */
?>        

        <!-- Footer Area
        ================================================== -->  
        <footer id="footer_area">
            <div class="footer_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <?php dynamic_sidebar( 'sidebar-2' ); ?>
                            
                            <div class="child_footer">
                                <?php
                                    $list_item = ot_get_option( 'social_list', array() );
                                    if ( !empty( $list_item ) ) {
                                            echo '<ul class="social">';
                                        foreach( $list_item as $type ) {
                                            echo '<li><a href="'.$type['social_link'].'"><i class="fab fa-'.$type['social_icon'].'"></i></a></li>';
                                        }
                                            echo '</ul>';
                                    }
                                ?>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <?php dynamic_sidebar( 'sidebar-3' ); ?>
                        </div>
                        <div class="col-md-4">
                            <?php dynamic_sidebar( 'sidebar-4' ); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright_area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?php if ( function_exists( 'get_option_tree') ) : if( get_option_tree( 'copyright_textarea') ) : ?>
                                <?php get_option_tree( 'copyright_textarea', '', 'true' ); ?>
                            <?php else : ?>
                            <?php endif; endif; ?>  
                        </div>
                    </div>
                </div>
            </div>
        </footer>
                                                                                                          
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>     
        <?php wp_footer(); ?>      
    </body>
</html>

