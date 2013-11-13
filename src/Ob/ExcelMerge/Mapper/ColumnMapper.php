<?php

namespace Ob\ExcelMerge\Mapper;

use Ob\ExcelMerge\Mapper\MapperInterface;

class ColumnMapper implements MapperInterface
{
    private $columnMapping;

    /**
     * @param array $mapping
     */
    public function __construct($columnMapping)
    {
        $this->columnMapping = $columnMapping;
    }

    /**
     * @param string $columnName
     *
     * @return string
     */
    public function map($columnName)
    {
        if (array_key_exists($columnName, $this->columnMapping)) {
            return $this->columnMapping[$columnName];
        }

        // Assume the column name is the same when no mapping is defined
        return $columnName;
    }
}