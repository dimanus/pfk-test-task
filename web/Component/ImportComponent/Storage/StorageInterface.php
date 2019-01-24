<?php

interface StorageInterface
{
    /**
     * @param string $name
     * @return int
     */
    public function getAptekaByName($name);

    /**
     * @param $name
     * @return int
     */
    public function getProductByName($name);

    /**
     * @param $data
     * @return bool
     */
    public function saveData($data);
}
