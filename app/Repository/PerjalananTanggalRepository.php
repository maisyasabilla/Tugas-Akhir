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

    public function perjalananAktif() {   
        $model = new PerjalananTanggalModel();
        $mydate = getdate(date("U"));

        $jumlahaktif = $model
            ->where('tgl_berangkat', '$mydate[year]-$mydate[mon]-$mydate[mday]')
            ->findAll();

        return count($jumlahaktif);
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

    public function perjalananBulan() {
        $model = new PerjalananTanggalModel();
        $jumlahBulan = $model
            ->findAll();

        return count($jumlahBulan);
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

}
