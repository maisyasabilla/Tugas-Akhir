<?php
namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'golongan';
    protected $primaryKey = 'id_golongan';
    protected $returnType = '\App\Entities\Jabatan';

    protected $useSoftDeletes = true;
    protected $skipValidation = true;
}