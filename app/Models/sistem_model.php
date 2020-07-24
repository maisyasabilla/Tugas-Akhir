<?php namespace App\Models;
use CodeIgniter\Model;
use CodeIgniter\Config\Config;

class Sistem_model extends Model
{
    protected $table = 'admin';

    public function getUsersToLogin($username, $password){
        $query = $this  ->where('username', $username)
                        ->where('password', $password)
                        ->first();
        return $query;
    }
    
}
