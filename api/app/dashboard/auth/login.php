<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('isLogin') && hasRequest('user') && hasRequest('pass') ) {
filterRequest(['isLogin','pass','user']);
$user = request('user');
$pass = request('pass');
$hashpassedPass = md5(request('pass'));
$sql = " SELECT * FROM users WHERE (name='{$user}' OR email='{$user}') AND pass='{$hashpassedPass}' ; ";
$countUserquery = countQuery($sql);
if ($countUserquery > 0 ) {
$getdata = findQuery($sql);
$user_id = $getdata['id'];
$token = authToken('users',$user_id);
$device = authDevice();
$checkOldToken = countQuery(" SELECT * FROM users_tokens WHERE user_id='{$user_id}' AND device='{$device}' ");
if($checkOldToken > 0 ) {
execute("UPDATE users_tokens SET token='{$token}' WHERE user_id='{$user_id}' AND device='{$device}' ");
}
else {
execute("INSERT INTO users_tokens(token,device,user_id) VALUES('{$token}','{$device}','{$user_id}') ; ");
}
$data = [
'status'=>true,
'code'=>200,
'auth'=>$countUserquery,
'token'=>$token,
'user_id'=>$user_id,
'device'=>$device,
'msg'=>'Authorized',
'data'=>$getdata
];
encode($data);
}
else {
$data = [
'status'=>false,
'auth'=>$countUserquery,
'code'=>400,
'msg'=>'INVALID_DATA',
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
