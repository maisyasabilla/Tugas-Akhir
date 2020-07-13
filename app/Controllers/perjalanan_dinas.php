<?php namespace App\Controllers;

use App\Models\Page;
use CodeIgniter\Controller;
use App\Models\Sistem_model;
use App\Repository\JabatanRepository;
use App\Repository\PegawaiRepository;
use App\Repository\GolonganRepository;
use App\Repository\JenjangRepository;
use App\Repository\GolonganPerjalananRepository;
use App\Repository\WilayahRepository;
use App\Repository\TransportasiRepository;

/*use App\Models\perjalanan_dinas_model;*/

class Perjalanan_Dinas extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function index()
    {
        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('home');
            echo view ('layout/footer');
        } else{
            echo view ('login');
        }
    }

    public function dashboard()
    {
        if(isset($_SESSION['username'])){
            //$this->selectCount('perjalanan');
            //$res = $this->query("Select * from perjalanan");
            //return $res->num_rows();
            echo view ('layout/header');
            echo view ('home');
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function data_karyawan()
    {
        $pegawaiRepo = new PegawaiRepository();
        $jabatanRepo = new JabatanRepository();

        $param = [
            'pegawai' => $pegawaiRepo->findEmployeeFormatted(),
            'jabatan' => $jabatanRepo->findById($pegawai['jenjang']),
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('karyawan/data_karyawan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function edit_karyawan($id)
    {
        $jabatanRepo = new JabatanRepository();
        $pegawaiRepo = new PegawaiRepository();
        $golonganRepo = new GolonganRepository();
        $model = $pegawaiRepo->findById($id);

        if ($model && isset($_SESSION['username'])) {
            $param = [
                'model' => $model,
                'jabatan' => $jabatanRepo->find(0, 0),
                'golongan' => $golonganRepo->find(0, 0),
            ];

            echo view ('layout/header');
            echo view ('karyawan/edit_karyawan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function tambah_karyawan()
    {
        $jabatanRepo = new JabatanRepository();
        $golonganRepo = new GolonganRepository();

        $param = [
            'jabatan' => $jabatanRepo->find(0, 0),
            'golongan' => $golonganRepo->find(0, 0)
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('karyawan/tambah_karyawan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function tambah_perjalanan()
    {
        $pegawaiRepo = new PegawaiRepository();
        $wilayahRepo = new WilayahRepository();
        $transportasiRepo = new TransportasiRepository();
/*        $jabatanRepo = new JabatanRepository();
        $golonganRepo = new GolonganRepository();

        $param = [
            'jabatan' => $jabatanRepo->find(0, 0),
            'golongan' => $golonganRepo->find(0, 0)
        ];
*/
        $param = [
            'pegawai' => $pegawaiRepo->find(0, 0),
            'wilayah' => $wilayahRepo->find(0, 0),
            'transportasi' => $transportasiRepo->find(0, 0)
        ];
        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('perjalanan/tambah_perjalanan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

}

?>
