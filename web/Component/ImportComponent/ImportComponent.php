<?php
namespace app\Component\ImportComponent;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\SellCollection;
use app\Component\ImportComponent\Classes\SellRow;

/**
 * Class ImportComponent
 * @package ImportComponent
 */
class ImportComponent
{
    /** @var Config */
    private $_config;

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
     * @return SellCollection
     * @throws \Exception
     */
    public function process()
    {
        $result = new SellCollection();
        $storage = $this->getConfig()->getStorageDriver();
        while ($row = $this->getConfig()->getImportAdapter()->getRow()){
            /** @var $row ImportRow */
            if($sell = new SellRow($storage->getAptekaByName($row->getAptekaName()),$storage->getProductByName($row->getProductName()),$row->getQuantity())){
                $result->add($sell);
            }
        }

        return $result;
    }
}
