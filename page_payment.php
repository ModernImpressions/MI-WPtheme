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
$paymentURL = 'https://test.authorize.net/payment/payment'; // Default to test environment
//get this wordpress website url without the http://
$thisDomainName = str_replace('http://', '', get_site_url());
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
                    For additional information regarding the privacy of your sensitive cardholder data, please read the
                    <a href="https://www.authorize.net/company/privacy/">Authorize.Net Privacy Policy</a>.
                    </p>
                    <p><a href="<?php echo get_site_url(); ?>"><?php echo $thisDomainName; ?></a> is registered with the
                        Authorize.Net Verified Merchant Seal program.</p>
                    <!-- Authorize.Net Seal -->
                    <div>PLACEHOLDER FOR SEAL CODE</div>
                </div>
            </div>
            <div class="col-md-5">
                <section class="container">
                    <div class="row is-flex row-space">
                        <div class="col-md-2 col-xs-12 small-none is-center is-right">
                            <figure class="icon-for-section credit">
                            </figure>
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
                                <figure class="icon-for-section ach"></figure>
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
