<?php

/**
 * @author : MartnLei
 * @version 1.0
 * @package MarkdownerTest.php
 * @time: 2016/2/21 16:26
 * @des:{}
 */
class MarkdownerTest extends TestCase
{
    protected $markdown;
    public function setup(){
        $this->markdown = new \App\Services\Markdowner();
    }

    public function testSimpleParagraph(){
        $this->assertEquals("<p>test</p>\n",
            $this->markdown->toHTML('test'));
    }

    /**
     * @dataProvider conversionsProvider
     */
    public function testConversions($value, $expected){
        $this->assertEquals($expected, $this->markdown->toHTML($value));
    }

    public function conversionsProvider()
    {
        return [
            ["test", "<p>test</p>\n"],
            ["# title", "<h1>title</h1>\n"],
            ["Here's Johnny!", "<p>Here's Johnny!</p>\n"],
        ];
    }

}