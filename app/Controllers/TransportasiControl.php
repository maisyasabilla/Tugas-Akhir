<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\TransportasiDetailRepository;

class TransportasiControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $transportasiRepo = new TransportasiDetailRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_transportasi',
                    'golongan_perjalanan',
                    'antar_provinsi',
                    'jenis_tiket'
                ]
            );

            if ($isExist) {
                $transportasiRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/pengaturan/transportasi'));
            }
        }

       return redirect()->to(base_url('/pengaturan/transportasi'));
    }

    public function hapus($id)
    {
        $transportasiRepo = new TransportasiDetailRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $transportasiRepo->delete($id);
        }

        return redirect()->to(base_url('/pengaturan/transportasi'));
    }
}

?>
