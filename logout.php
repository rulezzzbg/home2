<?php
include("include/config.inc.php");

$_SESSION['is_logged'] = 0;
$_SESSION['user'] = "";

go_login();
?>