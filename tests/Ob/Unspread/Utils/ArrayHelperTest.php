<?php

use Ob\Unspread\Utils\ArrayHelper;

class ArrayHelperTest extends \PHPUnit_Framework_TestCase
{
    private $helper;

    public function setUp()
    {
        $this->helper = new ArrayHelper();
    }

    public function testArray()
    {
        $this->assertFalse($this->helper->isAssoc(array(1, 2, 3, 4, 5)));
    }

    public function testAssocArray()
    {
        $array = array(
            array(1, 2, 3, 4, 5),
            array(1, 2, 3, 4, 5)
        );

        $this->assertFalse($this->helper->isAssoc($array));
    }
}
