<?php

use Ob\ExcelMerge\Reader\CsvReader;

class CsvReaderTest extends \PHPUnit_Framework_TestCase
{
    public function testHeaders()
    {
        $reader = new CsvReader(__DIR__ . '/../file1.csv');

        $this->assertEquals(array("column1", "column2", "column3"), $reader->getHeaders());
    }
}