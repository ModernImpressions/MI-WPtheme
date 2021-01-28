<?php
/**
 * This template renders the Article Meta-data, relies on the ACF plugin
 *
 */

//Get ACF values for article
$difficulty = get_field( "difficulty" ); 
$deviceBrand = get_field( "device-brand" );
$userBrand = get_field( "end-device-brand" );
$relevantProducts = (($deviceBrand != "none") or ($userBrand != "none"));
$deviceObject = get_field_object( "device-brand" );
$userObject = get_field_object( "end-device-brand" );
?>

<div class="bpress-post-metalist">
    <div class="bpress-post-access">
        <div class="bpress-post-accessContainer">
            <div class="bpress-post-skill-text">Difficulty: </div>
            <div class="bpress-post-skill-tag-filter <?php echo $difficulty ?>">
                <a class="bpress-post-skill-link" href="#"><?php echo $difficulty ?></a>
            </div>
            <?php if ($relevantProducts == "true" ) { ?>
                <?php if ((isset($deviceObject[ 'value' ])) && (($deviceObject[ 'value' ] != "none") or ($deviceObject[ 'value' ] != "NULL"))) { ?>
                    <div class="bpress-post-brands-text"><?php echo "Relevant Product(s): " ?></div>
                <?php } elseif ((isset($deviceObject[ 'value' ])) && (($deviceObject[ 'value' ] != "none") or ($deviceObject[ 'value' ] != "NULL"))) { ?>
                    <div class="bpress-post-brands-text"><?php echo "Relevant Product(s): " ?></div>
                <?php } ?>
            <?php } ?>
            
            <?php if (isset($deviceObject[ 'value' ]) ) { ?>
                <?php if ($deviceObject[ 'value[0]' ] != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $deviceObject[ 'value[0]' ] ?>">
                    <a class="bpress-post-brands-link" href="#">
                        <?php echo $deviceObject[ 'value[0]' ]; ?>
                    </a>
                </div>
                <?php } ?>
            <?php } ?>
            <?php if (isset($userObject[ 'value' ]) ) { ?>
                <?php if ($userObject[ 'value' ] != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $userObject[ 'value' ]; ?>">
                    <a class="bpress-post-brands-link" href="#">
                        <?php echo $userObject[ 'value' ]; ?>
                        <?php if ($userObject[ 'value' ] ) { ?>
                            <i class="fab fa-<?php echo $userObject[ 'value' ]; ?>"></i>
                        <?php } else { ?>
                            <i class="fas fa-<?php echo $userObject[ 'value' ]; ?>"></i>
                        <?php } ?>
                    </a>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

