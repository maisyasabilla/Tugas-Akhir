<?php
namespace App\Entities;

use CodeIgniter\Entity;

class GolonganEntities extends Entity
{
    protected $attributes = [
        'id_golongan' => null,
        'golongan' => null
    ];

    protected $casts = [
        'id_golongan' => 'string',
        'golongan' => '?string'
    ];
}
