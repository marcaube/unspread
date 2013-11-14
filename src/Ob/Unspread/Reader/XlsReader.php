<?php

namespace Ob\Unspread\Reader;

use Ob\Unspread\Reader\ReaderInterface;
use Ob\Unspread\Exception\OutOfBoundsException;

class XlsReader implements ReaderInterface
{
    private $reader;

    /**
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        $this->reader = \PHPExcel_IOFactory::load($filePath);
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return $this->getLine(1);
    }

    public function getContent()
    {

    }

    /**
     * @param int $lineNumber
     *
     * @return array
     */
    public function getRow($lineNumber)
    {
        // PHPExcel rows start at index 2
        $lineNumber += 1;

        $lastRow = $this->reader->getActiveSheet()->getHighestRow();

        if ($lineNumber > $lastRow) {
            throw new OutOfBoundsException(sprintf('There is no row with index %s.', $lineNumber - 1));
        }

        $headers = $this->getHeaders();
        $row = $this->getLine($lineNumber);

        $result = array_combine($headers, $row);

        return $result;
    }

    /**
     * @param int $lineNumber
     *
     * @return array
     */
    private function getLine($lineNumber)
    {
        $result = array();

        $row = $this->reader->getActiveSheet()->getRowIterator($lineNumber)->current();

        $cellIterator = $row->getCellIterator();
        $cellIterator->setIterateOnlyExistingCells(false);

        foreach ($cellIterator as $cell) {
            $result[] = $cell->getValue();
        }

        return $result;
    }

    /**
     * @param string $columnName
     * @param int $lineNumber
     *
     * @return mixed
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