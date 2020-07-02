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
     * @return {boolean}
     */
    public function insert($object) {
        $item = new PegawaiEntities();
        $item->nip = $object['nip'];
        $item->nama = $object['nama'];
        $item->jabatan = $object['jabatan'];
        $item->golongan = $object['golongan'];
        $item->foto = $object['foto'];

        $model = new PegawaiModel();
        return $model->insert($item);
    }

    /**
     * Update Data Pegawai
     * @param {integer} $id - nip
     * @param {array} $object - data array pegawai
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new PegawaiModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Pagawai
     * @param {integer} $id - nip
     */
    public function delete($id) {
        $model = new PegawaiModel();
        $model->delete($id);
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
}
