<?php

namespace app\Component\ImportComponent\Config;

use app\Component\ImportComponent\Adapter\FileAdapter;
use app\Component\ImportComponent\Adapter\YiiCacheAdapter;
use app\Component\ImportComponent\Storage\YiiStorage;
use app\models\DistrImportTemplate;

/**
 * Class ConfigFactory
 * @package app\Component\ImportComponent\Config
 */
class ConfigFactory
{
    public function buildConfigReal(int $id_distr, string $file_name)
    {
        $import_template = DistrImportTemplate::findOne(['id_distr' => $id_distr]);

        return new ConfigReal($id_distr, new YiiStorage($id_distr), new FileAdapter(
            $file_name,
            $import_template->template,
            $import_template->split
        ), new YiiCacheAdapter());
    }

    public function buildConfigTest()
    {
        return new ConfigTest();
    }
}
