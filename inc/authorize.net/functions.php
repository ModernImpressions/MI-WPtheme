<?php
require_once(get_template_directory() . '/vendor/authorizenet/authorizenet/autoload.php');

use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

define("AUTHORIZENET_LOG_FILE", "phplog");

// Settings Page: Authorize.net
// Retrieving values: get_option( 'your_field_id' )
class authorizenet_Settings_Page
{

    public function __construct()
    {
        add_action('admin_menu', array($this, 'wph_create_settings'));
        add_action('admin_init', array($this, 'wph_setup_sections'));
        add_action('admin_init', array($this, 'wph_setup_fields'));
    }

    public function wph_create_settings()
    {
        $page_title = 'Authorize.net Settings';
        $menu_title = 'Authorize.net';
        $capability = 'manage_options';
        $slug = 'authorizenet';
        $callback = array($this, 'wph_settings_content');
        add_options_page($page_title, $menu_title, $capability, $slug, $callback);
    }

    public function wph_settings_content()
    { ?>
        <div class="wrap">
            <h1>Authorize.net Settings</h1>
            <?php settings_errors(); ?>
            <form method="POST" action="options.php">
                <?php
                settings_fields('authorizenet');
                do_settings_sections('authorizenet');
                submit_button();
                ?>
            </form>
        </div> <?php
            }

            public function wph_setup_sections()
            {
                add_settings_section('authorizenet_section', 'Settings to interface with the Authorize.net API for online payments.', array(), 'authorizenet');
            }

            public function wph_setup_fields()
            {
                $fields = array(
                    array(
                        'label' => 'Login ID',
                        'id' => 'MERCHANT_LOGIN_ID',
                        'type' => 'text',
                        'section' => 'authorizenet_section',
                        'desc' => 'Login ID generated by the Authorize.net account *Required',
                    ),
                    array(
                        'label' => 'Transaction Key',
                        'id' => 'MERCHANT_TRANSACTION_KEY',
                        'type' => 'text',
                        'section' => 'authorizenet_section',
                        'desc' => 'Transaction Key generated by the Authorize.net account *Required',
                    ),
                    array(
                        'label' => 'Environment',
                        'id' => 'aNetENV',
                        'type' => 'select',
                        'section' => 'authorizenet_section',
                        'options' => array(
                            'SANDBOX' => 'Testing',
                            'PRODUCTION' => 'Production',
                        ),
                        'desc' => 'Set to Production for Live sites',
                        'placeholder' => 'SANDBOX',
                        'default' => 'SANDBOX',
                    ),
                );
                foreach ($fields as $field) {
                    add_settings_field($field['id'], $field['label'], array($this, 'wph_field_callback'), 'authorizenet', $field['section'], $field);
                    register_setting('authorizenet', $field['id']);
                }
            }

            public function wph_field_callback($field)
            {
                $value = get_option($field['id']);
                $placeholder = '';
                if (isset($field['placeholder'])) {
                    $placeholder = $field['placeholder'];
                }
                switch ($field['type']) {
                    case 'select':
                    case 'multiselect':
                        if (!empty($field['options']) && is_array($field['options'])) {
                            $attr = '';
                            $options = '';
                            foreach ($field['options'] as $key => $label) {
                                $options .= sprintf(
                                    '<option value="%s" %s>%s</option>',
                                    $key,
                                    selected($value, $key, false),
                                    $label
                                );
                            }
                            if ($field['type'] === 'multiselect') {
                                $attr = ' multiple="multiple" ';
                            }
                            printf(
                                '<select name="%1$s" id="%1$s" %2$s>%3$s</select>',
                                $field['id'],
                                $attr,
                                $options
                            );
                        }
                        break;
                    default:
                        printf(
                            '<input name="%1$s" id="%1$s" type="%2$s" placeholder="%3$s" value="%4$s" />',
                            $field['id'],
                            $field['type'],
                            $placeholder,
                            $value
                        );
                }
                if (isset($field['desc'])) {
                    if ($desc = $field['desc']) {
                        printf('<p class="description">%s </p>', $desc);
                    }
                }
            }
        }
        new authorizenet_Settings_Page();

        /** Function to get the Authorize.net form token, returns the token as a string
         * @param string $merchantID - Authorize.net Merchant ID
         * @param string $transactionKey - Authorize.net Transaction Key
         * @param float $amount - Amount to charge
         * @param string $aNetENV - Authorize.net Environment (SANDBOX or PRODUCTION)
         * @return string $token - Authorize.net Form Token
         *
         */
        function getAnAcceptPaymentPage(string $merchantID, string $transactionKey, float $amount, string $invoiceNumber, string $aNetENV)
        {
            // Setup the token variable
            $token = '';

            // Set the Return URL - This is where the user will be redirected to after payment, using the WordPress site URL
            $returnURL = get_site_url() . '/support/payments/return';

            // Set the Cancel URL
            $cancelURL = get_site_url() . '/support/payments/cancel';

            // Set the Authorize.net environment
            if ($aNetENV == null || $aNetENV == '') {
                $aNetENV = 'SANDBOX';
            }
            /* Create a merchantAuthenticationType object with authentication details
       retrieved from the constants file */
            $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
            $merchantAuthentication->setName($merchantID);
            $merchantAuthentication->setTransactionKey($transactionKey);

            // Set the transaction's refId
            $refId = 'ref' . time();

            // Create a transaction
            $transactionRequestType = new AnetAPI\TransactionRequestType();
            $transactionRequestType->setTransactionType("authOnlyTransaction");
            $transactionRequestType->setAmount($amount);
            $transactionRequestType->setOrder(new AnetAPI\OrderType(array("invoiceNumber" => $invoiceNumber)));

            // Set Hosted Form Options
            $setting1 = new AnetAPI\SettingType();
            $setting1->setSettingName("hostedPaymentButtonOptions");
            $setting1->setSettingValue("{\"text\": \"Pay\"}");

            $setting2 = new AnetAPI\SettingType();
            $setting2->setSettingName("hostedPaymentOrderOptions");
            $setting2->setSettingValue("{\"show\": true, \"merchantName\": \"MODERN IMPRESSIONS OF CHARLOTTE INC.\"}");

            $setting3 = new AnetAPI\SettingType();
            $setting3->setSettingName("hostedPaymentReturnOptions");
            $setting3->setSettingValue("{\"showReceipt\": true, \"url\": \"$returnURL\", \"urlText\": \"Continue\", \"cancelUrl\": \"$cancelURL\", \"cancelUrlText\": \"Cancel\"}");

            $setting4 = new AnetAPI\SettingType();
            $setting4->setSettingName("hostedPaymentPaymentOptions");
            $setting4->setSettingValue("{\"cardCodeRequired\": true, \"showCreditCard\": true, \"showBankAccount\": true}");

            $setting5 = new AnetAPI\SettingType();
            $setting5->setSettingName("hostedPaymentSecurityOptions");
            $setting5->setSettingValue("{\"captcha\": true}");

            $setting6 = new AnetAPI\SettingType();
            $setting6->setSettingName("hostedPaymentBillingAddressOptions");
            $setting6->setSettingValue("{\"show\": true, \"required\": true}");

            $setting7 = new AnetAPI\SettingType();
            $setting7->setSettingName("hostedPaymentShippingAddressOptions");
            $setting7->setSettingValue("{\"show\": false, \"required\": false}");

            $setting8 = new AnetAPI\SettingType();
            $setting8->setSettingName("hostedPaymentCustomerOptions");
            $setting8->setSettingValue("{\"showEmail\": true, \"requiredEmail\": true, \"showPhoneNumber\": true, \"requiredPhoneNumber\": true}");

            // Build transaction request
            $request = new AnetAPI\GetHostedPaymentPageRequest();
            $request->setMerchantAuthentication($merchantAuthentication);
            $request->setRefId($refId);
            $request->setTransactionRequest($transactionRequestType);

            // add the settings to the request
            $request->addToHostedPaymentSettings($setting1);
            $request->addToHostedPaymentSettings($setting2);
            $request->addToHostedPaymentSettings($setting3);
            $request->addToHostedPaymentSettings($setting4);
            //$request->addToHostedPaymentSettings($setting5);
            //$request->addToHostedPaymentSettings($setting6);
            //$request->addToHostedPaymentSettings($setting7);
            //$request->addToHostedPaymentSettings($setting8);

            //execute request
            $controller = new AnetController\GetHostedPaymentPageController($request);
            if ($aNetENV == 'SANDBOX') {
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
            } elseif ($aNetENV == 'PRODUCTION') {
                $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::PRODUCTION);
            }
            if (($response != null) && ($response->getMessages()->getResultCode() == "Ok")) {
                $token = $response->getToken();
                //echo "SUCCESS :  Token : " . $token . "\n";
            } else {
                //echo "ERROR :  Failed to get hosted payment page token \n";
                //$errorMessages = $response->getMessages()->getMessage();
                //echo "RESPONSE : " . $errorMessages[0]->getCode() . "\n" . "DESCRIPTION : " . $errorMessages[0]->getText() . "\n";
            }
            return $token;
        }
                ?>
