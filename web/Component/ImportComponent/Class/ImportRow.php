<?php

class ImportRow extends \yii\base\BaseObject
{
    /** @var string */
    private $_product_name;
    /** @var string */
    private $_apteka_name;
    /** @var integer */
    private $_quantity;

    /**
     * @return string
     */
    public function getProductName()
    {
        return $this->_product_name;
    }

    /**
     * @param string $product_name
     * @return bool
     */
    public function setProductName($product_name)
    {
        $this->_product_name = $product_name;

        return true;
    }

    /**
     * @return string
     */
    public function getAptekaName()
    {
        return $this->_apteka_name;
    }

    /**
     * @param string $apteka_name
     * @return bool
     */
    public function setAptekaName($apteka_name)
    {
        $this->_apteka_name = $apteka_name;

        return true;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->_quantity;
    }

    /**
     * @param int $quantity
     * @return bool
     */
    public function setQuantity($quantity)
    {
        $this->_quantity = $quantity;

        return true;
    }
}
