<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;

/**
 * Class TestAdapter
 * @package ImportComponent\Adapter
 */
class TestAdapter implements ImportAdapterInterface
{
    /** @var array */
    private $_data = [
        'Двеннадцатый Препарат	Д-Ковальчук дом 270	53',
        'Первый препарат	Никитина дом 73	10',
        'Пятый Препарат	Маркса дом 15 стр 1	54'
    ];

    /**
     * @return ImportRow|null
     */
    public function getRow()
    {
        $result = null;
        if ($row = array_shift($this->_data)) {
            list($product_name, $apteka_name, $qty) = explode("\t", $row, 3);
            $result = new ImportRow($product_name, $apteka_name, $qty);
        }

        return $result;
    }

    /**
     * @return ObjectCollection
     * @throws \Exception
     */
    public function getData()
    {
        $result = new ObjectCollection(ImportRow::class);
        while ($row = $this->getRow()) {
            $result->add($row);
        }

        return $result;
    }
}
