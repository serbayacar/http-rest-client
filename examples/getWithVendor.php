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
$baseApiURL = 'https://deckofcardsapi.com/api/';
$client = new Client($baseApiURL);

// Cards Of Deck API's end point of creating new shuffled deck ( 1 Deck )
// Full URL :: https://deckofcardsapi.com/api/deck/new/shuffle/?deck_count=1
$request = $client->get('deck/new/shuffle/', ['deck_count' => 1]);
$requestBody = $request->getResponseBody();

$parser = new Parser\PHPArray($requestBody);
$deck = $parser->parse();

// //Get response as PHP Array
// $deck = $request->getResponseBodyAsArray();

//Check :: Is the deck created?
if($deck['success'] == true){

    // Withdraw a new card from the deck ( 1 Card )
    $requestForLuckyCard = $client->get('deck/'. $deck['deck_id'] .'/draw/' , ['count' => 1]);
    $parser = new Parser\PHPArray( $requestForLuckyCard->getResponseBody() );
    $luckyCard = $parser->parse();
}

//Check :: Is the card withdrawn?
if( $luckyCard['success'] == true && isset($luckyCard['cards'])){
    echo '*****************************'. PHP_EOL;
    echo 'Deck ID :' . $deck['deck_id'] .PHP_EOL;
    echo 'Your Lucky Card :' . $luckyCard['cards'][0]['value'] . '(' . $luckyCard['cards'][0]['suit'] . ')' . PHP_EOL;
    echo 'Lucky Card Image :' . $luckyCard['cards'][0]['image'] . PHP_EOL;
    echo '*****************************' . PHP_EOL;
}else {
    echo '*****************************' . PHP_EOL;
    echo 'Deck of Cards APIs endpoints not avaliable now, please try again!' . PHP_EOL;
    echo '*****************************' . PHP_EOL;
}