<?php

namespace app\Component\ImportComponent\Config;

use app\Component\ImportComponent\Adapter\TestAdapter;
use app\Component\ImportComponent\Classes\ObjectCollection;

class ConfigTest implements ConfigInterface
{
    /**
     * @return ObjectCollection
     * @throws \Exception
     */
    public function getData(): ObjectCollection
    {
        return (new TestAdapter())->getData();
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
        return true;
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
