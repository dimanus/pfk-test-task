<?php

namespace app\Component\ImportComponent;

use app\Component\ImportComponent\Adapter\FileAdapter;
use app\Component\ImportComponent\Adapter\ImportAdapterInterface;
use app\Component\ImportComponent\Adapter\YiiCacheAdapter;
use app\Component\ImportComponent\Storage\StorageInterface;
use app\Component\ImportComponent\Storage\TestStorage;
use PHPUnit\Framework\TestCase;

/**
 * Class ConfigTest
 */
class ConfigTest extends TestCase
{
    /** @var array */
    protected $_instance_config;
    /** @var Config */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = [
            'cache-adapter' => new YiiCacheAdapter(),
            'import-adapter' => new FileAdapter(YII_APP_BASE_PATH . '/Component/ImportComponent/dist2.xt'),
            'id-distr' => 22,
            'storage-driver' => new TestStorage(22),
        ];
        $this->instance = new Config();
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(Config::class, $this->instance);
        $this->assertTrue($this->instance->getStorageDriver() instanceof StorageInterface);
        $this->assertInstanceOf(ImportAdapterInterface::class, $this->instance->getImportAdapter());
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage  app\Component\ImportComponent\Config::setCacheAdapter
     */
    public function testException()
    {
        $this->instance->setCacheAdapter('wrong');
    }

    /**
     *
     */
    public function testSetCacheAdapter()
    {
        $this->assertTrue(
            $this->instance->setCacheAdapter($this->_instance_config['cache-adapter']),
            'Failed to call ' . get_class($this->instance) . '::setCacheAdapter'
        );
        $this->assertEquals(
            $this->instance->getCacheAdapter(),
            $this->_instance_config['cache-adapter'],
            'Failed to match ' . get_class($this->instance) . '::setCacheAdapter result'
        );
    }


    /**
     *
     */
    public function testSetImportAdapter()
    {
        $this->assertTrue(
            $this->instance->setImportAdapter($this->_instance_config['import-adapter']),
            'Failed to call ' . get_class($this->instance) . '::setImportAdapter'
        );
        $this->assertEquals(
            $this->instance->getImportAdapter(),
            $this->_instance_config['import-adapter'],
            'Failed to match ' . get_class($this->instance) . '::setImportAdapter result'
        );
    }


    /**
     *
     */
    public function testSetIdDistr()
    {
        $this->assertTrue(
            $this->instance->setIdDistr($this->_instance_config['id-distr']),
            'Failed to call ' . get_class($this->instance) . '::setIdDistr'
        );
        $this->assertEquals(
            $this->instance->getIdDistr(),
            $this->_instance_config['id-distr'],
            'Failed to match ' . get_class($this->instance) . '::setIdDistr result'
        );
    }

    /**
     *
     */
    public function testSetStorageDriver()
    {
        $this->assertTrue(
            $this->instance->setStorageDriver($this->_instance_config['storage-driver']),
            'Failed to call ' . get_class($this->instance) . '::setStorageDriver'
        );
        $this->assertEquals(
            $this->instance->getStorageDriver(),
            $this->_instance_config['storage-driver'],
            'Failed to match ' . get_class($this->instance) . '::setStorageDriver result'
        );
    }

    /**
     * @expectedException Exception
     * @expectedExceptionMessage  app\Component\ImportComponent\Config::setImportAdapter
     */
    public function testException2()
    {
        $this->instance->setImportAdapter('wrong');
    }
    /**
     * @expectedException Exception
     * @expectedExceptionMessage  app\Component\ImportComponent\Config::setStorageDriver
     */
    public function testException3()
    {
        $this->instance->setStorageDriver('wrong');
    }
}
