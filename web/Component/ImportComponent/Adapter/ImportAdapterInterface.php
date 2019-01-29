<?php

namespace app\Component\ImportComponent\Adapter;

use app\Component\ImportComponent\Classes\ObjectCollection;

interface ImportAdapterInterface
{
    /** @return ObjectCollection */
    public function getData();
}
