<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;
use app\Component\ImportComponent\Classes\ObjectCollection;

/**
 * Class FileAdapter
 * @package ImportComponent\Adapter
 */
class FileAdapter implements ImportAdapterInterface
{
    /** @var string */
    private $_file_handler;

    /**
     * @return bool|ImportRow
     */
    public function getRow()
    {
        $result = false;
        if ($this->_file_handler && $line = fgets($this->_file_handler, 4096)) {
            $parts = explode("\t", trim($line), 3);
            if (count($parts) === 3) {
                $result = new ImportRow($parts[0], $parts[1], $parts[2]);
            }
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

    /**
     * FileAdapter constructor.
     * @param string $file_name
     */
    public function __construct($file_name)
    {
        if (file_exists($file_name) && $handler = fopen($file_name, 'rb')) {
            $this->_file_handler = $handler;
        }
    }

    public function __destruct()
    {
        if ($this->_file_handler) {
            fclose($this->_file_handler);
        }
    }
}
