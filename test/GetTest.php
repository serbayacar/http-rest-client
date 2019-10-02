<?php
declare(strict_types=1);

include __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use \HTTPRest\Client\Client;
use \HTTPRest\Parser;



final class GetTest extends TestCase
{
    public $baseApiURL = 'https://oystertest.free.beeceptor.com/';

    public function testClientSendGETRequest(): void
    {
        $client = new Client($this->baseApiURL);
        $client->get('test/get');

        $headers = $client->getResponseCode();
        $body = $client->getResponseBody();

        $this->assertNotEmpty($body);
    }

    public function testClientSendGETRequestHeader(): void
    {
        $client = new Client($this->baseApiURL);
        $client->get('test/get');
        
        $headers = $client->getResponseHeaders();

        $this->assertNotEmpty($headers);
    }

    public function testClientSendGETRequestCode(): void
    {
        $client = new Client($this->baseApiURL);
        $client->get('test/get');
        
        $code = $client->getResponseCode();

        $this->assertNotEmpty($code);
    }

    public function testClientSendGETRequestParseableJSON(): void
    {
        $client = new Client($this->baseApiURL);
        $client->get('test/get');

        $body = $client->getResponseBody();

        $parser = new Parser\JSON($requestBody);
        $data = $parser->parse();

        $this->assertIsString($data);
        $this->assertNotEmpty($data);
    }

    public function testClientSendGETRequestParseableArray(): void
    {
        $client = new Client($this->baseApiURL);
        $client->get('test/get');

        $body = $client->getResponseBody();

        $parser = new Parser\PHPArray($requestBody);
        $data = $parser->parse();

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

}