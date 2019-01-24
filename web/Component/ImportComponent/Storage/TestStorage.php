<?php

class TestStorage implements StorageInterface
{
    /**
     * @param string $name
     * @return int
     */
    public function getAptekaByName($name)
    {
        return rand(1,100);
    }

    /**
     * @param $name
     * @return int
     */
    public function getProductByName($name)
    {
        return rand(1,100);
    }

    /**
     * @param $data
     * @return bool
     */
    public function saveData($data)
    {
        return true;
    }
}
