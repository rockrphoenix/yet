<?php//@skip-indexing?>
<?php

include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . '../settings.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'SQLite_Repository.php');
include_once (dirname(__FILE__) . DIRECTORY_SEPARATOR . 'MySQL_Repository.php');

class Repository_Factory
{

    static function get_instance()
    {
        global $db_type;
        if ($db_type == 'sqlite') {
            return new SQLite_Repository();
        } elseif ($db_type == 'mysql') {
            return new MySQL_Repository();
        } else {
            die ("The database: " . $db_type . " is not supported");
        }
    }

}
