<?php

use Ob\Unspread\Mapper\ColumnMapper;

class ColumnMapperTest extends \PHPUnit_Framework_TestCase
{
    public function testMappingExists()
    {
        $mapping = array(
            'source1' => 'destination2',
            'source2' => 'destination1'
        );

        $mapper = new ColumnMapper($mapping);

        $this->assertEquals($mapping['source1'], $mapper->map('source1'));
        $this->assertEquals($mapping['source2'], $mapper->map('source2'));
    }

    public function testMappingDoesntExist()
    {
        $mapper = new ColumnMapper(array());

        $this->assertEquals('column', $mapper->map('column'));
    }

    public function testMapping()
    {
        $file1 = array(
            'col1' => 1,
            'col2' => 1,
            'col3' => 1
        );

        $file2 = array(
            'column1' => 1,
            'column2' => 1,
            'column3' => 1
        );

        $mapping = array(
            'column1' => 'col1',
            'column2' => 'col2',
            'column3' => 'col3'
        );

        $mapper = new ColumnMapper($mapping);

        $this->assertEquals($file1, $mapper->mapColumns($file2, $mapping));
    }

    public function testMappingMulti()
    {
        $file1 = array(
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

        $file2 = array(
            array(
                'column1' => 1,
                'column2' => 1,
                'column3' => 1
            ),
            array(
                'column1' => 2,
                'column2' => 2,
                'column3' => 2
            )
        );

        $mapping = array(
            'column1' => 'col1',
            'column2' => 'col2',
            'column3' => 'col3'
        );

        $mapper = new ColumnMapper($mapping);

        $this->assertEquals($file1, $mapper->mapColumns($file2, $mapping));
    }
}
