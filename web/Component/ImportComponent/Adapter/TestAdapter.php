<?php

class TestAdapter implements ImportAdapterInterface
{
    private $_data = [
        'Двеннадцатый Препарат	Д-Ковальчук дом 270	53',
        'Первый препарат	Никитина дом 73	10',
        'Пятый Препарат	Маркса дом 15 стр 1	54'
    ];

    public function getRow()
    {
        return explode("\t",array_pop($this->_data));
    }
}
