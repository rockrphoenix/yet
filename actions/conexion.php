<?php

//ENTER YOUR DATABASE CONNECTION INFO BELOW:
$hostname="db528804916.db.1and1.com";
$database="db528804916";
$username="dbo528804916";
$password="Smash1ng5";

//DO NOT EDIT BELOW THIS LINE
$link = mysql_connect($hostname, $username, $password);
if (!$link) {
die('Connection failed: ' . mysql_error());
}
else{
    // echo "Connection to MySQL server " .$hostname . " successful!
	//" . PHP_EOL;
}

$db_selected = mysql_select_db($database, $link);
if (!$db_selected) {
    die ('Can\'t select database: ' . mysql_error());
}
else {
    //echo 'Database ' . $database . ' successfully selected!';
	mysql_query("SET NAMES 'utf8'");
}
?>
