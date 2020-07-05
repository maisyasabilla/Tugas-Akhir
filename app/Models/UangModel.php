<?php
namespace App\Models;

use CodeIgniter\Model;

class UangModel extends Model
{
    protected $table = 'uang_harian';
    protected $primaryKey = 'id_uang';
    protected $returnType = '\App\Entities\UangEntities';
    protected $allowedFields = ['golongan_perjalanan','wilayah','biaya'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
