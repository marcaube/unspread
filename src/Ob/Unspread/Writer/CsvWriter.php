<?php

namespace Ob\Unspread\Writer;

use Ob\Unspread\Writer\WriterInterface;
use EasyCSV\Writer;

class CsvWriter implements WriterInterface
{
    private $writer;

    /**
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        $this->writer = new Writer($filePath);
    }

    /**
     * @param array $row
     * @param null  $lineNumber
     */
    public function writeRow($row, $lineNumber = null)
    {
        $this->writer->writeRow($row);
    }

    /**
     * @param int    $cell
     * @param string $column
     * @param int    $lineNumber
     */
    public function writeCell($cell, $column, $lineNumber)
    {

    }
}
