<?php

namespace Ob\Unspread\Reader;

use Ob\Unspread\Reader\ReaderInterface;
use Ob\Unspread\Exception\OutOfBoundsException;
use EasyCSV\Reader;

class CsvReader implements ReaderInterface
{
    private $reader;
    private $data;

    public function __construct($filePath)
    {
        $this->reader = new Reader($filePath);

        // "Cache" content to avoid weird iterator behavior in EasyCSV
        $this->data = $this->reader->getAll();
    }

    public function getHeaders()
    {
        return $this->reader->getHeaders();
    }

    public function getContent()
    {
        return $this->data;
    }

    public function getRow($lineNumber)
    {
        // EasyCSV rows start at index 0
        $lineNumber -= 1;

        if (!array_key_exists($lineNumber, $this->data)) {
            throw new OutOfBoundsException(sprintf('There is no row with index %s.', $lineNumber));
        }

        return $this->data[$lineNumber];
    }

    public function getCell($columnName, $lineNumber)
    {
        if (!array_search($columnName, $this->getHeaders())) {
            throw new OutOfBoundsException(sprintf('There is no column %s.', $columnName));
        }

        $row = $this->getRow($lineNumber);

        return $row[$columnName];
    }
}