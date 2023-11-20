<?php

error_reporting(E_ALL);

session_start();

date_default_timezone_get('Europe/Madrid');
$home_url="http://sestacio.dwes.randion.es/practica5-login-ninja/";
$page = isset($_GET["page"]) ? $_GET["page"] :1;

$records_per_page = 5;
$from_record_num = ($records_per_page * $page) - $records_per_page;

?>