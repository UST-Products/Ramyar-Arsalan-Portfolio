<?php 
include_once(__DIR__.'/../../config/database.php');
date_default_timezone_set(DB_TIMEZONE);


class Database {

 
private static $server; 
private static $user;
private static $pass; 
private static $db; 
private static $charset; 
private static $collate; 
private static $timezone; 

private static $instance;
private static $conn;


 
private static function conn() {

 self::$server = DB_SERVER;
 self::$user = DB_USER;
 self::$pass = DB_PASS;
 self::$db = DB_NAME;
 self::$charset = DB_CHARSET;
 self::$collate = DB_COLLATE;
 self::$timezone = DB_TIMEZONE;

 self::$instance =null;
 self::$conn=false;

 
self::$conn= new PDO("mysql:host=".self::$server.";dbname=".self::$db.";charset=".self::$charset,self::$user,self::	$pass);
self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
self::$conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND , "SET NAMES ".self::$charset." COLLATE ".self::$collate." TIME_ZONE ".self::$timezone);
self::$conn->setAttribute(PDO::ATTR_AUTOCOMMIT,true);
self::$conn->setAttribute(PDO::ATTR_PERSISTENT , false);
self::$conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_ASSOC);
self::$conn->setAttribute(PDO::ATTR_ORACLE_NULLS, PDO::NULL_NATURAL);
self::$conn->setAttribute( PDO::ATTR_EMULATE_PREPARES, true );          
self::$conn->setAttribute(PDO::ATTR_CASE, PDO::CASE_NATURAL);


return self::$conn;
}





public static function getInstance() {
    self::$instance=self::conn();
    return self::$instance;
}











  
}


