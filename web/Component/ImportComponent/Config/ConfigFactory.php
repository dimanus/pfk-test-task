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
    /**
     * @param int $id_distr
     * @param string $file_name
     * @return ConfigReal
     * @throws \Exception
     */
    public function buildConfigReal(int $id_distr, string $file_name)
    {
        if ($import_template = DistrImportTemplate::findOne(['id_distr' => $id_distr])) {
            return new ConfigReal($id_distr, new YiiStorage($id_distr), new FileAdapter(
                $file_name,
                $import_template->template,
                $import_template->split
            ), new YiiCacheAdapter());
        } else {
            throw new \Exception('Cannot found import template');
        }
    }

    /**
     * @return ConfigTest
     */
    public function buildConfigTest()
    {
        return new ConfigTest();
    }
}
