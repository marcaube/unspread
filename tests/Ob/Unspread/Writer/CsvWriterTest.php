<?php

use Ob\Unspread\Writer\CsvWriter;

class CsvWriterTest extends \PHPUnit_Framework_TestCase
{
    protected $writer;

    public function setUp()
    {
        $this->writer = new CsvWriter(__DIR__ . '/../write.csv');
    }

    public function testWriteRow()
    {
        $row = array('column 1', 'column 2', 'column 3');

        $this->writer->writeRow($row);
    }
}
