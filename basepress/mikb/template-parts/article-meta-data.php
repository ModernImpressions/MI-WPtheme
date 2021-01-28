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
                <?php if ((isset($deviceBrand)) && (($deviceBrand != "none") or ($deviceBrand != "NULL"))) { ?>
                    <div class="bpress-post-brands-text"><?php echo "Relevant Product(s): " ?></div>
                <?php } elseif ((isset($userBrand)) && (($userBrand != "none") or ($userBrand != "NULL"))) { ?>
                    <div class="bpress-post-brands-text"><?php echo "Relevant Product(s): " ?></div>
                <?php } ?>
            <?php } ?>
            
            <?php if (isset($deviceBrand) ) { ?>
                <?php if ($deviceBrand != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $deviceBrand ?>">
                    <a class="bpress-post-brands-link" href="#">
                        <?php echo $deviceBrand ?>
                    </a>
                </div>
                <?php } ?>
            <?php } ?>
            <?php if (isset($userBrand) ) { ?>
                <?php if ($userBrand != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $userBrand ?>">
                    <a class="bpress-post-brands-link" href="#">
                        <?php echo $userBrand; ?>
                        <?php if ($userBrand ) { ?>
                            <i class="fab fa-<?php echo $userBrand ?>"></i>
                        <?php } else { ?>
                            <i class="fas fa-<?php echo $userBrand ?>"></i>
                        <?php } ?>
                    </a>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

