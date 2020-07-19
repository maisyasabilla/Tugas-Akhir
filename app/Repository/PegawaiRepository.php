<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\PegawaiModel;
use App\Repository\Repository;
use App\Entities\PegawaiEntities;


class PegawaiRepository extends Repository
{
    /**
     * Cari Pegawai Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {PegawaiEntities[]}
     */
    public function find($limit, $offset) {
        $model = new PegawaiModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Pegawai Berdasarkan ID
     * @param {integer} $id - nip
     * @return {PegawaiEntities | null}
     */
    public function findById($id) {
        $model = new PegawaiModel();
        return $model->find($id);
    }

    /**
     * Entry Data Jabatan
     * @param {array} $object - data array jabatan
     * @return {void}
     */
    public function insert($object) {
        $item = new PegawaiEntities();
        $item->nip = $object['nip'];
        $item->nama = $object['nama'];
        $item->jabatan = $object['jabatan'];
        $item->golongan = $object['golongan'];
        // $item->foto = $object['foto']; // just in case we can uncomment this field

        $model = new PegawaiModel();

        if (!$this->isExistEmployee($id)) {
            $model->insert($item);
        }
    }

    /**
     * Update Data Pegawai
     * @param {integer} $id - nip
     * @param {array} $object - data array pegawai
     * @return {void}
     */
    public function update($id, $object) {
        $model = new PegawaiModel();

        if ($this->isExistEmployee($id)) {
            $model->update($id, $object);
        }
    }

    /**
     * Delete Data Pagawai
     * @param {integer} $id - nip
     */
    public function delete($id) {
        $model = new PegawaiModel();

        if ($this->isExistEmployee($id)) {
            $model->delete($id);
        }
    }

    /**
     * Is Exist Employee According NIP and Name
     * @param {id} $id - employee ID
     * @return {boolean}
     */
    public function isExistEmployee($id) {
        $model = new PegawaiModel();
        $employeeList = $model
            ->where('nip', $id)
            ->findAll();

        return count($employeeList) >= 1;
    }

    public function jumlah() {
        $model = new PegawaiModel();
        $jumlahKaryawan = $model
            ->findAll();

        return count($jumlahKaryawan);
    }

    /**
     * Find Employee Formatted
     * @return {mixed}
     */
    public function findEmployeeFormatted() {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'pegawai.nip' => 'pegawai_nip',
            'pegawai.nama' => 'pegawai_nama',
            'pegawai.jabatan' => 'pegawai_jabatan',
            'pegawai.golongan' => 'pegawai_golongan',
            'golongan.id_golongan' => 'golongan_id_golongan',
            'golongan.golongan' => 'golongan_golongan',
            'jabatan.id_jabatan' => 'jabatan_id_jabatan',
            'jabatan.jabatan' => 'jabatan_jabatan',
            'jabatan.jenjang_jabatan' => 'jabatan_jenjang_jabatan'
        ]);
        $response = $db
            ->table('pegawai')
            ->select($field)
            ->join('jabatan', 'jabatan.id_jabatan = pegawai.jabatan')
            ->join('golongan', 'golongan.id_golongan = pegawai.golongan')
            ->get()
            ->getResultArray();

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->nip = $value['pegawai_nip'];
                $result->nama = $value['pegawai_nama'];
                $result->jabatan = $value['pegawai_jabatan'];
                $result->golongan = $value['pegawai_golongan'];

                $golongan = new \stdClass();
                $golongan->id_golongan = $value['golongan_id_golongan'];
                $golongan->golongan = $value['golongan_golongan'];

                $jabatan = new \stdClass();
                $jabatan->id_jabatan = $value['jabatan_id_jabatan'];
                $jabatan->jabatan = $value['jabatan_jabatan'];
                $jabatan->jenjang_jabatan = $value['jabatan_jenjang_jabatan'];

                $result->golongan = $golongan;
                $result->jabatan = $jabatan;

                return $result;
            },
            $response
        );
    }

    /**
     * Find Employee Formatted
     * @return {mixed}
     */
    public function findPegawai($id) {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'pegawai.nip' => 'pegawai_nip',
            'pegawai.nama' => 'pegawai_nama',
            'pegawai.jabatan' => 'pegawai_jabatan',
            'jabatan.id_jabatan' => 'jabatan_id_jabatan',
            'jabatan.jabatan' => 'jabatan_jabatan',
            'jabatan.jenjang_jabatan' => 'jabatan_jenjang_jabatan',
            'jenjang_jabatan.jenjang_jabatan' => 'jenjang_jabatan',
            'jenjang_jabatan.golongan_perjalanan' => 'jenjang_golongan'
        ]);
        $response = $db
            ->table('pegawai')
            ->select($field)
            ->where('pegawai.nip', $id)
            ->join('jabatan', 'jabatan.id_jabatan = pegawai.jabatan')
            ->join('jenjang_jabatan', 'jenjang_jabatan.jenjang_jabatan = jabatan.jenjang_jabatan')
            ->get()
            ->getResultArray();  

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->nip = $value['pegawai_nip'];
                $result->nama = $value['pegawai_nama'];
                $result->jabatan = $value['pegawai_jabatan'];

                $jabatan = new \stdClass();
                $jabatan->id_jabatan = $value['jabatan_id_jabatan'];
                $jabatan->jabatan = $value['jabatan_jabatan'];
                $jabatan->jenjang_jabatan = $value['jabatan_jenjang_jabatan'];
                
                $jenjang_jabatan = new \stdClass();
                $jenjang_jabatan->jenjang_jabatan = $value['jenjang_jabatan'];
                $jenjang_jabatan->golongan_perjalanan = $value['jenjang_golongan'];

                $result->jabatan = $jabatan;
                $result->jenjang_jabatan = $jenjang_jabatan;

                return $result;
            },
            $response
        );
    }

    
}
