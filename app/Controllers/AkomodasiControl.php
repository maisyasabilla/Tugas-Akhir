<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\AkomodasiRepository;

class AkomodasiControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $akomodasiRepo = new AkomodasiRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'golongan_perjalanan',
                    'kelas_penginapan',
                    'biaya'
                ]
            );

            if ($isExist) {
                $akomodasiRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/pengaturan/data_akomodasi'));
            }
        }

        return redirect()->to(base_url('/pengaturan/data_akomodasi'));
    }

    public function edit()
    {
        $akomodasiRepo = new AkomodasiRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_akomodasi',
                    'golongan_perjalanan',
                    'kelas_penginapan',
                    'biaya'
                ]
            );

            if ($isExist) {
                $akomodasiRepo->update(
                    $this->request->getPost('id_akomodasi'),
                    [
                        'golongan_perjalanan' => $this->request->getPost('golongan_perjalanan'),
                        'kelas_penginapan' => $this->request->getPost('kelas_penginapan'),
                        'biaya' => $this->request->getPost('biaya'),
                    ]
                );
            }
        }

        return redirect()->to(base_url('/pengaturan/data_akomodasi'));
    }

    public function hapus($id)
    {
        $akomodasiRepo = new AkomodasiRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $akomodasiRepo->delete($id);
        }

        return redirect()->to(base_url('/pengaturan/data_akomodasi'));
    }
}

?>
