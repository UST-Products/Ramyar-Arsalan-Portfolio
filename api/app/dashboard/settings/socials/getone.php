<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('getOneSocials') && hasRequest('social_id')) {
filterRequest(['getOneSocials','social_id']);
$social_id = request('social_id');
$findSocialQuery = " SELECT * FROM socials WHERE id='{$social_id}' ; ";
$checkSocialId = countQuery($findSocialQuery);
if($checkSocialId > 0) {
$getSocialId = findQuery($findSocialQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getSocialId,
'msg'=>null,
];
encode($data);
}
else {
$data = [
'status'=>false,
'code'=>404,
'msg'=>'DATA_NOT_FOUND', 
];
encode($data);
}
}
else {
$data = [
'status'=>false,
'code'=>400,
'msg'=>'INVALID_REQUEST'
];
encode($data);
}
