<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PerjalananBiayaModel;
use App\Entities\PerjalananBiayaEntities;
use App\Repository\Repository;
use App\Repository\PegawaiRepository;
use App\Repository\TransportasiLokalRepository;


class PerjalananBiayaRepository extends Repository
{
    /**
     * Cari PerjalananBiaya Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {PerjalananBiayaEntities[]}
     */
    public function find($limit, $offset) {
        $model = new PerjalananBiayaModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari PerjalananBiaya Berdasarkan ID
     * @param {integer} $id - PerjalananBiaya id
     * @return {PerjalananBiayaEntities | null}
     */
    public function findById($id) {
        $model = new PerjalananBiayaModel();
        return $model->find($id);
    }

    /**
     * Entry Data PerjalananBiaya
     * @param {array} $object - data array PerjalananBiaya
     * @return {boolean}
     */
    public function insert($object) {
        $pegawaiRepo = new PegawaiRepository();
        $lokalRepo = new TransportasiLokalRepository();
        
        $param = [
            'pegawai' => $pegawaiRepo->findPegawai($object['nip']),
            'lokal' => $lokalRepo->findWilayah($object['wilayah_tujuan']),
        ];

        $item = new PerjalananBiayaEntities();
        
        $item->id_perjalanan = $object['id_perjalanan'];
        $item->uang_harian = $lokal['id_uang'];
   
        $model->insert($item);
    }

    /**
     * Update Data Pegawai
     * @param {integer} $id - nip
     * @param {array} $object - data array pegawai
     * @return {void}
     */
    public function update($id, $object) {
        $model = new PerjalananBiayaModel();

        $model->update($id, $object);
    }

    /**
     * Delete Data PerjalananBiaya
     * @param {integer} $id - PerjalananBiaya id
     */
    public function delete($id) {
        $model = new PerjalananBiayaModel();
        $model->delete($id);
    }

}
