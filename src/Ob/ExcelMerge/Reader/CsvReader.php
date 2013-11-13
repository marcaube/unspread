<?php

namespace Ob\ExcelMerge\Reader;

use Ob\ExcelMerge\Reader\ReaderInterface;
use EasyCSV\Reader;

class CsvReader implements ReaderInterface
{
    private $reader;

    public function __construct($path)
    {
        $this->reader = new Reader($path);
    }

    public function getHeaders()
    {
        return $this->reader->getHeaders();
    }

    public function getContent()
    {
        return $this->reader->getAll();
    }

    public function getRow($line)
    {
        $data = $this->reader->getAll();

        return $data[$line];
    }

    public function getCell($column, $line)
    {
        $columnNumber = array_search($column, $this->getHeaders());

        $row = $this->getRow($line);

        return $row[$columnNumber];
    }
}