<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\PegawaiRepository;

class PegawaiControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
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

    public function edit()
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

    public function hapus($id)
    {
        $pegawaiRepo = new PegawaiRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $pegawaiRepo->delete($id);
        }

        return redirect()->to(base_url('/perjalanan_dinas/data_karyawan'));
    }
}

?>
