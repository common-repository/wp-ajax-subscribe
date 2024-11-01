<?php
/**
 * Created by PhpStorm.
 * User: rabinasilwal
 * Date: 3/18/19
 * Time: 2:51 PM
 */

if(!function_exists('wp_ajax_subscribe')) {
    function wp_ajax_subscribe()
    {
        $was_subscribe_title = get_option('was_subscribe_title');
        $apikey = get_option('was_api_key');
        $list_id = get_option('was_list_id');
        $was_subscribe_description = get_option('was_subscribe_description');
        $was_subscribe_btn_text = get_option('was_subscribe_btn_text');
        if(!$was_subscribe_btn_text)
            $was_subscribe_btn_text = esc_html__('Subscribe','wp=ajax-subscribe');
        ?>
        <section class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content">
                            <?php
                            if( $apikey && $list_id) {
                                if ($was_subscribe_title) ?>
                                    <h2><?php echo esc_html($was_subscribe_title); ?></h2>
                                <?php if ($was_subscribe_description) ?>
                                    <p><?php echo esc_html($was_subscribe_description); ?></p>
                                <div class="input-group">
                                    <input type="email" name="email" class="form-control wp-subscribe-email" value=""
                                           placeholder="<?php echo esc_attr__('Enter your email address', 'wp-ajax-subscribe'); ?>">
                                    <span class="input-group-btn">
         <button class="btn wp-ajax-subscribe-button" value="Subscribe" name="subscribe"
                 type="submit"><?php echo esc_html($was_subscribe_btn_text); ?></button>
         </span>
                                </div>
                                <div class="wp-ajax-msg-error"
                                     style="display: none;"><?php echo esc_html__('Error, please check your email address.', 'wp-ajax-subscribe'); ?></div>
                                <div class="wp-ajax-msg-success"
                                     style="display: none;"><?php echo esc_html__('Thanks for Subscribing!', 'wp-ajax-subscribe') ?></div>
                                <div class="wp-ajax-msg-empty"
                                     style="display: none;"><?php echo esc_html__('Email is empty.', 'wp-ajax-subscribe') ?></div>
                                <?php
                            }
                            else{
                                echo '<h2><a href="'.esc_url(admin_url( 'admin.php?page=wp-ajax-subscribe%2Fcustom-function%2Fwp-ajax-subscribe-menu.php' ) ).'">'.esc_html__('Please provide all the details.','wp-ajax-subscribe').'</a></h2>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    <?php }
}
add_shortcode('wp_ajax_mailchimp','wp_ajax_subscribe');

add_action('wp_ajax_mailchimp_subscribe','wp_ajax_subscribe_action');
add_action('wp_ajax_nopriv_mailchimp_subscribe','wp_ajax_subscribe_action');

function wp_ajax_subscribe_action(){
    $email = $_POST['email'];
    if(!isset($_POST['email']) || empty($_POST['email']) || !is_email($_POST['email']) )
        return;
    $apikey = get_option('was_api_key');
    $list_id = get_option('was_list_id');

    $dataCenter = substr($apikey, strrpos($apikey, '-' )+1);
    $auth = base64_encode( 'user:'.$apikey );
    $data = array(
        'apikey'        => esc_attr($apikey),
        'email_address' => antispambot($email),
        'status'        => 'subscribed',
    );
    $json_data = json_encode($data);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://'.esc_attr(trim($dataCenter)).'.api.mailchimp.com/3.0/lists/'.esc_attr($list_id).'/members/');
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json',
        'Authorization: Basic '.$auth));
    curl_setopt($ch, CURLOPT_USERAGENT, 'PHP-MCAPI/2.0');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $json_data);
    $result = curl_exec($ch);

    if($result != Null && $email)
        $response['success'] = 'success';
    else
        $response['success'] = '';
    $response['error'] = 'error';
    $response['result'] = $result;
    echo json_encode($response);
    die();
}
function wp_ajax_subscribe_custom_menu_page() {
    add_menu_page(
        __( 'WP Ajax Subscribe', 'wp-ajax-subscribe' ),
        'WP Subscribe',
        'manage_options',
        'wp-ajax-subscribe/custom-function/wp-ajax-subscribe-menu.php',
        '',
        'dashicons-email',
        6
    );
}
add_action( 'admin_menu', 'wp_ajax_subscribe_custom_menu_page' );
add_action( 'admin_init', 'wp_ajax_subscribe_menu_options' );

function wp_ajax_subscribe_menu_options() {
    if (isset($_POST['was_save'])) {
        $listapi = $_POST['was_api_key'];
        $listid = $_POST['was_list_id'];
        $was_subscribe_title = $_POST['was_subscribe_title'];
        $was_subscribe_description = $_POST['was_subscribe_description'];
        $was_subscribe_btn_text = $_POST['was_subscribe_btn_text'];
        if(isset($_POST['was_api_key']) && !empty($_POST['was_api_key']))
            update_option('was_api_key', sanitize_text_field($listapi));
        if(isset($_POST['was_list_id']) && !empty($_POST['was_list_id']))
            update_option('was_list_id', sanitize_text_field($listid));
        if(isset($_POST['was_subscribe_title']))
            update_option('was_subscribe_title', sanitize_text_field($was_subscribe_title));
        if(isset($_POST['was_subscribe_description']))
            update_option('was_subscribe_description', sanitize_text_field($was_subscribe_description));
        if(isset($_POST['was_subscribe_btn_text']))
            update_option('was_subscribe_btn_text', sanitize_text_field($was_subscribe_btn_text));

    }
}