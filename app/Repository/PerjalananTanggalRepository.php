<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PerjalananTanggalModel;
use App\Entities\PerjalananTanggalEntities;
use App\Repository\Repository;
use CodeIgniter\I18n\Time;


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

    public function jumlahBulan() {
        $model = new PerjalananTanggalModel();
        $mydate = getdate(date("U"));

        return $model
            ->select("month(tgl_berangkat) as `bulan`")
            ->select("count(*) as `jumlah`")
            ->where("year(tgl_berangkat)", "$mydate[year]")
            ->groupBy("month(tgl_berangkat)")
            ->findAll();
    }

    public function jumlahBiaya() {
        return PerjalananTanggalRepository::generateBiaya(
            null,
            null,
            'month(tgl_berangkat)'
        );
    }

    public function perjalananAktif() {
        $model = new PerjalananTanggalModel();
        $mydate = getdate(date("U"));

        $jumlahaktif = $model
            ->where("tgl_berangkat", "$mydate[year]-$mydate[mon]-$mydate[mday]")
            ->findAll();

        return count($jumlahaktif);
    }

    public function perjalananBulan() {
        $model = new PerjalananTanggalModel();
        $mydate = getdate(date("U"));

        $jumlahaktif = $model
            ->where("month(tgl_berangkat)", "$mydate[mon]")
            ->where("year(tgl_berangkat)", "$mydate[year]")
            ->findAll();

        return count($jumlahaktif);
    }

    public function perjalananTahun() {
        $model = new PerjalananTanggalModel();
        $mydate = getdate(date("U"));

        $jumlahaktif = $model
            ->where("year(tgl_berangkat)", "$mydate[year]")
            ->findAll();

        return count($jumlahaktif);
    }

    public function biayaBulan() {
        $price = 0;
        $mydate = getdate(date("U"));

        $response = PerjalananTanggalRepository::generateBiaya(
            $mydate['mon'],
            $mydate['year'],
            null
        );

        if (count($response) > 0 && isset($response[0]['total_biaya'])) {
            $price = $response[0]['total_biaya'];
        }

        return PerjalananTanggalRepository::generateRupiah($price);
    }


    /**
     * Entry Data PerjalananTanggal
     * @param {array} $object - data array PerjalananTanggal
     * @return {boolean}
     */
    public function insert($object) {
        $item = new PerjalananTanggalEntities();
        $mydate = getdate(date("U"));

        $item->id_perjalanan = $object['id_perjalanan'];
        $item->tgl_sppd = "$mydate[year]-$mydate[mon]-$mydate[mday]";
        $item->tgl_berangkat = $object['tgl_berangkat'];
        $item->tgl_pulang = $object['tgl_pulang'];

        $model = new PerjalananTanggalModel();
        $model->insert($item);
    }

    /**
     * Update Data Pegawai
     * @param {integer} $id - nip
     * @param {array} $object - data array pegawai
     * @return {void}
     */
    public function update($id, $object) {
        $model = new PerjalananTanggalModel();

        if ($this->isExistTrip($id)) {
            $model->update($id, $object);
        }
    }

    /**
     * Delete Data PerjalananTanggal
     * @param {integer} $id - PerjalananTanggal id
     */
    public function delete($id) {
        $model = new PerjalananTanggalModel();
        $model->delete($id);
    }

    public static function generateBiaya($month, $year, $groupBy) {
        $price = 0;
        $db = Database::connect();

        $response = $db
            ->table('perjalanan_tanggal')
            ->select('month(perjalanan_tanggal.tgl_berangkat) as bulan')
            ->selectSum('perjalanan_biaya.total_biaya')
            ->join('perjalanan_biaya', 'perjalanan_tanggal.id_perjalanan = perjalanan_biaya.id_perjalanan');

        if (isset($month)) {
            $response = $response->where("month(perjalanan_tanggal.tgl_berangkat)", "$month");
        }

        if (isset($year)) {
            $response = $response->where("year(perjalanan_tanggal.tgl_berangkat)", "$year");
        }

        if (isset($groupBy)) {
            $response = $response->groupBy($groupBy);
        }

        $response = $response
            ->get()
            ->getResultArray();

        return $response;
    }

    /**
     * Generate Rupiah
     * @param {integer} $price - price data
     * @return {string}
     */
    public static function generateRupiah($price) {
        $respose = "Rp " . number_format($price,0,',','.');
        return $respose;

    }

}
