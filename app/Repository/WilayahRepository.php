<?php
namespace App\Repository;

use App\Models\WilayahModel;
use App\Entities\WilayahEntities;
use App\Repository\Repository;


class WilayahRepository extends Repository
{
    /**
     * Cari Wilayah Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {WilayahEntities[]}
     */
    public function find($limit, $offset) {
        $model = new WilayahModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Wilayah Berdasarkan ID
     * @param {integer} $id - Wilayah id
     * @return {WilayahEntities | null}
     */
    public function findById($id) {
        $model = new WilayahModel();
        return $model->find($id);
    }

    /**
     * Entry Data Wilayah
     * @param {array} $object - data array Wilayah
     * @return {boolean}
     */
    public function insert($object) {
        $item = new WilayahEntities();
        $item->wilayah = $object['wilayah'];

        $model = new WilayahModel();
        return $model->insert($item);
    }

    /**
     * Update Data Wilayah
     * @param {integer} $id - Wilayah id
     * @param {array} $object - data array Wilayah
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new WilayahModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Wilayah
     * @param {integer} $id - Wilayah id
     */
    public function delete($id) {
        $model = new WilayahModel();
        $model->delete($id);
    }
}
