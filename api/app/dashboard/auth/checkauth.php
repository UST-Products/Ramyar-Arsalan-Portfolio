<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('isAuthCheck') && hasRequest('user_id') && hasRequest('token')) {
filterRequest(['isAuthCheck','user_id','token']);
$user_id = request('user_id');
$token = request('token');
$checkUserToken = " SELECT * FROM users_tokens WHERE token='$token' AND user_id='{$user_id}' ";
$checkUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ";
$checkTokenIfExist = countQuery($checkUserToken);
$checkUserIfExist = countQuery($checkUserQuery);
if($checkUserIfExist > 0 && $checkTokenIfExist > 0) {
$getUser = findQuery($checkUserQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'AUTHORIZED',
'data'=>$getUser
];
encode($data);
}
else {
$data = [
'status'=>false,
'code'=>401,
'msg'=>'NOT_AUTHORIZED'
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
