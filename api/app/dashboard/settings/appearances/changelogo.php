<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('changeLogo','post') && hasRequest('logo','files') ) {
$findSettingData = findQuery(" SELECT * FROM setting ");
$oldlogo = $findSettingData['logo'];
unlinkFile('../../../server/uploads/setting/'.$oldlogo);
$logo = upload('logo','../../../../server/uploads/setting/');
execute(" UPDATE setting SET logo='{$logo}' ");
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

