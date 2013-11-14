<?php

namespace Ob\Unspread\Writer;

interface WriterInterface
{
    public function __construct($filePath);

    public function writeRow($row, $lineNumber = null);

    public function writeCell($cell, $column, $lineNumber);
}