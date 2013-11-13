<?php

namespace Ob\ExcelMerge\Reader;

interface ReaderInterface
{
    public function __construct($filePath);

    public function getHeaders();

    public function getContent();

    public function getRow($line);

    public function getCell($column, $line);
}