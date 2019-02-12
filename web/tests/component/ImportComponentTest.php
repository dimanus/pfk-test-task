<?php

namespace app\Component\ImportComponent;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Classes\SellRow;
use app\Component\ImportComponent\Config\ConfigFactory;
use PHPUnit\Framework\TestCase;

/**
 * Class ImportComponentTest
 */
class ImportComponentTest extends TestCase
{
    /** @var Config */
    protected $_instance_config;
    /** @var ImportComponent */
    protected $instance;

    /**
     *
     */
    public function setUp()
    {
        $this->_instance_config = (new ConfigFactory())->buildConfigTest();
        $this->instance = new ImportComponent($this->_instance_config);
    }

    /**
     *
     */
    public function testInit()
    {
        $this->assertInstanceOf(
            ImportComponent::class,
            $this->instance,
            'Component instance not ' . ImportComponent::class
        );
        $this->assertInstanceOf(
            ObjectCollection::class,
            $this->instance->getErrorObjects(),
            'Failed to match ' . \get_class($this->instance) . '::getErrorObjects result'
        );
        $this->assertInstanceOf(
            ObjectCollection::class,
            $this->instance->getImportObjects(),
            'Failed to match ' . \get_class($this->instance) . '::getImportObjects result'
        );
    }

    /**
     *
     */
    public function testGetConfig()
    {
        $this->assertEquals(
            $this->instance->getConfig(),
            $this->_instance_config,
            'Failed to match ' . \get_class($this->instance) . '::getConfig result'
        );
    }

    public function testSetImportObjects()
    {
        $obj = new ObjectCollection(SellRow::class);
        $this->assertTrue(
            $this->instance->setImportObjects($obj),
            'Failed to call ' . get_class($this->instance) . '::setImportObjects'
        );
        $this->assertEquals(
            $this->instance->getImportObjects(),
            $obj,
            'Failed to match ' . get_class($this->instance) . '::setImportObjects result'
        );
    }

    public function testSetErrorObjects()
    {
        $obj = new ObjectCollection(ImportRow::class);
        $this->assertTrue(
            $this->instance->setErrorObjects($obj),
            'Failed to call ' . get_class($this->instance) . '::setErrorObjects'
        );
        $this->assertEquals(
            $this->instance->getErrorObjects(),
            $obj,
            'Failed to match ' . get_class($this->instance) . '::setErrorObjects result'
        );
    }

    /**
     *
     */
    public function testProcess()
    {
        //test with dummy data
        $result = $this->instance->process();
        $this->assertArrayHasKey('count', $result);
        $this->assertEquals(3, $result['count']);
        $this->assertEquals(0, $this->instance->getErrorObjects()->count());
    }

    /**
     * @expectedException TypeError
     * @expectedExceptionMessage  app\Component\ImportComponent\ImportComponent::setImportObjects
     */
    public function testExceptionSetImportObjects()
    {
        $this->instance->setImportObjects('wrong');
    }

    /**
     * @expectedException TypeError
     * @expectedExceptionMessage  app\Component\ImportComponent\ImportComponent::setErrorObjects
     */
    public function testExceptionSetErrorObjects()
    {
        $this->instance->setErrorObjects('wrong');
    }
}
