<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('editUsers') && hasRequest('user_id') && hasRequest('name') && hasRequest('email') && hasRequest('role')) {
filterRequest(['editUsers','user_id','name','email','role']);
$user_id = request('user_id');
$findUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$findUserId = findQuery($findUserQuery);
$oldname = $findUserId['name'];
$oldemail = $findUserId['email'];
$name = request('name');
$email = request('email');
$role = request('role');
$checkDuplicateData = countQuery(" SELECT * FROM users WHERE 
(name='{$name}' OR email='{$email}') AND (name!='{$oldname}' OR email!='{$oldemail}') ; ");
if ($checkDuplicateData === 0 ) {
execute(" UPDATE users SET name='{$name}',email='{$email}',role='{$role}' WHERE id='{$user_id}' ");
$getAllUsersQuery = " SELECT * FROM users ORDER BY id DESC ; ";
$getAllUsers = getQuery($getAllUsersQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'UPDATED_SUCCESSFULLY',
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
'code'=>404,
'msg'=>'DATA_NOT_FOUND',
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
