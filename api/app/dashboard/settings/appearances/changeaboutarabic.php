<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeAboutArabic') && hasRequest('arabicabout')) {
filterRequest(['changeAboutArabic','arabicabout']);
$arabicabout = request('arabicabout');
execute(" UPDATE setting SET ar_about='{$arabicabout}' ");
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
