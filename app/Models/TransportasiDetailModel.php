<?php
namespace App\Models;

use CodeIgniter\Model;

class TransportasiDetailModel extends Model
{
    protected $table = 'transportasi_detail';
    protected $primaryKey = 'id_detail';
    protected $returnType = '\App\Entities\TransportasiDetailEntities';
    protected $allowedFields = ['id_detail','id_transportasi', 'golongan_perjalanan', 'antar_provinsi', 'jenis_tiket'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
