<?php

namespace app\Component\ImportComponent;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Classes\SellRow;
use app\Component\ImportComponent\Config\ConfigInterface;

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
     * @return ConfigInterface
     */
    public function getConfig()
    {
        return $this->_config;
    }

    /**
     * ImportComponent constructor.
     * @param Config $config
     */
    public function __construct(ConfigInterface $config)
    {
        $this->_config = $config;
    }

    /**
     * @return array
     * @throws \Exception
     */
    public function process()
    {
        $result = $this->getConfig()->getData();
        foreach ($result->getItems() as $row) {
            /** @var $row ImportRow */
            if (($apteka_id = $this->getConfig()->getAptekaByName($row->getAptekaName())) && ($product_id = $this->getConfig()->getProductByName($row->getProductName()))) {
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
            $this->getConfig()->setCache($this->getErrorObjects());
        }

        return [
            'count' => $this->getConfig()->saveData($this->getImportObjects()),
        ];
    }
}
