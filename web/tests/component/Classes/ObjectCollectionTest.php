<?php

namespace app\Component\ImportComponent\Classes;

use PHPUnit\Framework\TestCase;

/**
 * Class ObjectCollectionTest
 */
class ObjectCollectionTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var ObjectCollection */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = [
            'type' => ImportRow::class,
            'obj' => new ImportRow('product','apteka',20),
        ];
        $this->instance = new ObjectCollection($this->_instance_config['type']);
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(ObjectCollection::class,$this->instance);
    }

    /**
     * @expectedException \Exception
     * @expectedExceptionMessage  Class not valid to app\Component\ImportComponent\Classes\ImportRow
     */
    public function testException()
    {
        $this->instance->add('wrong');
    }

    /**
     *
     */
    public function testCount()
    {
        $this->assertEquals(0,$this->instance->count());
    }

    /**
     *
     */
    public function testGetItems()
    {

        $this->assertEquals($this->instance->getItems(), [],
            'Failed to match ' . get_class($this->instance) . '::getItems result');
        $this->assertTrue($this->instance->add($this->_instance_config['obj']));
        $items = ($this->instance)->getItems();
        $this->assertEquals(reset($items), $this->_instance_config['obj'],'Failed to match ' . get_class($this->instance) . '::getItems result');
        $this->assertEquals(1, $this->instance->count());
    }

    /**
     *
     */
    public function testToArray()
    {
        $this->instance->add($this->_instance_config['obj']);
        $this->assertEquals([($this->_instance_config['obj'])->toArray()
        ], $this->instance->toArray());
    }
}
