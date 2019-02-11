<?php
namespace app\Component\ImportComponent\Storage;

use app\Component\ImportComponent\Classes\ObjectCollection;

/**
 * Interface StorageInterface
 * @package ImportComponent\Storage
 */
interface StorageInterface
{
    /**
     * @param string $name
     * @return int
     */
    public function getAptekaByName($name);

    /**
     * @param $name
     * @return int
     */
    public function getProductByName($name);

    /**
     * @param $data ObjectCollection
     * @return int
     */
    public function saveData(ObjectCollection $data);

    /**
     * StorageInterface constructor.
     * @param int $id_distr
     */
    public function __construct(int $id_distr);
}
