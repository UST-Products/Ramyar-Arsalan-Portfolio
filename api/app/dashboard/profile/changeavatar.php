<?php 
include_once(__DIR__.'/../../../server/init.php');
if (hasRequestMustTrue('changeAvatar','post') && hasRequest('user_id','post') && hasRequest('avatar','files') ) {
$user_id = request('user_id','post');
$findUserQuery = " SELECT * FROM users WHERE id='{$user_id}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$findUserData = findQuery($findUserQuery);
$oldavatar = $findUserData['avatar'];
unlinkFile('../../../server/uploads/users/'.$oldavatar);
$avatar = upload('avatar','../../../server/uploads/users/');
execute(" UPDATE users SET avatar='{$avatar}' WHERE id='{$user_id}' ");
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

