<?php

namespace app\Component\ImportComponent\Classes;

use PHPUnit\Framework\TestCase;

/**
 * Class ImportRowTest
 */
class ImportRowTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var ImportRow */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = [
            'product-name' => 'Product 1',
            'apteka-name' => 'Apteka1',
            'quantity'=>20
        ];
        $this->instance = new ImportRow($this->_instance_config['product-name'],$this->_instance_config['apteka-name'],$this->_instance_config['quantity']);
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(ImportRow::class,$this->instance);

    }


    /**
     *
     */
    public function testGetQuantity()
    {

        $this->assertEquals($this->instance->getQuantity(), $this->_instance_config['quantity'],
            'Failed to match ' . get_class($this->instance) . '::getQuantity result');
    }

    /**
     *
     */
    public function testSetQuantity()
    {
        $this->assertTrue($this->instance->setQuantity($this->_instance_config['quantity']),
            'Failed to call ' . get_class($this->instance) . '::setQuantity');
        $this->assertEquals($this->instance->getQuantity(), $this->_instance_config['quantity'],
            'Failed to match ' . get_class($this->instance) . '::setQuantity result');
    }

    /**
     *
     */
    public function testSetProductName()
    {
        $this->assertTrue($this->instance->setProductName($this->_instance_config['product-name']),
            'Failed to call ' . get_class($this->instance) . '::setProductName');
        $this->assertEquals($this->instance->getProductName(), $this->_instance_config['product-name'],
            'Failed to match ' . get_class($this->instance) . '::setProductName result');
    }

    /**
     *
     */
    public function testGetProductName()
    {
        $this->assertEquals($this->instance->getProductName(), $this->_instance_config['product-name'],
            'Failed to match ' . get_class($this->instance) . '::getProductName result');
    }

    /**
     *
     */
    public function testGetAptekaName()
    {
        $this->assertEquals($this->instance->getAptekaName(), $this->_instance_config['apteka-name'],
            'Failed to match ' . get_class($this->instance) . '::getAptekaName result');
    }

    /**
     *
     */
    public function testSetAptekaName()
    {
        $this->assertTrue($this->instance->setAptekaName($this->_instance_config['apteka-name']),
            'Failed to call ' . get_class($this->instance) . '::setAptekaName');
        $this->assertEquals($this->instance->getAptekaName(), $this->_instance_config['apteka-name'],
            'Failed to match ' . get_class($this->instance) . '::setAptekaName result');
    }
}
