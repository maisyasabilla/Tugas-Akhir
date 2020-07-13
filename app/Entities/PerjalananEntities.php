<?php
namespace App\Entities;

use CodeIgniter\Entity;

class PerjalananEntities extends Entity
{
    protected $attributes = [
        'id_perjalanan' => null,
        'nip' => null,
        'alat_angkut' => null,
        'wilayah_asal' => null,
        'wilayah_tujuan' => null,
        'tujuan' => null,
        'komando' => null,
        'keterangan' => null,
    ];

    protected $casts = [
        'id_perjalanan' => 'integer',
        'nip' => 'string',
        'alat_angkut' => 'string',
        'wilayah_asal' => 'integer',
        'wilayah_tujuan' => 'integer',
        'tujuan' => 'string',
        'komando' => 'string',
        'keterangan' => '?string',
    ];
}
