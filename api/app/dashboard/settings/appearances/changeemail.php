<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeEmail') && hasRequest('email')) {
filterRequest(['changeEmail','email']);
$email = request('email');
execute(" UPDATE setting SET email='{$email}' ");
$getLastData = findQuery(" SELECT * FROM setting ");
$data = [
'status'=>true,
'code'=>200,
'msg'=>'UPDATED_SUCCESSFULLY',
'data'=>$getLastData
];
encode($data);
}
else {
$data = [
'status'=>false,
'code'=>400,
'msg'=>'INVALID_REQUEST'
];
encode($data);
}
