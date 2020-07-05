<?php
namespace App\Models;

use CodeIgniter\Model;

class WilayahModel extends Model
{
    protected $table = 'wilayah';
    protected $primaryKey = 'id_wilayah';
    protected $returnType = '\App\Entities\WilayahEntities';
    protected $allowedFields = ['wilayah'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
