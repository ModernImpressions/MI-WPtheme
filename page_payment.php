<?php

/**
 * Template Name: Payment Pages - Authorize.net
 *
 * This template is used to display the payment, completed, and canceled pages for Authorize.net
 * @package WordPress
 * @subpackage MI-Theme
 * @author Patrick Barnhardt
 */

get_header();

//include the payments css
wp_enqueue_style('payments-css', get_template_directory_uri() . '/css/payments.css');

//merchant credentials
$merchantLoginID = get_option('MERCHANT_LOGIN_ID');
$merchantTransactionKey = get_option('MERCHANT_TRANSACTION_KEY');
$merchantTransactionType = get_option('MERCHANT_TRANSACTION_TYPE');
$merchantEnv = get_option('aNetENV');
$merchantSealCode = get_option('MERCHANT_SEAL_CODE');
$merchantAcceptedPaymentMethods = array();
$acceptedPaymentMethods = array();
$acceptedCreditCardsArray = array();
$acceptedCreditCardsLogos = array();
$acceptedDigitalGatewaysLogos = array();
//convert the accepted payment method to an array if it is not empty false or 0
if (get_option('MERCHANT_ACCEPT_VISA') == 'true' || get_option('MERCHANT_ACCEPT_VISA') == 1 || get_option('MERCHANT_ACCEPT_VISA') == '1') {
    $merchantAcceptedPaymentMethods[] = 'visa';
}
if (get_option('MERCHANT_ACCEPT_MASTERCARD') == 'true' || get_option('MERCHANT_ACCEPT_MASTERCARD') == 1 || get_option('MERCHANT_ACCEPT_MASTERCARD') == '1') {
    $merchantAcceptedPaymentMethods[] = 'mastercard';
}
if (get_option('MERCHANT_ACCEPT_AMEX') == 'true' || get_option('MERCHANT_ACCEPT_AMEX') == 1 || get_option('MERCHANT_ACCEPT_AMEX') == '1') {
    $merchantAcceptedPaymentMethods[] = 'amex';
}
if (get_option('MERCHANT_ACCEPT_DISCOVER') == 'true' || get_option('MERCHANT_ACCEPT_DISCOVER') == 1 || get_option('MERCHANT_ACCEPT_DISCOVER') == '1') {
    $merchantAcceptedPaymentMethods[] = 'discover';
}
if (get_option('MERCHANT_ACCEPT_DINERS') == 'true' || get_option('MERCHANT_ACCEPT_DINERS') == 1 || get_option('MERCHANT_ACCEPT_DINERS') == '1') {
    $merchantAcceptedPaymentMethods[] = 'diners';
}
if (get_option('MERCHANT_ACCEPT_JCB') == 'true' || get_option('MERCHANT_ACCEPT_JCB') == 1 || get_option('MERCHANT_ACCEPT_JCB') == '1') {
    $merchantAcceptedPaymentMethods[] = 'jcb';
}
if (get_option('MERCHANT_ACCEPT_PAYPAL') == 'true' || get_option('MERCHANT_ACCEPT_PAYPAL') == 1 || get_option('MERCHANT_ACCEPT_PAYPAL') == '1') {
    $merchantAcceptedPaymentMethods[] = 'paypal';
}
if (get_option('MERCHANT_ACCEPT_APPLEPAY') == 'true' || get_option('MERCHANT_ACCEPT_APPLEPAY') == 1 || get_option('MERCHANT_ACCEPT_APPLEPAY') == '1') {
    $merchantAcceptedPaymentMethods[] = 'applepay';
}
if (get_option('MERCHANT_ACCEPT_ACH') == 'true' || get_option('MERCHANT_ACCEPT_ACH') == 1 || get_option('MERCHANT_ACCEPT_ACH') == '1') {
    $merchantAcceptedPaymentMethods[] = 'ach';
}
if (get_option('MERCHANT_ACCEPT_GOOGLE') == 'true' || get_option('MERCHANT_ACCEPT_GOOGLE') == 1 || get_option('MERCHANT_ACCEPT_GOOGLE') == '1') {
    $merchantAcceptedPaymentMethods[] = 'googlepay';
}

//initialize the payment URL
$paymentURL = 'https://test.authorize.net/payment/payment'; // Default to test environment

//get this wordpress website url without the http:// or https:// or http://www. or https://www.
$thisDomainName = preg_replace('^https?://(?:www.)?^', '', get_site_url());

// process the accepted payment methods array, for each set a variable to true
foreach ($merchantAcceptedPaymentMethods as $method) {
    if ($method == 'visa') {
        $visa = true;
        $acceptedPaymentMethods[] = 'Visa';
        $acceptedCreditCardsArray[] = 'Visa';
        $acceptedCreditCardsLogos[] = 'visa';
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'mastercard') {
        $mastercard = true;
        $acceptedPaymentMethods[] = 'MasterCard';
        $acceptedCreditCardsArray[] = 'MasterCard';
        $acceptedCreditCardsLogos[] = 'mastercard';
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'amex') {
        $amex = true;
        $acceptedPaymentMethods[] = 'American Express';
        $acceptedCreditCardsArray[] = 'American Express';
        $acceptedCreditCardsLogos[] = 'amex';
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'discover') {
        $discover = true;
        $acceptedPaymentMethods[] = 'Discover';
        $acceptedCreditCardsArray[] = 'Discover';
        $acceptedCreditCardsLogos[] = 'discover';
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'diners') {
        $diners = true;
        $acceptedPaymentMethods[] = 'Diners Club';
        $acceptedCreditCardsArray[] = 'Diners Club';
        $acceptedCreditCardsLogos[] = 'diners';
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'jcb') {
        $jcb = true;
        $acceptedPaymentMethods[] = 'JCB';
        $acceptedCreditCardsArray[] = 'JCB';
        $acceptedCreditCardsLogos[] = 'jcb';
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'paypal') {
        $paypal = true;
        $acceptedPaymentMethods[] = 'PayPal';
        $acceptedDigitalGatewaysLogos[] = 'paypal';
        if ($digital != true) {
            $digital = true;
        }
    }
    if ($method == 'applepay') {
        $applepay = true;
        $acceptedPaymentMethods[] = 'ApplePay';
        $acceptedDigitalGatewaysLogos[] = 'applepay';
        if ($digital != true) {
            $digital = true;
        }
    }
    if ($method == 'googlepay') {
        $googlepay = true;
        $acceptedPaymentMethods[] = 'GooglePay';
        $acceptedDigitalGatewaysLogos[] = 'googlepay';
        if ($digital != true) {
            $digital = true;
        }
    }
    if ($method == 'ach') {
        $bankAccount = true;
        $acceptedPaymentMethods[] = 'ACH';
    }
}
// convert the accepted payment methods array to a string with commas
$acceptedPaymentMethods = implode(', ', $acceptedPaymentMethods);
// convert the accepted credit cards array to a string with commas and an 'and' before the last item
$acceptedCreditCards = implode(', ', array_filter(array_merge(array(implode(', ', array_slice($acceptedCreditCardsArray, 0, -1))), array_slice($acceptedCreditCardsArray, -1)), 'strlen'));
?>

<!-- Content Area
    ================================================== -->
<div id="full_page_area">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="original_content_area">
                    <?php //Determine if the current page is the payment page, the canceled page or the return page.
                    if (is_page('payments')) { ?>
                    <h2>Online Payment Form</h2>
                    <br />
                    <p>Welcome to our Online Payments portal. Please provide the invoice information below, you will
                        be redirected to Authorize.net to complete the payment. Modern Impressions does not collect
                        payment information on our site.</p>
                    <br />
                    <p>You can pay online at <a href="<?php echo get_site_url(); ?>"><?php echo $thisDomainName; ?></a>
                        with confidence. We have partnered with <a href="https://www.authorize.net">Authorize.Net</a>, a
                        leading payment gateway since
                        1996, to accept credit cards and electronic check payments safely and securely for our
                        customers.</p>
                    <hr />
                    <?php /** Set URL based on environment */ if ($merchantEnv == "SANDBOX") {
                            $paymentURL = 'https://test.authorize.net/payment/payment';
                        } elseif ($merchantEnv == "PRODUCTION") {
                            $paymentURL = 'https://accept.authorize.net/payment/payment';
                        } ?>
                    <!-- Form to capture information to send to Authorize.net -->
                    <?php
                        //Check if the invoiceAmount and invoiceNumber are set in $_POST
                        if (!isset($_POST['invoiceNumber'], $_POST['invoiceAmount'])) { ?>
                    <form method="post" action="">
                        <h3>Invoice Retrieval Form</h3>
                        <p>Enter the invoice number you wish to pay.</p>
                        <label for="invoiceNumber">Invoice Number*</label>
                        <input id="invoiceNumber" type="text" name="invoiceNumber" placeholder=" " required />
                        <p>Enter the amount of the invoice you wish to pay.</p>
                        <label for="invoiceAmount">Invoice Amount*</label>
                        <div class="amountField"><input id="invoiceAmount" type="number" min="0.01" step="0.01"
                                name="invoiceAmount" placeholder="0.00" pattern="[0-9.,]+" required /></div>
                        <button id="btnSubmit">Submit</button>
                    </form>
                    <?php } ?>
                    <!-- Form to send to Authorize.net -->
                    <?php if (isset($_POST['invoiceNumber'], $_POST['invoiceAmount'])) {
                            $invoiceAmount = $_POST['invoiceAmount'];
                            $invoiceNumber = $_POST['invoiceNumber'];
                        ?>
                    <a href="https://www.authorize.net/"><img
                            src="https://www.authorize.net/content/dam/anet-redesign/reseller/authorizenet-200x50.png"
                            border="0" alt="Authorize.net Logo" width="200" height="50" /></a>
                    <form method="post" action="<?php echo $paymentURL; ?>" id="formAuthorizeNetTestPage"
                        name="formAuthorizeNetTestPage">
                        <?php $paymentToken = getAnAcceptPaymentPage($merchantLoginID, $merchantTransactionKey, $invoiceAmount, $invoiceNumber, $merchantEnv, $merchantTransactionType); ?>
                        <input type="hidden" name="token" value="<?php echo $paymentToken; ?>" />
                        <p>Click the button below to be re-directed to our processing partner, Authorize.net to complete
                            payment. You will be returned to our site when done.</p>
                        <p>If you have issues with the page re-direct, you may need to allow pop-ups and browser
                            re-directs for our site in your web browser.</p>
                        <p>For your security, we do not store your payment information on our site.</p>
                        <br />
                        <button id="btnContinue">Continue to Authorize.net</button>
                    </form>
                    <?php } ?>
                    <hr />
                    <p>The Authorize.Net Payment Gateway manages the complex routing of sensitive customer information
                        through the electronic check and credit card processing networks. See an <a
                            href="https://www.authorize.net/resources/howitworksdiagram/">online payments diagram</a> to
                        see how it works.</p>
                    <p>The company adheres to strict industry standards for payment processing, including:
                        <br />
                    <ul>
                        <li>128-bit Secure Sockets Layer (SSL) technology for secure Internet Protocol (IP)
                            transactions.</li>
                        <li>Industry leading encryption hardware and software methods and security protocols to protect
                            customer information.</li>
                        <li>Compliance with the Payment Card Industry Data Security Standard (PCI DSS).</li>
                    </ul>
                    <br />
                    <p>For additional information regarding the privacy of your sensitive cardholder data, please read
                        the
                        <a href="https://www.authorize.net/company/privacy/">Authorize.Net Privacy Policy</a>.
                    </p>
                    </p>
                    <?php if (isset($merchantSealCode) && $merchantSealCode != NULL || $merchantSealCode != "") { //variable is set and isn't null or blank
                        ?>
                    <p><a href="<?php echo get_site_url(); ?>"><?php echo $thisDomainName; ?></a> is registered with the
                        Authorize.Net Verified Merchant Seal program.</p>
                    <!-- Authorize.Net Seal -->
                    <div><?php echo $merchantSealCode; ?></div>
                    <?php } ?>
                    <?php } elseif (is_page('return')) { ?>
                    <h2>Payment Complete</h2>
                    <br />
                    <div class="card">
                        <span class="cardSuccess"><i class="fa-solid fa-check"></i></span>
                        <h1 class="cardMsg">Payment Complete</h1>
                        <h2 class="cardSubMsg">Thank you!</h2>
                        <p> Your transaction has been completed, and a receipt for your payment
                            has been emailed to you. Look for an email from Authorize.net</p>
                        <br />
                        <p>For your security, we do not store your payment information on our site.</p>
                        <div class="cardTags">
                            <span class="cardTag">completed</span>
                        </div>
                    </div>
                    <br />
                    <p>For additional information regarding the privacy of your sensitive cardholder data, please read
                        the
                        <a href="https://www.authorize.net/company/privacy/">Authorize.Net Privacy Policy</a>.
                    </p>
                    <!-- section for additional payments -->
                    <div>
                        <h5>Need to make another payment?</h5>
                        <p>Click the button below to make another payment.</p>
                        <a href="<?php echo get_site_url(); ?>/support/payments"><button id="btnContinue">Make Another
                                Payment</button></a>
                    </div>
                    <?php } elseif (is_page('cancel')) { ?>
                    <h2>Payment Cancelled</h2>
                    <br />
                    <div class="card">
                        <span class="cardFail"><i class="fa-solid fa-x"></i></span>
                        <h1 class="cardMsg">Payment Canceled</h1>
                        <h2 class="cardSubMsg">Thank you.</h2>
                        <p> Your transaction has been canceled, and you have not been charged.</p>
                        <br />
                        <p>For your security, we do not store your payment information on our site.</p>
                        <div class="cardTags">
                            <span class="cardTag">Canceled</span>
                        </div>
                    </div>
                    <br />
                    <p>For additional information regarding the privacy of your sensitive cardholder data, please read
                        the
                        <a href="https://www.authorize.net/company/privacy/">Authorize.Net Privacy Policy</a>.
                    </p>
                    <!-- section for additional payments -->
                    <div>
                        <h5>Need to make another payment?</h5>
                        <p>Click the button below to make another payment.</p>
                        <a href="<?php echo get_site_url(); ?>/support/payments"><button id="btnContinue">Make Another
                                Payment</button></a>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-5">
                <section class="container">
                    <?php if ($cc == true) { ?>
                    <div class="row is-flex row-space">
                        <div class="col-md-2 col-xs-12 small-none is-center is-right">
                            <figure class="icon-for-section credit">
                            </figure>
                        </div>
                        <div class="col-md-10 col-xs-8">
                            <h5 class="typo-h5">Credit & debit cards</h5>
                            <p>We accept <?php echo $acceptedCreditCards; ?>.
                            </p>
                            <ul class="payment-methods-container">
                                <?php foreach ($acceptedCreditCardsLogos as $creditCard) { ?>
                                <li class="card-brands <?php echo $creditCard; ?>"></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($bankAccount == true) { ?>
                    <div class="row is-flex row-space">
                        <div class="col-md-2 col-xs-12 small-none is-center is-right">
                            <div>
                                <figure class="icon-for-section ach"></figure>
                            </div>
                        </div>
                        <div class="col-md-10 col-xs-8">
                            <h5 class="typo-h5">ACH payments</h5>
                            <p>ACH payments are accepted.
                            </p>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($digital == true) { ?>
                    <div class="row is-flex row-space">
                        <div class="col-md-2 col-xs-12 small-none is-center is-right">
                            <div>
                                <figure class="icon-for-section digital"></figure>
                            </div>
                        </div>
                        <div class="col-md-10 col-xs-8">
                            <h5 class="typo-h5">Digital payments</h5>
                            <p>Digital Gateway payments are accepted.
                            </p>
                            <ul class="payment-methods-container">
                                <?php foreach ($acceptedDigitalGatewaysLogos as $digitalGateway) { ?>
                                <li class="card-brands <?php echo $digitalGateway; ?>"></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
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
