<?php
namespace App\Entities;

use CodeIgniter\Entity;

class JabatanEntities extends Entity
{
    protected $attributes = [
        'id_jabatan' => null,
        'jabatan' => null,
        'jenjang_jabatan' => null
    ];

    protected $casts = [
        'id_jabatan' => 'integer',
        'jabatan' => 'string',
        'jenjang_jabatan' => '?string'
    ];
}