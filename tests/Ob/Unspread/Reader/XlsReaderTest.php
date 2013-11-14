<?php

use Ob\Unspread\Reader\XlsReader;

class XlsReaderTest extends AbstractTest
{
    protected $reader;

    public function setUp()
    {
        $this->reader = new XlsReader(__DIR__ . '/../file1.xls');
    }
}