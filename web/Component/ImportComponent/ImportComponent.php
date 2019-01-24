<?php

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

    public function process()
    {
        $result = new SellCollection();
        $storage = $this->getConfig()->getStorageDriver();
        while ($row = $this->getConfig()->getImportAdapter()->getRow()){
            $storage->getAptekaByName($row->getAptekaName());
        }

        return $result;
    }
}
