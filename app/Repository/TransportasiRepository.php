<?php
namespace App\Repository;

use App\Models\TransportasiModel;
use App\Entities\TransportasiEntities;
use App\Repository\Repository;


class TransportasiRepository extends Repository
{
    /**
     * Cari Transportasi Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {TransportasiEntities[]}
     */
    public function find($limit, $offset) {
        $model = new TransportasiModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Transportasi Berdasarkan ID
     * @param {integer} $id - Transportasi id
     * @return {TransportasiEntities | null}
     */
    public function findById($id) {
        $model = new TransportasiModel();
        return $model->find($id);
    }

    /**
     * Entry Data Transportasi
     * @param {array} $object - data array Transportasi
     * @return {boolean}
     */
    public function insert($object) {
        $item = new TransportasiEntities();
        $item->id_transportasi = $object['id_transportasi'];
        $item->transportasi = $object['transportasi'];

        $model = new TransportasiModel();
        return $model->insert($item);
    }

    /**
     * Update Data Transportasi
     * @param {integer} $id - Transportasi id
     * @param {array} $object - data array Transportasi
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new TransportasiModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Transportasi
     * @param {integer} $id - Transportasi id
     */
    public function delete($id) {
        $model = new TransportasiModel();
        $model->delete($id);
    }
}
