<?php
namespace App\Models;

use CodeIgniter\Model;

class PerjalananModel extends Model
{
    protected $table = 'perjalanan';
    protected $primaryKey = 'id_perjalanan';
    protected $returnType = '\App\Entities\PerjalananEntities';
    protected $allowedFields = ['id_perjalanan', 'nip', 'alat_angkut', 'wilayah_asal', 'wilayah_tujuan', 'tujuan', 'komando', 'keterangan'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
