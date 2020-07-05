<?php
namespace App\Entities;

use CodeIgniter\Entity;

class WilayahEntities extends Entity
{
    protected $attributes = [
        'id_wilayah' => null,
        'wilayah' => null,
    ];

    protected $casts = [
        'id_wilayah' => 'integer',
        'wilayah' => 'string',
    ];
}
