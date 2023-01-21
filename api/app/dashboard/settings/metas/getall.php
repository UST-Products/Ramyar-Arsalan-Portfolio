<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('getAllMetas')) {
filterRequest(['getAllMetas']);
$getAllMetasQuery = " SELECT * FROM metas ORDER BY id DESC ; ";
$getAllMetas = getQuery($getAllMetasQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getAllMetas,
'msg'=>null,
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
