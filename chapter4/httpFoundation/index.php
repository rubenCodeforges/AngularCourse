<?php
require 'vendor/autoload.php';

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

$request = Request::createFromGlobals();

if($request->getMethod()=='GET'){
  $data = array();
  for($i=0 ; $i<20; $i++) {
    $data []=array ( 'id'=> $i+1, 'name'=> 'Vasya', 'email'=> 'vetrov_'.($i+1).'@vasya.com');
  }

  $response = new JsonResponse();
  $response->headers->set('Access-Control-Allow-Origin', '*');
  $response->setData($data);
  $response->prepare($request);
  $response->send();
} else if $request->getMethod() == 'POST'{
  var_dump($request->getContent())
  // $response = new JsonResponse(array('error' => 'wrong request' ));
  // $response->headers->set('Access-Control-Allow-Origin', '*');
  // $response->prepare($request);
  $response->send();
}
