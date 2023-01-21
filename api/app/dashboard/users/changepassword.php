<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('changePassword') && hasRequest('user_id') && hasRequest('newpassword')) {
filterRequest(['changePassword','user_id','newpassword']);
$user_id = request('user_id');
$findUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$newpassword = md5(request('newpassword'));
execute(" UPDATE users SET pass='{$newpassword}' WHERE id='{$user_id}' ");
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
