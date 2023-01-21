<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('getAllUsers')) {
filterRequest(['getAllUsers']);
$getAllUsersQuery = " SELECT * FROM users ORDER BY id DESC ; ";
$getAllUsers = getQuery($getAllUsersQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getAllUsers,
'msg'=>null,
];
encode($data);
}
else {
$data = [
'status'=>false,
'code'=>400,
'msg'=>'INVALID_REQUEST'
];
encode($data);
}
