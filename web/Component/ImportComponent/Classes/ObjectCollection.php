<?php

namespace app\Component\ImportComponent\Classes;

/**
 * Class ObjectCollection
 * @package app\Component\ImportComponent\Classes
 */
class ObjectCollection
{
    /** @var array */
    private $_items = [];
    /** @var string */
    private $_type;

    /**
     * ObjectCollection constructor.
     * @param string $type
     */
    public function __construct(string $type)
    {
        $this->_type = $type;
    }

    /**
     * @param $item
     * @return bool
     * @throws \Exception
     */
    public function add($item)
    {
        if ($item instanceof $this->_type) {
            $this->_items[] = $item;
        } else {
            throw new \Exception('Class not valid to ' . $this->_type);
        }

        return true;
    }

    /**
     * @return array
     */
    public function toArray($add_class_name = false)
    {
        $result = [];
        if ($this->_items && method_exists(reset($this->_items), 'toArray')) {
            foreach ($this->_items as $item) {
                if ($add_class_name) {
                    $result [] = array_merge($item->toArray(), ['class_name'=>get_class($item)]);
                } else {
                    $result [] = $item->toArray();
                }
            }
        }

        return $result;
    }

    /**
     * @return int
     */
    public function count()
    {
        return \count($this->_items);
    }

    public function getItems()
    {
        return $this->_items;
    }
}
