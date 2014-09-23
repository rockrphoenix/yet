<?php
/**
 * @author grupo syse
 * @copyright 2014
 */
require_once('../clases/class.logueo.php');
$valida= new Logueo();
$valida->validaSesion();

include('../clases/class.cron.php');
$cron= new Cronn();
$users=$cron->checkUser();
$cron->compareUser($users);
$cron->updateUsers();
