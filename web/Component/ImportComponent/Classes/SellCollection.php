<?php
namespace app\Component\ImportComponent\Classes;

/**
 * Class SellCollection
 * @package app\Component\ImportComponent\Classes
 */
class SellCollection
{
    /** @var array  */
    private $_items = [];

    /**
     * @param $item
     * @return bool
     * @throws \Exception
     */
    public function add($item)
    {
        if($item instanceof SellRow){
            $this->_items[] = $item;
        }else {
            throw new \Exception('Class not valid');
        }

        return true;
    }

    public function toArray()
    {
        $result = [];
        foreach ($this->_items as $item) {
            $result []= $item->toArray();
        }
        return $result;
    }
}
