<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\AkomodasiModel;
use App\Entities\AkomodasiEntities;
use App\Repository\Repository;


class AkomodasiRepository extends Repository
{
    /**
     * Cari Akomodasi Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {AkomodasiEntities[]}
     */
    public function find($limit, $offset) {
        $model = new AkomodasiModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Akomodasi Berdasarkan ID
     * @param {integer} $id - Akomodasi id
     * @return {AkomodasiEntities | null}
     */
    public function findById($id) {
        $model = new AkomodasiModel();
        return $model->find($id);
    }

    /**
     * Entry Data Akomodasi
     * @param {array} $object - data array Akomodasi
     * @return {boolean}
     */
    public function insert($object) {
        $item = new AkomodasiEntities();
        $item->golongan_perjalanan = $object['golongan_perjalanan'];
        $item->kelas_penginapan = $object['kelas_penginapan'];
        $item->biaya = $object['biaya'];

        $model = new AkomodasiModel();
        return $model->insert($item);
    }

    /**
     * Update Data Akomodasi
     * @param {integer} $id - Akomodasi id
     * @param {array} $object - data array Akomodasi
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new AkomodasiModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data Akomodasi
     * @param {integer} $id - Akomodasi id
     */
    public function delete($id) {
        $model = new AkomodasiModel();
        $model->delete($id);
    }

    public function findAkomodasiFormatted() {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'akomodasi.id_akomodasi' => 'id_akomodasi',
            'akomodasi.golongan_perjalanan' => 'akomodasi_golongan',
            'akomodasi.kelas_penginapan' => 'kelas_penginapan',
            'akomodasi.biaya' => 'biaya',
            'golongan_perjalanan.id_golongan_per' => 'id_golongan_per',
            'golongan_perjalanan.golongan_perjalanan' => 'golongan_perjalanan'
        ]);
        $response = $db
            ->table('akomodasi')
            ->select($field)
            ->join('golongan_perjalanan', 'golongan_perjalanan.id_golongan_per = akomodasi.golongan_perjalanan')
            ->get()
            ->getResultArray();

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->id_akomodasi = $value['id_akomodasi'];
                $result->golongan_perjalanan = $value['akomodasi_golongan'];
                $result->kelas_penginapan = $value['kelas_penginapan'];
                $result->biaya = $value['biaya'];

                $golongan = new \stdClass();
                $golongan->id_golongan_per = $value['id_golongan'];
                $golongan->golongan_perjalanan = $value['golongan_perjalanan'];

                $result->golongan_perjalanan = $golongan;

                return $result;
            },
            $response
        );
    }
}
