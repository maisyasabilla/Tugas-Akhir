<?php
namespace App\Repository;

use App\Models\JenjangModel;
use App\Entities\JenjangEntities;
use App\Repository\Repository;


class JenjangRepository extends Repository
{
    /**
     * Cari Jenjang Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {JenjangEntities[]}
     */
    public function find($limit, $offset) {
        $model = new JenjangModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Jenjang Berdasarkan ID
     * @param {integer} $id - jenjang id
     * @return {JenjangEntities | null}
     */
    public function findById($id) {
        $model = new JenjangModel();
        return $model->find($id);
    }

    /**
     * Entry Data Jenjang
     * @param {array} $object - data array Jenjang
     * @return {boolean}
     */
    public function insert($object) {
        $item = new JenjangEntities();
        $item->jenjang_jabatan = $object['jenjang_jabatan'];
        $item->golongan_perjalanan = $object['golongan_perjalanan'];

        $model = new JenjangModel();
        return $model->insert($item);
    }

    /**
     * Update Data Jenjang
     * @param {integer} $id - Jenjang id
     * @param {array} $object - data array Jenjang
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new JenjangModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Jenjang
     * @param {integer} $id - Jenjang id
     */
    public function delete($id) {
        $model = new JenjangModel();
        $model->delete($id);
    }
}
