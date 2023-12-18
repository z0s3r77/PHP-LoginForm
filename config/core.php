<?php

// A qué nivel trabja este error_reporting?
error_reporting(E_ALL);

session_start();

// Me daba un error si ponia Europe/Madrid
date_default_timezone_get();


$home_url="http://localhost:42133/";



$page = isset($_GET["page"]) ? $_GET["page"] :1;
$records_per_page = 5;
$from_record_num = ($records_per_page * $page) - $records_per_page;

?>