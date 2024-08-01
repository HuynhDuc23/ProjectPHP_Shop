<?php

require_once('../../database/config.php');
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');
require_once('./process_form_login.php');

session_start();

$token = getCookie("token");

setcookie("token", '', time() - 100, '/');

session_destroy();
