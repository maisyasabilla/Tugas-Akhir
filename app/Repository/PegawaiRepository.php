<?php
namespace App\Repository;

use Config\Database;
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
        $field = [
            'pegawai.nip' => 'pegawai_nip',
            'pegawai.nama' => 'pegawai_nama',
            'pegawai.jabatan' => 'pegawai_jabatan',
            'pegawai.golongan' => 'pegawai_golongan',
        ];

        return $db
            ->table('pegawai')
            ->select(["pegawai.nama as pegawai_nama", "pegawai.nama as pegawais_nama"])
            ->join('jabatan', 'jabatan.id_jabatan = pegawai.jabatan')
            ->join('golongan', 'golongan.id_golongan = pegawai.golongan')
            ->get();
    }
}
