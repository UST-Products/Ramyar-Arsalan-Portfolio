<?php 
session_start();
session_regenerate_id();
ob_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$body = json_decode(file_get_contents('php://input'));
$data = [];


