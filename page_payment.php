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
                    <?php
                    function getAnAcceptPaymentPage()
                    {
                        /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
                        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
                        $merchantAuthentication->setName(get_option('MERCHANT_LOGIN_ID'));
                        $merchantAuthentication->setTransactionKey(get_option('MERCHANT_TRANSACTION_KEY'));

                        // Set the transaction's refId
                        $refId = 'ref' . time();

                        //create a transaction
                        $transactionRequestType = new AnetAPI\TransactionRequestType();
                        $transactionRequestType->setTransactionType("authCaptureTransaction");
                        $transactionRequestType->setAmount("12.23");

                        // Set Hosted Form options
                        $setting1 = new AnetAPI\SettingType();
                        $setting1->setSettingName("hostedPaymentButtonOptions");
                        $setting1->setSettingValue("{\"text\": \"Pay\"}");

                        $setting2 = new AnetAPI\SettingType();
                        $setting2->setSettingName("hostedPaymentOrderOptions");
                        $setting2->setSettingValue("{\"show\": false}");

                        $setting3 = new AnetAPI\SettingType();
                        $setting3->setSettingName("hostedPaymentReturnOptions");
                        $setting3->setSettingValue(
                            "{\"url\": \"https://modernimpressions.com/receipt\", \"cancelUrl\": \"https://modernimpressions.com/cancel\", \"showReceipt\": true}"
                        );

                        // Build transaction request
                        $request = new AnetAPI\GetHostedPaymentPageRequest();
                        $request->setMerchantAuthentication($merchantAuthentication);
                        $request->setRefId($refId);
                        $request->setTransactionRequest($transactionRequestType);

                        $request->addToHostedPaymentSettings($setting1);
                        $request->addToHostedPaymentSettings($setting2);
                        $request->addToHostedPaymentSettings($setting3);

                        //execute request
                        $controller = new AnetController\GetHostedPaymentPageController($request);
                        $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);

                        if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
                            echo $response->getToken() . "\n";
                        } else {
                            echo "ERROR :  Failed to get hosted payment page token\n";
                            $errorMessages = $response->getMessages()->getMessage();
                            echo "RESPONSE : " . $errorMessages[0]->getCode() . "  " . $errorMessages[0]->getText() . "\n";
                        }
                        return $response;
                    }
                    if (!defined('DONT_RUN_SAMPLES')) {
                        getAnAcceptPaymentPage();
                    } ?>
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
