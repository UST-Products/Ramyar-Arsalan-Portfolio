<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('addUsers') && hasRequest('name') && hasRequest('email') 
&& hasRequest('pass') && hasRequest('role')) {
filterRequest(['addUsers','name','email','pass','role']);
$name = request('name');
$email = request('email');
$pass = md5(request('pass'));
$role = request('role');
$checkDuplicateData = countQuery(" SELECT * FROM users WHERE name='{$name}' OR email='{$email}' ; ");
if ($checkDuplicateData === 0 ) {
execute(" INSERT INTO users(name,email,pass,role) VALUES('{$name}','{$email}','{$pass}','{$role}'); ");
$getAllUsersQuery = " SELECT * FROM users ORDER BY id DESC ; ";
$getAllUsers = getQuery($getAllUsersQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'ADDED_SUCCESSFULLY',
'data'=>$getAllUsers
];
encode($data);
}
else {
$data = [
'status'=>false,
'code'=>409,
'msg'=>'ALREADY_ADDED',
];
encode($data); 
}
}
else {
$data = [
'status'=>false,
'code'=>400,
'msg'=>'INVALID_REQUEST'
];
encode($data);
}
