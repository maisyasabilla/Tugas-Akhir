<?php
namespace App\Entities;

use CodeIgniter\Entity;

class PerjalananBiayaEntities extends Entity
{
    protected $attributes = [
        'id_perjalanan' => null,
        'uang_harian' => null,
        'transportasi' => null,
        'akomodasi' => null,
        'transportasi_lokal' => null,
        'biaya_transportasi' => null,
    ];

    protected $casts = [
        'id_perjalanan' => 'integer',
        'uang_harian' => 'integer',
        'transportasi' => 'integer',
        'akomodasi' => 'integer',
        'transportasi_lokal' => 'integer',
        'biaya_transportasi' => 'integer',
    ];
}
