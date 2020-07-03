<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\JabatanModel;
use App\Entities\JabatanEntities;
use App\Repository\Repository;


class JabatanRepository extends Repository
{
    /**
     * Cari Jabatan Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {JabatanEntities[]}
     */
    public function find($limit, $offset) {
        $model = new JabatanModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Jabatan Berdasarkan ID
     * @param {integer} $id - jabatan id
     * @return {JabatanEntities | null}
     */
    public function findById($id) {
        $model = new JabatanModel();
        return $model->find($id);
    }

    /**
     * Entry Data Jabatan
     * @param {array} $object - data array jabatan
     * @return {boolean}
     */
    public function insert($object) {
        $item = new JabatanEntities();
        $item->jabatan = $object['jabatan'];
        $item->id_jabatan = $object['id_jabatan'];
        $item->jenjang_jabatan = $object['jenjang_jabatan'];

        $model = new JabatanModel();
        return $model->insert($item);
    }

    /**
     * Update Data Jabatan
     * @param {integer} $id - jabatan id
     * @param {array} $object - data array jabatan
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new JabatanModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Jabatan
     * @param {integer} $id - jabatan id
     */
    public function delete($id) {
        $model = new JabatanModel();
        $model->delete($id);
    }

    public function findJabatanFormatted() {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'jabatan.id_jabatan' => 'jabatan_id',
            'jabatan.jabatan' => 'jabatan',
            'jabatan.jenjang_jabatan' => 'jabatan_jenjang',
            'jenjang_jabatan.jenjang_jabatan' => 'jenjang',
            'jenjang_jabatan.golongan_perjalanan' => 'jenjang_golongan',
            'golongan_perjalanan.id_golongan_per' => 'golongan_id',
            'golongan_perjalanan.golongan_perjalanan' => 'golongan_perjalanan',
        ]);
        $response = $db
            ->table('jabatan')
            ->select($field)
            ->join('jenjang_jabatan', 'jenjang_jabatan.jenjang_jabatan = jabatan.jenjang_jabatan')
            ->join('golongan_perjalanan', 'golongan_perjalanan.id_golongan_per = jenjang_jabatan.golongan_perjalanan')
            ->get()
            ->getResultArray();

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->id_jabatan = $value['jabatan_id'];
                $result->jabatan = $value['jabatan'];
                $result->jenjang_jabatan = $value['jenjang'];
               
                $jenjang = new \stdClass();
                $jenjang->jenjang_jabatan = $value['jenjang'];
                $jenjang->golongan_perjalanan = $value['jenjang_golongan'];

                $golongan = new \stdClass();
                $golongan->id_golongan_per = $value['golongan_id'];
                $golongan->golongan_perjalanan = $value['golongan_perjalanan'];

                $result->jenjang_jabatan = $jenjang;
                $result->golongan_perjalanan = $golongan;

                return $result;
            },
            $response
        );
    }
}
