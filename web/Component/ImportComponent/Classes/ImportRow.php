<?php

namespace app\Component\ImportComponent\Classes;

/**
 * Class ImportRow
 * @package ImportComponent\Classes
 */
class ImportRow
{
    /** @var string */
    private $_product_name;
    /** @var string */
    private $_apteka_name;
    /** @var integer */
    private $_quantity;

    /**
     * ImportRow constructor.
     * @param string $product_name
     * @param string $apteka_name
     * @param int $quantity
     */
    public function __construct(string $product_name, string $apteka_name, string $quantity)
    {
        $this->setProductName($product_name);
        $this->setAptekaName($apteka_name);
        $this->setQuantity((int)$quantity);
    }

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
    public function setProductName(string $product_name)
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
    public function setAptekaName(string $apteka_name)
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
    public function setQuantity(int $quantity)
    {
        $this->_quantity = $quantity;

        return true;
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'apteka_name' => $this->getAptekaName(),
            'product_name' => $this->getProductName(),
            'quantity' => $this->getQuantity()
        ];
    }
}
