<?php

namespace app\Component\ImportComponent\Storage;

use app\Component\ImportComponent\Classes\ObjectCollection;
use app\Component\ImportComponent\Classes\SellRow;
use app\Component\ImportComponent\Config;
use app\models\Cross;
use app\models\Sells;

/**
 * Class YiiStorage
 * @package app\Component\ImportComponent\Storage
 */
class YiiStorage implements StorageInterface
{
    /** @var Config */
    private $_owner;
    /** @var array */
    private $_apteka_array;
    /** @var array */
    private $_product_array;

    /**
     * @param string $name
     * @return int
     */
    public function getAptekaByName($name)
    {
        return array_key_exists($name, $this->getApteka()) ? (int)$this->_apteka_array[$name] : 0;
    }

    /**
     * @param $name
     * @return int
     */
    public function getProductByName($name)
    {
        return array_key_exists($name, $this->getProduct()) ? (int)$this->_product_array[$name] : 0;
    }

    /**
     * @param $data ObjectCollection
     * @return int
     */
    public function saveData(ObjectCollection $data)
    {
        $insert_rows = [];
        $distr_id = $this->_owner->getIdDistr();
        foreach ($data->getItems() as $item) {
            /** @var $item SellRow */
            $insert_rows [] = [
                'id_sell'=>null,
                'id_distr' => $distr_id,
                'id_product' => $item->getIdProduct(),
                'id_apteka' => $item->getIdApteka(),
                'quantity' => $item->getQuantity(),
                'dt_create'=>time(),
            ];
        }
        $sell_model = new Sells();
        \Yii::$app->db->createCommand()->batchInsert(Sells::tableName(), $sell_model->attributes(), $insert_rows)->execute();

        return count($insert_rows);
    }

    /**
     * YiiStorageInterface constructor.
     * @param $owner
     */
    public function __construct($owner)
    {
        $this->_owner = $owner;
    }

    /**
     * @return array
     */
    private function getApteka()
    {
        if (!$this->_apteka_array) {
            $this->_apteka_array = Cross::find()->where([
                'id_distr' => $this->_owner->getIdDistr(),
                'type' => Cross::APTEKA
            ])->indexBy('name')->select('id_inital')->column();
        }

        return $this->_apteka_array;
    }

    /**
     * @return array
     */
    private function getProduct()
    {
        if (!$this->_product_array) {
            $this->_product_array = Cross::find()->where([
                'id_distr' => $this->_owner->getIdDistr(),
                'type' => Cross::PRODUCT
            ])->indexBy('name')->select('id_inital')->column();
        }

        return $this->_product_array;
    }
}
