<?php 

include_once __DIR__ . '/../lib/init.php';

//Create new HTTP Rest Client
$baseApiURL = 'https://ptsv2.com/t/oysterTest/';
$client = new HTTPRestClient($baseApiURL);

// You must add header before executing the request
$client->setHeader('HowToAddHeader', 'Like this!');
$request = $client->post('post');
$requestBody = $request->getResponseBody();

$parser = new PHPArray($requestBody);
$response = $parser->parse();

var_dump($response);
exit();
