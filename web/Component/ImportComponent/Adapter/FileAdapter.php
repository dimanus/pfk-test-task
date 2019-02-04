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
    /** @var string */
    private $_input_template;
    /** @var string */
    private $_split;

    /**
     * @param bool $get_raw
     * @return ImportRow|bool
     */
    public function getRow($get_raw = false)
    {
        $result = false;
        $product = $apteka = $quantity = 0;
        if ($this->_file_handler && $line = fgets($this->_file_handler, 4096)) {
            $parts = explode($this->_split == '\t' ? "\t" : $this->_split, trim($line));
            $input_vars = $this->getTemplateVars();
            if (count($parts) === count($input_vars)) {
                extract(array_combine($input_vars, $parts), EXTR_OVERWRITE);
                if ($product && $apteka && $quantity) {
                    $result = new ImportRow($product, $apteka, $quantity);
                }
            }
            if ($get_raw){
                $result = $parts[0];
            }
        }

        return $result;
    }

    public function getTemplateVars()
    {
        return explode(',', $this->_input_template);
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
     * @param $file_name
     * @param string $input_template
     * @param string $split
     */
    public function __construct($file_name, $input_template = 'product,apteka,quantity', $split = "\t")
    {
        if (file_exists($file_name) && $handler = fopen($file_name, 'rb')) {
            $this->_file_handler = $handler;
        }else {
            //('File not found');
        }
        $this->_input_template = $input_template;
        $this->_split = $split;
    }

    public function __destruct()
    {
        if ($this->_file_handler) {
            fclose($this->_file_handler);
        }
    }
}
