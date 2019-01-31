<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;
use PHPUnit\Framework\TestCase;

/**
 * Class FileAdapterTest
 */
class FileAdapterTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var FileAdapter */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = [
            'file_name' => YII_APP_BASE_PATH.'/Component/ImportComponent/dist2.xt',
            'row' => new ImportRow('Двеннадцатый Препарат', 'Д-Ковальчук дом 270', 53),
        ];
        $this->instance = new FileAdapter($this->_instance_config['file_name']);
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(FileAdapter::class, $this->instance);
    }

    /**
     *
     */
    public function testGetRow()
    {
        $this->assertInstanceOf(
            ImportRow::class,
            $this->instance->getRow(),
            'Failed to match ' . get_class($this->instance) . '::getRow result'
        );
        $this->assertEquals(
            $this->instance->getRow(),
            $this->_instance_config['row'],
            'Failed to match ' . get_class($this->instance) . '::getRow result'
        );
    }

    /**
     *
     */
    public function testGetData()
    {
        $obj_collection = $this->instance->getData();
        $this->assertInstanceOf(ObjectCollection::class, $obj_collection);
        $this->assertEquals(1001, $obj_collection->count());
    }
}
