<?php
namespace App\Entities;

use CodeIgniter\Entity;

class PerjalananTanggalEntities extends Entity
{
    protected $attributes = [
        'id_perjalanan' => null,
        'tgl_sppd' => null,
        'tgl_berangkat' => null,
        'tgl_pulang' => null
    ];

    protected $casts = [
        'id_perjalanan' => 'integer',
        'tgl_sppd' => 'date',
        'tgl_berangkat' => 'date',
        'tgl_pulang' => 'date'
    ];
}
