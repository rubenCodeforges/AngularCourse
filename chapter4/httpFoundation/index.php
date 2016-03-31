<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();
if($request->getMethod()=='GET'){
  $data = array();
  for($i=0 ; $i<5; $i++) {
    $randUser = substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
    $data [] = array (
      'email' => $randUser.'@codeforges.com',
      'userName' => $randUser,
      'hash' => md5($randUser)
    );
  }

  $response = new JsonResponse();
  $response->setData($data);
  $response->prepare($request);
  $response->send();
} else if ($request->getMethod() == 'POST'){
  $reqData = json_decode($request->getContent());
  $user = array (
    'email' => $reqData->firstName.'_'.$reqData->lastName.'@codeforges.com',
    'userName' => $reqData->userName,
    'hash' => md5($reqData->firstName.'_'.$reqData->lastName.'@codeforges.com')
  );
  $response = new JsonResponse(array('response' => $user ));
  $response->prepare($request);
  $response->send();
}else{
  $response = new JsonResponse(array('error' => 'wrong request' ));
  $response->prepare($request);
  $response->send();
}
