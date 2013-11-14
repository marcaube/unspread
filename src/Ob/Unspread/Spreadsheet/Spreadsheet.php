<?php

namespace Ob\Unspread\Spreadsheet;

class Spreadsheet
{
    private $columns;
    private $rows;

    public function __construct()
    {
        $this->rows = array();
    }

    public function fromArray($array)
    {
        $this->rows = $array;
    }

    public function toArray()
    {
        return $this->rows;
    }

    /**
     * @param array $columns
     */
    public function setColumns($columns)
    {
        $this->columns = $columns;
    }

    /**
     * Inserts a new column at the given postion with an optional default value for the cells
     *
     * @param string $columnName
     * @param int    $position
     */
    public function insertColumn($columnName, $position, $defaultValue = "")
    {
        $this->columns = array_splice($this->columns, $position, 0, $columnName);

        foreach($this->rows as $key => $value)
        {
            $this->rows[$key] = array_splice($value, $position, 0, $defaultValue);
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