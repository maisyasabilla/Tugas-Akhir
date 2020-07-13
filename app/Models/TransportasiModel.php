<?php
namespace App\Models;

use CodeIgniter\Model;

class TransportasiModel extends Model
{
    protected $table = 'transportasi';
    protected $primaryKey = 'id_transportasi';
    protected $returnType = '\App\Entities\TransportasiEntities';
    protected $allowedFields = ['id_transportasi', 'transportasi'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
