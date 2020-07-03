<?php
namespace App\Repository;

use App\Models\GolonganPerjalananModel;
use App\Entities\GolonganPerjalananEntities;
use App\Repository\Repository;


class GolonganPerjalananRepository extends Repository
{
    /**
     * Cari Golongan Perjalanan Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {GolonganEntities[]}
     */
    public function find($limit, $offset) {
        $model = new GolonganPerjalananModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Golongan Perjalanan Berdasarkan ID
     * @param {integer} $id - Golongan id
     * @return {GolonganEntities | null}
     */
    public function findById($id) {
        $model = new GolonganPerjalananModel();
        return $model->find($id);
    }

    /**
     * Entry Data Golongan
     * @param {array} $object - data array Golongan
     * @return {boolean}
     */
    public function insert($object) {
        $item = new GolonganPerjalananEntities();
        $item->id_golongan_per = $object['id_golongan_per'];
        $item->golongan_perjalanan = $object['golongan_perjalanan'];

        $model = new GolonganPerjalananModel();
        return $model->insert($item);
    }

    /**
     * Update Data Golongan
     * @param {integer} $id - Golongan id
     * @param {array} $object - data array Golongan
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new GolonganPerjalananModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Golongan
     * @param {integer} $id - Golongan id
     */
    public function delete($id) {
        $model = new GolonganPerjalananModel();
        $model->delete($id);
    }
}
