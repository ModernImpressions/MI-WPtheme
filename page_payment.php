<?php

/**
 * Template Name: Payment Form - Authorize.net
 */

get_header();

//merchant credentials
$merchantLoginID = get_option('MERCHANT_LOGIN_ID');
$merchantTransactionKey = get_option('MERCHANT_TRANSACTION_KEY');
$merchantEnv = get_option('aNetENV');
$paymentURL = 'https://test.authorize.net/payment/payment' // Default to test environment;
?>

<!-- Content Area
    ================================================== -->
<div id="full_page_area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="original_content_area">
                    <?php /** Set URL based on environment */ if ($merchantEnv == "SANDBOX") {
                        $paymentURL = 'https://test.authorize.net/payment/payment';
                    } elseif ($merchantEnv == "PRODUCTION") {
                        $paymentURL = 'https://accept.authorize.net/payment/payment';
                    } ?>
                    <!-- Form to capture information to send to Authorize.net -->
                    <form>

                    </form>
                    <form method="post" action="<?php echo $paymentURL; ?>" id="formAuthorizeNetTestPage"
                        name="formAuthorizeNetTestPage">
                        <?php $paymentToken = getAnAcceptPaymentPage($merchantLoginID, $merchantTransactionKey, 12.50, $merchantEnv); ?>
                        <input type="hidden" name="token" value="<?php echo $paymentToken; ?>" />Redirect- Continue to
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
