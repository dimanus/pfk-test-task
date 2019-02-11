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
class ConfigReal extends BaseConfig implements ConfigInterface
{
    /**
     * @return ObjectCollection
     */
    public function getData(): ObjectCollection
    {
        return $this->getImportAdapter()->getData();
    }

    /**
     * @param ObjectCollection $data
     * @return mixed|void
     */
    public function setCache(ObjectCollection $data)
    {
        return $this->getCacheAdapter()->set($data);
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
        $this->setIdDistr($id_distr);
        $this->setStorageDriver($storage_driver);
        $this->setImportAdapter($import_adapter);
        $this->setCacheAdapter($chacke_adapter);
    }

    /**
     * @param ObjectCollection $data
     * @return mixed
     */
    public function saveData(ObjectCollection $data)
    {
        return $this->getStorageDriver()->saveData($data);
    }
}
