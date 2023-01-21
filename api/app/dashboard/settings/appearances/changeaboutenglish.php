<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeAboutEnglish') && hasRequest('englishabout')) {
filterRequest(['changeAboutEnglish','englishabout']);
$englishabout = request('englishabout');
execute(" UPDATE setting SET en_about='{$englishabout}' ");
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
