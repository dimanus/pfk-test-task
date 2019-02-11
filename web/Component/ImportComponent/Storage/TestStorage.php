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
    /** @var int */
    private $id_distr;

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
     * TestStorage constructor.
     * @param int $id_distr
     */
    public function __construct(int $id_distr)
    {
        $this->id_distr = $id_distr;
    }
}
