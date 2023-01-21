<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeFavicon','post') && hasRequest('favicon','files') ) {
$findSettingData = findQuery(" SELECT * FROM setting ");
$oldfavicon = $findSettingData['favicon'];
unlinkFile('../../../server/uploads/setting/'.$oldfavicon);
$favicon = upload('favicon','../../../../server/uploads/setting/');
execute(" UPDATE setting SET favicon='{$favicon}' ");
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

