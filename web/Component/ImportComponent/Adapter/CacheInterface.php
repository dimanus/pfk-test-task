<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ObjectCollection;

interface CacheInterface
{
    /**
     * @return ObjectCollection
     */
    public function get();

    /**
     * @param string $key
     * @return bool
     */
    public function setKey(string $key);

    /**
     * @param ObjectCollection $data
     * @return bool
     */
    public function set(ObjectCollection $data);

    /**
     * @param string $key
     * @return bool
     */
    public function clear(string $key);
}
