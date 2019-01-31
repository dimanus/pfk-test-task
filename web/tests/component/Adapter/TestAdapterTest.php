<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class TestAdapterTest
 */
class TestAdapterTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var TestAdapter */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = [
            'data' => [
                'Двеннадцатый Препарат	Д-Ковальчук дом 270	53',
                'Первый препарат	Никитина дом 73	10',
                'Пятый Препарат	Маркса дом 15 стр 1	54'
            ],
            'row' => new ImportRow('Двеннадцатый Препарат', 'Д-Ковальчук дом 270', 53),
        ];
        $this->instance = new TestAdapter();
    }

    /**
     *
     */
    public function testInit()
    {
        $this->instance = new TestAdapter();
        $this->assertInstanceOf(
            ObjectCollection::class,
            $this->instance->getData(),
            'Failed to match ' . get_class($this->instance) . '::getData result'
        );
    }

    /**
     *
     */
    public function testGetData()
    {
        $obj_collection = $this->instance->getData();
        $this->assertInstanceOf(ObjectCollection::class, $obj_collection);
        $this->assertEquals(
            3,
            $obj_collection->count(),
            'Failed to match ' . get_class($this->instance) . '::getData result'
        );
    }

    /**
     *
     */
    public function testGetRow()
    {
        $this->assertEquals(
            $this->instance->getRow(),
            $this->_instance_config['row'],
            'Failed to match ' . get_class($this->instance) . '::getRow result'
        );
        $this->assertInstanceOf(ImportRow::class, $this->instance->getRow(),'Failed to match ' . get_class($this->instance) . '::getRow result');
    }
}
