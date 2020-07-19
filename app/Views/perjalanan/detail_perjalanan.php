<div class="content">
    <div class="row">
    <div class="col-md-4">
            <div class="card card-user">
              <div class="image bg-hijau"></div>
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
                        ?>
                        <td><?= $tanggal->tgl_berangkat ?> s/d <?= $tanggal->tgl_pulang ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Hari</td>
                        <td>:</td>
                        <td><?= $perbedaan ?> hari</td>
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
                <h3 class="card-title upper fs-17">transportasi</h3>
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
                        ?>
                        <td><?= $tanggal->tgl_berangkat ?> s/d <?= $tanggal->tgl_pulang ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah Hari</td>
                        <td>:</td>
                        <td><?= $perbedaan ?> hari</td>
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
              </div>
            </div>
          </div>
    </div>
</div>