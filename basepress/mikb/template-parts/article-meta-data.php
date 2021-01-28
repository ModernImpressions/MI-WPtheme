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
$deviceBrandValue = $deviceBrand[0];
$deviceBrandLabel = $deviceBrand[1];
$userBrandValue = $userBrand[0];
$userBrandLabel = $userBrand[1];
?>

<div class="bpress-post-metalist">
    <div class="bpress-post-access">
        <div class="bpress-post-accessContainer">
            <div class="bpress-post-skill-text">Difficulty: </div>
            <div class="bpress-post-skill-tag-filter <?php echo $difficulty ?>">
                <a class="bpress-post-skill-link" href="#"><?php echo $difficulty ?></a>
            </div>
            <?php if ($relevantProducts == "true" ) { ?>
                <?php if ((isset($deviceBrandValue)) && (($deviceBrandValue != "none") or ($deviceBrandValue != "NULL"))) { ?>
                    <div class="bpress-post-brands-text"><?php echo "Relevant Product(s): " ?></div>
                <?php } elseif ((isset($userBrandValue)) && (($userBrandValue != "none") or ($userBrandValue != "NULL"))) { ?>
                    <div class="bpress-post-brands-text"><?php echo "Relevant Product(s): " ?></div>
                <?php } ?>
            <?php } ?>
            
            <?php if (isset($deviceBrandValue) ) { ?>
                <?php if ($deviceBrandValue != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $deviceBrandValue ?>">
                    <a class="bpress-post-brands-link" href="#">
                        <?php echo $deviceBrandLabel ?>
                    </a>
                </div>
                <?php } ?>
            <?php } ?>
            <?php if (isset($userBrandValue) ) { ?>
                <?php if ($userBrandValue != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $userBrandValue ?>">
                    <a class="bpress-post-brands-link" href="#">
                        <?php echo $userBrand; ?>
                        <?php if ($userBrandLabel != "Other" ) { ?>
                            <i class="fab fa-<?php echo $userBrandValue ?>"></i>
                        <?php } else { ?>
                            <i class="fas fa-<?php echo $userBrandValue ?>"></i>
                        <?php } ?>
                    </a>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

