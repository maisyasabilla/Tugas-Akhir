<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
/*use App\Models\perjalanan_dinas_model;*/

class Perjalanan_Dinas extends Controller
{
    public function index()
    {
        $data = [];
		helper(['form']);
 
		if ($this->request->getMethod() == 'post') {
			//let's do the validation here
			$rules = [
				'username' => 'required|min_length[6]|max_length[30]',
				'password' => 'required|validateUser[username,password]',
			];

			$errors = [
				'password' => [
					'validateUser' => 'Email or Password don\'t match'
				]
			];

			if (! $this->validate($rules, $errors)) {
				$data['validation'] = $this->validator;
			}else{
				$model = new UserModel();

				$user = $model->where('username', $this->request->getVar('username'))
											->first();
				print_r($user);die;

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to(base_url('/perjalanan_dinas/dashboard'));

			}
		}

        echo view ('index');
    }

    private function setUserSession($user){
		$data = [
			'username' => $user['username'],
			'password' => $user['password'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
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
        echo view (base_url('dashboard'));
    }
}

?>