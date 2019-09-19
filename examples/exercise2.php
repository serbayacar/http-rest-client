<?php 

include_once __DIR__ . '/../lib/init.php';

$baseApiURL = 'https://ptsv2.com/t/oysterTest/';

//Create new HTTP Rest Client
$client = new HTTPRestClient($baseApiURL);

// You must add header before executing the request
$client->setHeader('HowToAddHeader', 'Like this!');
$request = $client->post('post');

$parser = new PHPArray($request);
$response = $parser->parse();

var_dump($response);
exit();

$body = $request->getResponseBodyAsArray();

var_dump($body);
exit();