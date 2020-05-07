<?php namespace App\Models;
use CodeIgniter\Model;

class Transportasi_model extends Model
{
        protected $table = 'transportasi';

        public function getProduct($id = false)
        {
                if($id == false){
                        return $this->findAll();
                }else{
                        return $this->getWhere(['id_transportasi' => $id]);
                }
        }

        public function saveProduct($data)
        {
                $query = $this->db->table($this->table)->insert($data);
                return $query;
        }

        public function updateProduct($data, $id)
        {
                $query = $this->db->table($this->table)->update($data, array('id_transportasi' => $id));
                return $query;
        }

        public function deleteProduct($id)
        {
                $query = $this->db->table($this->table)->delete(array('id_transportasi' => $id));
                return $query;
        } 
}

?>