<?php

/**
 * Template Name: Payment Form - Authorize.net
 */

get_header();
require('vendor/autoload.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");
//merchant credentials
$merchantLoginID = get_option('MERCHANT_LOGIN_ID');
$merchantTransactionKey = get_option('MERCHANT_TRANSACTION_KEY');
?>

<!-- Content Area
    ================================================== -->
<div id="full_page_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="original_content_area">
                    <?php ?>
                </div>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</div>



<!-- Footer Bottom area
    ================================================== -->
<?php get_footer(); ?>
