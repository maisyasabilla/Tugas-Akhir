<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PerjalananBiayaModel;
use App\Entities\PerjalananBiayaEntities;
use App\Repository\Repository;
use App\Repository\PegawaiRepository;
use App\Repository\TransportasiLokalRepository;
use App\Repository\AkomodasiRepository;
use App\Repository\UangRepository;


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
        date_default_timezone_set("Asia/Bangkok");

        $lokalRepo = new TransportasiLokalRepository();
        $pegawaiRepo = new PegawaiRepository();
        $akomodasiRepo = new AkomodasiRepository();
        $uangRepo = new UangRepository();

        $lokal = $lokalRepo->findWilayah($object['wilayah_tujuan']);
        $pegawai = $pegawaiRepo->findPegawai($object['nip']);
        $akomodasi = $akomodasiRepo->findByGolonganPerjalanan($pegawai[0]->jenjang_jabatan->golongan_perjalanan);
        $uangHarian = $uangRepo->findByWilayah($object['wilayah_tujuan']);

        $item = new PerjalananBiayaEntities();

        //UANG MAKAN
        $berangkat = $object['tgl_berangkat'];
        $pulang = $object['tgl_pulang'];
        $tanggal1 = new \DateTime($berangkat);
        $tanggal2 = new \DateTime($pulang);
        $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
        $jumlahhari = $perbedaan+1;
        $makan = 2 * $jumlahhari;
        $uangmakan = $uangHarian[0]->biaya;
        $totaluang = $makan * $uangmakan;

        //AKOMODASI
        $biayahotel = $akomodasi[0]->biaya;
        $jumlahako = $biayahotel * $perbedaan;

        //TOTAL UANG
        $tiket = $object['biaya_transportasi'];
        $transport = $lokal[0]->biaya;
        $ako = $jumlahako;
        $total = $tiket + $ako + $transport + $totaluang;
        echo $object['tgl_berangkat'];
        
        $item->id_perjalanan = $object['id_perjalanan'];
        $item->uang_harian = $uangHarian[0]->id_uang; // TODO . uang harian repo tbc
        $item->transportasi = $object['transportasi']; // TODO . from HTML option from DB
        $item->akomodasi = $akomodasi[0]->id_akomodasi; // TODO . akomodasi repo find by golongan perjalanan field
        $item->transportasi_lokal = $lokal[0]->id_lokal;
        $item->biaya_transportasi = $object['biaya_transportasi']; // TODO . from HTML from edit text value
        $item->total_biaya = $total;
        $model = new PerjalananBiayaModel();
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
