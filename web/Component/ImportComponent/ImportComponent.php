<?php

namespace app\Component\ImportComponent;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Classes\SellRow;

/**
 * Class ImportComponent
 * @package ImportComponent
 */
class ImportComponent
{
    /** @var Config */
    private $_config;
    /** @var ObjectCollection */
    private $_import_objects;
    /** @var ObjectCollection */
    private $_error_objects;

    /**
     * @return ObjectCollection
     */
    public function getImportObjects()
    {
        if (!$this->_import_objects instanceof ObjectCollection) {
            $this->_import_objects = new ObjectCollection(SellRow::class);
        }

        return $this->_import_objects;
    }

    /**
     * @param ObjectCollection $import_objects
     * @return bool
     */
    public function setImportObjects(ObjectCollection $import_objects)
    {
        $this->_import_objects = $import_objects;

        return true;
    }

    /**
     * @return ObjectCollection
     */
    public function getErrorObjects()
    {
        if (!$this->_error_objects instanceof ObjectCollection) {
            $this->_error_objects = new ObjectCollection(ImportRow::class);
        }

        return $this->_error_objects;
    }

    /**
     * @param ObjectCollection $error_objects
     * @return bool
     */
    public function setErrorObjects(ObjectCollection $error_objects)
    {
        $this->_error_objects = $error_objects;

        return true;
    }

    /**
     * @return Config
     */
    public function getConfig()
    {
        if (!$this->_config instanceof Config) {
            $this->_config = new Config();
        }

        return $this->_config;
    }

    /**
     * ImportComponent constructor.
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->_config = $config;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function process()
    {
        $result = $this->getConfig()->getCacheAdapter()->get();
        //Если что-то есть в кэше - работаем по нему
        if (!$result->count()) {
            //Получаем данные от Адаптера
            if ($this->getConfig()->getImportFileHeader() && $this->getConfig()->getImportFileHeader() === $this->getConfig()->getImportAdapter()->getRow(true)) {
                \Yii::getLogger()->log('Header is equals',LOG_INFO);
            }
            $result = $this->getConfig()->getImportAdapter()->getData();
        }
        $storage = $this->getConfig()->getStorageDriver();
        foreach ($result->getItems() as $row) {
            /** @var $row ImportRow */
            if (($apteka_id = $storage->getAptekaByName($row->getAptekaName())) && ($product_id = $storage->getProductByName($row->getProductName()))) {
                if ($sell = new SellRow(
                    $apteka_id,
                    $product_id,
                    $row->getQuantity()
                )) {
                    $this->getImportObjects()->add($sell);
                }
            } else {
                $this->getErrorObjects()->add($row);
            }
        }
        if ($this->getErrorObjects()->count()) {
            $this->getConfig()->getCacheAdapter()->set($this->getErrorObjects());
        }

        return [
            'count' => $this->getConfig()->getStorageDriver()->saveData($this->getImportObjects()),
        ];
    }
}
