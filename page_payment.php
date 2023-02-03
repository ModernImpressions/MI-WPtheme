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
$merchantSealCode = get_option('MERCHANT_SEAL_CODE');
$merchantAcceptedPaymentMethods = array();
$acceptedPaymentMethods = array();
$acceptedCreditCardsArray = array();
$acceptedCreditCardsLogos = array();
$acceptedDigitalGatewaysLogos = array();
//convert the accepted payment method booleans to an array
if (get_option('MERCHANT_ACCEPT_VISA') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'visa');
}
if (get_option('MERCHANT_ACCEPT_MASTERCARD') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'mastercard');
}
if (get_option('MERCHANT_ACCEPT_AMEX') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'amex');
}
if (get_option('MERCHANT_ACCEPT_DISCOVER') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'discover');
}
if (get_option('MERCHANT_ACCEPT_DINERS') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'diners');
}
if (get_option('MERCHANT_ACCEPT_JCB') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'jcb');
}
if (get_option('MERCHANT_ACCEPT_PAYPAL') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'paypal');
}
if (get_option('MERCHANT_ACCEPT_APPLEPAY') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'applepay');
}
if (get_option('MERCHANT_ACCEPT_ACH') == 'true') {
    array_push($merchantAcceptedPaymentMethods, 'ach');
}

//initialize the payment URL
$paymentURL = 'https://test.authorize.net/payment/payment'; // Default to test environment

//get this wordpress website url without the http:// or https:// or http://www. or https://www.
$thisDomainName = preg_replace('^https?://(?:www.)?^', '', get_site_url());

// process the accepted payment methods array, for each set a variable to true
foreach ($merchantAcceptedPaymentMethods as $method) {
    if ($method == 'visa') {
        $visa = true;
        array_push($acceptedPaymentMethods, 'Visa');
        array_push($acceptedCreditCardsArray, 'Visa');
        array_push($acceptedCreditCardsLogos, 'visa');
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'mastercard') {
        $mastercard = true;
        array_push($acceptedPaymentMethods, 'MasterCard');
        array_push($acceptedCreditCardsArray, 'MasterCard');
        array_push($acceptedCreditCardsLogos, 'mastercard');
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'amex') {
        $amex = true;
        array_push($acceptedPaymentMethods, 'American Express');
        array_push($acceptedCreditCardsArray, 'American Express');
        array_push($acceptedCreditCardsLogos, 'amex');
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'discover') {
        $discover = true;
        array_push($acceptedPaymentMethods, 'Discover');
        array_push($acceptedCreditCardsArray, 'Discover');
        array_push($acceptedCreditCardsLogos, 'discover');
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'diners') {
        $diners = true;
        array_push($acceptedPaymentMethods, 'Diners Club');
        array_push($acceptedCreditCardsArray, 'Diners Club');
        array_push($acceptedCreditCardsLogos, 'diners');
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'jcb') {
        $jcb = true;
        array_push($acceptedPaymentMethods, 'JCB');
        array_push($acceptedCreditCardsArray, 'JCB');
        array_push($acceptedCreditCardsLogos, 'jcb');
        if ($cc != true) {
            $cc = true;
        }
    }
    if ($method == 'paypal') {
        $paypal = true;
        array_push($acceptedPaymentMethods, 'PayPal');
        array_push($acceptedDigitalGatewaysLogos, 'paypal');
        if ($digital != true) {
            $digital = true;
        }
    }
    if ($method == 'applepay') {
        $applepay = true;
        array_push($acceptedPaymentMethods, 'ApplePay');
        array_push($acceptedDigitalGatewaysLogos, 'applepay');
        if ($digital != true) {
            $digital = true;
        }
    }
    if ($method == 'ach') {
        $bankAccount = true;
        array_push($acceptedPaymentMethods, 'ACH');
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
                        <input type="text" name="invoiceNumber" placeholder=" " required />
                        <p>Enter the amount of the invoice you wish to pay.</p>
                        <label for="invoiceAmount">Invoice Amount*</label>
                        <input type="number" min="0.01" step="0.01" name="invoiceAmount" placeholder="0.00" required />
                        <button id="btnSubmit">Submit</button>
                    </form>
                    <?php } ?>
                    <!-- Form to send to Authorize.net -->
                    <?php if (isset($_POST['invoiceNumber'], $_POST['invoiceAmount'])) {
                        $invoiceAmount = $_POST['invoiceAmount'];
                        $invoiceNumber = $_POST['invoiceNumber'];
                    ?>
                    <form method="post" action="<?php echo $paymentURL; ?>" id="formAuthorizeNetTestPage"
                        name="formAuthorizeNetTestPage">
                        <?php $paymentToken = getAnAcceptPaymentPage($merchantLoginID, $merchantTransactionKey, $invoiceAmount, $invoiceNumber, $merchantEnv); ?>
                        <input type="hidden" name="token" value="<?php echo $paymentToken; ?>" />Redirect- Continue to
                        Authorize.net to Payment Page
                        <button id="btnContinue">Continue to next page</button>
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
                    <?php if (isset($merchantSealCode) || $merchantSealCode != NULL || $merchantSealCode != "") { //variable is set and isn't null or blank
                    ?>
                    <p><a href="<?php echo get_site_url(); ?>"><?php echo $thisDomainName; ?></a> is registered with the
                        Authorize.Net Verified Merchant Seal program.</p>
                    <!-- Authorize.Net Seal -->
                    <div><?php echo $merchantSealCode; ?></div>
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
                            <ul>
                                <?php foreach ($acceptedCreditCardsLogos as $creditCard) { ?>
                                <li class="card-brands <?php echo $creditCard; ?>"></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ($ach == true) { ?>
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
                            <ul>
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
