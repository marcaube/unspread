<?php

namespace Ob\Unspread\Mapper;

use Ob\Unspread\Mapper\MapperInterface;
use Ob\Unspread\Utils\ArrayHelper;

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

    /**
     * @param array $file
     */
    public function mapColumns($file)
    {
        $helper = new ArrayHelper();

        if (!$helper->isMulti($file)) {
            return $this->mapArrayKeys($file);
        }

        foreach ($file as $k => $array) {
            $file[$k] = $this->mapArrayKeys($array);
        }

        return $file;
    }

    /**
     * @param array $array
     *
     * @return array
     */
    private function mapArrayKeys($array)
    {
        $keys = array_keys($array);

        array_walk($keys, array($this, 'mapArrayKeysCallback'));

        return array_combine($keys, array_values($array));
    }

    private function mapArrayKeysCallback(&$value)
    {
        $value = $this->map($value);
    }
}