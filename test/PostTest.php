<?php
declare(strict_types=1);

include __DIR__ .'/../vendor/autoload.php';

use PHPUnit\Framework\TestCase;
use \HTTPRest\Client\Client;
use \HTTPRest\Parser;



final class PostTest extends TestCase
{
    public $baseApiURL = 'https://oystertest.free.beeceptor.com/';

    public function testClientSendPOSTRequest(): void
    {
        $client = new Client($this->baseApiURL);
        $client->post('test/post');

        $headers = $client->getResponseCode();
        $body = $client->getResponseBody();

        $this->assertNotEmpty($body);
    }


    public function testClientSendPOSTRequestWithCustomHeaders(): void
    {
        $client = new Client($this->baseApiURL);
        $client->setHeader('Custom Header', 'Custom Value');
        $client->post('test/post');

        $headers = $client->getHeaders();

        $body = $client->getResponseBody();

        $this->assertArrayHasKey('Custom Header',$headers);
        $this->assertNotEmpty($body);
    }

    public function testClientSendPOSTRequestHeader(): void
    {
        $client = new Client($this->baseApiURL);
        $client->post('test/post');
        
        $headers = $client->getResponseHeaders();

        $this->assertNotEmpty($headers);
    }

    public function testClientSendPOSTRequestCode(): void
    {
        
        $client = new Client($this->baseApiURL);
        $client->post('test/post');
        
        $code = $client->getResponseCode();

        $this->assertNotEmpty($code);
    }

    public function testClientSendPOSTRequestParseableJSON(): void
    {
        $client = new Client($this->baseApiURL);
        $client->post('test/post');

        $body = $client->getResponseBody();

        $parser = new Parser\JSON($requestBody);
        $data = $parser->parse();

        $this->assertIsString($data);
        $this->assertNotEmpty($data);
    }

    public function testClientSendPOSTRequestParseableArray(): void
    {
        $client = new Client($this->baseApiURL);
        $client->post('test/post');

        $body = $client->getResponseBody();

        $parser = new Parser\PHPArray($requestBody);
        $data = $parser->parse();

        $this->assertIsArray($data);
        $this->assertNotEmpty($data);
    }

}