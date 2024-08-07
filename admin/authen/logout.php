<?php
session_start();
require_once('../../database/config.php');
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
require_once('./process_form_login.php');
$token = getCookie("token");

setcookie("token", '', time() - 100, '/');

session_destroy();

header('Location:login.php');
die();
