<?php
namespace App\Repository;

use App\Models\GolonganModel;
use App\Entities\GolonganEntities;
use App\Repository\Repository;


class GolonganRepository extends Repository
{
    /**
     * Cari Golongan Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {GolonganEntities[]}
     */
    public function find($limit, $offset) {
        $model = new GolonganModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Golongan Berdasarkan ID
     * @param {integer} $id - Golongan id
     * @return {GolonganEntities | null}
     */
    public function findById($id) {
        $model = new GolonganModel();
        return $model->find($id);
    }

    /**
     * Entry Data Golongan
     * @param {array} $object - data array Golongan
     * @return {boolean}
     */
    public function insert($object) {
        $item = new GolonganEntities();
        $item->id_golongan = $object['id_golongan'];
        $item->golongan = $object['golongan'];

        $model = new GolonganModel();
        return $model->insert($item);
    }

    /**
     * Update Data Golongan
     * @param {integer} $id - Golongan id
     * @param {array} $object - data array Golongan
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new GolonganModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Golongan
     * @param {integer} $id - Golongan id
     */
    public function delete($id) {
        $model = new GolonganModel();
        $model->delete($id);
    }
}
