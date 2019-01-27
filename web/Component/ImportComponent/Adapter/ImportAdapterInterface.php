<?php
namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ImportRow;

interface ImportAdapterInterface
{
    /** @return ImportRow */
    public function getRow();
}
