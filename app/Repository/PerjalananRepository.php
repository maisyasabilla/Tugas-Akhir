<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PerjalananModel;
use App\Entities\PerjalananEntities;
use App\Repository\Repository;


class PerjalananRepository extends Repository
{
    /**
     * Cari Perjalanan Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {PerjalananEntities[]}
     */
    public function find($limit, $offset) {
        $model = new PerjalananModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Perjalanan Berdasarkan ID
     * @param {integer} $id - Perjalanan id
     * @return {PerjalananEntities | null}
     */
    public function findById($id) {
        $model = new PerjalananModel();
        return $model->find($id);
    }

    /**
     * Entry Data Perjalanan
     * @param {array} $object - data array Perjalanan
     * @return {boolean}
     */
    public function insert($object) {
        $item = new PerjalananEntities();

        $model = new PerjalananModel();
        return $model->insert($item);
    }

    /**
     * Delete Data Perjalanan
     * @param {integer} $id - Perjalanan id
     */
    public function delete($id) {
        $model = new PerjalananModel();
        $model->delete($id);
    }

}
