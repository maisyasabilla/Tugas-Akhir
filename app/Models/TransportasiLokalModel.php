<?php
namespace App\Models;

use CodeIgniter\Model;

class TransportasiLokalModel extends Model
{
    protected $table = 'transportasi_lokal';
    protected $primaryKey = 'id_lokal';
    protected $returnType = '\App\Entities\TransportasiLokalEntities';
    protected $allowedFields = ['id_lokal', 'wilayah', 'biaya'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
