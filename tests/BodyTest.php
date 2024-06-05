<?php

namespace Basemkhirat\Elasticsearch\Tests;

use Basemkhirat\Elasticsearch\Tests\Traits\ESQueryTrait;
use PHPUnit\Framework\TestCase;

class BodyTest extends TestCase
{

    use ESQueryTrait;


    /**
     * Test the body() method.
     * @return void
     */
    public function testBodyMethod()
    {

        $body = [
            "query" => [
                "bool" => [
                    "must" => [
                        ["match" => ["address" => "mill"]],
                    ]
                ]
            ]
        ];

        $this->assertEquals(
            $this->getExpected($body),
            $this->getActual($body)
        );


    }

    /**
     * Get The expected results.
     * @param $body array
     * @return array
     */
    protected function getExpected($body = [])
    {
        $query = $this->getQueryArray();

        $query["body"] = $body;
        $query["body"]["_source"] = [
            'include' => [],
            'exclude' => [],
        ];
//        
//        unset($query["body"]["_source"]);

        return $query;
    }


    /**
     * Get The actual results.
     * @param $body array
     * @return mixed
     */
    protected function getActual($body = [])
    {
        return $this->getQueryObject()->body($body)->query();
    }
}
