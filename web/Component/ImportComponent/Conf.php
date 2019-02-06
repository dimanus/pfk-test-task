<?php

namespace app\Component\ImportComponent;

use app\Component\ImportComponent\Adapter\CacheInterface;
use app\Component\ImportComponent\Adapter\FileAdapter;
use app\Component\ImportComponent\Adapter\ImportAdapterInterface;
use app\Component\ImportComponent\Adapter\YiiCacheAdapter;
use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Storage\StorageInterface;
use app\Component\ImportComponent\Storage\YiiStorage;
use app\models\DistrImportTemplate;

interface ConfigInterface
{
    /**
     * @return ObjectCollection
     */
    public function getData(): ObjectCollection;

    /**
     * @param ObjectCollection $data
     * @return mixed
     */
    public function setData(ObjectCollection $data);

    /**
     * @param ObjectCollection $data
     * @return mixed
     */
    public function setCache(ObjectCollection $data);
}

class BaseConfig
{
    /** @var int */
    private $id_distr;
    /** @var StorageInterface */
    private $_storage_driver;
    /** @var ImportAdapterInterface */
    private $_import_adapter;
    /** @var CacheInterface */
    private $_cache_adapter;
    /** @var string */
    private $_import_file_header;

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
     * @return StorageInterface
     */
    public function getStorageDriver()
    {
        return $this->_storage_driver;
    }

    /**
     * @param StorageInterface|array $storage_driver
     * @return bool
     * @throws Exception
     */
    public function setStorageDriver(StorageInterface $storage_driver)
    {
        $this->_storage_driver = $storage_driver;

        return true;
    }

    /**
     * @return ImportAdapterInterface
     */
    public function getImportAdapter()
    {
        return $this->_import_adapter;
    }

    /**
     * @param ImportAdapterInterface|array $import_adapter
     * @return bool
     * @throws \Exception
     */
    public function setImportAdapter(ImportAdapterInterface $import_adapter)
    {
        $this->_import_adapter = $import_adapter;

        return true;
    }

    /**
     * @return CacheInterface
     */
    public function getCacheAdapter()
    {
        return $this->_cache_adapter;
    }

    /**
     * @param CacheInterface|array $cache_adapter
     * @return bool
     * @throws Exception
     */
    public function setCacheAdapter(CacheInterface $cache_adapter)
    {
        $this->_cache_adapter = $cache_adapter;

        return true;
    }

    /**
     * @return string
     */
    public function getImportFileHeader()
    {
        return $this->_import_file_header;
    }

    /**
     * @param string $import_file_header
     * @return bool
     */
    public function setImportFileHeader(string $import_file_header)
    {
        $this->_import_file_header = $import_file_header;

        return true;
    }
}

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

class ConfigTest implements ConfigInterface
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
}

class ConfigFactory
{
    public function buildConfigReal(int $id_distr, string $file_name)
    {
        $import_template = DistrImportTemplate::findOne(['id_distr' => $id_distr]);

        return new ConfigReal($id_distr, new YiiStorage($id_distr), new FileAdapter(
            $file_name,
            $import_template->template,
            $import_template->split
        ), new YiiCacheAdapter());
    }

    public function buildConfigTest()
    {
        return new ConfigTest();
    }
}
