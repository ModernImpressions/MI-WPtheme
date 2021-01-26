<?php
/**
 * This template renders the Article Meta-data, relies on the ACF plugin
 *
 */

//Get ACF values for article
$difficulty = get_field( "difficulty" ); 
$deviceBrand = get_field( "device-brand" );
$userBrand = get_field( "end-device-brand" );
?>

<div class="bpress-post-metalist">
    <div id="bpress-post-access">
        <div class="bpress-post-accessContainer">
        <div class="bpress-post-skill-text">Difficulty: </div>
            <div class="bpress-post-skill-tag-filter <?php echo $difficulty ?>">
                <a id="bpress-post-skill-link" href="#"><?php echo $difficulty ?></a>
            </div>
        </div>
    </div>
</div>

