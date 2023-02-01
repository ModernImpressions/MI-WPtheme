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
        <section class="container">
            <div class="row is-flex row-space">
                <div class="col-md-3 col-xs-12 small-none is-center is-right">
                    <figure class="icon-for-section credit">
                        <figure>
                </div>
                <div class="col-md-6 col-xs-8">
                    <h3 class="typo-h3">Credit & debit cards</h3>
                    <p>We charge a percentage-based fee each time you accept a credit or debit card payment. The price
                        is the same for all major cards, including American Express. There’s no additional fee for
                        international cards, failed charges, or refunds.
                    </p>
                    <ul>
                        <li class="card-brands visa"></li>
                        <li class="card-brands marter-card"></li>
                        <li class="card-brands american-express"></li>
                        <li class="card-brands discover"></li>
                        <li class="card-brands jcb"></li>
                        <li class="card-brands dinners"></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sx-3 is-center price-column">
                    <p class="price-details typo-price">2.9% + 30¢</p>
                </div>
            </div>
            <div class="row is-flex row-space">
                <div class="col-md-3 col-xs-12 small-none is-center is-right">
                    <div>
                        <figure class="icon-for-section ach"></figure>
                    </div>
                </div>
                <div class="col-md-6 col-xs-8">
                    <h3 class="typo-h3">ACH payments</h3>
                    <p>ACH fees are capped at $5—payments above $625 cost $5. We also provide tools to <a
                            href="#">verify customers’ bank accounts</a> at no additional cost. We charge $4 for failed
                        ACH payments.
                    </p>
                </div>
                <div class="col-md-3 col-xs-3 is-center price-column">
                    <p class="price-details typo-price">0.8% · $5 cap</p>
                </div>
            </div>
        </section>
        <div class="row">
            <div class="col-md-8">
                <div class="original_content_area">
                    <?php /** Set URL based on environment */ if ($merchantEnv == "SANDBOX") {
                        $paymentURL = 'https://test.authorize.net/payment/payment';
                    } elseif ($merchantEnv == "PRODUCTION") {
                        $paymentURL = 'https://accept.authorize.net/payment/payment';
                    } ?>
                    <!-- Form to capture information to send to Authorize.net -->
                    <?php if (!isset($_POST['invoiceAmount'])) { ?>
                    <form method="post" action="">
                        <label for="invoiceAmount">Invoice Amount</label>
                        <input type="number" min="0.01" step="0.01" name="invoiceAmount" placeholder="0.00" />
                        <button id="btnSubmit">Submit</button>
                    </form>
                    <?php } ?>
                    <!-- Form to send to Authorize.net -->
                    <?php if (isset($_POST['invoiceAmount'])) {
                        $invoiceAmount = $_POST['invoiceAmount'];
                    ?>
                    <form method="post" action="<?php echo $paymentURL; ?>" id="formAuthorizeNetTestPage"
                        name="formAuthorizeNetTestPage">
                        <?php $paymentToken = getAnAcceptPaymentPage($merchantLoginID, $merchantTransactionKey, $invoiceAmount, $merchantEnv); ?>
                        <input type="hidden" name="token" value="<?php echo $paymentToken; ?>" />Redirect- Continue to
                        Authorize.net to Payment Page
                        <button id="btnContinue">Continue to next page</button>
                    </form>
                    <?php } ?>
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
