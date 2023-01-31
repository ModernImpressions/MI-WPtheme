<?php

/**
 * Template Name: Payment Form - Authorize.net
 */

get_header();

//merchant credentials
$merchantLoginID = get_option('MERCHANT_LOGIN_ID');
$merchantTransactionKey = get_option('MERCHANT_TRANSACTION_KEY');
$merchantEnv = get_option('aNetENV');
?>

<!-- Content Area
    ================================================== -->
<div id="full_page_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="original_content_area">
                    <?php $paymentToken = getAnAcceptPaymentPage($merchantLoginID, $merchantTransactionKey, 12.50, $merchantEnv); ?>
                    <form method="post" action="https://test.authorize.net/payment/payment"
                        id="formAuthorizeNetTestPage" name="formAuthorizeNetTestPage">
                        <input type="hidden" name="token" value="<?php $paymentToken; ?>" />Redirect- Continue to
                        Authorize.net to Payment Page
                        <button id="btnContinue">Continue to next page</button>
                    </form>
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
