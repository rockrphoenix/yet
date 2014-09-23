<?php//@skip-indexing?>
<?php

include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '../settings.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'util.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Repository.php');

class MySQL_Repository extends Repository
{

    function __construct()
    {
        $connection = $this->open_connection();
        if (!$this->table_exists($connection, Repository::$SETTINGS_TABLE_NAME)) {
            mysqli_query($connection, "CREATE TABLE " . Repository::$SETTINGS_TABLE_NAME . " (s_name varchar(256) PRIMARY KEY, s_default_value text, s_value text)");
            mysqli_query($connection, "CREATE TABLE " . Repository::$NEWSLETTER_EMAILS_TABLE_NAME . " (id varchar(512) PRIMARY KEY, email_address text)");
        }

        $default_settings = $this->get_default_settings();
        $setting_names = $this->get_all_settings_name($connection);
        foreach ($default_settings as $key => $value) {
            if (!in_array($key, $setting_names)) {
                mysqli_query($connection, "INSERT INTO " . Repository::$SETTINGS_TABLE_NAME . "(s_name, s_default_value, s_value) values ('$key', '$value', null)");
            }
        }
        $this->close_connection($connection);
    }

    function get_setting($setting_name, $settings_array = array())
    {
        if (is_array($settings_array) && count($settings_array) > 0) {
            $values = $settings_array[$setting_name];
            if (isset($values['custom_value']) && $values['custom_value'] != null && strlen($values['custom_value']) > 0) {
                return $values['custom_value'];
            } else {
                return $values['default_value'];
            }
        } else {
            $connection = $this->open_connection();
            $setting_name = mysqli_real_escape_string($connection, $setting_name);
            $result = mysqli_query($connection, "SELECT s_default_value, s_value FROM settings WHERE s_name='$setting_name'");
            $row = mysqli_fetch_assoc($result);
            if ($row && isset($row['s_value']) && $row['s_value'] != null && strlen($row['s_value']) > 0) {
                $val = $row['s_value'];
            } else {
                $val = $row['s_default_value'];
            }
            $this->close_connection($connection);
            return $val;
        }

    }

    function get_all_settings()
    {
        $connection = $this->open_connection();
        $settings = array();
        $result = mysqli_query($connection, "SELECT s_name, s_default_value, s_value FROM settings");
        while ($row = mysqli_fetch_assoc($result)) {
            $settings[$row['s_name']] = array(
                "default_value" => $row['s_default_value'],
                "custom_value" => $row['s_value'],
            );
        }
        $this->close_connection($connection);
        return $settings;
    }

    function save_settings($settings)
    {
        $connection = $this->open_connection();
        foreach ($settings as $key => $value) {
            $value = mysqli_real_escape_string($connection, $value);
            mysqli_query($connection, "UPDATE settings SET s_value = '$value' WHERE s_name='$key'");
        }
        $this->close_connection($connection);
    }

    function restore_settings()
    {
        $default_settings = $this->get_default_settings();
        $connection = $this->open_connection();
        mysqli_query($connection, "update settings set s_value = null");
        $this->close_connection($connection);
        $settings = array();
        foreach ($default_settings as $key => $value) {
            $settings[$key] = array(
                "default_value" => $value,
                "custom_value" => '',
            );
        }
        return $settings;
    }

    function has_custom_value($setting_name)
    {
        $connection = $this->open_connection();
        $setting_name = mysqli_real_escape_string($connection, $setting_name);
        $result = mysqli_query($connection, "SELECT s_default_value FROM settings WHERE s_name='$setting_name'");
        $row = mysqli_fetch_assoc($result);
        if ($row && isset($row['s_default_value']) && $row['s_default_value'] != null && strlen($row['s_default_value']) > 0) {
            $b = true;
        } else {
            $b = false;
        }
        $this->close_connection($connection);
        return $b;
    }

    function get_all_emails()
    {
        $connection = $this->open_connection();
        $emails = array();
        $result = mysqli_query($connection, "SELECT id, email_address FROM newsletter_emails");
        while ($row = mysqli_fetch_assoc($result)) {
            $emails[$row['id']] = $row['email_address'];
        }
        $this->close_connection($connection);
        return $emails;
    }

    function add_email_address($email)
    {
        $connection = $this->open_connection();
        $email = mysqli_real_escape_string($connection, $email);
        $email_id = md5($email);
        $result = mysqli_query($connection, "SELECT count(*) as emails_count FROM newsletter_emails WHERE id='$email_id'");
        $row = mysqli_fetch_assoc($result);
        if ($row && intval($row['emails_count']) == 0) {
            $ok = mysqli_query($connection, "INSERT INTO newsletter_emails (id, email_address) values ('$email_id', '$email')");
        } else {
            $ok = true;
        }
        $this->close_connection($connection);
        return $ok;
    }

    function remove_email_address($email_id)
    {
        $connection = $this->open_connection();
        $email_id = mysqli_real_escape_string($connection, $email_id);
        $ok = mysqli_query($connection, "DELETE FROM newsletter_emails WHERE id='$email_id'");
        $this->close_connection($connection);
        return $ok;
    }

    private function open_connection()
    {
        global $db_host;
        global $db_user;
        global $db_pass;
        global $db_name;
        $err_level = error_reporting(0);
        $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
        error_reporting($err_level);
        if (!$connection) {
            echo ("Could not connect: " . mysqli_connect_error());
            throw new Exception(mysqli_connect_error());
        } else {
            return $connection;
        }
    }

    private function close_connection($connection)
    {
        mysqli_close($connection);
    }

    private function table_exists($connection, $table_name)
    {
        global $db_name;
        $result = mysqli_query($connection,
            "SELECT COUNT(*) AS count FROM information_schema.tables WHERE table_schema = '$db_name' AND table_name = '$table_name'");
        $row = mysqli_fetch_assoc($result);
        return $row && intval($row['count']) > 0;
    }

    private function get_all_settings_name($connection)
    {
        $settings_name = array();
        $result = mysqli_query($connection, "SELECT s_name FROM ".Repository::$SETTINGS_TABLE_NAME);
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($settings_name, $row['s_name']);
        }
        return $settings_name;
    }
}
