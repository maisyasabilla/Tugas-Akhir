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
use App\Repository\TransportasiDetailRepository;
use App\Repository\TransportasiLokalRepository;
use App\Repository\PerjalananRepository;
use App\Repository\PerjalananTanggalRepository;
use App\Repository\PerjalananBiayaRepository;
use App\Repository\AkomodasiRepository;
use App\Repository\UangRepository;

class Perjalanan_Dinas extends Controller
{
    public function __construct() {
        $session = session();
    }

    public function index()
    {
       if(isset($_SESSION['username'])){
            $pegawaiRepo = new PegawaiRepository();
            $perjalananRepo = new PerjalananTanggalRepository();
            
            $param = [
                'jmlpegawai' => $pegawaiRepo->jumlah(),
                'bulan' => $perjalananRepo->jumlahBulan(),
                'biaya' => $perjalananRepo->biayaBulan(),
                'jmlperjalanan' => $perjalananRepo->perjalananAktif(),
                'perjalananbulan' => $perjalananRepo->perjalananBulan(),
                'perjalanantahun' => $perjalananRepo->perjalananTahun(),
            ];
            echo view ('layout/header');
            echo view ('home', $param);
            echo view ('layout/footer');
        } else{
            echo view ('login');
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

    public function data_perjalanan()
    {
        $perjalananRepo = new PerjalananRepository();
        
        $param = [
            'perjalanan' => $perjalananRepo->findPerjalananFormatted(),
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('perjalanan/data_perjalanan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function detail_perjalanan($id)
    {
        $perjalananRepo = new PerjalananRepository();
        $tanggalRepo = new PerjalananTanggalRepository();
        $biayaRepo = new PerjalananBiayaRepository();
        $pegawaiRepo = new PegawaiRepository();
        $jabatanRepo = new JabatanRepository();
        $jenjangRepo = new JenjangRepository();
        $golonganRepo = new GolonganRepository();
        $golonganPerjalananRepo = new GolonganPerjalananRepository();
        $wilayahRepo = new WilayahRepository();
        $transportasiRepo = new TransportasiRepository();
        $lokalRepo = new TransportasiLokalRepository();
        $detailRepo = new TransportasiDetailRepository();
        $akomodasiRepo = new AkomodasiRepository();
        $uangRepo = new UangRepository();

        $model = $perjalananRepo->findById($id);
        $pegawai = $pegawaiRepo->findById($model->nip);
        $jabatan = $jabatanRepo->findById($pegawai->jabatan);
        $jenjang = $jenjangRepo->findById($jabatan->jenjang_jabatan);
        $golongan = $golonganRepo->findById($pegawai->golongan);
        $golonganper = $golonganPerjalananRepo->findById($jenjang->golongan_perjalanan);
        $tanggal = $tanggalRepo->findById($model->id_perjalanan);
        $biaya = $biayaRepo->findById($model->id_perjalanan);
        $asal = $wilayahRepo->findById($model->wilayah_asal);
        $tujuan = $wilayahRepo->findById($model->wilayah_tujuan);
        $transportasi = $transportasiRepo->findById($biaya->transportasi);
        $lokal = $lokalRepo->findById($biaya->transportasi_lokal);
        $lokal_asal = $lokalRepo->findWilayah($model->wilayah_asal);
        $detail = $detailRepo->findByTransportGolongan($biaya->transportasi, $golonganper->id_golongan_per);
        $akomodasi = $akomodasiRepo->findById($biaya->akomodasi);
        $uang = $uangRepo->findById($biaya->uang_harian);
        
        $param = [
            'model' => $model,
            'tanggal' => $tanggal,
            'biaya' => $biaya,
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'jenjang' => $jenjang,
            'golongan' => $golongan,
            'golonganper' => $golonganper,
            'asal' => $asal,
            'tujuan' => $tujuan,
            'transportasi' => $transportasi,
            'detail' => $detail,
            'lokal' => $lokal,
            'lokal_asal' => $lokal_asal,
            'akomodasi' => $akomodasi,
            'uang' => $uang
        ];
        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('perjalanan/detail_perjalanan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }

    public function detail_karyawan($id)
    {
        $pegawaiRepo = new PegawaiRepository();
        $jabatanRepo = new JabatanRepository();
        $jenjangRepo = new JenjangRepository();
        $golonganRepo = new GolonganRepository();
        $golonganPerjalananRepo = new GolonganPerjalananRepository();
        $perjalananRepo = new PerjalananRepository();
       
        $pegawai = $pegawaiRepo->findById($id);
        $jabatan = $jabatanRepo->findById($pegawai->jabatan);
        $jenjang = $jenjangRepo->findById($jabatan->jenjang_jabatan);
        $golongan = $golonganRepo->findById($pegawai->golongan);
        $golonganper = $golonganPerjalananRepo->findById($jenjang->golongan_perjalanan);
        $perjalanan = $perjalananRepo->findPerjalananPegawai($pegawai->nip);
        
        $param = [
            'perjalanan' => $perjalanan,
            'pegawai' => $pegawai,
            'jabatan' => $jabatan,
            'jenjang' => $jenjang,
            'golongan' => $golongan,
            'golonganper' => $golonganper,
        ];

        if(isset($_SESSION['username'])){
            echo view ('layout/header');
            echo view ('karyawan/detail_karyawan', $param);
            echo view ('layout/footer');
        } else{
            return redirect()->to(base_url('/perjalanan_dinas'));
        }
    }


}

?>
