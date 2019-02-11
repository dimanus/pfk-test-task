<?php

namespace app\Component\ImportComponent\Config;

use app\Component\ImportComponent\Classes\ObjectCollection;

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
    public function saveData(ObjectCollection $data)
    {
        return $data->count();
    }

    public function setCache(ObjectCollection $data)
    {
        // TODO: Implement setCache() method.
    }

    /**
     * @param string $name
     * @return int
     */
    public function getAptekaByName(string $name)
    {
        return rand(1, 100);
    }

    /**
     * @param string $name
     * @return int
     */
    public function getProductByName($name)
    {
        return rand(1, 100);
    }
}
