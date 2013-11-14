<?php

use Ob\Unspread\Merger\CsvMerger;

class CsvMergerTest extends \PHPUnit_Framework_TestCase
{
    private $merger;

    public function setUp()
    {
        $this->merger = new CsvMerger();
    }

    public function testMergeWithMapping()
    {
        $file1 = array(
            'col1' => 1,
            'col2' => 1,
            'col3' => 1
        );

        $file2 = array(
            'column1' => 2,
            'column2' => 2,
            'column3' => 2
        );

        $mapping = array(
            'column1' => 'col1',
            'column2' => 'col2',
            'column3' => 'col3'
        );

        $expectedResult = array(
            array(
                'col1' => 1,
                'col2' => 1,
                'col3' => 1
            ),
            array(
                'col1' => 2,
                'col2' => 2,
                'col3' => 2
            )
        );

        $this->assertEquals($expectedResult, $this->merger->merge($file1, $file2, $mapping));
    }
}