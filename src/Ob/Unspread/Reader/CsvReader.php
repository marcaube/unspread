<?php

namespace Ob\Unspread\Reader;

use Ob\Unspread\Reader\ReaderInterface;
use Ob\Unspread\Exception\OutOfBoundsException;
use EasyCSV\Reader;

class CsvReader implements ReaderInterface
{
    private $reader;
    private $data;

    /**
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        $this->reader = new Reader($filePath);

        // "Cache" content to avoid weird iterator behavior in EasyCSV
        $this->data = $this->reader->getAll();
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->reader->getHeaders();
    }

    /**
     * @return array
     */
    public function getContent()
    {
        return $this->data;
    }

    /**
     * @param int $lineNumber
     *
     * @return array
     */
    public function getRow($lineNumber)
    {
        // EasyCSV rows start at index 0
        $lineNumber -= 1;

        if (!array_key_exists($lineNumber, $this->data)) {
            throw new OutOfBoundsException(sprintf('There is no row with index %s.', $lineNumber));
        }

        return $this->data[$lineNumber];
    }

    /**
     * @param string $columnName
     * @param int    $lineNumber
     *
     * @return string
     */
    public function getCell($columnName, $lineNumber)
    {
        if (!array_search($columnName, $this->getHeaders())) {
            throw new OutOfBoundsException(sprintf('There is no column %s.', $columnName));
        }

        $row = $this->getRow($lineNumber);

        return $row[$columnName];
    }
}
