<?php

namespace app\Component\ImportComponent\Classes;

use PHPUnit\Framework\TestCase;

/**
 * Class SellRowTest
 */
class SellRowTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var SellRow */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = [
            'id-apteka' => 12,
            'quantity' => 99,
            'id-product' => 8,
        ];
        $this->instance = new SellRow(
            $this->_instance_config['id-apteka'],
            $this->_instance_config['id-product'],
            $this->_instance_config['quantity']
        );
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(SellRow::class, $this->instance);
    }

    /**
     *
     */
    public function testToArray()
    {
        $this->assertEquals([
            'id_apteka' => $this->_instance_config['id-apteka'],
            'id_product' => $this->_instance_config['id-product'],
            'quantity' => $this->_instance_config['quantity']
        ], $this->instance->toArray());
    }

    /**
     *
     */
    public function testSetIdApteka()
    {
        $this->assertTrue(
            $this->instance->setIdApteka($this->_instance_config['id-apteka']),
            'Failed to call ' . get_class($this->instance) . '::setIdApteka'
        );
        $this->assertEquals(
            $this->instance->getIdApteka(),
            $this->_instance_config['id-apteka'],
            'Failed to match ' . get_class($this->instance) . '::setIdApteka result'
        );
    }

    /**
     *
     */
    public function testSetQuantity()
    {
        $this->assertTrue(
            $this->instance->setQuantity($this->_instance_config['quantity']),
            'Failed to call ' . get_class($this->instance) . '::setQuantity'
        );
        $this->assertEquals(
            $this->instance->getQuantity(),
            $this->_instance_config['quantity'],
            'Failed to match ' . get_class($this->instance) . '::setQuantity result'
        );
    }

    /**
     *
     */
    public function testSetIdProduct()
    {
        $this->assertTrue(
            $this->instance->setIdProduct($this->_instance_config['id-product']),
            'Failed to call ' . get_class($this->instance) . '::setIdProduct'
        );
        $this->assertEquals(
            $this->instance->getIdProduct(),
            $this->_instance_config['id-product'],
            'Failed to match ' . get_class($this->instance) . '::setIdProduct result'
        );
    }

    /**
     *
     */
    public function testGetQuantity()
    {
        $this->assertEquals(
            $this->instance->getQuantity(),
            $this->_instance_config['quantity'],
            'Failed to match ' . get_class($this->instance) . '::getQuantity result'
        );
    }

    /**
     *
     */
    public function testGetIdApteka()
    {
        $this->assertEquals(
            $this->instance->getIdApteka(),
            $this->_instance_config['id-apteka'],
            'Failed to match ' . get_class($this->instance) . '::getIdApteka result'
        );
    }

    /**
     *
     */
    public function testGetIdProduct()
    {
        $this->assertEquals(
            $this->instance->getIdProduct(),
            $this->_instance_config['id-product'],
            'Failed to match ' . get_class($this->instance) . '::getIdProduct result'
        );
    }
}
