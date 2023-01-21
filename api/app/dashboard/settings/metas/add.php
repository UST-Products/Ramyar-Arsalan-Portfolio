<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('addMetas') && hasRequest('user') && hasRequest('ku_keywords') && hasRequest('ar_keywords') 
&& hasRequest('en_keywords') && hasRequest('ku_content') && hasRequest('ar_content') && hasRequest('en_content')) {
filterRequest(['addMetas','user','ku_keywords','ar_keywords','en_keywords','ku_content','ar_content','en_content']);
$user = request('user');
$findUserQuery = " SELECT * FROM users WHERE id='{$user}' ; ";
$checkUserId = countQuery($findUserQuery);
if($checkUserId > 0) {
$ku_keywords = request('ku_keywords');
$ar_keywords = request('ar_keywords');
$en_keywords = request('en_keywords');
$ku_content = request('ku_content');
$ar_content = request('ar_content');
$en_content = request('en_content');
execute(" INSERT INTO metas(user,ku_keywords,ar_keywords,en_keywords,ku_content,ar_content,en_content) 
VALUES('{$user}','{$ku_keywords}','{$ar_keywords}','{$en_keywords}','{$ku_content}','{$ar_content}','{$en_content}'); ");
$getAllMetasQuery = " SELECT * FROM metas ORDER BY id DESC ; ";
$getAllMetas = getQuery($getAllMetasQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'ADDED_SUCCESSFULLY',
'data'=>$getAllMetas
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
