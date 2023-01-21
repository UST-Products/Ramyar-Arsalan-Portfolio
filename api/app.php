<?php 
include_once(__DIR__.'/server/init.php');
$data = [
'status'=>true,
'code'=>200,
'msg'=>'Welcome To App'
];
encode($data);