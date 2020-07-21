        <section id="service_area">
            <div class="container">
                <?php
                    $list_item = ot_get_option( 'service_list', array() );
                    if ( !empty( $list_item ) ) {
                            echo '<div class="row">';
                        foreach( $list_item as $type ) {
                            echo '
                            <div class="col-md-4">
                                <div class="child_service">
                                    <img class="style-svg" src="'.$type['service_image'].'" alt="">
                                    <h4><a href="'.$type['service_link'].'">'.$type['service_title'].'</a></h4>
                                    <p>'.$type['service_text'].'</p>
                                </div> 
                            </div> ';
                        }
                            echo '</div>';
                    }
                ?> 
            </div>
        </section>
