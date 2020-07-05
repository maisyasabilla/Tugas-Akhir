<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\WilayahRepository;

class WilayahControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $wilayahRepo = new WilayahRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'wilayah'
                ]
            );

            if ($isExist) {
                $wilayahRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/pengaturan/data_wilayah'));
            }
        }

        return redirect()->to(base_url('/pengaturan/data_wilayah'));
    }

    public function edit()
    {
        $wilayahRepo = new WilayahRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_wilayah',
                    'wilayah'
                ]
            );

            if ($isExist) {
                $wilayahRepo->update(
                    $this->request->getPost('id_wilayah'),
                    [
                        'wilayah' => $this->request->getPost('wilayah'),
                    ]
                );
            }
        }

        return redirect()->to(base_url('/pengaturan/data_wilayah'));
    }

    public function hapus($id)
    {
        $wilayahRepo = new WilayahRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $wilayahRepo->delete($id);
        }

        return redirect()->to(base_url('/pengaturan/data_wilayah'));
    }
}

?>
