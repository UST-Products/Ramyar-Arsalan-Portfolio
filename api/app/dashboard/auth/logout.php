<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('isLogout') && hasRequest('user_id')) {
filterRequest(['isLogout','user_id']);
$user_id = request('user_id');
$checkUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ";
$checkUserIfExist = countQuery($checkUserQuery);
if($checkUserIfExist > 0) {
$getUser = findQuery($checkUserQuery);
$email = $getUser['email'];
$device = authDevice();
execute(" DELETE FROM users_forget WHERE email='{$email}' ");
execute(" DELETE FROM users_tokens WHERE user_id='{$user_id}' AND device='{$device}' ");
$data = [
'status'=>true,
'code'=>200,
'msg'=>'LOGOUT_SUCCESS'
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
