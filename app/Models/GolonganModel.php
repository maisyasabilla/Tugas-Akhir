<?php
namespace App\Models;

use CodeIgniter\Model;

class GolonganModel extends Model
{
    protected $table = 'golongan';
    protected $primaryKey = 'id_golongan';
    protected $returnType = '\App\Entities\Golongan';

    protected $useSoftDeletes = false;
    protected $skipValidation = true;

}
