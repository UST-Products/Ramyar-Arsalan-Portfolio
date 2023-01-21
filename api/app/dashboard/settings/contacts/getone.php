<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('getOneContacts') && hasRequest('contact_id')) {
filterRequest(['getOneContacts','contact_id']);
$contact_id = request('contact_id');
$findContactQuery = " SELECT * FROM contacts WHERE id='{$contact_id}' ; ";
$checkContactId = countQuery($findContactQuery);
if($checkContactId > 0) {
$getContactId = findQuery($findContactQuery);
$data = [
'status'=>true,
'code'=>200,
'data'=>$getContactId,
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
