<?php

namespace app\Component\ImportComponent\Config;

use app\Component\ImportComponent\Adapter\CacheInterface;
use app\Component\ImportComponent\Adapter\ImportAdapterInterface;
use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Storage\StorageInterface;

/**
 * Class ConfigReal
 * @package app\Component\ImportComponent\Config
 */
class ConfigReal implements ConfigInterface
{
    /** @var int */
    private $id_distr;
    /** @var StorageInterface */
    private $_storage_driver;
    /** @var ImportAdapterInterface */
    private $_import_adapter;
    /** @var CacheInterface */
    private $_cache_adapter;

    /**
     * @return ObjectCollection
     */
    public function getData(): ObjectCollection
    {
        return $this->_import_adapter->getData();
    }

    /**
     * @param ObjectCollection $data
     * @return mixed|void
     */
    public function setCache(ObjectCollection $data)
    {
        $this->_cache_adapter->set($data);
    }

    /**
     * @param string $name
     * @return int
     */
    public function getAptekaByName(string $name): int
    {
        return $this->_storage_driver->getAptekaByName($name);
    }

    /**
     * @param string $name
     * @return int
     */
    public function getProductByName(string $name): int
    {
        return $this->_storage_driver->getProductByName($name);
    }

    /**
     * ConfigReal constructor.
     * @param int $id_distr
     * @param StorageInterface $storage_driver
     * @param ImportAdapterInterface $import_adapter
     * @param CacheInterface $chacke_adapter
     * @throws \Exception
     */
    public function __construct(
        int $id_distr,
        StorageInterface $storage_driver,
        ImportAdapterInterface $import_adapter,
        CacheInterface $chacke_adapter
    ) {
        $this->id_distr = $id_distr;
        $this->_storage_driver = $storage_driver;
        $this->_import_adapter = $import_adapter;
        $this->_cache_adapter = $chacke_adapter;
    }

    /**
     * @param ObjectCollection $data
     * @return mixed
     */
    public function saveData(ObjectCollection $data)
    {
        return $this->_storage_driver->saveData($data);
    }
}
