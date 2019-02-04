<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class YiiCacheAdapterTest
 */
class YiiCacheAdapterTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var YiiCacheAdapter */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $row = new ImportRow('test1', 'test2', 1);
        $obj = new ObjectCollection(ImportRow::class);
        $obj->add($row);
        $this->_instance_config = [
            'key' => 'kjfhqewjfqekw',
            'obj_collection' => $obj,
            'row' => $row,
        ];
        $this->instance = new YiiCacheAdapter();
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(YiiCacheAdapter::class, $this->instance, 'Filed to init');
        $this->assertTrue(
            $this->instance->setKey($this->_instance_config['key']),
            'Failed to call ' . get_class($this->instance) . '::setKey result'
        );
        $this->assertInstanceOf(
            ObjectCollection::class,
            $this->instance->get(),
            'Failed to match ' . get_class($this->instance) . '::get result'
        );
    }

    public function testSet()
    {
        $this->assertTrue(
            $this->instance->setKey($this->_instance_config['key']),
            'Failed to call ' . get_class($this->instance) . '::setKey result'
        );
        $this->assertTrue(
            $this->instance->set($this->_instance_config['obj_collection']),
            'Failed to call ' . get_class($this->instance) . '::set result'
        );
        $this->assertInstanceOf(
            ObjectCollection::class,
            $this->instance->get(),
            'Failed to match ' . get_class($this->instance) . '::set result'
        );
        $items = ($this->instance->get())->getItems();
        $this->assertEquals(
            reset($items),
            $this->_instance_config['row'],
            'Failed to match ' . get_class($this->instance) . '::get result'
        );
    }

    public function testClear()
    {
        $this->assertTrue(
            $this->instance->setKey($this->_instance_config['key']),
            'Failed to call ' . get_class($this->instance) . '::setKey result'
        );
        $this->assertTrue(
            $this->instance->set($this->_instance_config['obj_collection']),
            'Failed to call ' . get_class($this->instance) . '::set result'
        );
        $this->assertTrue($this->instance->clear($this->_instance_config['key']));
        $this->assertEquals(0, ($this->instance->get())->count());
    }

    /**
     * @expectedException TypeError
     * @expectedExceptionMessage  app\Component\ImportComponent\Adapter\YiiCacheAdapter::set
     */
    public function testException()
    {
        $this->instance->set('wrong');
    }
}
