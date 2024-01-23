<?php

/* -------------------------------------------------------------
// ダッシュボードの一般設定に項目追加
// ------------------------------------------------------------*/


add_action('admin_init', 'company_base_data');
function company_base_data() {

  add_settings_section(
    'company_base_data_section', // Section ID
    '基本情報', // Section Title
    'company_base_data_options_callback', // Callback
    'general' // What Page?  This makes the section show up on the General Settings Page
  );

  add_settings_field(
    'corp_name', // Option ID
    '法人名・団体名', // Label
    'my_textbox_callback', // !important - This is where the args go!
    'general', // Page it will be displayed
    'company_base_data_section', // Name of our section (General Settings)
    array( // The $args
      'corp_name' // Should match Option ID
    )
  );

  add_settings_field(
    'tel_number', // Option ID
    'TEL', // Label
    'my_textbox_callback', // !important - This is where the args go!
    'general', // Page it will be displayed (General Settings)
    'company_base_data_section', // Name of our section
    array( // The $args
      'tel_number' // Should match Option ID
    )
  );

  add_settings_field(
    'fax_number', // Option ID
    'FAX', // Label
    'my_textbox_callback', // !important - This is where the args go!
    'general', // Page it will be displayed (General Settings)
    'company_base_data_section', // Name of our section
    array( // The $args
      'fax_number' // Should match Option ID
    )
  );

  add_settings_field(
    'address_num', // Option ID
    '〒', // Label
    'my_textbox_callback', // !important - This is where the args go!
    'general', // Page it will be displayed
    'company_base_data_section', // Name of our section (General Settings)
    array( // The $args
      'address_num' // Should match Option ID
    )
  );

  add_settings_field(
    'address_data', // Option ID
    '住所', // Label
    'my_textbox_callback', // !important - This is where the args go!
    'general', // Page it will be displayed
    'company_base_data_section', // Name of our section (General Settings)
    array( // The $args
      'address_data' // Should match Option ID
    )
  );

  register_setting('general','corp_name', 'esc_attr');
  register_setting('general','tel_number', 'esc_attr');
  register_setting('general','fax_number', 'esc_attr');
  register_setting('general','address_num', 'esc_attr');
  register_setting('general','address_data', 'esc_attr');

}

function company_base_data_options_callback() { // Section Callback
  // echo '<p>追加項目</p>';
}

function my_textbox_callback($args) {  // Textbox Callback
  $option = get_option($args[0]);
  echo '<input type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '"  class="regular-text">';
  // echo '<p class="description">ここに説明書きを入れられる</p>';
}

?>