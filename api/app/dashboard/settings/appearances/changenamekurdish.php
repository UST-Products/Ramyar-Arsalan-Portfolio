<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeNameKurdish') && hasRequest('kurdishname')) {
filterRequest(['changeNameKurdish','kurdishname']);
$kurdishname = request('kurdishname');
execute(" UPDATE setting SET ku_name='{$kurdishname}' ");
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
