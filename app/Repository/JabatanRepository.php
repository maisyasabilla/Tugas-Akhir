<?php
namespace App\Repository;

use App\Models\JabatanModel;
use App\Entities\JabatanEntities;
use App\Repository\Repository;


class JabatanRepository extends Repository
{
    /**
     * Cari Jabatan Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {JabatanEntities[]}
     */
    public function find($limit, $offset) {
        $model = new JabatanModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Jabatan Berdasarkan ID
     * @param {integer} $id - jabatan id
     * @return {JabatanEntities | null}
     */
    public function findById($id) {
        $model = new JabatanModel();
        return $model->find($id);
    }

    /**
     * Entry Data Jabatan
     * @param {array} $object - data array jabatan
     * @return {boolean}
     */
    public function insert($object) {
        $item = new JabatanEntities();
        $item->jabatan = $object['jabatan'];
        $item->id_jabatan = $object['id_jabatan'];
        $item->jenjang_jabatan = $object['jenjang_jabatan'];

        $model = new JabatanModel();
        return $model->insert($item);
    }

    /**
     * Update Data Jabatan
     * @param {integer} $id - jabatan id
     * @param {array} $object - data array jabatan
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new JabatanModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Jabatan
     * @param {integer} $id - jabatan id
     */
    public function delete($id) {
        $model = new JabatanModel();
        $model->delete($id);
    }
}
