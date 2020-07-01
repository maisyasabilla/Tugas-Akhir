<?php
namespace App\Repository;

abstract class Repository
{
    abstract public function find($limit, $offset);

    abstract public function findById($id);

    abstract public function insert($object);

    abstract public function update($id, $object);

    abstract public function delete($id);
}
