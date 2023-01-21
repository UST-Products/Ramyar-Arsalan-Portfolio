<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeAboutKurdish') && hasRequest('kurdishabout')) {
filterRequest(['changeAboutKurdish','kurdishabout']);
$kurdishabout = request('kurdishabout');
execute(" UPDATE setting SET ku_about='{$kurdishabout}' ");
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
