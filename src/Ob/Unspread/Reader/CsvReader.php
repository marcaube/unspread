<?php

namespace Ob\Unspread\Reader;

use Ob\Unspread\Exception\OutOfBoundsException;
use Ob\Unspread\Reader\ReaderInterface;
use EasyCSV\Reader;

class CsvReader implements ReaderInterface
{
    private $reader;
    private $data;

    public function __construct($path)
    {
        $this->reader = new Reader($path);

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

    public function getRow($line)
    {
        // EasyCSV is zero based
        $line -= 1;

        if (!array_key_exists($line, $this->data)) {
            throw new OutOfBoundsException(sprintf('There is no row with index %s.', $line));
        }

        return $this->data[$line];
    }

    public function getCell($column, $line)
    {
        if (!array_search($column, $this->getHeaders())) {
            throw new OutOfBoundsException(sprintf('There is no column %s.', $column));
        }

        $row = $this->getRow($line);

        return $row[$column];
    }
}