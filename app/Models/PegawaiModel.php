<?php
namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'nip';
    protected $returnType = '\App\Entities\PegawaiEntities';

    protected $useSoftDeletes = false;
    protected $skipValidation = true;
}
