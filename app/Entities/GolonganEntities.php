<?php
namespace App\Entities;

use App\Entities\Entities;

class GolonganEntities extends Entities
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