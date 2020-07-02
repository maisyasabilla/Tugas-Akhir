<?php
namespace App\Helpers;

use CodeIgniter\Model;

class ArrayHelper
{
    public static function objectToFieldQuery($object) {
        $dataAttributes = array_map(
            function($value, $key) {
                return $key . ' AS ' . $value;
            },
            array_values($object),
            array_keys($object)
        );

        return implode(', ', $dataAttributes);
    }

    public static function arrayKeyExist($object, $listKey) {
        $notExist = 0;

        foreach($listKey as $item) {
            if (!array_key_exists($item, $object)) {
                $notExist += 1;
            }
        }

        return $notExist == 0;
    }
}
