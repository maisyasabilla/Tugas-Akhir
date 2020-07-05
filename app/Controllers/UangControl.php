<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\UangRepository;

class UangControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $uangRepo = new UangRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'uang',
                    'golongan_perjalanan',
                    'wilayah',
                    'biaya'
                ]
            );

            if ($isExist) {
                $uangRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/pengaturan/uang_harian'));
            }
        }

        return redirect()->to(base_url('/pengaturan/uang_harian'));
    }

    public function edit()
    {
        $uangRepo = new UangRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_uang',
                    'golongan_perjalanan',
                    'wilayah',
                    'biaya'
                ]
            );

            if ($isExist) {
                $uangRepo->update(
                    $this->request->getPost('id_uang'),
                    [
                        'golongan_perjalanan' => $this->request->getPost('golongan_perjalanan'),
                        'wilayah' => $this->request->getPost('wilayah'),
                        'biaya' => $this->request->getPost('biaya'),
                    ]
                );
            }
        }

        return redirect()->to(base_url('/pengaturan/uang_harian'));
    }

    public function hapus($id)
    {
        $uangRepo = new UangRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $uangRepo->delete($id);
        }

        return redirect()->to(base_url('/pengaturan/uang_harian'));
    }
}

?>
