<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('changeName') && hasRequest('user_id') && hasRequest('newname')) {
filterRequest(['changeName','user_id','newname']);
$user_id = request('user_id');
$findUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$newname = request('newname');
$findUserId = findQuery($findUserQuery);
$oldname = $findUserId['name'];
$checkDuplicateData = countQuery(" SELECT * FROM users WHERE name='{$newname}' AND name!='{$oldname}' ; ");
if ($checkDuplicateData === 0) {
execute(" UPDATE users SET name='{$newname}' WHERE id='{$user_id}' ");
$findUserData = findQuery($findUserQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'UPDATED_SUCCESSFULLY',
'data'=>$findUserData
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
