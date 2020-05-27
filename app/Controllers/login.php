<?php namespace App\Controllers;

use CodeIgniter\Controller;

use App\Models\UserModel;


class Users extends BaseController
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

				$this->setUserSession($user);
				//$session->setFlashdata('success', 'Successful Registration');
				return redirect()->to('dashboard');

			}
		}

	}

	private function setUserSession($user){
		$data = [
			'id' => $user['id'],
			'firstname' => $user['firstname'],
			'lastname' => $user['lastname'],
			'email' => $user['email'],
			'isLoggedIn' => true,
		];

		session()->set($data);
		return true;
	}

	public function register(){
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
	}
	/*public function actionloginadmin(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$data = $this->user_model->getAdminToLogin($username, md5($password));
		if (!empty($data)) {
			$this->session->set_userdata('dataadmin',$data['id_admin']);
			redirect('../admin/main');
		} else{
			$this->session->set_flashdata('gagal','Login gagal, silahkan isi data dengan benar.');
			redirect('../sandbox/loginadmin');
		}

	}

	public function logout(){
		$this->session->unset_userdata('datauser');
		$this->session->unset_userdata('datamerchant');
		$this->session->unset_userdata('datalevel');
		$this->session->sess_destroy();
		redirect(base_url()."sandbox");
	}*/
}