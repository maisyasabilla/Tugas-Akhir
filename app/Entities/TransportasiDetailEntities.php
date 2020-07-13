<?php
namespace App\Entities;

use CodeIgniter\Entity;

class TransportasiDetailEntities extends Entity
{
    protected $attributes = [
        'id_detail' => null,
        'id_transportasi' => null,
        'golongan_perjalanan' => null,
        'antar_provinsi' => null,
        'jenis_tiket' => null,
    ];

    protected $casts = [
        'id_detail' => 'integer',
        'id_transportasi' => 'integer',
        'golongan_perjalanan' => 'integer',
        'antar_provinsi' => 'string',
        'jenis_tiket' => 'string'
    ];
}
