<?php

/* 

The Deck of Cards API is a simple service that allows developers to simulate a deck of cards.
Methods are available that allow users to shuffle the cards, draw a card, reshuffle the cards, get a brand new deck, or use a partial deck.

These API works with only HTTP GET Request.

Website :: https://deckofcardsapi.com/
*/

include __DIR__ .'/../vendor/autoload.php';

use \HTTPRest\Client\Client;
use \HTTPRest\Parser;

//Create new HTTP Rest Client
$baseApiURL = 'https://oystertest.free.beeceptor.com';
$client = new Client($baseApiURL);

// Full URL :: https://oystertest.free.beeceptor.com/test/delete
$request = $client->delete('/test/delete');
$requestBody = $request->getResponseBody();

$parser = new Parser\JSON($requestBody);
$data = $parser->parse();

var_dump($data);