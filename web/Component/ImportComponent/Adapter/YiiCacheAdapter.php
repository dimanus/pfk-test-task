<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;

class YiiCacheAdapter implements CacheInterface
{
    /** @var string */
    private $_key;
    /**
     * @return ObjectCollection
     */
    public function get()
    {
        $result = new ObjectCollection(ImportRow::class);
        if ($this->_key && $data = \Yii::$app->cache->get($this->_key)) {
            $result = $data;
        }

        return $result;
    }

    /**
     * @param ObjectCollection $data
     * @return bool
     */
    public function set(ObjectCollection $data)
    {
        $result = false;
        if ($this->_key) {
            $result= \Yii::$app->cache->set($this->_key, $data);
        }

        return $result;
    }

    /**
     * @param string $key
     * @return bool
     */
    public function clear(string $key)
    {
        return \Yii::$app->cache->delete($key);
    }

    /**
     * @param string $key
     * @return bool
     */
    public function setKey(string $key)
    {
        $this->_key = $key;

        return true;
    }
}
