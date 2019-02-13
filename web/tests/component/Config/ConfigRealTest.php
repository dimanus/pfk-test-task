<?php

namespace app\Component\ImportComponent\Config;

use app\Component\ImportComponent\Adapter\TestAdapter;
use app\Component\ImportComponent\Adapter\TestCacheAdapter;
use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Classes\SellRow;
use app\Component\ImportComponent\Storage\TestStorage;
use PHPUnit\Framework\TestCase;

/**
 * Class ConfigRealTest
 */
class ConfigRealTest extends TestCase
{
    /** @var array */
    protected $config;
    /** @var ConfigReal */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        global $params;
        $this->config = [
            'id_distr' => 22,
            'data'     => ((new ObjectCollection(SellRow::class))->add(new SellRow(1, 2, 200))),
        ];
        $this->instance = new ConfigReal(
            $this->config['id_distr'],
            new TestStorage($this->config['id_distr']),
            new TestAdapter(),
            new TestCacheAdapter()
        );
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(ConfigReal::class, $this->instance);
    }

    /**
     *
     */
    public function testGetAptekaByName()
    {
        $this->assertTrue(
            $this->instance->getAptekaByName('test') > 0,
            'Failed to match ' . get_class($this->instance) . '::getAptekaByName result'
        );
    }

    /**
     *
     */
    public function testGetData()
    {
        $this->assertInstanceOf(
            ObjectCollection::class,
            $this->instance->getData(),
            'Failed to match ' . get_class($this->instance) . '::getData result'
        );
    }

    /**
     *
     */
    public function testSaveData()
    {
        $this->assertEquals(1, $this->instance->saveData($this->config['data']));
    }


    /**
     *
     */
    public function testGetProductByName()
    {
        $this->assertTrue(
            $this->instance->getProductByName('test2') > 0,
            'Failed to match ' . get_class($this->instance) . '::getProductByName result'
        );
    }
}
