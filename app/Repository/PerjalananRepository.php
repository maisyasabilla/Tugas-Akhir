<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PerjalananModel;
use App\Repository\Repository;
use App\Entities\PerjalananEntities;


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

    public function isExistTrip($id) {
        $model = new PerjalananModel();
        $tripList = $model
            ->where('id_perjalanan', $id)
            ->findAll();

        return count($tripList) >= 1;
    }

    public function insert($object) {
        $item = new PerjalananEntities();
        $item->id_perjalanan = $object['id_perjalanan'];
        $item->nip = $object['nip'];
        $item->alat_angkut = $object['alat_angkut'];
        $item->wilayah_asal= $object['wilayah_asal'];
        $item->wilayah_tujuan= $object['wilayah_tujuan'];
        $item->tujuan = $object['tujuan'];
        $item->komando = $object['komando'];
        $item->keterangan = $object['keterangan'];

        $model = new PerjalananModel();
        if (!$this->isExistTrip($id)) {
            $model->insert($item);
        }
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
