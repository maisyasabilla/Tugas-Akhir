<?php
namespace App\Entities;

use CodeIgniter\Entity;

class UangEntities extends Entity
{
    protected $attributes = [
        'id_uang' => null,
        'golongan_perjalanan' => null,
        'wilayah' => null,
        'biaya' => null
    ];

    protected $casts = [
        'id_uang' => 'integer',
        'golongan_perjalanan' => 'integer',
        'wilayah' => 'integer',
        'biaya' => 'integer'
    ];
}
