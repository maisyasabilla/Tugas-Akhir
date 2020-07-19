<?php
namespace App\Models;

use CodeIgniter\Model;

class PerjalananBiayaModel extends Model
{
    protected $table = 'perjalanan_biaya';
    protected $primaryKey = 'id_perjalanan';
    protected $returnType = '\App\Entities\PerjalananBiayaEntities';
    protected $allowedFields = ['id_perjalanan', 'uang_harian', 'transportasi', 'akomodasi', 'transportasi_lokal', 'biaya_transportasi'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
