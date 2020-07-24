<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Helpers\ArrayHelper;
use App\Repository\PerjalananRepository;
use App\Repository\PerjalananBiayaRepository;
use App\Repository\PerjalananTanggalRepository;

class PerjalananControl extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function tambah()
    {
        $biayaRepo = new PerjalananBiayaRepository();
        $perjalananRepo = new PerjalananRepository();
        $tanggalRepo = new PerjalananTanggalRepository();

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
                    'keterangan',
                    'tgl_berangkat',
                    'tgl_pulang',
                    'biaya_transportasi',
                    'transportasi'
                ]
            );
            if ($isExist) {
                $perjalananRepo->insert($this->request->getPost());
                $tanggalRepo->insert($this->request->getPost());
                $biayaRepo->insert($this->request->getPost());
                return redirect()->to(base_url('/perjalanan_dinas/data_perjalanan'));
            }
        }

        return redirect()->to(base_url('/perjalanan_dinas/tambah_perjalanan'));
    }

    public function hapus($id)
    {
        $PerjalananRepo = new PerjalananRepository();

        if (isset($_SESSION['username']) && $id != '') {
            $PerjalananRepo->delete($id);
        }

        return redirect()->to(base_url('/perjalanan_dinas/data_perjalanan'));
    }
}

?>
