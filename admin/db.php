<?php//@skip-indexing?>
<?php

include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Repository_Factory.php');

$repository = Repository_Factory::get_instance();

function get_setting($setting_name, $settings_array = array())
{
    global $repository;
    return $repository->get_setting($setting_name, $settings_array);
}

function get_all_settings()
{
    global $repository;
    return $repository->get_all_settings();
}

function save_settings($settings)
{
    global $repository;
    $repository->save_settings($settings);
}

function restore_settings()
{
    global $repository;
    return $repository->restore_settings();
}

function has_custom_value($setting_name)
{
    global $repository;
    return $repository->has_custom_value($setting_name);
}

function get_all_emails()
{
    global $repository;
    return $repository->get_all_emails();
}

function add_email_address($email)
{
    global $repository;
    return $repository->add_email_address($email);
}

function remove_email_address($email_id)
{
    global $repository;
    return $repository->remove_email_address($email_id);
}

?>