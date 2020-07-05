<?php
namespace App\Entities;

use CodeIgniter\Entity;

class AkomodasiEntities extends Entity
{
    protected $attributes = [
        'id_akomodasi' => null,
        'golongan_perjalanan' => null,
        'kelas_penginapan' => null,
        'biaya' => null
    ];

    protected $casts = [
        'id_akomodasi' => 'integer',
        'golongan_perjalanan' => 'integer',
        'kelas_penginapan' => 'string',
        'biaya' => 'integer'
    ];
}
