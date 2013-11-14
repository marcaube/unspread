<?php

use Ob\Unspread\Reader\CsvReader;

class CsvReaderTest extends AbstractTest
{
    protected $reader;

    public function setUp()
    {
        $this->reader = new CsvReader(__DIR__ . '/../read.csv');
    }
}