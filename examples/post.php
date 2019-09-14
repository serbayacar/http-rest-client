<?php

include_once './lib/init.php';

$baseApiURL = 'https://ptsv2.com/t/oysterTest/';

//Create new HTTP Rest Client
$client = new HTTPRestClient($baseApiURL);

// You must add header before executing the request
$client->setHeader('HowToAddHeader', 'Like this!');
$request = $client->post('post');

$body = $request->getResponseBodyAsArray();

var_dump($body);
exit();