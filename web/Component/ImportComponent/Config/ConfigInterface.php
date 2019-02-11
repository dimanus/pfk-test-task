<?php

namespace app\Component\ImportComponent\Config;

use app\Component\ImportComponent\Classes\ObjectCollection;

interface ConfigInterface
{
    /**
     * @return ObjectCollection
     */
    public function getData(): ObjectCollection;


    /**
     * @param ObjectCollection $data
     * @return mixed
     */
    public function setCache(ObjectCollection $data);

    /**
     * @param ObjectCollection $data
     * @return mixed
     */
    public function saveData(ObjectCollection $data);
}
