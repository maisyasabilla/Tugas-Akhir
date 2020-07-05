<?php
namespace App\Models;

use CodeIgniter\Model;

class AkomodasiModel extends Model
{
    protected $table = 'akomodasi';
    protected $primaryKey = 'id_akomodasi';
    protected $returnType = '\App\Entities\AkomodasiEntities';
    protected $allowedFields = ['id_akomodasi','golongan_perjalanan', 'kelas_penginapan', 'biaya'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
