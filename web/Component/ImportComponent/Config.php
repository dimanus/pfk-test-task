<?php

namespace app\Component\ImportComponent;

use app\Component\ImportComponent\Adapter\CacheInterface;
use app\Component\ImportComponent\Adapter\ImportAdapterInterface;
use app\Component\ImportComponent\Adapter\TestAdapter;
use app\Component\ImportComponent\Adapter\TestCacheAdapter;
use app\Component\ImportComponent\Storage\StorageInterface;
use app\Component\ImportComponent\Storage\TestStorage;

/**
 * Class Config
 * @package ImportComponent
 */
class Config
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
     * @return int
     */
    public function getIdDistr()
    {
        return $this->id_distr;
    }

    /**
     * @param int $id_distr
     * @return bool
     */
    public function setIdDistr(int $id_distr)
    {
        $this->id_distr = $id_distr;

        return true;
    }

    /**
     * @return CacheInterface
     */
    public function getCacheAdapter()
    {
        if (!$this->_cache_adapter) {
            $this->_cache_adapter = new TestCacheAdapter();
        }

        return $this->_cache_adapter;
    }

    /**
     * @param CacheInterface $cache_adapter
     * @return bool
     * @throws \Exception
     */
    public function setCacheAdapter($cache_adapter)
    {
        if ($cache_adapter instanceof CacheInterface) {
            $this->_cache_adapter = $cache_adapter;
        } else {
            throw new \Exception('Failed to call ' . get_class($this) . '::setCacheAdapter');
        }

        return true;
    }

    /**
     * @return StorageInterface
     */
    public function getStorageDriver()
    {
        if (!$this->_storage_driver instanceof StorageInterface) {
            $this->_storage_driver = new TestStorage($this);
        }

        return $this->_storage_driver;
    }

    /**
     * @param StorageInterface|array $storage_driver
     * @return bool
     * @throws \Exception
     */
    public function setStorageDriver($storage_driver)
    {
        if ($storage_driver instanceof StorageInterface) {
            $this->_storage_driver = $storage_driver;
        } else {
            throw new \Exception('Failed to call ' . get_class($this) . '::setStorageDriver');
        }

        return true;
    }

    /**
     * @return ImportAdapterInterface
     */
    public function getImportAdapter()
    {
        if (!$this->_import_adapter instanceof ImportAdapterInterface) {
            $this->_import_adapter = new TestAdapter();
        }

        return $this->_import_adapter;
    }

    /**
     * @param ImportAdapterInterface|array $import_adapter
     * @return bool
     * @throws \Exception
     */
    public function setImportAdapter($import_adapter)
    {
        if ($import_adapter instanceof ImportAdapterInterface) {
            $this->_import_adapter = $import_adapter;
        } else {
            throw new \Exception('Failed to call ' . get_class($this) . '::setImportAdapter');
        }

        return true;
    }
}
