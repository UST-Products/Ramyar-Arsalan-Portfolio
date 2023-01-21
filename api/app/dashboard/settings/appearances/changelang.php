<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeLang') && hasRequest('lang')) {
filterRequest(['changeLang','lang']);
$lang = request('lang');
execute(" UPDATE setting SET lang='{$lang}' ");
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
