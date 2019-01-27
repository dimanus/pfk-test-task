<?php

namespace app\Component\ImportComponent\Storage;

/**
 * Class TestStorage
 * @package ImportComponent\Storage
 */
class TestStorage implements StorageInterface
{
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
     * @param $data
     * @return bool
     */
    public function saveData($data)
    {
        var_dump($data);

        return true;
    }
}
