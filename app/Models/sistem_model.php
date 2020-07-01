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

    public function SelectData($tablename='',$where=''){
        $res = $this->db->query("Select * from ".$tablename." ".$where);
        return $res->row_array();
    }

    public function SelectDataFor($tablename='',$where=''){
        $res = $this->db->query("Select * from ".$tablename." ".$where);
        return $res->result_array();
    }

    public function JumlahPerjalanan(){

    }
    /*public function JumlahData($tablename='',$where=''){
        $res = $this->db->query("Select * from ".$tablename." ".$where);
        return $res->numRows;
    }

    public function JumlahData(){
        $query = $this  -select();
        return $res->numRows;
    }*/

    public function UpdateData($tabelName, $data, $where){
        $res = $this->db->update($tabelName, $data, $where);
        return $res;
    }

    public function InsertData($tabelName, $data){
        $res = $this->db->insert($tabelName, $data);
        return $res;
    }

    public function DeleteData($tabelName, $data){
        $res = $this->db->delete($tabelName, $data);
        return $res;
    }

}
