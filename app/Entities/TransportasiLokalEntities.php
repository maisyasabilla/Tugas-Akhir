<?php
namespace App\Entities;

use CodeIgniter\Entity;

class TransportasiLokalEntities extends Entity
{
    protected $attributes = [
        'id_lokal' => null,
        'wilayah' => null,
        'biaya' => null
    ];

    protected $casts = [
        'id_lokal' => 'integer',
        'wilayah' => 'integer',
        'biaya' => 'integer'
    ];
}
