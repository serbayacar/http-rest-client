<?php
declare(strict_types=1);

include __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use \HTTPRest\Client\Client;
use \HTTPRest\Parser;



final class GetTest extends TestCase
{
    public $baseApiURL = 'https://oystertest.free.beeceptor.com/';

    public function testClientSendPUTRequest(): void
    {
        $client = new Client($this->baseApiURL);
        $client->put('test/put');

        $headers = $client->getResponseCode();
        $body = $client->getResponseBody();

        $this->assertNotEmpty($body);
    }

    public function testClientSendPUTRequestHeader(): void
    {
        $client = new Client($this->baseApiURL);
        $client->put('test/put');
        
        $headers = $client->getResponseHeaders();

        $this->assertNotEmpty($headers);
    }

    public function testClientSendPUTRequestWithCustomHeaders(): void
    {
        $client = new Client($this->baseApiURL);
        $client->setHeader('Custom Header', 'Custom Value');
        $client->put('test/put');

        $headers = $client->getHeaders();

        $body = $client->getResponseBody();

        $this->assertArrayHasKey('Custom Header',$headers);
        $this->assertNotEmpty($body);
    }

    public function testClientSendPUTRequestCode(): void
    {
        $client = new Client($this->baseApiURL);
        $client->put('test/put');
        
        $code = $client->getResponseCode();

        $this->assertNotEmpty($code);
    }

    public function testClientSendPUTRequestParseableJSON(): void
    {
        $client = new Client($this->baseApiURL);
        $client->put('test/put');

        $body = $client->getResponseBody();

        $parser = new Parser\JSON($requestBody);
        $data = $parser->parse();

        $this->assertIsString($data);
        $this->assertNotEmpty($data);
    }

    public function testClientSendPUTRequestParseableArray(): void
    {
        $client = new Client($this->baseApiURL);
        $client->put('test/put');

        $body = $client->getResponseBody();

        $parser = new Parser\PHPArray($requestBody);
        $data = $parser->parse();

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

}