<?php
/**
 * @author grupo syse
 * @copyright 2014
 */
<<<<<<< HEAD

=======
>>>>>>> 1f22693d82efdd027128b4a534fecb9d8f3230a5
require_once('../clases/class.logueo.php');
$valida= new Logueo();
$valida->validaSesion();

include('../clases/class.cron.php');
$cron= new Cronn();
$users=$cron->checkUser();
$cron->compareUser($users);
$cron->updateUsers();
