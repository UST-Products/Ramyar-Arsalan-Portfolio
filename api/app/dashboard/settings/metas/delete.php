<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('deleteMetas') && hasRequest('meta_id')) {
filterRequest(['deleteMetas','meta_id']);
$meta_id = request('meta_id');
$findMetaQuery = " SELECT * FROM metas WHERE id='{$meta_id}' ; ";
$checkMetaId = countQuery($findMetaQuery);
if($checkMetaId > 0) {
execute(" DELETE FROM metas WHERE id='{$meta_id}' ");
$getAllMetasQuery = " SELECT * FROM metas ORDER BY id DESC ; ";
$getAllMetas = getQuery($getAllMetasQuery);
$data = [
    'status'=>true,
'code'=>200,
    'msg'=>'DELETED_SUCCESSFULLY',
    'data'=>$getAllMetas
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
