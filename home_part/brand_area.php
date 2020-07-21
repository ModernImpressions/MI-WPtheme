        <section id="brand_area">
            <div class="container">
                <div class="row">
                    <?php
                        $list_item = ot_get_option( 'brand_list', array() );
                        if ( !empty( $list_item ) ) {
                                echo '<div class="col-md-12">';
                            foreach( $list_item as $type ) {
                                echo '
                                <div class="child_logo">
                                    <a href="'.$type['brand_link'].'"><img class="style-svg brand-logo" src="'.$type['brand_image'].'" alt=""></a>
                                </div>';
                            }
                                echo '</div>';
                        }
                    ?> 
                </div>
            </div>
        </section>