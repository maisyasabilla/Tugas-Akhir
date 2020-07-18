<?php
namespace App\Repository;

use Config\Database;
use App\Helpers\ArrayHelper;
use App\Models\TransportasiLokalModel;
use App\Entities\TransportasiLokalEntities;
use App\Repository\Repository;


class TransportasiLokalRepository extends Repository
{
    /**
     * Cari Transportasi Lokal Berdasarkan Limit & Offset
     * @param {integer} $limit - limit pengambilan data
     * @param {integer} $offset - jumlah maksimal pengambilan data
     * @return {TransportasiLokalEntities[]}
     */
    public function find($limit, $offset) {
        $model = new TransportasiLokalModel();
        return $model->findAll($limit, $offset);
    }

    /**
     * Cari Transportasi Lokal Berdasarkan ID
     * @param {integer} $id - id lokal
     * @return {TransportasiLokalEntities | null}
     */
    public function findById($id) {
        $model = new TransportasiLokalModel();
        return $model->find($id);
    }

    public function findWilayah($id) {
        $model = new TransportasiLokalModel();
        return 
        $lokalList = $model
            ->where('wilayah_tujuan', $id)
            ->findAll();
    }

    /**
     * Entry Data TransportasiLokal
     * @param {array} $object - data array TransportasiLokal
     * @return {boolean}
     */
    public function insert($object) {
        $item = new TransportasiLokalEntities();
        $item->wilayah = $object['wilayah'];
        $item->biaya = $object['biaya'];

        $model = new TransportasiLokalModel();
        return $model->insert($item);
    }

    /**
     * Update Data TransportasiLokal
     * @param {integer} $id - id lokal
     * @param {array} $object - data array TransportasiLokal
     * @return {boolean}
     */
    public function update($id, $object) {
        $model = new TransportasiLokalModel();
        return $model->update($id, $object);
    }

    /**
     * Delete Data TransportasiLokal
     * @param {integer} $id - TransportasiLokal id
     */
    public function delete($id) {
        $model = new TransportasiLokalModel();
        $model->delete($id);
    }

    public function findTransportasiFormatted() {
        $db = Database::connect();
        $field = ArrayHelper::objectToFieldQuery([
            'transportasi_lokal.id_lokal' => 'id_lokal',
            'transportasi_lokal.wilayah' => 'lokal_wilayah',
            'transportasi_lokal.biaya' => 'biaya',
            'wilayah.id_wilayah' => 'id_wilayah',
            'wilayah.wilayah' => 'wilayah'
        ]);
        $response = $db
            ->table('transportasi_lokal')
            ->select($field)
            ->join('wilayah', 'wilayah.id_wilayah = transportasi_lokal.wilayah')
            ->get()
            ->getResultArray();

        return array_map(
            function($value) {
                $result = new \stdClass();
                $result->id_lokal = $value['id_lokal'];
                $result->wilayah = $value['wilayah'];
                $result->biaya = $value['biaya'];

                $wilayah = new \stdClass();
                $wilayah->id_wilayah = $value['id_wilayah'];
                $wilayah->wilayah = $value['wilayah'];

                $result->wilayah = $wilayah;

                return $result;
            },
            $response
        );
    }
}
