<?php
include_once(__DIR__.'/../config/auth.php');
include_once(__DIR__.'/../config/file.php');
include_once(__DIR__.'/../config/mailer.php');
include_once(__DIR__.'/classes/Client.php');
include_once(__DIR__.'/classes/Builder.php');


function encode($data){
    echo json_encode($data,JSON_NUMERIC_CHECK);
    exit;
  }
function decode($data){
    echo json_decode($data);
    exit;
  }


function post($post) {
	return isset($_POST[$post]);
} 

function get($get) {
	return isset($_GET[$get]);
} 


function secure($data) 
{
return addslashes(str_replace("'", "''", htmlspecialchars(trim($data),ENT_QUOTES,'UTF-8'))); 
}




function hasRequest($data,$type='body') {
  global $body;
	if (strtolower($type)==='body') {
    return isset($body->$data) ? true : false;
  }
	elseif (strtolower($type)==='post') {
    return isset($_POST[$data]) ? true : false;
  }
  elseif (strtolower($type)==='get') {
    return isset($_GET[$data]) ? true: false;
  }
  elseif (strtolower($type)==='files') {
    return isset($_FILES[$data]) ? true: false;
  }
}


function hasRequestMustTrue($data,$type='body') {
  global $body;
	if (strtolower($type)==='body') {
    return isset($body->$data) ? $body->$data=='true' ? true : false : false;
  }
	elseif (strtolower($type)==='post') {
    return isset($_POST[$data]) ? $_POST[$data]=='true' ? true : false : false;
  }
  elseif (strtolower($type)==='get') {
    return isset($_GET[$data]) ? $_GET[$data]=='true' ? true : false : false;
  }
  elseif (strtolower($type)==='files') {
    return isset($_FILES[$data]) ? $_FILES[$data]=='true' ? true : false : false;
  }
}




function request($data,$type='body') {
  global $body;
  if (strtolower($type)==='body') {
    return isset($body->$data) ? secure($body->$data): null;
  }
  elseif (strtolower($type)==='post') {
    return isset($_POST[$data]) ? secure($_POST[$data]): null;
  }
  elseif (strtolower($type)==='get') {
    return isset($_GET[$data]) ? secure($_GET[$data]): null;
  }
  elseif (strtolower($type)==='files') {
    return isset($_FILES[$data]) ? $_FILES[$data]: null;
  }
}



function filterRequest($allowedParams=[],$type='body') {
if($type==='body'){
  global $body;
  $requestParams = $body;
}
elseif($type==='get'){
	$requestParams = $_GET;
}
elseif($type==='post'){
	$requestParams = $_POST;
}

if(is_null($requestParams)){
  $requestParams = [];
}

if($type==='body') {
	foreach ($requestParams as $p => $value) {
    if (!in_array($p,$allowedParams)) {
        $data = [
          'status'=>false,
          'code'=>400,
          'msg'=>'INVALID_REQUEST'
          ];
          encode($data);
	    }
	}
}
else {
	foreach ($requestParams as $p) {
    if (!in_array($p,$allowedParams)) {
        $data = [
          'status'=>false,
          'code'=>400,
          'msg'=>'INVALID_REQUEST'
          ];
          encode($data);
	    }
	}
}
}





function unlinkFile($fileAndPath) {
if (file_exists($fileAndPath)) {
  unlink($fileAndPath);
}
}

function execute($sql) {
	Builder::execute($sql);
}


function findQuery($sql) {
	return Builder::findQuery($sql);
}


function countQuery($sql) {
	return Builder::countQuery($sql);
}



function getQuery($sql) {
	return Builder::getQuery($sql);
}




function upload($name,$path){
    $fileName = $_FILES[$name]['name'];
    $fileSize = $_FILES[$name]['size'];
    $fileTmpName =$_FILES[$name]['tmp_name'];
    $fileType = $_FILES[$name]['type'];
    $fileExt = explode('.',$fileName);
    $fileRealExt = strtolower(end($fileExt));
    $allowed = FILE_EXTENSIONS;
if ($fileName=="")
{
  $data = [
    'status'=>false,
    'msg'=>'FILE_IS_EMPTY'
    ];
    encode($data);
}       
else {
    if (in_array($fileRealExt,$allowed)) {
        if ($fileSize < FILE_SIZE) {
          $fileNewName = uniqid('',true).'.'.$fileRealExt;
          $uploadPath = $path.$fileNewName;
          $didupload =  move_uploaded_file($fileTmpName,$uploadPath);
        if ($didupload) {
          return $fileNewName;
        }
        else {
          $data = [
            'status'=>false,
            'msg'=>'UPLOAD_FAILED'
            ];
            encode($data);
        }
}
else {

  $data = [
    'status'=>false,
    'msg'=>'FILE_IS_TO_BIG'
    ];
    encode($data);

}
}
else {
  $data = [
    'status'=>false,
    'msg'=>'FILE_TYPE_NOT_ALLOWED'
    ];
    encode($data);
}
}
}



function mailer($subject,$body,$from,$to)
{
  include_once(__DIR__.'/classes/MailerException.php');
  include_once(__DIR__.'/classes/PHPMailer.php');
  include_once(__DIR__.'/classes/SMTP.php');
       $mail = new PHPMailer();

        $mail->IsSMTP();
        $mail->SMTPAuth = MAILER_SMTPAUTH; 
        $mail->SMTPSecure = MAILER_SMTPSECURE; 
        $mail->Host = MAILER_HOST;
        $mail->Port = MAILER_PORT;  
        $mail->Username = MAILER_USERNAME;
        $mail->Password = MAILER_PASSWORD;   
        $mail->IsHTML(true);
        $mail->From=MAILER_FROM;
        $mail->FromName=$from;
        $mail->Sender=MAILER_SENDER;
        $mail->AddReplyTo(MAILER_REPLAY);
        $mail->Subject =$subject;
        $mail->Body = $body;
        $mail->AddAddress($to);
        $send = $mail->Send();
        return $send;


}




function authToken($auth,$user_id){
//Generate a random string.
$token = openssl_random_pseudo_bytes(32).'_'.$auth;
//Convert the binary data into hexadecimal representation.
$token = bin2hex($token).'_'.$user_id;
return $token;
}



function authDevice(){
  $httpuseragent = $_SERVER['HTTP_USER_AGENT'];
  $client = new Client;
  $get = $client->getAll($httpuseragent);
  $browser = $get['browser_title'];
  $os = $get['os_title'];
  $device = $get['device_type'];
  $ip = $_SERVER["REMOTE_ADDR"];
  return $ip.'|'.$device.'|'.$os.'|'.$browser;
}


