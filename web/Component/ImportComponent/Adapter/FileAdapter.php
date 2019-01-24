<?php

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
       if ($this->_file_handler && $line = fgets($this->_file_handler,4096)){
           $parts = explode("\t",trim($line));
           if (count($parts)===3){
               $result = new ImportRow(['_product_name'=>$parts[0],'_apteka_name'=>$parts[1],'_quantity'=>$parts[2]]);
           }
       }

        return $result;
    }

    /**
     * FileAdapter constructor.
     * @param string $file_name
     */
    public function __construct($file_name)
    {
        if (file_exists($file_name) && $handler = fopen($file_name, 'rb')){
            $this->_file_handler = $handler;
        }
    }

    public function __destruct()
    {
        fclose($this->_file_handler);
    }
}
