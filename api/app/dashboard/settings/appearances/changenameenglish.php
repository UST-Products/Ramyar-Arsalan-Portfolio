<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeNameEnglish') && hasRequest('englishname')) {
filterRequest(['changeNameEnglish','englishname']);
$englishname = request('englishname');
execute(" UPDATE setting SET en_name='{$englishname}' ");
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
