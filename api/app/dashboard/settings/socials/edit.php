<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('editSocials') && hasRequest('social_id') && hasRequest('link') && hasRequest('icon')) {
filterRequest(['editSocials','social_id','link','icon']);
$social_id = request('social_id');
$findSocialQuery = " SELECT * FROM socials WHERE id='{$social_id}' ; ";
$checkSocialId = countQuery($findSocialQuery);
if($checkSocialId > 0) {
$link = request('link');
$icon = request('icon');
execute(" UPDATE socials SET link='{$link}',icon='{$icon}' WHERE id='{$social_id}' ");
$getAllSocialsQuery = " SELECT * FROM socials ORDER BY id DESC ; ";
$getAllSocials = getQuery($getAllSocialsQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'UPDATED_SUCCESSFULLY',
'data'=>$getAllSocials
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
