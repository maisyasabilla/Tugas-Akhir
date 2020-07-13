<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\TransportasiDetailModel;
use App\Entities\TransportasiDetailEntities;
use App\Repository\Repository;


class TransportasiDetailRepository extends Repository
{
    /**
     * Cari TransportasiDetail Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {TransportasiDetailEntities[]}
     */
    public function find($limit, $offset) {
        $model = new TransportasiDetailModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari TransportasiDetail Berdasarkan ID
     * @param {integer} $id - TransportasiDetail id
     * @return {TransportasiDetailEntities | null}
     */
    public function findById($id) {
        $model = new TransportasiDetailModel();
        return $model->find($id);
    }

    /**
     * Entry Data TransportasiDetail
     * @param {array} $object - data array TransportasiDetail
     * @return {boolean}
     */
    public function insert($object) {
        $item = new TransportasiDetailEntities();
        $item->id_transportasi = $object['id_transportasi'];
        $item->golongan_perjalanan = $object['golongan_perjalanan'];
        $item->antar_provinsi = $object['antar_provinsi'];
        $item->jenis_tiket = $object['jenis_tiket'];

        $model = new TransportasiDetailModel();
        return $model->insert($item);
    }

    /**
     * Update Data TransportasiDetail
     * @param {integer} $id - TransportasiDetail id
     * @param {array} $object - data array TransportasiDetail
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new TransportasiDetailModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data TransportasiDetail
     * @param {integer} $id - TransportasiDetail id
     */
    public function delete($id) {
        $model = new TransportasiDetailModel();
        $model->delete($id);
    }

    public function findTransportasiDetailFormatted() {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'transportasi_detail.id_detail' => 'id_detail',
            'transportasi_detail.id_transportasi' => 'id_transportasi',
            'transportasi_detail.golongan_perjalanan' => 'detail_golongan',
            'transportasi_detail.antar_provinsi' => 'antar_provinsi',
            'transportasi_detail.jenis_tiket' => 'jenis_tiket',
            'transportasi.id_transportasi' => 'id_transportasi_',
            'transportasi.transportasi' => 'transportasi',
            'golongan_perjalanan.id_golongan_per' => 'id_golongan_per',
            'golongan_perjalanan.golongan_perjalanan' => 'golongan_perjalanan'
        ]);
        $response = $db
            ->table('transportasi_detail')
            ->select($field)
            ->join('transportasi', 'transportasi.id_transportasi = transportasi_detail.id_transportasi')
            ->join('golongan_perjalanan', 'golongan_perjalanan.id_golongan_per = transportasi_detail.golongan_perjalanan')
            ->get()
            ->getResultArray();

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->id_detail = $value['id_detail'];
                $result->id_transportasi = $value['id_transportasi'];
                $result->golongan_perjalanan = $value['detail_golongan'];
                $result->antar_provinsi = $value['antar_provinsi'];
                $result->jenis_tiket = $value['jenis_tiket'];

                $transportasi = new \stdClass();
                $transportasi->id_transportasi = $value['id_transportasi'];
                $transportasi->transportasi = $value['transportasi'];

                $golongan = new \stdClass();
                $golongan->id_golongan_per = $value['id_golongan'];
                $golongan->golongan_perjalanan = $value['golongan_perjalanan'];

                $result->transportasi = $transportasi;
                $result->golongan_perjalanan = $golongan;

                return $result;
            },
            $response
        );
    }
}
