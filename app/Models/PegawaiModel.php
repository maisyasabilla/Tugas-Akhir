<?php
namespace App\Models;

use CodeIgniter\Model;

class JabatanModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    protected $returnType = '\App\Entities\Pegawai';

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
