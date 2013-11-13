<?php

use Ob\ExcelMerge\Mapper\ColumnMapper;

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
}