<?php
/**
 * This template renders the Article Meta-data, relies on the ACF plugin
 *
 */

//Get ACF values for article
$difficulty = get_field( "difficulty" ); 

?>




<div class="bpress-article-metalist">
    <span class="bpress-post-difficulty">
        <div id="bars">
            <div class="difftext">Difficulty: <?php echo $difficulty ?></div>
            <div class="diffbar">
                <div class="difflvl"></div>
            </div>
        </div>
    </span>
</div>

