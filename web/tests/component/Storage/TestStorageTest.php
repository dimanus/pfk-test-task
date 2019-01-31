<?php

namespace app\Component\ImportComponent\Storage;

use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Classes\SellRow;
use app\Component\ImportComponent\Config;
use PHPUnit\Framework\TestCase;

/**
 * Class TestStorageTest
 */
class TestStorageTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var TestStorage */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = [
            'owner' => new Config(),
            '' => '',
        ];
        $this->instance = new TestStorage($this->_instance_config['owner']);
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(TestStorage::class, $this->instance);
    }

    /**
     * @expectedException TypeError
     * @expectedExceptionMessage  app\Component\ImportComponent\Storage\TestStorage::saveData
     */
    public function testException()
    {
        $this->instance->saveData('wrong');
    }

    /**
     *
     */
    public function testGetProductByName()
    {
        $this->assertTrue(
            is_int($this->instance->getProductByName('werwe')),
            'Failed to match ' . get_class($this->instance) . '::getProductByName result'
        );
    }

    /**
     *
     */
    public function testSaveData()
    {
        $obj = new ObjectCollection(SellRow::class);
        $obj->add(new SellRow(1, 1, 20));
        $this->assertEquals(1, $this->instance->saveData($obj));
    }

    /**
     *
     */
    public function testGetAptekaByName()
    {
        $this->assertTrue(
            is_int($this->instance->getAptekaByName('werqwe')),
            'Failed to match ' . get_class($this->instance) . '::getAptekaByName result'
        );
    }
}
