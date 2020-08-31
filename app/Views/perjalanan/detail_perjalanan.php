<div class="content">
    <div class="row">
      <div class="col-md-4">
        <div class="card card-user">
          <div class="image bg-hijau" style="height:100px"></div>
          <div class="card-body" style="min-height: 180px">
            <div class="author mb-20">
              <a href="#">
                <div class="avatar" style="float:none; margin:auto">
                <img src="<?php echo base_url('assets/img/iconuser.png');?>">
                </div>
              </a>
            </div>
            <p class="description text-center text-hitam fs-13">
              <span class="fw-600 fs-15"><?= $pegawai->nama ?></span><br>
              <span class="fw-600"><?= $jabatan->jabatan ?> 
              (<?= $jenjang->jenjang_jabatan ?>)<span><br>
              <?= $model->nip ?><br>
            </p>
          </div>
          <div class="card-footer">
            <hr>
            <div class="button-container">
              <div class="row  text-hitam">
                <div class="col-lg-7 col-md-6 col-6 ml-auto ">
                  <h5><?= $golongan->id_golongan ?> - <?= $golongan->golongan ?>
                    <br>
                    <small>Golongan</small>
                  </h5>
                </div>
                <div class="col-lg-5 col-md-6 col-6 ml-auto mr-auto">
                  <h5><?= $golonganper->golongan_perjalanan ?>
                    <br>
                    <small>Gol. Perjalanan</small>
                  </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="<?= base_url("report/sppd/$model->id_perjalanan") ?>"><button class="col-sm-12 fs-10 ls-2 fw-600 bg-oranye btn-login no-br" style="height: 40px;" value="simpan"><i class="fa fa-check"></i> download sppd</button></a>
        <a href="<?= base_url("report/pertanggungjawaban/$model->id_perjalanan") ?>"><button class="col-sm-12 fs-10 ls-2 fw-600 bg-oranye btn-login no-br" style="height: 40px;"><i class="fa fa-times"></i> download lembar pertanggungjawaban</button></a>
      </div>
      <div class="col-md-8">
        <div class="card card-user p-30">
          <div class="card-header">
            <h3 class="card-title upper">Detail Perjalanan</h3>
          </div>
          <div class="card-body">
          <hr class="border-title ml-0 mt-20">
              <table class="w-100">
                <tr class="fs-17">
                    <td>SPPD Nomor</td>
                    <td>:</td>
                    <td><?= $model->id_perjalanan ?></td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>:</td>
                    <td><?= $tanggal->tgl_sppd ?></td>
                </tr>
                <tr>
                    <td>Waktu</td>
                    <td>:</td>
                    <?php 
                        $berangkat = $tanggal->tgl_berangkat;
                        $pulang = $tanggal->tgl_pulang;
                        $tanggal1 = new DateTime($berangkat);
                        $tanggal2 = new DateTime($pulang);
                        $perbedaan = $tanggal2->diff($tanggal1)->format("%a");
                        $jumlahhari = $perbedaan+1;
                    ?>
                    <td><?= $tanggal->tgl_berangkat ?> s/d <?= $tanggal->tgl_pulang ?></td>
                </tr>
                <tr>
                    <td>Jumlah Hari</td>
                    <td>:</td>
                    <td><?= $jumlahhari ?> hari</td>
                </tr>
                <tr>
                    <td>Wilayah Asal</td>
                    <td>:</td>
                    <td><?= $asal->wilayah ?></td>
                </tr>
                <tr>
                    <td>Wilayah Tujuan</td>
                    <td>:</td>
                    <td><?= $tujuan->wilayah ?></td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td><?= $model->tujuan ?></td>
                </tr>
                <tr>
                    <td>Komando</td>
                    <td>:</td>
                    <td><?= $model->komando ?></td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td><?= $model->keterangan ?></td>
                </tr>
              </table>
            <hr class="border-title ml-0 mt-20">
            <h3 class="card-title upper fs-17 mb-10">transportasi</h3>
              <table class="w-100">
                <tr>
                    <td>Jenis Kendaraan</td>
                    <td>:</td>
                    <td><?= $model->alat_angkut ?></td>
                </tr>
                <tr>
                    <td>Transportasi</td>
                    <td>:</td>
                    <td><?= $transportasi->transportasi ?></td>
                </tr>
                <tr>
                    <td>Antar Provinsi</td>
                    <td>:</td>
                    <td><?= $detail[0]->antar_provinsi ?></td>
                </tr>
                <tr>
                    <td>Jenis Tiket</td>
                    <td>:</td>
                    <td><?= $detail[0]->jenis_tiket ?></td>
                </tr>
                <tr>
                    <td>Tujuan</td>
                    <td>:</td>
                    <td><?= $model->tujuan ?></td>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <td>:</td>
                    <td>Rp. <?= $biaya->biaya_transportasi ?></td>
                </tr>
                <tr>
                    <td>Biaya Transportasi Dalam Kota</td>
                    <td>:</td>
                    <td>Rp. <?= $lokal->biaya ?></td>
                </tr>
              </table>
            <hr class="border-title ml-0 mt-20">
            <h3 class="card-title upper fs-17 mb-10">biaya</h3>
              <table class="w-100">
                <tr>
                    <td>Harga Tiket</td>
                    <td>:</td>
                    <td>Rp. <?= $biaya->biaya_transportasi ?></td>
                </tr>
                <tr>
                    <td>Biaya Transportasi Dalam Kota</td>
                    <td>:</td>
                    <td>Rp. <?= $lokal->biaya ?></td>
                </tr>
                <tr>
                    <td>Uang Makan Harian (
                        <?php
                          $makan = 2 * $jumlahhari;
                          echo"$makan"; ?> 
                        
                        kali)</td>
                    <td>:</td>
                    <?php 
                        $uangmakan = $uang->biaya;
                        $totaluang = $makan * $uangmakan;
                    ?>
                    <td>Rp. <?php echo($totaluang); ?></td>
                </tr>
                <tr>
                    <td>Akomodasi</td>
                    <td>:</td>
                    <?php
                      $biayahotel = $akomodasi->biaya;
                      $jumlahako = $biayahotel*$perbedaan;
                    ?>
                    <td>Rp. <?= $jumlahako ?></td>
                </tr>
                  <tr class="fs-17 fw-600 upper" style="border-top: 1px solid #ccc">
                    <td>Total Biaya</td>
                    <td>:</td>
                    <td>
                      <?php 
                        $tiket = $biaya->biaya_transportasi;
                        $transport = $lokal->biaya;
                        $ako = $jumlahako;
                        $total = $tiket + $ako + $transport + $totaluang;
                        echo "Rp. $total";
                      ?>
                    </td>
                </tr>
              </table>
          </div>
        </div>
      </div>
    </div>
</div>