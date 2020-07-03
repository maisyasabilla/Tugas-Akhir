<?php
namespace App\Entities;

use CodeIgniter\Entity;

class GolonganPerjalananEntities extends Entity
{
    protected $attributes = [
        'id_golongan_per' => null,
        'golongan_perjalanan' => null,
    ];

    protected $casts = [
        'id_golongan_per' => 'integer',
        'golongan_perjalanan' => 'string',
    ];
}