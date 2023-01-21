<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('addSocials') && hasRequest('user') && hasRequest('link') && hasRequest('icon')) {
filterRequest(['addSocials','user','link','icon']);
$user = request('user');
$findUserQuery = " SELECT * FROM users WHERE id='{$user}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$link = request('link');
$icon = request('icon');
execute(" INSERT INTO socials(user,link,icon) 
VALUES('{$user}','{$link}','{$icon}'); ");
$getAllSocialsQuery = " SELECT * FROM socials ORDER BY id DESC ; ";
$getAllSocials = getQuery($getAllSocialsQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'ADDED_SUCCESSFULLY',
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
