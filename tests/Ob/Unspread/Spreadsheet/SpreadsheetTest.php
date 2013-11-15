<?php

use Ob\Unspread\Spreadsheet\Spreadsheet;

class SpreadsheetTest extends \PHPUnit_Framework_TestCase
{
    /** @var Spreadsheet */
    private $spreadsheet;

    public function setUp()
    {
        $this->spreadsheet = new Spreadsheet();
    }

    public function testCreateFromArray()
    {
        $array = array(
            array(
                'column 1' => 'A1',
                'column 2' => 'B1',
                'column 3' => 'C1',
            ),
            array(
                'column 1' => 'A2',
                'column 2' => 'B2',
                'column 3' => 'C2',
            )
        );

        $columns = array('column 1', 'column 2', 'column 3');

        $this->spreadsheet->fromArray($array);

        $this->assertEquals($array, $this->spreadsheet->toArray());
        $this->assertEquals($columns, $this->spreadsheet->getColumns());
    }

    public function testCreateFromArrayWithoutColumns()
    {
        $array = array(
            array('A1', 'B1', 'C1'),
            array('A2', 'B2', 'C2')
        );

        $expectedResult = array(
            array(
                'A' => 'A1',
                'B' => 'B1',
                'C' => 'C1'
            ),
            array(
                'A' => 'A2',
                'B' => 'B2',
                'C' => 'C2'
            )
        );

        $columns = array('A', 'B', 'C');

        $this->spreadsheet->fromArray($array);

        $this->assertEquals($expectedResult, $this->spreadsheet->toArray());
        $this->assertEquals($columns, $this->spreadsheet->getColumns());
    }

    public function testInsertColumn()
    {
        $array = array(
            array(
                'column 1' => 'A1',
                'column 2' => 'B1',
                'column 3' => 'C1',
            ),
            array(
                'column 1' => 'A2',
                'column 2' => 'B2',
                'column 3' => 'C2',
            )
        );

        $expectedColumns = array('column 1', 'column 2', 'column 2.1', 'column 3');

        $expectedArray = array(
            array(
                'column 1' => 'A1',
                'column 2' => 'B1',
                'column 2.1' => '',
                'column 3' => 'C1',
            ),
            array(
                'column 1' => 'A2',
                'column 2' => 'B2',
                'column 2.1' => '',
                'column 3' => 'C2',
            )
        );

        $this->spreadsheet->fromArray($array);
        $this->spreadsheet->insertColumn('column 2.1', 2);

        $this->assertEquals($expectedColumns, $this->spreadsheet->getColumns());
//        $this->assertEquals($expectedArray, $this->spreadsheet->toArray());
    }
}