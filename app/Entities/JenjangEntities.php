<?php
namespace App\Entities;

use CodeIgniter\Entity;

class JenjangEntities extends Entity
{
    protected $attributes = [
        'jenjang_jabatan' => null,
        'golongan_perjalanan' => null,
    ];

    protected $casts = [
        'jenjang_jabatan' => 'string',
        'golongan_perjalanan' => 'integer',
    ];
}
