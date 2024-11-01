<?php
$apikey = get_option('was_api_key');
$list_id = get_option('was_list_id');
$was_subscribe_title = get_option('was_subscribe_title');
$was_subscribe_description = get_option('was_subscribe_description');
$was_subscribe_btn_text = get_option('was_subscribe_btn_text');
?>
<div class="wrap">
    <h2><?php echo esc_html__('WP Ajax Subscribe','wp-ajax-subscribe'); ?></h2>
    <form method="post" action="#">
        <label for="was_api_key"><?php echo esc_html__('Mailchimp Api Key:','wp-ajax-sunscribe'); ?></label>
        <input type="text" name="was_api_key" id="was_api_key" value="<?php echo esc_attr($apikey);?>"><br/>
        <label for="was_api_key"><?php echo esc_html__('Mailchimp List Id:','wp-ajax-subscribe'); ?></label>
        <input type="text" name="was_list_id" id="was_list_id" value="<?php echo esc_attr($list_id); ?>"><br/>
        <label for="was_subscribe_title"><?php echo esc_html__('Subscribe Title','wp-ajax-subscribe'); ?></label>
        <input type="text" name="was_subscribe_title" id="was_subscribe_title" value="<?php echo esc_attr($was_subscribe_title); ?>"><br/>
        <label for="was_subscribe_description"><?php echo esc_html__('Subscribe Description','wp-ajax-subscribe'); ?></label>
        <input type="text" name="was_subscribe_description" id="was_subscribe_description" value="<?php echo esc_attr($was_subscribe_description); ?>"><br/>
        <label for="was_subscribe_btn_text"><?php echo esc_html__('Subscribe Button Title','wp-ajax-subscribe'); ?></label>
        <input type="text" name="was_subscribe_btn_text" id="was_subscribe_btn_text" value="<?php echo esc_attr($was_subscribe_btn_text); ?>"><br/>
        <input type="submit" value="Save" name="was_save" class="button button-primary button-large">
    </form>
</div>