<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('editMetas') && hasRequest('meta_id') && hasRequest('ku_keywords') && hasRequest('ar_keywords') 
&& hasRequest('en_keywords') && hasRequest('ku_content') && hasRequest('ar_content') && hasRequest('en_content')) {
filterRequest(['editMetas','meta_id','ku_keywords','ar_keywords','en_keywords','ku_content','ar_content','en_content']);
$meta_id = request('meta_id');
$findMetaQuery = " SELECT * FROM metas WHERE id='{$meta_id}' ; ";
$checkMetaId = countQuery($findMetaQuery);
if($checkMetaId > 0) {
$ku_keywords = request('ku_keywords');
$ar_keywords = request('ar_keywords');
$en_keywords = request('en_keywords');
$ku_content = request('ku_content');
$ar_content = request('ar_content');
$en_content = request('en_content');
execute(" UPDATE metas SET ku_keywords='{$ku_keywords}',ar_keywords='{$ar_keywords}',en_keywords='{$en_keywords}',
ku_content='{$ku_content}',ar_content='{$ar_content}',en_content='{$en_content}' WHERE id='{$meta_id}' ");
$getAllMetasQuery = " SELECT * FROM metas ORDER BY id DESC ; ";
$getAllMetas = getQuery($getAllMetasQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'UPDATED_SUCCESSFULLY',
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
