<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeNameArabic') && hasRequest('arabicname')) {
filterRequest(['changeNameArabic','arabicname']);
$arabicname = request('arabicname');
execute(" UPDATE setting SET ar_name='{$arabicname}' ");
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
