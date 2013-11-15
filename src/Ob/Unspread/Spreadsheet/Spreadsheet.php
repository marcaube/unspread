<?php

namespace Ob\Unspread\Spreadsheet;

use Ob\Unspread\Exception\LengthException;
use Ob\Unspread\Utils\ArrayHelper;

class Spreadsheet
{
    const DEFAULT_VALUE = "";

    private $columns;
    private $rows;

    public function __construct()
    {
        $this->rows = array();
        $this->columns = array();
    }

    public function fromArray($array)
    {
        $this->rows = $array;

        $this->initColumns();
    }

    public function toArray()
    {
        return $this->rows;
    }

    /**
     * Initializes column names like your typical spreadsheet A-Z, then AA-ZZ, etc.
     */
    private function initColumns()
    {
        $helper = new ArrayHelper();

        $firstRow = $this->rows[0];

        // Check if first row has column names
        if ($helper->isAssoc($firstRow)) {
            $this->setColumns(array_keys($firstRow));

            return;
        }

        $columNumber = count($firstRow);
        $columnNames = range('A', 'Z');

        $this->setColumns(array_slice($columnNames, 0, $columNumber));

    }

    /**
     * @param array $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
        $this->updateRowColumns();
    }

    /**
     * Make sure all rows are using the same column names
     */
    private function updateRowColumns()
    {
        $helper = new ArrayHelper();

        foreach ($this->rows as &$row) {
            if (count($this->columns) != count($row)) {
                throw new LengthException('The cell count and column count doesn\'t match.');
            }

            if (array_keys($row) != $this->columns) {
                $row = $helper->renameKeys($row, $this->columns);
            }
        }
    }

    /**
     * @return array
     */
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Inserts a new column at the given postion with an optional default value for the cells
     *
     * @param string $columnName
     * @param int    $position
     * @param string $defaultValue
     */
    public function insertColumn($columnName, $position, $defaultValue = self::DEFAULT_VALUE)
    {
        array_splice($this->columns, $position, 0, $columnName);

        foreach ($this->rows as &$row) {
            array_splice($row, $position, 0, array($columnName => $defaultValue));
        }
    }

    /**
     * Appends a row to the spreadsheet
     *
     * @param $row
     */
    public function addRow($row)
    {

    }
}
