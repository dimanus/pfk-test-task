<?php
namespace app\Component\ImportComponent\Classes;

/**
 * Class SellRow
 * @package ImportComponent\Classes
 */
class SellRow
{
    /** @var int */
    private $id_apteka;
    /** @var int */
    private $id_product;
    /** @var int */
    private $quantity;

    /**
     * SellRow constructor.
     * @param int $id_apteka
     * @param int $id_product
     * @param int $quantity
     */
    public function __construct(int $id_apteka,int $id_product,int $quantity)
    {
        $this->setIdApteka($id_apteka);
        $this->setIdProduct($id_product);
        $this->setQuantity($quantity);
    }

    /**
     * @return int
     */
    public function getIdApteka()
    {
        return $this->id_apteka;
    }

    /**
     * @param int $id_apteka
     * @return bool
     */
    public function setIdApteka(int $id_apteka)
    {
        $this->id_apteka = $id_apteka;

        return true;
    }

    /**
     * @return int
     */
    public function getIdProduct()
    {
        return $this->id_product;
    }

    /**
     * @param int $id_product
     * @return bool
     */
    public function setIdProduct(int $id_product)
    {
        $this->id_product = $id_product;

        return true;
    }

    /**
     * @return int
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     * @return bool
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;

        return true;
    }


}
