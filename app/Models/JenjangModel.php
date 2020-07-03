<?php
namespace App\Models;

use CodeIgniter\Model;

class JenjangModel extends Model
{
    protected $table = 'jenjang_jabatan';
    protected $primaryKey = 'jenjang_jabatan';
    protected $returnType = '\App\Entities\JenjangEntities';
    protected $allowedFields = ['jenjang_jabatan', 'golongan_perjalanan'];

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
