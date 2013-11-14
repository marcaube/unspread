<?php

abstract class AbstractTest extends \PHPUnit_Framework_TestCase
{
    protected $reader;

    public function testGetHeaders()
    {
        $result = array('column1', 'column2', 'column3');

        $this->assertEquals($result, $this->reader->getHeaders());
    }

    public function testGetRow()
    {
        $row1 = array(
            'column1' => 'col1cell1',
            'column2' => 'col2cell1',
            'column3' => 'col3cell1'
        );

        $row2 = array(
            'column1' => 'col1cell2',
            'column2' => 'col2cell2',
            'column3' => 'col3cell2'
        );

        $this->assertEquals($row1, $this->reader->getRow(1));
        $this->assertEquals($row2, $this->reader->getRow(2));
    }

    public function testInvalidRow()
    {
        $this->setExpectedException('Ob\Unspread\Exception\OutOfBoundsException');

        $this->reader->getRow(9000);
    }

    public function testGetCell()
    {
        $this->assertEquals('col2cell1', $this->reader->getCell('column2', 1));
        $this->assertEquals('col3cell3', $this->reader->getCell('column3', 3));
    }
}