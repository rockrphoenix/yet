<?php//@skip-indexing?>
<?php

include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'util.php');

abstract class Repository
{

    static $DB_NAME = "finesse_db";
    static $SETTINGS_TABLE_NAME = "settings";
    static $NEWSLETTER_EMAILS_TABLE_NAME = "newsletter_emails";

    abstract function get_setting($setting_name, $settings_array = array());

    abstract function get_all_settings();

    abstract function save_settings($settings);

    abstract function restore_settings();

    abstract function has_custom_value($setting_name);

    abstract function get_all_emails();

    abstract function add_email_address($email);

    abstract function remove_email_address($email_id);

    protected final function get_default_settings()
    {
        return array(
            'public_html_dir' => 'public_html',
            'search_result_items' => '10',
            'search_indexes_folder' => get_tmp_folder() . DIRECTORY_SEPARATOR . 'finesse_search_indexes',
            'search_display_meta_tag' => 'description',
            'search_dynamic_pages' => '',
            'search_exclude_from_indexing' => '',
        );
    }

}
