<?php
namespace App\Models;

use CodeIgniter\Model;

class PerjalananTanggalModel extends Model
{
    protected $table = 'perjalanan_tanggal';
    protected $returnType = '\App\Entities\PerjalananTanggalEntities';
    protected $allowedFields = ['id_perjalanan', 'tgl_sppd', 'tgl_berangkat', 'tgl_pulang'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
