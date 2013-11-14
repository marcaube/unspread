<?php

namespace Ob\Unspread\Writer;

use Ob\Unspread\Writer\WriterInterface;
use EasyCSV\Writer;

class CsvWriter implements WriterInterface
{
    private $writer;

    public function __construct($filePath)
    {
        $this->writer = new Writer($filePath);
    }

    public function writeRow($row, $lineNumber = null)
    {
        $this->writer->writeRow($row);
    }

    public function writeCell($cell, $column, $lineNumber)
    {

    }
}