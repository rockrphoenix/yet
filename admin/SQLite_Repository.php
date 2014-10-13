<?php//@skip-indexing?>
<?php

include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '../settings.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'util.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'Repository.php');

class SQLite_Repository extends Repository
{
    var $db;

    function __construct()
    {
        $default_settings = $this->get_default_settings();
        $this->db = $this->open_db();
        $result = $this->db->query("SELECT count(*) as a FROM sqlite_master WHERE name='" . Repository::$SETTINGS_TABLE_NAME . "'");
        if ($result) {
            $rows = $result->fetchAll();
            if (count($rows) > 0 && intval($rows[0]['a']) == 0) {
                $this->db->exec("CREATE TABLE " . Repository::$SETTINGS_TABLE_NAME . " (s_name varchar(256) PRIMARY KEY, s_default_value text, s_value text)");
                $this->db->exec("CREATE TABLE " . Repository::$NEWSLETTER_EMAILS_TABLE_NAME . " (id varchar(512) PRIMARY KEY, email_address text)");
            }
        }

        $setting_names = $this->get_all_settings_name();
        foreach ($default_settings as $key => $value) {
            if (!in_array($key, $setting_names)) {
                $this->db->exec("INSERT INTO " . Repository::$SETTINGS_TABLE_NAME . "(s_name, s_default_value, s_value) values ('$key', '$value', null)");
            }
        }
    }

    private function open_db()
    {
        try {
            $db_file = get_tmp_folder() . DIRECTORY_SEPARATOR . Repository::$DB_NAME;
            return new PDO('sqlite:' . $db_file);
        } catch (Exception $e) {
            die($e->getMessage());
        }
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
            $stm = $this->db->prepare('SELECT s_default_value, s_value FROM settings WHERE s_name = :setting_name');
            $stm->execute(array(':setting_name' => $setting_name));
            $rows = $stm->fetchAll();
            $row = $rows[0];
            if (isset($row['s_value']) && $row['s_value'] != null && strlen($row['s_value']) > 0) {
                $val = $row['s_value'];
            } else {
                $val = $row['s_default_value'];
            }
            return $val;
        }
    }

    function get_all_settings()
    {
        $settings = array();
        $result = $this->db->query('SELECT s_name, s_default_value, s_value FROM settings');
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            $settings[$row['s_name']] = array(
                "default_value" => $row['s_default_value'],
                "custom_value" => $row['s_value'],
            );
        }
        return $settings;
    }

    function save_settings($settings)
    {
        foreach ($settings as $key => $value) {
            $value = sqlite_escape_string($value);
            $stm = $this->db->prepare('UPDATE settings SET s_value = :value WHERE s_name = :key');
            $stm->execute(array(':value' => $value, ':key' => $key));
        }
    }

    function restore_settings()
    {
        $default_settings = $this->get_default_settings();
        $this->db->exec('update settings set s_value = null');
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
        $stm = $this->db->prepare('SELECT s_default_value FROM settings WHERE s_name= :setting_name');
        $stm->execute(array(':setting_name' => $setting_name));
        $rows = $stm->fetchAll();
        $row = $rows[0];
        if (isset($row['s_default_value']) && $row['s_default_value'] != null && strlen($row['s_default_value']) > 0) {
            $b = true;
        } else {
            $b = false;
        }
        return $b;
    }

    function get_all_emails()
    {
        $emails = array();
        $result = $this->db->query('SELECT id, email_address FROM newsletter_emails');
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            $emails[$row['id']] = $row['email_address'];
        }
        return $emails;
    }

    function add_email_address($email)
    {
        $email_id = md5($email);
        $stm = $this->db->prepare('SELECT count(*) as emails_count FROM newsletter_emails WHERE id = :email_id');
        $stm->execute(array(':email_id' => $email_id));
        $rows = $stm->fetchAll();
        $row = $rows[0];
        if (intval($row['emails_count']) == 0) {
            $stm = $this->db->prepare('INSERT INTO newsletter_emails (id, email_address) values (:email_id, :email)');
            $ok = $stm->execute(array(':email_id' => $email_id, ':email' => $email));
        } else {
            $ok = true;
        }
        return $ok;
    }

    function remove_email_address($email_id)
    {
        $stm = $this->db->prepare('DELETE FROM newsletter_emails WHERE id= :email_id');
        $ok = $stm->execute(array(':email_id' => $email_id));
        return $ok;
    }

    private function get_all_settings_name()
    {
        $settings_name = array();
        $result = $this->db->query('SELECT s_name FROM '.Repository::$SETTINGS_TABLE_NAME);
        $rows = $result->fetchAll();
        foreach ($rows as $row) {
            array_push($settings_name, $row['s_name']);
        }
        return $settings_name;
    }

}
