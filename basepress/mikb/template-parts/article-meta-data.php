<?php
/**
 * This template renders the Article Meta-data, relies on the ACF plugin
 *
 */

//Get ACF values for article
$difficulty = get_field( "difficulty" ); 
$deviceBrand = get_field( "device-brand" );
$userBrand = get_field( "end-device-brand" );
$deviceBrandLabel = "";
$userBrandLabel = "";

switch ($deviceBrand) {
    case "none":
        $deviceBrandLabel = "";
        break;
    case "lanier":
        $deviceBrandLabel = "LANIER";
        break;
    case "kyocera":
        $deviceBrandLabel = "KYOCERA";
        break;
    case "lexmark":
        $deviceBrandLabel = "LEXMARK";
        break;
}

switch ($userBrand) {
    case "none":
        $userBrandLabel = "";
        break;
    case "windows":
        $userBrandLabel = "Windows";
        break;
    case "apple":
        $userBrandLabel = "OSX/Mac";
        break;
    case "linux":
        $userBrandLabel = "Linux";
        break;
    case "android":
        $userBrandLabel = "Android";
        break;
    case "app-store-ios":
        $userBrandLabel = "iOS/iPhone/iPad";
        break;
    case "chrome":
        $userBrandLabel = "Chrome OS/Chromebook";
        break;
    case "ellipsis-h":
        $userBrandLabel = "Other/Miscellaneous";
        break;
}

?>

<div class="bpress-post-metalist">
    <div class="bpress-post-access">
        <div class="bpress-post-accessContainer">
            <div class="bpress-post-skill-container">
                <div class="bpress-post-skill-text">Difficulty: </div>
                <div class="bpress-post-skill-tag-filter <?php echo $difficulty ?>">
                    <a class="bpress-post-skill-link" href="#">
                        <?php echo $difficulty ?>
                    </a>
                </div>
            </div>
            <?php if (isset($deviceBrand) ) { ?>
                <div class="bpress-post-devicebrands-container">
                    <?php if ($deviceBrand != "none" ) { ?>
                        <?php if ((isset($deviceBrand)) && (($deviceBrand != "none") or ($deviceBrand != "NULL"))) { ?>
                            <div class="bpress-post-brands-text"><?php echo "Relevant Product: " ?></div>
                        <?php } ?>
                        <div class="bpress-post-brands-tag-filter">
                            <div class="bpress-post-brands-logo-container">
                                <a class="bpress-post-brands-link" href="#">
                                    <?php if ($deviceBrand != "lexmark" ) { ?>
                                        <span class="bpress-post-brands-icon <?php echo $deviceBrand ?>"></span>
                                        <div>
                                            (<?php echo $deviceBrandLabel ?>)
                                        </div>
                                    <?php } else { ?>
                                        <span class="bpress-post-brands-icon <?php echo $deviceBrand ?>">
                                            <div style="display: inline-flex;">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                                <span class="path4"></span>
                                            </div>
                                        </span>
                                        <div>
                                            (<?php echo $deviceBrandLabel ?>)
                                        </div>
                                    <?php } ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
            <?php if (isset($userBrand) ) { ?>
                <div class="bpress-post-userbrands-container">
                    <?php if ($userBrand != "none" ) { ?>
                        <?php if ((isset($userBrand)) && (($userBrand != "none") or ($userBrand != "NULL"))) { ?>
                            <div class="bpress-post-brands-text">
                                <?php echo "Affected Device: " ?>
                            </div>
                        <?php } ?>
                        <div class="bpress-post-brands-tag-filter">
                            <div class="bpress-post-brands-logo-container">
                                <a class="bpress-post-brands-link" href="#">
                                    <span class="bpress-post-brands-icon <?php echo $userBrand ?>"></span>
                                    <div>
                                        (<?php echo $userBrandLabel ?>)
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        </div>
    </div>
</div>

