<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('deleteSocials') && hasRequest('social_id')) {
filterRequest(['deleteSocials','social_id']);
$social_id = request('social_id');
$findSocialQuery = " SELECT * FROM socials WHERE id='{$social_id}' ; ";
$checkSocialId = countQuery($findSocialQuery);
if($checkSocialId > 0) {
execute(" DELETE FROM socials WHERE id='{$social_id}' ");
$getAllSocialsQuery = " SELECT * FROM socials ORDER BY id DESC ; ";
$getAllSocials = getQuery($getAllSocialsQuery);
$data = [
    'status'=>true,
'code'=>200,
    'msg'=>'DELETED_SUCCESSFULLY',
    'data'=>$getAllSocials
];
encode($data);
}
else {
    $data = [
        'status'=>false,
        'msg'=>'DATA_NOT_FOUND',
    ];
    encode($data);
}
}
else {
    $data = [
        'status'=>false,
        'msg'=>'INVALID_REQUEST'
    ];
    encode($data);
}
