<?php
namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'jabatan';
    protected $primaryKey = 'id_jabatan';
    protected $returnType = '\App\Entities\JabatanEntities';
    protected $allowedFields = ['jabatan', 'jenjang_jabatan'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
