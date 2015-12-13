<?php

require "idCodeToDate.php";

class personalcodeTest extends PHPUnit_Framework_TestCase
{
    public function test() {
        $id = new personalcode("39504124355");
        $this->assertEquals("1995-04-12", $id->parseIdCode()['DateOfBirth']);
        $id = new personalcode("60501302345");
        $this->assertEquals("2005-01-30", $id->parseIdCode()['DateOfBirth']);
        $id = new personalcode("60002170528");
        $this->assertEquals("2000-02-17", $id->parseIdCode()['DateOfBirth']);
        $id = new personalcode("43012302587");
        $this->assertEquals("1930-12-30", $id->parseIdCode()['DateOfBirth']);
    }
}
