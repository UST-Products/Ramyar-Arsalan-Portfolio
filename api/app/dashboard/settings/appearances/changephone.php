<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changePhone') && hasRequest('phone')) {
filterRequest(['changePhone','phone']);
$phone = request('phone');
execute(" UPDATE setting SET phone='{$phone}' ");
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
