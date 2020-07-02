<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Models\Transportasi_model;
use App\Repository\PegawaiRepository;

class Sistem extends Controller
{
    public function __construct() {
        $session = session();
    }
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
        $pegawaiRepo = new PegawaiRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'nip',
                    'nama',
                    'jabatan',
                    'golongan'
                ]
            );

            if ($isExist) {
                $pegawaiRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/perjalanan_dinas/data_karyawan'));
            }
        }

        return redirect()->to(base_url('/perjalanan_dinas/tambah_karyawan'));
    }

    public function editkaryawan()
    {
        $pegawaiRepo = new PegawaiRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'nip',
                    'nama',
                    'jabatan',
                    'golongan'
                ]
            );

            if ($isExist) {
                $pegawaiRepo->update(
                    $this->request->getPost('nip'),
                    [
                        'nama' => $this->request->getPost('nama'),
                        'jabatan' => $this->request->getPost('jabatan'),
                        'golongan' => $this->request->getPost('golongan')
                    ]
                );
            }
        }

        return redirect()->to(base_url('/perjalanan_dinas/data_karyawan'));
    }

    public function hapuskaryawan($id)
    {
        $pegawaiRepo = new PegawaiRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $pegawaiRepo->delete($id);
        }

        return redirect()->to(base_url('/perjalanan_dinas/data_karyawan'));
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
