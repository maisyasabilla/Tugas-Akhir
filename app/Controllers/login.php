<?php namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Config\Config;
use App\Models\UserModel;
use App\Models\sistem_model;

class Login extends BaseController
{
    public function actionlogin()
    {
        $session = session();
        $sistem_model = new sistem_model();
        $username = $this->request->getPost('username');
        $password = md5($this->request->getPost('password'));

        $data = $sistem_model->getUsersToLogin($username, $password);
        if (!empty($data)) {
            $session->set('username', $username);
            return redirect()->to(base_url('/perjalanan_dinas'));
        } else{
            $session->setFlashdata('gagal','Login gagal, silahkan isi data dengan benar.');
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function logout(){
        $session = session();
        $session->remove('username');
        return redirect()->to(base_url('/perjalanan_dinas'));
    }

}