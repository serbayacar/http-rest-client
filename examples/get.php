<?php

/* 

The Deck of Cards API is a simple service that allows developers to simulate a deck of cards.
Methods are available that allow users to shuffle the cards, draw a card, reshuffle the cards, get a brand new deck, or use a partial deck.

These API works with only HTTP GET Request.

Website :: https://deckofcardsapi.com/
*/

include_once './lib/init.php';

$baseApiURL = 'https://deckofcardsapi.com/api/';

//Create new HTTP Rest Client
$client = new HTTPRestClient($baseApiURL);

// Cards Of Deck API's end point of creating new shuffled deck ( 1 Deck )
$request = $client->get('deck/new/shuffle/', ['deck_count' => 1]);
$deck = $request->getResponseBodyAsArray();

//Check :: Is the deck created?
if($deck['success'] == true){

    // Withdraw a new card from the deck ( 1 Card )
    $requestForLuckyCard = $client->get('deck/'. $deck['deck_id'] .'/draw/' , ['count' => 1]);
    $luckyCard =  $requestForLuckyCard->getResponseBodyAsArray();
}


//Check :: Is the card withdrawn?
if( $luckyCard['success'] == true && isset($luckyCard['cards'])){
    echo '*****************************'. PHP_EOL;
    echo 'Deck ID :' . $deck['deck_id'] .PHP_EOL;
    echo 'Your Lucky Card :' . $luckyCard['cards'][0]['value'] . '(' . $luckyCard['cards'][0]['suits'] . ')' . PHP_EOL;
    echo 'Lucky Card Image :' . $luckyCard['cards'][0]['image'] . PHP_EOL;
    echo '*****************************' . PHP_EOL;
}else {
    echo '*****************************' . PHP_EOL;
    echo 'Deck of Cards APIs endpoints not avaliable now, please try again!' . PHP_EOL;
    echo '*****************************' . PHP_EOL;
}
