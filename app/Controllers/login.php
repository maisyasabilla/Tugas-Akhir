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
			return redirect()->to(base_url('/perjalanan_dinas/dashboard'));
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