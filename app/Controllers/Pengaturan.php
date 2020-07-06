<?php namespace App\Controllers;

use App\Models\Page;
use CodeIgniter\Controller;
use App\Models\Sistem_model;
use App\Repository\JabatanRepository;
use App\Repository\JenjangRepository;
use App\Repository\GolonganPerjalananRepository;
use App\Repository\AkomodasiRepository;
use App\Repository\WilayahRepository;
use App\Repository\TransportasiLokalRepository;
use App\Repository\UangRepository;

class Pengaturan extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
            return redirect()->to(base_url('/perjalanan_dinas'));
        } else{
            echo view ('login');
        }
    }

    public function data_jabatan()
    {
        $jabatanRepo = new JabatanRepository();
        $jenjangRepo = new JenjangRepository();
        $golonganRepo = new GolonganPerjalananRepository();

        $param = [
            'jabatan' => $jabatanRepo->findJabatanFormatted(),
            'jenjang' => $jenjangRepo->find(0, 0),
            'golongan' => $golonganRepo->find(0, 0),
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('pengaturan/data_jabatan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function data_akomodasi()
    {
        $akomodasiRepo = new AkomodasiRepository();
        $golonganRepo = new GolonganPerjalananRepository();


        $param = [
            'akomodasi' => $akomodasiRepo->findAkomodasiFormatted(),
            'golongan' => $golonganRepo->find(0, 0),
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('pengaturan/data_akomodasi', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function data_wilayah()
    {
        $wilayahRepo = new WilayahRepository();
        
        $param = [
            'wilayah' => $wilayahRepo->find(0, 0),
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('pengaturan/data_wilayah', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function transportasi_lokal()
    {
        $transportasiRepo = new TransportasiLokalRepository();
        $wilayahRepo = new WilayahRepository();
        
        $param = [
            'transportasi' => $transportasiRepo->findTransportasiFormatted(),
            'wilayah' => $wilayahRepo->find(0,0),
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('pengaturan/data_transportasilokal', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function uang_harian()
    {
        $uangRepo = new UangRepository();
        $golonganRepo = new GolonganPerjalananRepository();
        $wilayahRepo = new WilayahRepository();

        $param = [
            'uang' => $uangRepo->findUangFormatted(),
            'golongan' => $golonganRepo->find(0, 0),
            'wilayah' => $wilayahRepo->find(0,0)
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('pengaturan/data_uang', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }
}

?>
