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
?>

<div class="bpress-post-metalist">
    <div class="bpress-post-access">
        <div class="bpress-post-accessContainer">
            <div class="bpress-post-skill-text">Difficulty: </div>
            <div class="bpress-post-skill-tag-filter <?php echo $difficulty ?>">
                <a class="bpress-post-skill-link" href="#"><?php echo $difficulty ?></a>
            </div>
            <?php if ($relevantProducts == "true" ) { ?>
                <div class="bpress-post-brands-text"><?php echo "Relevant Product(s): " ?></div>
            <?php } ?>
            <?php if (isset($deviceBrand) ) { ?>
                <?php if ($deviceBrand != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $deviceBrand ?>">
                    <a class="bpress-post-brands-link" href="#"><?php echo $deviceBrand ?></a>
                </div>
                <?php } ?>
            <?php } ?>
            <?php if (isset($userBrand) ) { ?>
                <?php if ($userBrand != "none" ) { ?>
                <div class="bpress-post-brands-tag-filter <?php echo $userBrand ?>">
                    <a class="bpress-post-brands-link" href="#"><?php echo $userBrand ?></a>
                </div>
                <?php } ?>
            <?php } ?>
        </div>
    </div>
</div>

