<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('getAllSocials')) {
filterRequest(['getAllSocials']);
$getAllSocialsQuery = " SELECT * FROM socials ORDER BY id DESC ; ";
$getAllSocials = getQuery($getAllSocialsQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getAllSocials,
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
