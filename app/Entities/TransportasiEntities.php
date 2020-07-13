<?php
namespace App\Entities;

use CodeIgniter\Entity;

class TransportasiEntities extends Entity
{
    protected $attributes = [
        'id_transportasi' => null,
        'transportasi' => null,
    ];

    protected $casts = [
        'id_transportasi' => 'integer',
        'transportasi' => 'string',
    ];
}
