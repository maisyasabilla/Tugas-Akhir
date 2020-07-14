<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PerjalananTanggalModel;
use App\Entities\PerjalananTanggalEntities;
use App\Repository\Repository;


class PerjalananTanggalRepository extends Repository
{
    /**
     * Cari PerjalananTanggal Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {PerjalananTanggalEntities[]}
     */
    public function find($limit, $offset) {
        $model = new PerjalananTanggalModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari PerjalananTanggal Berdasarkan ID
     * @param {integer} $id - PerjalananTanggal id
     * @return {PerjalananTanggalEntities | null}
     */
    public function findById($id) {
        $model = new PerjalananTanggalModel();
        return $model->find($id);
    }

    /**
     * Entry Data PerjalananTanggal
     * @param {array} $object - data array PerjalananTanggal
     * @return {boolean}
     */
    public function insert($object) {
        $item = new PerjalananTanggalEntities();
        $item->nip = $object['nip'];
        $item->alat_angkut = $object['alat_angkut'];
        $item->wilayah_asal= $object['wilayah_asal'];
        $item->wilayah_tujuan= $object['wilayah_tujuan'];
        $item->tujuan = $object['tujuan'];
        $item->komando = $object['komando'];
        $item->keterangan = $object['keterangan'];

        $model = new PerjalananTanggalModel();
        return $model->insert($item);
    }

    /**
     * Delete Data PerjalananTanggal
     * @param {integer} $id - PerjalananTanggal id
     */
    public function delete($id) {
        $model = new PerjalananTanggalModel();
        $model->delete($id);
    }

}
