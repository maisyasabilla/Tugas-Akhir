<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\UangModel;
use App\Entities\UangEntities;
use App\Repository\Repository;


class UangRepository extends Repository
{
    /**
     * Cari Uang Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {UangEntities[]}
     */
    public function find($limit, $offset) {
        $model = new UangModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Uang Berdasarkan ID
     * @param {integer} $id - Uang id
     * @return {UangEntities | null}
     */
    public function findById($id) {
        $model = new UangModel();
        return $model->find($id);
    }

    /**
     * Entry Data Uang
     * @param {array} $object - data array Uang
     * @return {boolean}
     */
    public function insert($object) {
        $item = new UangEntities();
        $item->golongan_perjalanan = $object['golongan_perjalanan'];
        $item->wilayah = $object['wilayah'];
        $item->biaya = $object['biaya'];

        $model = new UangModel();
        return $model->insert($item);
    }

    /**
     * Update Data Uang
     * @param {integer} $id - Uang id
     * @param {array} $object - data array Uang
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new UangModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Uang
     * @param {integer} $id - Uang id
     */
    public function delete($id) {
        $model = new UangModel();
        $model->delete($id);
    }

    public function findUangFormatted() {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'uang_harian.id_uang' => 'id_uang',
            'uang_harian.golongan_perjalanan' => 'uang_golongan',
            'uang_harian.wilayah' => 'uang_wilayah',
            'uang_harian.biaya' => 'biaya',
            'wilayah.id_wilayah' => 'id_wilayah',
            'wilayah.wilayah' => 'wilayah',
            'golongan_perjalanan.id_golongan_per' => 'id_golongan_per',
            'golongan_perjalanan.golongan_perjalanan' => 'golongan_perjalanan'
        ]);
        $response = $db
            ->table('uang_harian')
            ->select($field)
            ->join('wilayah', 'wilayah.id_wilayah = uang_harian.wilayah')
            ->join('golongan_perjalanan', 'golongan_perjalanan.id_golongan_per = uang_harian.golongan_perjalanan')
            ->get()
            ->getResultArray();

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->id_uang = $value['id_uang'];
                $result->wilayah = $value['uang_wilayah'];
                $result->golongan_perjalanan = $value['uang_golongan'];
                $result->biaya = $value['biaya'];

                $wilayah = new \stdClass();
                $wilayah->id_wilayah = $value['id_wilayah'];
                $wilayah->wilayah = $value['wilayah'];

                $golongan = new \stdClass();
                $golongan->id_golongan_per = $value['id_golongan_per'];
                $golongan->golongan_perjalanan = $value['golongan_perjalanan'];

                $result->wilayah = $wilayah;
                $result->golongan_perjalanan = $golongan;

                return $result;
            },
            $response
        );
    }
}
