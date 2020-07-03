<?php
namespace App\Models;

use CodeIgniter\Model;

class GolonganPerjalananModel extends Model
{
    protected $table = 'golongan_perjalanan';
    protected $primaryKey = 'id_golongan_per';
    protected $returnType = '\App\Entities\GolonganPerjalananEntities';
    protected $allowedFields = ['golongan_perjalanan'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;

}
