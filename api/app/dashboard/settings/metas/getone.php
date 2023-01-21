<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('getOneMetas') && hasRequest('meta_id')) {
filterRequest(['getOneMetas','meta_id']);
$meta_id = request('meta_id');
$findMetaQuery = " SELECT * FROM metas WHERE id='{$meta_id}' ; ";
$checkMetaId = countQuery($findMetaQuery);
if($checkMetaId > 0) {
$getMetaId = findQuery($findMetaQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getMetaId,
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
