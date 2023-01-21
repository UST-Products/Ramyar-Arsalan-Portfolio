<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('getOneUsers') && hasRequest('user_id')) {
filterRequest(['getOneUsers','user_id']);
$user_id = request('user_id');
$findUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$getUserId = findQuery($findUserQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getUserId,
'msg'=>null,
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
