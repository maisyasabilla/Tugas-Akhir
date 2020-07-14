<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\PerjalananRepository;

class PerjalananControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $perjalananRepo = new PerjalananRepository();
        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_perjalanan',
                    'nip',
                    'alat_angkut',
                    'wilayah_asal',
                    'wilayah_tujuan',
                    'tujuan',
                    'komando',
                    'keterangan'
                ]
            );
            if ($isExist) {
                echo("berhasil");
                $perjalananRepo->insert($this->request->getPost());
                
                //return redirect()->to(base_url('/pengaturan/tambah_perjalanan'));
            }
        }

        //return redirect()->to(base_url('/pengaturan/tambah_perjalanan'));
    }

   /* public function edit()
    {
        $PerjalananRepo = new PerjalananRepository();

        if ($this->request->getMethod() == 'post' && isset($_SESSION['username'])) {
            $isExist = ArrayHelper::arrayKeyExist(
                $this->request->getPost(),
                [
                    'id_Perjalanan',
                    'golongan_perjalanan',
                    'wilayah',
                    'biaya'
                ]
            );

            if ($isExist) {
                $PerjalananRepo->update(
                    $this->request->getPost('id_Perjalanan'),
                    [
                        'golongan_perjalanan' => $this->request->getPost('golongan_perjalanan'),
                        'wilayah' => $this->request->getPost('wilayah'),
                        'biaya' => $this->request->getPost('biaya'),
                    ]
                );
            }
        }

        return redirect()->to(base_url('/pengaturan/Perjalanan_harian'));
    }*/

    public function hapus($id)
    {
        $PerjalananRepo = new PerjalananRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $PerjalananRepo->delete($id);
        }

        return redirect()->to(base_url('/pengaturan/Perjalanan_harian'));
    }
}

?>
