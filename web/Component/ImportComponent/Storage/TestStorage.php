<?php

namespace app\Component\ImportComponent\Storage;

use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Config;

/**
 * Class TestStorage
 * @package ImportComponent\Storage
 */
class TestStorage implements StorageInterface
{
    /** @var Config */
    private $_owner;

    /**
     * @param string $name
     * @return int
     */
    public function getAptekaByName($name)
    {
        return rand(1, 100);
    }

    /**
     * @param $name
     * @return int
     */
    public function getProductByName($name)
    {
        return rand(1, 100);
    }

    /**
     * @param $data ObjectCollection
     * @return int
     */
    public function saveData(ObjectCollection $data)
    {
        return $data->count();
    }

    /**
     * StorageInterface constructor.
     * @param $owner
     */
    public function __construct($owner)
    {
        $this->_owner = $owner;
    }
}
