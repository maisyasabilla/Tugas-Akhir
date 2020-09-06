<?php namespace App\Controllers;

use App\Models\Page;
use CodeIgniter\Controller;
use \Mpdf\Mpdf;
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

class Report extends Controller
{

    public function pertanggungjawaban($id) {
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
            'uang' => $uang,
        ];

        $mpdf = new Mpdf(['mode' => 'utf-8']);
        $mpdf->WriteHTML(view('tanggung-jawab', $param));
        return redirect()->to($mpdf->Output('Laporan Pertanggungjawaban '.$pegawai->nama.'.pdf', 'I'));

    }

    public function sppd($id) {

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
            'akomodasi' => $akomodasi,
            'uang' => $uang,
        ];


        $mpdf = new Mpdf(['mode' => 'utf-8']);
        $mpdf->WriteHTML(view('sppd', $param));
        return $mpdf->Output('SPPD.pdf', 'D');

    }

}

?>
