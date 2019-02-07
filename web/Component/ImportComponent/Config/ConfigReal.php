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
        // TODO: Implement getData() method.
    }

    /**
     * @param ObjectCollection $data
     * @return mixed
     */
    public function setData(ObjectCollection $data)
    {
        // TODO: Implement setData() method.
    }

    public function setCache(ObjectCollection $data)
    {
        // TODO: Implement setCache() method.
    }

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
}
