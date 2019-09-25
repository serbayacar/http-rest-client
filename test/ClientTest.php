<?php
declare(strict_types=1);

include __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use \HTTPRest\Client\Client;
use \HTTPRest\Parser;



final class ClientTest extends TestCase
{
    public $baseApiURL = 'https://example.com';

    public function testClientIsCreatedSuccessfullyWithoutURL(): void
    {

        //Create new HTTP Rest Client
        $client = new Client();

        $this->assertInstanceOf(
            Client::class,
            $client
        );
    }    
    
    public function testClientIsCreatedSuccessfullyWithURL(): void
    {

        $client = new Client($this->baseApiURL);

        $this->assertInstanceOf(
            Client::class,
            $client
        );
    }


    public function testClientSetGetAgent(): void
    {

        $client = new Client($this->baseApiURL);
        $client->setAgent("Mozilla/5.0 (en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'");
        $agent = $client->getAgent();

        $this->assertEquals($agent, "Mozilla/5.0 (en-US; rv:1.9.2.13) Gecko/20101203 Firefox/3.6.13'");
    }

    public function testClientSetGetHeadersKey(): void
    {

        $client = new Client($this->baseApiURL);
        $client->setHeader("Header Name", 'Header Value');
        $headers = $client->getHeaders();

        $this->assertArrayHasKey("Header Name" ,$headers);
    }

    public function testClientSetGetHeadersValue(): void
    {

        $client = new Client($this->baseApiURL);
        $client->setHeader("Header Name", 'Header Value');
        $headers = $client->getHeaders();

        $this->assertContains("Header Value" ,$headers);
    }





}