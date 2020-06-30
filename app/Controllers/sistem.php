<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Transportasi_model;

class Sistem extends Controller
{
    /*public function index()
    {
        $model = new Transportasi_model();
        $data['transportasi'] = $model->getProduct();
        echo view('transportasi_view', $data);
    }

    public function add_new()
    {
        echo view('add_transportasi_view');
    }*/

    public function tambahkaryawan()
    {
        $model = new karyawan_model();
        $data = array(
            'karyawan'  => $this->request->getPost('nip'),
                        => $this->request->getPost('nama'),
                        => $this->request->getPost('golongan'),
                        => $this->request->getPost('jabatan'),
                        => $this->request->getPost('foto'),
        );
        $model->saveProduct($data);
        return redirect()->to('/data_karyawan');
    }

    /*public function edit($id)
    {
        $model = new Transportasi_model();
        $data['transportasi'] = $model->getProduct($id)->getRow();
        echo view('edit_transportasi_view', $data);
    }

    public function update()
    {
        $model = new Transportasi_model();
        $id = $this->request->getPost('transportasi_id');
        $data = array(
            'transportasi'  => $this->request->getPost('transportasi_name')
        );
        $model->updateProduct($data, $id);
        return redirect()->to('/transportasi');
    }

    public function delete($id)
    {
        $model = new Transportasi_model();
        $model->deleteProduct($id);
        return redirect()->to('/transportasi');
    }*/

}

?>