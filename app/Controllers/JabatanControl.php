<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\JabatanRepository;

class JabatanControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $jabatanRepo = new JabatanRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'jabatan',
                    'jenjang_jabatan'
                ]
            );

            if ($isExist) {
                $jabatanRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/perjalanan_dinas/data_jabatan'));
            }
        }

        return redirect()->to(base_url('/perjalanan_dinas/data_jabatan'));
    }

    public function edit()
    {
        $jabatanRepo = new JabatanRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_jabatan',
                    'jenjang_jabatan',
                    'jabatan'
                ]
            );

            if ($isExist) {
                $jabatanRepo->update(
                    $this->request->getPost('id_jabatan'),
                    [
                        'jenjang_jabatan' => $this->request->getPost('jenjang_jabatan'),
                        'jabatan' => $this->request->getPost('jabatan'),
                    ]
                );
            }
        }

        return redirect()->to(base_url('/perjalanan_dinas/data_jabatan'));
    }

    public function hapus($id)
    {
        $jabatanRepo = new JabatanRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $jabatanRepo->delete($id);
        }

        return redirect()->to(base_url('/perjalanan_dinas/data_jabatan'));
    }
}

?>
