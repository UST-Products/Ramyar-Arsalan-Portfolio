<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('changePassword') && hasRequest('user_id') && hasRequest('oldpassword') && hasRequest('newpassword')) {
filterRequest(['changePassword','user_id','oldpassword','newpassword']);
$user_id = request('user_id');
$findUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$oldpassword = md5(request('oldpassword'));
$checkOldPasswordQuery = " SELECT * FROM users WHERE pass='{$oldpassword}' AND id='{$user_id}' ; ";
$checkOldPassword = countQuery($checkOldPasswordQuery);
if($checkOldPassword > 0) {
$newpassword = md5(request('newpassword'));
execute(" UPDATE users SET pass='{$newpassword}' WHERE id='{$user_id}' ");
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
'msg'=>'OLDPASSWORD_NOT_MATCH',
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
