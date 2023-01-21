<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('getAllContacts')) {
filterRequest(['getAllContacts']);
$getAllContactsQuery = " SELECT * FROM contacts ORDER BY id DESC ; ";
$getAllContacts = getQuery($getAllContactsQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getAllContacts,
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
