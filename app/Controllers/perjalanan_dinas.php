<?php namespace App\Controllers;

use App\Models\Page;
use CodeIgniter\Controller;
use App\Models\Sistem_model;
use App\Repository\JabatanRepository;

/*use App\Models\perjalanan_dinas_model;*/

class Perjalanan_Dinas extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function index()
    {
        if(isset($_SESSION['username'])){ 
            echo view ('layout/header');
            echo view ('karyawan/data_karyawan');
            echo view ('layout/footer');
        } else{
            echo view ('login');
        }
    }
    
    /*public function register(){
        $data = [];
        helper(['form']);

        if ($this->request->getMethod() == 'post') {
            //let's do the validation here
            $rules = [
                'firstname' => 'required|min_length[3]|max_length[20]',
                'lastname' => 'required|min_length[3]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email|is_unique[users.email]',
                'password' => 'required|min_length[8]|max_length[255]',
                'password_confirm' => 'matches[password]',
            ];

            if (! $this->validate($rules)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new UserModel();

                $newData = [
                    'firstname' => $this->request->getVar('firstname'),
                    'lastname' => $this->request->getVar('lastname'),
                    'email' => $this->request->getVar('email'),
                    'password' => $this->request->getVar('password'),
                ];
                $model->save($newData);
                $session = session();
                $session->setFlashdata('success', 'Successful Registration');
                return redirect()->to('/');

            }
        }


        echo view('templates/header', $data);
        echo view('register');
        echo view('templates/footer');
    }*/

    public function dashboard()
    {
        if(isset($_SESSION['username'])){
            //$this->selectCount('perjalanan');
            //$res = $this->query("Select * from perjalanan");
            //return $res->num_rows();
            echo view ('layout/header');
            echo view ('home');
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function data_karyawan()
    {
        if(isset($_SESSION['username'])){ 
            echo view ('layout/header');
            echo view ('karyawan/data_karyawan');
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }
    
    public function edit_karyawan()
    {
        $session = session();
        if(isset($_SESSION['username'])){ 
            echo view ('layout/header');
            echo view ('karyawan/edit_karyawan');
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('data_karyawan');
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function tambah_karyawan()
    {
        $jabatanRepo = new JabatanRepository();

        $param = [
            'jabatan' => $jabatanRepo->find(0, 0)
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('karyawan/tambah_karyawan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }
}

?>
