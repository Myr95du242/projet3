<?php
session_start();

require_once 'controllers/switcher.php';
$switcher= new \myrna\blog\controllers\Switcher();
$switcher->switchRequete();

?>

