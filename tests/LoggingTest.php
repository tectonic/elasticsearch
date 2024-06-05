<?php
/**
 * Created by PhpStorm.
 * User: mike
 * Date: 07/05/18
 * Time: 19:58
 */

namespace Basemkhirat\Elasticsearch\Tests;


use Basemkhirat\Elasticsearch\Connection;
use Elasticsearch\ClientBuilder;

class LoggingTest extends \PHPUnit\Framework\TestCase
{

    public function testConfigureLogging()
    {
        $client = ClientBuilder::create();
        $newClientBuilder = Connection::configureLogging($client,[
            'logging'=>[
                'enabled'=>true,
                'level'=>'all',
                'location'=>'../src/storage/logs/elasticsearch.log'
            ]
        ]);

        $this->assertInstanceOf(ClientBuilder::class,$newClientBuilder);
    }
}