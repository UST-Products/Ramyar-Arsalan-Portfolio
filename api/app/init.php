<?php 
include_once(__DIR__.'/../server/init.php');
if (hasRequestMustTrue('isLoadApp')) {
filterRequest(['isLoadApp']);
$fetchSetting = findQuery(" SELECT * FROM setting ");
$countUsers = countQuery(" SELECT * FROM users ");
$countContacts = countQuery(" SELECT * FROM contacts ");
$countMetas = countQuery(" SELECT * FROM metas ");
$countSocials = countQuery(" SELECT * FROM socials ");

$getUsers = getQuery(" SELECT * FROM users ");
$getContacts = getQuery(" SELECT * FROM contacts ");
$getMetas = getQuery(" SELECT * FROM metas ");
$getSocials = getQuery(" SELECT * FROM socials ");

$data = [
'status'=>true,
'code'=>200,
'fetchsetting'=>$fetchSetting,
'countusers'=>$countUsers,
'countcontacts'=>$countContacts,
'countmetas'=>$countMetas,
'countsocials'=>$countSocials,
'getusers'=>$getUsers,
'getcontacts'=>$getContacts,
'getmetas'=>$getMetas,
'getsocials'=>$getSocials
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