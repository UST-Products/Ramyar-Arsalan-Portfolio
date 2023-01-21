<?php 
include_once(__DIR__.'/Database.php');



class Builder extends Database {
	



private static $query = null;
private static $rowcount=null;
private static $columncount=null;





private static function build($sql) {
    self::$query = $sql;
    $q = parent::getInstance()->query(self::$query);

if (stripos(self::$query, "select")==true && stripos(self::$query, "from")==true) {

     $rc = $q->rowCount();self::$rowcount=$rc;
     $cc = $q->columnCount();self::$columncount=$cc;
}
return $q;
}









public static function execute($sql) {
   $s =  self::build($sql);
   return $s;
} 





public static function getQuery($sql) {
   $s =  self::execute($sql);
if (stripos(self::$query, "select")==true && stripos(self::$query, "from")==true) {
   return $s->fetchAll(PDO::FETCH_ASSOC);
}
else {
  return null;
}
} 





public static function findQuery($sql) {
   $s =  self::execute($sql);
if (stripos(self::$query, "select")==true && stripos(self::$query, "from")==true) {
   return $s->fetch(PDO::FETCH_ASSOC);
}
else {
  return null;
}
}






public static function countQuery($sql) {
   self::execute($sql);
   return self::$rowcount;
}






public static function columnCount($sql) {
   self::execute($sql);
   return self::$columncount;
}





public static function tableExist($table) {
$result = self::execute(" SHOW TABLES LIKE '$table' ");
$c = $result->rowCount();
if ($c > 0 ) {
  return true;
}
else {
  return false;
}
}





public static function columnExist($table,$column) {
$result = self::execute(" SHOW COLUMNS FROM ".$table." LIKE '$column' ");
$c = $result->rowCount();
if ($c > 0 ) {
  return true;
}
else {
  return false;
}
}






}