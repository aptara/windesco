<?php

if ( ! defined( 'DWD_SPECIAL_SECRET_KEY' ) ) {
    define('DWD_SPECIAL_SECRET_KEY', '58858e8bcfe454.88635723'); //Rename this constant name so it is specific to your plugin or theme.
}
// This is the URL where API query request will be sent to. This should be the URL of the site where you have installed the main license manager plugin. Get this value from the integration help page.
if ( ! defined( 'DWD_LICENSE_SERVER_URL' ) ) {
    define('DWD_LICENSE_SERVER_URL', 'https://diviwebdesign.com'); //Rename this constant name so it is specific to your plugin or theme.
}
// This is a value that will be recorded in the license manager data so you can identify licenses for this item/product.
if ( ! defined( 'DWD_ITEM_REFERENCE' ) ) {
    define('DWD_ITEM_REFERENCE', 'Divi Fullwidth Header Extended'); //Rename this constant name so it is specific to your plugin or theme.
}
// This is a value that will be recorded in the license manager data so you can identify licenses for this item/product.
if ( ! defined( 'DWD_AIO_ITEM_REFERENCE' ) ) {
    define('DWD_AIO_ITEM_REFERENCE', 'Divi Perky Animate'); //Rename this constant name so it is specific to your plugin or theme.
}
// This is a value that will be recorded in the license manager data so you can identify licenses for this item/product.
if ( ! defined( 'DWD_MAP_ITEM_REFERENCE' ) ) {
    define('DWD_MAP_ITEM_REFERENCE', 'Divi Map Extended'); //Rename this constant name so it is specific to your plugin or theme.
}
// This is a value that will be recorded in the license manager data so you can identify licenses for this item/product.
if ( ! defined( 'DWD_FSA_ITEM_REFERENCE' ) ) {
    define('DWD_FSA_ITEM_REFERENCE', 'Divi Fullwidth Slider Animate'); //Rename this constant name so it is specific to your plugin or theme.
}

$theme_name = wp_get_theme();

add_action('admin_menu','dwd_plugin_top_menu');

if ( ! function_exists( 'dwd_plugin_top_menu' ) ) :
    function dwd_plugin_top_menu(){
        add_submenu_page( 'options-general.php', 'Divi Extended', 'Divi Extended', 'manage_options', 'options-general.php?page=dwd-management-page', 'dwd_management_page' );
}
endif;

if ( ! function_exists( 'dwd_management_page' ) ) :
function dwd_management_page(){
    ?>
    <div class='wrap'>
        <h2>Divi Web Design License Page Settings</h2>
        <table class="wp-list-table widefat plugins">
            <thead>
                <tr>
                    <th class="manage-column">Products</th><th class="manage-column">License Key</th><th class="manage-column">Expired License Date</th><th class="manage-column">Status</th><th class="manage-column"></th>
                </tr>
            </thead>
            <tbody>
    <?php
        /**FHE**/
        if ( is_plugin_active('dwd-custom-fullwidth-header-extended/load-fullwidth-header-extended.php') ) {
            $fhe_activated = get_option( 'fhe_license_key_activated' );

            if ($fhe_activated == false) {
                $fhe_activated = 'deactivated';
            }

            $fhe_deactivated = "";

            if ($fhe_activated == 'activated') { $fhe_deactivated = 'disabled'; }
            /*** License activate button was clicked ***/
            if (isset($_REQUEST['activate_license'])) {
                $license_key = $_REQUEST['fhe_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_activate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_ITEM_REFERENCE),
                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data
                
                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: ' . $license_data->message . '</p></div>';
                    
                    //Save the license key in the options table
                    update_option('fhe_license_key', $license_key);
                    update_option('fhe_license_key_activated', 'activated');
                    $fhe_activated = 'activated';
                    
                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: ' .$license_data->message .'</p></div>';
                }
            }
            /*** End of license activation ***/

            /*** License activate button was clicked ***/
            if (isset($_REQUEST['deactivate_license'])) {
                $license_key = $_REQUEST['fhe_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_deactivate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_ITEM_REFERENCE),

                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data
                
                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                    
                    //Remove the licensse key from the options table. It will need to be activated again.
                    update_option('fhe_license_key', '');
                    update_option('fhe_license_key_activated', 'deactivated');
                    $fhe_activated = 'deactivated';

                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                }
                
            }
            /*** End of sample license deactivation ***/
            if ( $fhe_activated == 'activated' ) {
                echo '<div class="notice notice-success"><p>Your Fullwidth Header Extended Module is Activated!</p></div>';
            }
            function dwd_fhe_check_with_license_server() {
                $license_key = get_option('fhe_license_key');
                $api_params = array(
                    'slm_action' => 'slm_check',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key,
                );
                    
                // Send query to the license manager server
                $response = wp_remote_get(add_query_arg($api_params, DWD_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));

                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response

                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                echo $license_data->status;
                return;
            }
            //check
            $license_key = get_option('fhe_license_key');
            // API query parameters
            $api_params = array(
                'slm_action' => 'slm_check',
                'secret_key' => DWD_SPECIAL_SECRET_KEY,
                'license_key' => $license_key,
            );

            // Send query to the license manager server
            $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
            $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

            // License data.
            $license_data = json_decode(wp_remote_retrieve_body($response));
            ?>
            <form action="" method="post">
                <tr <?php if ( $fhe_activated == 'activated' ) { echo 'class="active"'; } else { echo 'class="inactive"'; } ?>>
                    <td style="vertical-align:middle"><label for="fhe_license_key">Fullwidth Header Extended</label></td>
                    <td style="vertical-align:middle"><input class="regular-text" type="password" id="fhe_license_key" name="fhe_license_key" value="<?php echo get_option('fhe_license_key'); ?>" ></td>
                    <td style="vertical-align:middle">
                    <?php if ( $fhe_activated == 'activated' ) {
                        echo date("d/m/Y", strtotime($license_data->date_expiry));
                    } else {
                        echo 'Not available';
                    }
                    ?> 
                    </td>
                    <td style="vertical-align:middle">
                    <?php if ( $fhe_activated == 'activated' ) {
                        dwd_fhe_check_with_license_server();
                    }
                    ?>
                    </td>
                    <td align="right">
                        <?php
                            if ( $fhe_activated == 'activated' ) {
                                echo '<input type="submit" name="deactivate_license" value="Deactivate" class="button" />';
                            } else {
                                echo '<input type="submit" name="activate_license" value="Activate" class="button-primary" />';
                            }
                        ?>
                    </td>
                </tr>
            </form>
    <?php } /** End FHE**/
        /** AIO **/
        if ( is_plugin_active('dwd-aio-module-extended-plugin/load_aio_module.php') ) {
            $aio_activated = get_option( 'aio_license_key_activated' );

            if ($aio_activated == false) {
                $aio_activated = 'deactivated';
            }

            $aio_deactivated = "";

            if ($aio_activated == 'activated') { $aio_deactivated = 'disabled'; }
            /*** License activate button was clicked ***/
            if (isset($_REQUEST['aio_activate_license'])) {
                $license_key_a = $_REQUEST['aio_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_activate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_a,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_AIO_ITEM_REFERENCE),
                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data

                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: ' . $license_data->message . '</p></div>';
                    
                    //Save the license key in the options table
                    update_option('aio_license_key', $license_key_a); 
                    update_option('aio_license_key_activated', 'activated');
                    $aio_activated = 'activated';
                    
                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: ' .$license_data->message .'</p></div>';
                }

            }
            /*** End of license activation ***/

            /*** License activate button was clicked ***/
            if (isset($_REQUEST['aio_deactivate_license'])) {
                $license_key_a = $_REQUEST['aio_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_deactivate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_a,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_AIO_ITEM_REFERENCE),
                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data

                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                    
                    //Remove the licensse key from the options table. It will need to be activated again.
                    update_option('aio_license_key', '');
                    update_option('aio_license_key_activated', 'deactivated');
                    $aio_activated = 'deactivated';

                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                }
                
            }
            /*** End of sample license deactivation ***/
            if ( $aio_activated == 'activated' ) {
                echo '<div class="notice notice-success"><p>Your Perky Animate Module is Activated!</p></div>';
            }
            function dwd_perky_check_with_license_server() {
                $license_key_a = get_option('aio_license_key');
                $api_params = array(
                    'slm_action' => 'slm_check',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_a,
                );
                    
                // Send query to the license manager server
                $response = wp_remote_get(add_query_arg($api_params, DWD_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));

                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response

                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                echo $license_data->status;
                return;
            }
            //check
            $license_key_a = get_option('aio_license_key');
            // API query parameters
            $api_params = array(
                'slm_action' => 'slm_check',
                'secret_key' => DWD_SPECIAL_SECRET_KEY,
                'license_key' => $license_key_a,
            );

            // Send query to the license manager server
            $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
            $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

            // License data.
            $license_data = json_decode(wp_remote_retrieve_body($response));
            ?>
            <form action="" method="post">
                <tr <?php if ( $aio_activated == 'activated' ) { echo 'class="active"'; } else { echo 'class="inactive"'; } ?>>
                    <td style="vertical-align:middle"><label for="aio_license_key">Perky Animate</label></td>
                    <td style="vertical-align:middle"><input class="regular-text" type="password" id="aio_license_key" name="aio_license_key" value="<?php echo get_option('aio_license_key'); ?>" /></td>
                    <td style="vertical-align:middle">
                    <?php if ( $aio_activated == 'activated' ) {
                        echo date("d/m/Y", strtotime($license_data->date_expiry));
                    } else {
                        echo 'Not available';
                    }
                    ?> 
                    </td>
                    <td style="vertical-align:middle">
                    <?php if ( $aio_activated == 'activated' ) {
                        dwd_perky_check_with_license_server();
                    }
                    ?>
                    </td>
                    <td align="right">
                        <?php
                            if ( $aio_activated == 'activated' ) {
                                echo '<input type="submit" name="aio_deactivate_license" value="Deactivate" class="button" />';
                            } else {
                                echo '<input type="submit" name="aio_activate_license" value="Activate" class="button-primary" />';
                            }
                        ?>
                    </td>
                </tr>
            </form>
    <?php } /** End AIO^^/
        /**MAP**/
        if ( is_plugin_active('dwd-map-extended/load_custom_map_module.php') ) {
            $map_activated = get_option( 'map_license_key_activated' );

            if ($map_activated == false) {
                $map_activated = 'deactivated';
            }

            $map_deactivated = "";

            if ($map_activated == 'activated') { $map_deactivated = 'disabled'; }
            /*** License activate button was clicked ***/
            if (isset($_REQUEST['m_activate_license'])) {
                $license_key_m = $_REQUEST['map_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_activate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_m,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_MAP_ITEM_REFERENCE),
                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data
                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: ' . $license_data->message . '</p></div>';
                    
                    //Save the license key in the options table
                    update_option('map_license_key', $license_key_m);
                    update_option('map_license_key_activated', 'activated');
                    $map_activated = 'activated';
                    
                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: ' .$license_data->message .'</p></div>';
                }

            }
            /*** End of license activation ***/

            /*** License activate button was clicked ***/
            if (isset($_REQUEST['m_deactivate_license'])) {
                $license_key_m = $_REQUEST['map_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_deactivate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_m,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_MAP_ITEM_REFERENCE),
                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data

                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                    
                    //Remove the licensse key from the options table. It will need to be activated again.
                    update_option('map_license_key', '');
                    update_option('map_license_key_activated', 'deactivated');
                    $map_activated = 'deactivated';

                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                }
                
            }
            /*** End of sample license deactivation ***/
            if ( $map_activated == 'activated' ) {
                echo '<div class="notice notice-success"><p>Your Map Extended Module is Activated!</p></div>';
            }
            function dwd_map_check_with_license_server() {
                $license_key_m = get_option('map_license_key');
                $api_params = array(
                    'slm_action' => 'slm_check',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_m,
                );
                    
                // Send query to the license manager server
                $response = wp_remote_get(add_query_arg($api_params, DWD_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));

                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response

                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                echo $license_data->status;
                return;
            }
            //check
            $license_key_m = get_option('map_license_key');
            // API query parameters
            $api_params = array(
                'slm_action' => 'slm_check',
                'secret_key' => DWD_SPECIAL_SECRET_KEY,
                'license_key' => $license_key_m,
            );

            // Send query to the license manager server
            $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
            $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

            // License data.
            $license_data = json_decode(wp_remote_retrieve_body($response));
            ?>
            <form action="" method="post">
                <tr <?php if ( $map_activated == 'activated' ) { echo 'class="active"'; } else { echo 'class="inactive"'; } ?>>
                    <td style="vertical-align:middle"><label for="map_license_key">Divi Map Extended</label></td>
                    <td style="vertical-align:middle"><input class="regular-text" type="password" id="map_license_key" name="map_license_key" value="<?php echo get_option('map_license_key'); ?>" ></td>
                    <td style="vertical-align:middle">
                    <?php if ( $map_activated == 'activated' ) {
                        echo date("d/m/Y", strtotime($license_data->date_expiry));
                    } else {
                        echo 'Not available';
                    }
                    ?> 
                    </td>
                    <td style="vertical-align:middle">
                    <?php if ( $map_activated == 'activated' ) {
                        dwd_map_check_with_license_server();
                    }
                    ?>
                    </td>
                    <td align="right">
                        <?php
                        if ( $map_activated == 'activated' ) {
                            echo '<input type="submit" name="m_deactivate_license" value="Deactivate" class="button" />';
                        } else {
                            echo '<input type="submit" name="m_activate_license" value="Activate" class="button-primary" />';
                        }
                    ?>
                    </td>
                </tr>
            </form>
    <?php } /** End MAP**/
        /**FSA**/
        if ( is_plugin_active('dwd-slider-animate/dwd-slider-animate.php') ) {
            $fsa_activated = get_option( 'fsa_license_key_activated' );

            if ($fsa_activated == false) {
                $fsa_activated = 'deactivated';
            }

            $fsa_deactivated = "";

            if ($fsa_activated == 'activated') { $fsa_deactivated = 'disabled'; }
            /*** License activate button was clicked ***/
            if (isset($_REQUEST['fsa_activate_license'])) {
                $license_key_fsa = $_REQUEST['fsa_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_activate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_fsa,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_FSA_ITEM_REFERENCE),
                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data
                
                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: ' . $license_data->message . '</p></div>';
                    
                    //Save the license key in the options table
                    update_option('fsa_license_key', $license_key_fsa);
                    update_option('fsa_license_key_activated', 'activated');
                    $fsa_activated = 'activated';
                    
                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: ' .$license_data->message .'</p></div>';
                }
            }
            /*** End of license activation ***/

            /*** License activate button was clicked ***/
            if (isset($_REQUEST['fsa_deactivate_license'])) {
                $license_key_fsa = $_REQUEST['fsa_license_key'];

                // API query parameters
                $api_params = array(
                    'slm_action' => 'slm_deactivate',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_fsa,
                    'registered_domain' => $_SERVER['SERVER_NAME'],
                    'item_reference' => urlencode(DWD_FSA_ITEM_REFERENCE),

                );

                // Send query to the license manager server
                $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
                $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

                // Check for error in the response
                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response
                
                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                
                // TODO - Do something with it.
                //var_dump($license_data);//uncomment it to look at the data
                
                if($license_data->result == 'success'){//Success was returned for the license activation
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-success"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                    
                    //Remove the licensse key from the options table. It will need to be activated again.
                    update_option('fsa_license_key', '');
                    update_option('fsa_license_key_activated', 'deactivated');

                    $fsa_activated = 'deactivated';

                }
                else{
                    //Show error to the user. Probably entered incorrect license key.
                    
                    //Uncomment the followng line to see the message that returned from the license server
                    echo '<div class="notice notice-info"><p>The following message was returned from the server: '.$license_data->message.'</p></div>';
                }
                
            }
            /*** End of sample license deactivation ***/
            if ( $fsa_activated == 'activated' ) {
                echo '<div class="notice notice-success"><p>Your Divi Slider Animate Module is Activated!</p></div>';
            }
            function dwd_fsa_check_with_license_server() {
                $license_key_fsa = get_option('fsa_license_key');
                $api_params = array(
                    'slm_action' => 'slm_check',
                    'secret_key' => DWD_SPECIAL_SECRET_KEY,
                    'license_key' => $license_key_fsa,
                );
                    
                // Send query to the license manager server
                $response = wp_remote_get(add_query_arg($api_params, DWD_LICENSE_SERVER_URL), array('timeout' => 20, 'sslverify' => false));

                if (is_wp_error($response)){
                    echo "Unexpected Error! The query returned with an error.";
                }

                //var_dump($response);//uncomment it if you want to look at the full response

                // License data.
                $license_data = json_decode(wp_remote_retrieve_body($response));
                echo $license_data->status;
                return;
            }
            //check
            $license_key_fsa = get_option('fsa_license_key');
            // API query parameters
            $api_params = array(
                'slm_action' => 'slm_check',
                'secret_key' => DWD_SPECIAL_SECRET_KEY,
                'license_key' => $license_key_fsa,
            );

            // Send query to the license manager server
            $query = esc_url_raw(add_query_arg($api_params, DWD_LICENSE_SERVER_URL));
            $response = wp_remote_get($query, array('timeout' => 20, 'sslverify' => false));

            // License data.
            $license_data = json_decode(wp_remote_retrieve_body($response));
            ?>
            <form action="" method="post">
                <tr <?php if ( $fsa_activated == 'activated' ) { echo 'class="active"'; } else { echo 'class="inactive"'; } ?>>
                    <td style="vertical-align:middle"><label for="fsa_license_key">Divi Slider Animate</label></td>
                    <td style="vertical-align:middle"><input class="regular-text" type="password" id="fsa_license_key" name="fsa_license_key" value="<?php echo get_option('fsa_license_key'); ?>" ></td>
                    <td style="vertical-align:middle">
                    <?php if ( $fsa_activated == 'activated' ) {
                        echo date("d/m/Y", strtotime($license_data->date_expiry));
                    } else {
                        echo 'Not available';
                    }
                    ?> 
                    </td>
                    <td style="vertical-align:middle">
                    <?php if ( $fsa_activated == 'activated' ) {
                        dwd_fsa_check_with_license_server();
                    }
                    ?>
                    </td>
                    <td align="right">
                        <?php
                            if ( $fsa_activated == 'activated' ) {
                                echo '<input type="submit" name="fsa_deactivate_license" value="Deactivate" class="button" />';
                            } else {
                                echo '<input type="submit" name="fsa_activate_license" value="Activate" class="button-primary" />';
                            }
                        ?>
                    </td>
                </tr>
            </form>
    <?php } /** End FSA**/
    ?>
            </tbody>
        </table>
    </div>
<?php }
endif;