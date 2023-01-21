<?php 
include_once(__DIR__.'/../../../../server/init.php');
if (hasRequestMustTrue('deleteContacts') && hasRequest('contact_id')) {
filterRequest(['deleteContacts','contact_id']);
$contact_id = request('contact_id');
$findContactQuery = " SELECT * FROM contacts WHERE id='{$contact_id}' ; ";
$checkContactId = countQuery($findContactQuery);
if($checkContactId > 0) {
execute(" DELETE FROM contacts WHERE id='{$contact_id}' ");
$getAllContactsQuery = " SELECT * FROM contacts ORDER BY id DESC ; ";
$getAllContacts = getQuery($getAllContactsQuery);
$data = [
'status'=>true,
'code'=>200,
'msg'=>'DELETED_SUCCESSFULLY',
'data'=>$getAllContacts
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
