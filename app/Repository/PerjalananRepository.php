<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PerjalananModel;
use App\Repository\Repository;
use App\Entities\PerjalananEntities;
use CodeIgniter\I18n\Time;


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
        $model->insert($item);
    }

    public function perjalananAktif() {
        $time = Time::parse('now', 'Asia/Singapore', 'en_US');
        $model = new PerjalananModel();
        $jumlahaktif = $model
            ->findAll();

        return count($jumlahaktif);
    }

    /**
     * Update Data Pegawai
     * @param {integer} $id - nip
     * @param {array} $object - data array pegawai
     * @return {void}
     */
    public function update($id, $object) {
        $model = new PerjalananModel();

        if ($this->isExistTrip($id)) {
            $model->update($id, $object);
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

    /**
     * Find Employee Formatted
     * @return {mixed}
     */
    public function findPerjalananFormatted() {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'perjalanan.id_perjalanan' => 'id_perjalanan',
            'perjalanan.nip' => 'perjalanan_nip',
            'perjalanan.alat_angkut' => 'alat_angkut',
            'perjalanan.tujuan' => 'tujuan',
            'perjalanan.komando' => 'komando',
            'perjalanan.keterangan' => 'keterangan',
            'perjalanan_tanggal.id_perjalanan'=> 'tanggal_id',
            'perjalanan_tanggal.tgl_sppd'=> 'tanggal_sppd',
            'perjalanan_tanggal.tgl_berangkat'=> 'tanggal_berangkat',
            'perjalanan_tanggal.tgl_pulang'=> 'tanggal_pulang',
            'pegawai.nip' => 'pegawai_nip',
            'pegawai.nama' => 'pegawai_nama',
            'pegawai.jabatan' => 'pegawai_jabatan',
            'jabatan.id_jabatan' => 'id_jabatan',
            'jabatan.jabatan' => 'jabatan',
        ]);
        $response = $db
            ->table('perjalanan')
            ->select($field)
            ->join('perjalanan_tanggal', 'perjalanan_tanggal.id_perjalanan = perjalanan.id_perjalanan')
            ->join('pegawai', 'pegawai.nip = perjalanan.nip')
            ->join('jabatan', 'jabatan.id_jabatan = pegawai.jabatan')
            ->get()
            ->getResultArray();

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->id_perjalanan = $value['id_perjalanan'];
                $result->nip = $value['perjalanan_nip'];
                $result->alat_angkut = $value['alat_angkut'];
                $result->tujuan = $value['tujuan'];
                $result->komando = $value['komando'];
                $result->keterangan = $value['keterangan'];

                $perjalanan_tanggal = new \stdClass();
                $perjalanan_tanggal->id_perjalanan = $value['tanggal_id'];
                $perjalanan_tanggal->tgl_sppd = $value['tanggal_sppd'];
                $perjalanan_tanggal->tgl_berangkat = $value['tanggal_berangkat'];
                $perjalanan_tanggal->tgl_pulang = $value['tanggal_pulang'];
            
                $pegawai = new \stdClass();
                $pegawai->nip = $value['pegawai_nip'];
                $pegawai->nama = $value['pegawai_nama'];
                $pegawai->jabatan = $value['pegawai_jabatan'];

                $jabatan = new \stdClass();
                $jabatan->id_jabatan = $value['id_jabatan'];
                $jabatan->jabatan = $value['jabatan'];
                
                $result->perjalanan_tanggal = $perjalanan_tanggal;
                $result->pegawai = $pegawai;
                $result->jabatan = $jabatan;

                return $result;
            },
            $response
        );
    }
}
