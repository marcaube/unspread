<?php

namespace Ob\Unspread\Merger;

use Ob\Unspread\Merger\MergerInterface;
use Ob\Unspread\Reader\CsvReader;
use Ob\Unspread\Mapper\ColumnMapper;

class CsvMerger implements MergerInterface
{
    /**
     * @param array  $baseFile
     * @param array  $additionalFile
     * @param array  $columnMapping
     */
    public function merge($baseFile, $additionalFile, $columnMapping = array())
    {
        if (!empty($columnMapping)) {
            $mapper = new ColumnMapper($columnMapping);

            $additionalFile = $mapper->mapColumns($additionalFile);
        }

        return array($baseFile, $additionalFile);
    }
}