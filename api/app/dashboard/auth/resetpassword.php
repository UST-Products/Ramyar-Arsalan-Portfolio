<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('isReset') && hasRequest('code') && hasRequest('token') && hasRequest('newpass')) {
filterRequest(['isReset','code','token','newpass']);
$newpass = md5(request('newpass'));
$code = request('code');
$token = request('token');
$device = authDevice();
$checkData = countQuery(" SELECT * FROM users_forget WHERE code='{$code}' AND token='{$token}' ; ");
if ($checkData > 0 ) {
$getForgetData = findQuery(" SELECT * FROM users_forget WHERE code='{$code}' AND token='{$token}' ; ");
$email = $getForgetData['email'];
$getUserData = findQuery(" SELECT * FROM users WHERE email='{$email}' ");
$user_id = $getUserData['id'];
execute(" DELETE FROM users_forget WHERE token='{$token}' ");
execute(" DELETE FROM users_tokens WHERE user_id='{$user_id}' AND device='{$device}' ");
execute(" UPDATE users SET pass='{$newpass}' WHERE id='{$user_id}' ");
$data = [
'status'=>true,
'code'=>200,
'msg'=>'PASSWORD_UPDATED',
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
