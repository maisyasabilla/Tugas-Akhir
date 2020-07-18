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
        $lokalRepo = new TransportasiLokalRepository();
        $pegawaiRepo = new PegawaiRepo();
        $akomodasiRepo = new AkomodasiRepo();
        $uangHarianRepo = new UangHarianRepo();

        $lokal = $lokalRepo->findWilayah($object['wilayah_tujuan']);
        $pegawai = $pegawaiRepo->findPegawai($object['nip']);
        $akomodasi = $akomodasiRepo->findByGolonganPerjalanan($pegawai['golongan_perjalanan']);
        $uangHarian = $uangHarianRepo->findByGolongan($pegawai['golongan_perjalanan'], $object['wilayah_tujuan']);


        $item = new PerjalananBiayaEntities();

        // 'id_perjalanan',
        // 'nip',
        // 'alat_angkut',
        // 'wilayah_asal',
        // 'wilayah_tujuan',  //done
        // 'tujuan',
        // 'komando',
        // 'keterangan',
        // 'tgl_berangkat',
        // 'tgl_pulang'
        // 'transportasi'
        // 'biaya_transportasi'

        $item->id_perjalanan = $object['id_perjalanan'];
        $item->transportasi_lokal = $lokal['id_lokal'];
        $item->uang_harian = $uangHarian['id_uang']; // TODO . uang harian repo tbc
        $item->transportasi = $object['transportasi']; // TODO . from HTML option from DB
        $item->akomodasi = $akomodasi['id_akomodasi']; // TODO . akomodasi repo find by golongan perjalanan field
        $item->biaya_transportasi = $object['biaya_transportasi']; // TODO . from HTML from edit text value

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
