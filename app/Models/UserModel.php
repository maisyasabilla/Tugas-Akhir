<?php namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model{
  protected $table = 'admin';
  protected $allowedFields = ['username', 'password'];

  protected function md5(array $data){
    if(isset($data['data']['password']))
      $data['data']['password'] = md5($data['data']['password'], PASSWORD_DEFAULT);

    return $data;
  }
}