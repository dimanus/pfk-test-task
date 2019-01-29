<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;

class TestCacheAdapter implements CacheInterface
{
    /** @var ObjectCollection */
    private $_storage;

    /**
     * @return ObjectCollection
     */
    public function get()
    {
        return $this->_storage ? $this->_storage : new ObjectCollection(ImportRow::class);
    }

    /**
     * @param ObjectCollection $data
     * @return bool
     */
    public function set(ObjectCollection $data)
    {
        $this->_storage = $data;

        return true;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function setKey(string $key)
    {
        return true;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function clear(string $key)
    {
        $this->_storage = new ObjectCollection(ImportRow::class);

        return true;
    }
}
