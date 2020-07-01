<?php
namespace App\Entities;

use CodeIgniter\Entity;

class PegawaiEntities extends Entity
{
    protected $attributes = [
        'nip' => null,
        'nama' => null,
        'jabatan' => null,
        'golongan' => null,
        'foto' => null
    ];

    protected $casts = [
        'nip' => 'string',
        'nama' => '?string',
        'jabatan' => 'integer',
        'golongan' => 'string',
        'foto' => '?string',
    ];
}