<?php
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
                        'required' => true,
                    ),
                    array(
                        'label' => 'Transaction Key',
                        'id' => 'MERCHANT_TRANSACTION_KEY',
                        'type' => 'text',
                        'section' => 'authorizenet_section',
                        'desc' => 'Transaction Key generated by the Authorize.net account *Required',
                        'required' => true,
                    ),
                    array(
                        'label' => 'Key',
                        'id' => 'MERCHANT_KEY',
                        'type' => 'text',
                        'section' => 'authorizenet_section',
                        'desc' => 'For Testing, Optional? Leave blank if unsure.',
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
                ?>
