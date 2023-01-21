<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('isForget') && hasRequest('email')) {
filterRequest(['isForget','email']);
$email= request('email');
$sql = " SELECT * FROM users WHERE email='{$email}' ; ";
$countEmailquery = countQuery($sql);
if ($countEmailquery > 0 ) {
$getUserData = findQuery($sql);
$device = authDevice();
$token = TOKEN_VALUE;
$code= MAILERCODE;
$user_id = $getUserData['id'];
execute(" DELETE FROM users_forget WHERE email='{$email}' ");
execute(" DELETE FROM users_tokens WHERE user_id='{$user_id}' AND device='{$device}' ");
execute(" INSERT INTO users_forget(email,code,token) VALUES('{$email}','{$code}','{$token}'); ");
$body = "
This is Your Code: $code ";
$sendmail = mailer("Forget Password",$body,'Kalian App',$email);
$data = [
'status'=>true,
'code'=>200,
'code'=>$code,
'mailer'=>$sendmail,
'token'=>$token,
'email'=>$email,
'msg'=>'CODE_SENT_TO_EMAIL',
];
encode($data);
} 
else {
$data = [
'status'=>false,
'email'=>$email,
'code'=>404,
'msg'=>'EMAIL_NOT_FOUND',
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
