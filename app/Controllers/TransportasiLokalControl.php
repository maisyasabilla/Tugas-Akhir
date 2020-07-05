<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\TransportasiLokalRepository;

class TransportasiLokalControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $transportasiRepo = new TransportasiLokalRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'wilayah',
                    'biaya'
                ]
            );

            if ($isExist) {
                $transportasiRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/pengaturan/transportasi_lokal'));
            }
        }

        return redirect()->to(base_url('/pengaturan/transportasi_lokal'));
    }

    public function edit()
    {
        $transportasiRepo = new TransportasiLokalRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_lokal',
                    'wilayah',
                    'biaya'
                ]
            );

            if ($isExist) {
                $transportasiRepo->update(
                    $this->request->getPost('id_lokal'),
                    [
                        'wilayah' => $this->request->getPost('wilayah'),
                        'biaya' => $this->request->getPost('biaya'),
                    ]
                );
            }
        }

        return redirect()->to(base_url('/pengaturan/transportasi_lokal'));
    }

    public function hapus($id)
    {
        $transportasiRepo = new TransportasiLokalRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $transportasiRepo->delete($id);
        }

        return redirect()->to(base_url('/pengaturan/transportasi_lokal'));
    }
}

?>
