<?php

/**
 * Template Name: Payment Form - Authorize.net
 */

get_header();

//include the payments css
wp_enqueue_style('payments-css', get_template_directory_uri() . '/css/payments.css');

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
            <div class="col-md-7">
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
            <div class="col-md-5">
                <section class="container">
                    <div class="row is-flex row-space">
                        <div class="col-md-2 col-xs-12 small-none is-center is-right">
                            <i class="fa-duotone fa-credit-card-front"></i>
                        </div>
                        <div class="col-md-10 col-xs-8">
                            <h5 class="typo-h5">Credit & debit cards</h5>
                            <p>We accept Visa, Mastercard, American Express, Discover, JCB, and Diners Club.
                            </p>
                            <ul>
                                <li class="card-brands visa"></li>
                                <li class="card-brands marter-card"></li>
                                <li class="card-brands american-express"></li>
                                <li class="card-brands discover"></li>
                                <li class="card-brands jcb"></li>
                                <li class="card-brands diners-club"></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row is-flex row-space">
                        <div class="col-md-2 col-xs-12 small-none is-center is-right">
                            <div>
                                <i class="fa-duotone fa-building-columns"></i>
                            </div>
                        </div>
                        <div class="col-md-10 col-xs-8">
                            <h5 class="typo-h5">ACH payments</h5>
                            <p>ACH payments are accepted.
                            </p>
                        </div>
                    </div>
                    <div class="row is-flex row-space">
                        <h5 class="typo-h5">Contact Us</h5>
                        <p>For any questions, please contact us at <a
                                href="mailto:careteam@modernimpressions.com">careteam@modernimpressions.com</a>
                            or
                            call us at <a href="tel:1-704-597-7278">1-704-597-7278</a></p>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>



<!-- Footer Bottom area
    ================================================== -->
<?php get_footer(); ?>
