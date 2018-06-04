<!-- Modal User-->
<div class="modal fade" id="modalVisi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        .....
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<!--================================= Modal Recruitment ==========================-->
<div class="modal fade" id="modalPelamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Recruitment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="stepwizard">
            <div class="stepwizard-row setup-panel">
                <div class="stepwizard-step">
                    <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                    <p>Biodata Diri</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                    <p>Riwayat Hidup</p>
                </div>
                <div class="stepwizard-step">
                    <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                    <p>Upload Dokumen</p>
                </div>
            </div>
        </div>
        <form role="form">
            <div class="row setup-content" id="step-1">
                <div class="col-md-12">
                  <h3>Data Diri</h3>
                </div>
                <div class="form-group col-md-6">
                <label for="Posisi">Posisi yang Dilamar* :</label>
                  <input type="text" class="form-control" id="position" name="posisi" required>
                </div>
                <div class="form-group col-md-6 ghost">
                  <label for="Refrensi">Referensi* :</label>
                  <select class="form-control opacity0" id="refrensi" name="refrensi" required>
                    <option value="">-</option>
                    <option value="ANGGA">Angga</option>
                    <option value="ZALORA">Zalora</option>
                    <option value="CHERYL">Cheryl</option>
                    <option value="NOVI">Novi</option>
                    <option value="SRI">Sri</option>
                    <option value="WIDYA">Widya</option>
                    <option value="JANNAH">Jannah</option>
                    <option value="1">Lainnya</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="Nama">Nama Lengkap* :</label>
                    <input type="text" class="form-control" id="fullName" autocomplete="off" name="nama_lengkap" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="wargaNegara">Warga Negara :</label>
                    <input type="text" class="form-control" id="wargaNegara" name="warga_negara">
                </div>
                <div class="form-group col-md-6">
                  <label for="tempat_lahir">Tempat Lahir* :</label>
                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="tanggal_lahir">Tanggal Lahir* :</label>
                    <input type="text" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="Agama">Agama* :</label>
                  <select class="form-control opacity0" id="agama" name="agama" required>
                    <option value="">-</option>
                    <option value="ISLAM">Islam</option>
                    <option value="KRISTEN PROTESTAN">Kristen Protestan</option>
                    <option value="KRISTEN KATOLIK">Kristen Katolik</option>
                    <option value="HINDU">Hindu</option>
                    <option value="BUDDHA">Buddha</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="idJk">Jenis Kelamin* :</label>
                  <div class="radio">
                    <label><input type="radio" name="jenis_kelamin" value="Laki-laki" required>Laki - Laki</label>
                  </div>
                  <div class="radio">
                    <label><input type="radio" name="jenis_kelamin" value="Perempuan">Perempuan</label>
                  </div>
                </div>
                <div class="form-group col-md-6">
                  <label for="idCart">No.KTP* :</label>
                    <input type="text" class="form-control" id="idCard" autocomplete="off" name="no_ktp" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="idSim">No.SIM:</label>
                    <input type="text" class="form-control" name="no_sim" autocomplete="off" id="idSim" onKeyPress="return goodchars(event,'0123456789',this)">
                </div>
                <div class="form-group col-md-6">
                  <label for="status_sipil">Status Sipil* :</label>
                  <select class="form-control opacity0" id="status_sipil" name="status_sipil" required>
                    <option value="">-</option>
                    <option value="Menikah">Menikah</option>
                    <option value="Lajang">Lajang</option>
                    <option value="Duda">Cerai</option>
                  </select>
                </div>
                <div class="form-group col-md-6">
                  <label for="alamat_email">Alamat Email* :</label>
                    <input type="email" class="form-control" autocomplete="off" id="alamat_email" name="alamat_email" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="berat_badan">Berat Badan* :</label>
                    <input type="text" name="berat_badan" id="berat_badan" autocomplete="off" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="berat_badan">Tinggi Badan* :</label>
                  <input type="text" name="tinggi_badan" id="tinggi_badan" autocomplete="off" class="form-control" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="alamat_sekarang">Alamat Sekarang* :</label>
                  <textarea name="alamat_sekarang" id="alamat_sekarang" class="form-control textareaSekarang" style="height:110px;" required></textarea>
                </div>
                <div class="form-group col-md-6">
                  <label for="noHandphone">No Handphone* :</label>
                    <input type="text" class="form-control" id="idHandphone" name="no_handphone" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="telepon">Telepon :</label>
                  <input type="text" class="form-control" id="idTelepon" name="telepon" autocomplete="off" maxlength="12" onKeyPress="return goodchars(event,'0123456789',this)">
                </div>
                
                <div class="form-group col-md-6">
                  <label for="kemampuan">Kemampuan Dimiliki* :</label>
                  <input type="text" class="form-control" autocomplete="off" id="skill" name="kemampuan_komputer" required>
                </div>
                <div class="col-md-12">
                  <button class="btn btn-primary nextBtn" type="button">Next</button>
                </div>
            </div>

            <div class="row setup-content" id="step-2">
              <div class="col-md-12">
                <h3>Riwayat Hidup</h3>
              </div>

              <div class="form-group col-md-12">
                <label for="bahasa" class="wd100">Bahasa Asing :</label>
                  <div>
                    <label class="radio-inline"><input type="radio" name="bahasa_asing" value="INGGRIS">INGGRIS</label>
                  <label class="radio-inline"><input type="radio" name="bahasa_asing" value="MANDARIN">MANDARIN</label>
                  <label class="radio-inline"><input type="radio" name="bahasa_asing" value="JEPANG">JEPANG</label>
                  <label class="radio-inline"><input type="radio" name="bahasa_asing" value="JERMAN">JERMAN</label>
                  <label class="radio-inline" style="display:none;"><input type="radio" name="bahasa_asing" value="-" checked="checked"></label>
                  </div>
              </div>

              <div class="form-group col-md-6">
                <label for="pendidikan_terakhir">Pendidikan Terakhir* :</label>
                <select class="form-control opacity0" id="pendidikan_terakhir" name="pendidikan_terakhir" required>
                  <option value="">-</option>
                  <option value="SMA">SMA</option>
                  <option value="D3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
              </div>
              
              <div class="form-group col-md-6">
                <label for="riwayat">Riwayat Penyakit :</label>
                  <input type="text" class="form-control" autocomplete="off" id="riwayat" name="riwayat_penyakit">
              </div>
              <div class="form-group col-md-12">
                <label for="pengalaman">Pengalaman Pekerjaan* :</label>
                <div style="color:purple;">
                  <label style="width:100%;">Contoh:</label> 
                  <label style="width:100%;">1. Posisi - Perusahaan - Lama Bekerja,</label> 
                  <label style="width:100%;">2. POSISI - PERUSAHAAN - LAMA BEKERJA, dan seterusnya</label>
                </div>
                <span>Gunakan <b>Koma(,)</b> Sebagai "<b>Enter</b>" untuk lanjutan pengalaman</span>
                <div class="noted"><b>Wajib Cantumkan Semua pengalaman kerja anda!!!</b></div>
                  <textarea name="pengalaman_kerja" id="pengalaman_kerja" class="form-control textareaKerja" required></textarea>
              </div>
              <div class="form-group col-md-12">
                <label for="kemampuan">Promosikan Diri Anda* :</label>
                  <input type="text" class="form-control" autocomplete="off" id="promosiDiri" name="promosi_diri" required>
              </div>

              <div class="col-md-12">
                <button class="btn btn-primary nextBtn" type="button" >Next</button>     
              </div>
            </div>
            <div class="row setup-content" id="step-3">
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <div class="col-md-12">
                          <h3>Upload Data</h3>
                        </div>
                        <div class="form-group col-md-12">
                          <label for="foto">Upload Foto :</label>
                            <input type="file" accept="image/*" class="form-control" id="foto" name="foto" required>
                            <!-- <span class="small-font">Ukuran Foto Maksimal <b>1 MB</b>*</span> -->
                        </div>
                        <div class="form-group col-md-12">
                          <label for="ktp">Upload KTP :</label>
                            <input type="file" accept="image/*" class="form-control" id="ktp" name="ktp" required>
                          <!-- <span class="small-font">Ukuran KTP Maksimal <b>1 MB</b>*</span> -->
                        </div>
                        <div class="form-group col-md-12">
                          <label for="ijazah">Upload Ijazah :</label>
                            <input type="file" accept="image/*" class="form-control" id="ijazah" name="ijazah" required>
                          <!-- <span class="small-font">Ukuran Ijazah Maksimal <b>1 MB</b>*</span> -->
                        </div>
                        <div class="form-group col-md-12">
                          <label for="cv">Upload CV :</label>
                            <input type="file" class="form-control" id="copy_cv" name="copy_cv" required>
                        </div>
                        <div class="col-md-12">
                          <button class="btn btn-success" type="submit">Finish</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>


<!---================== Modal Admin =================================-->
  <div class="modal fade" id="modalHome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Slider Home</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="formHome" method="POST" action="server.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="title">Judul Image</label>
                    <input type="text" class="form-control" name="title_img" id="title_image" placeholder="Judul Image" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" name="desc_img" id="deskripsi_image" placeholder="Deskripsi Image" required>
                  </div>
                  <div class="form-group">
                    <label for="upload">Upload Image</label>
                    <input type="file" name="image_home" id="upload_image" required>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="save" id="homeSave">Simpan</button>
                  <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalTeam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Aggota</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="formTeam" method="POST" action="server.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username_title" placeholder="Username" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email_admin" id="email_title" placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password_title" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Konfirmasi Password</label>
                    <input type="password" class="form-control" name="password" id="confpass_title" placeholder="Konfirmasi Password">
                  </div>
                   <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap" required>
                  </div>
                  <div class="form-group">
                    <label for="divisi">Divisi</label>
                    <input type="text" class="form-control" name="divisi" id="divisi_title" placeholder="Divisi" required>
                  </div>
                  <div class="form-group">
                    <label for="Branch">Branch</label>
                    <?php 
                      echo "<select class='form-control' name='branch'>";
                        $branch_wilayah = mysqli_query($db, "SELECT * FROM kontak");
                        while ($row = mysqli_fetch_assoc($branch_wilayah)) {
                          echo "<option value=$row[wilayah]>$row[wilayah]</option>";
                      }
                      echo "</select>";
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="upload">Upload Image</label>
                    <input type="file" name="img_divisi" id="img_divisi" required>
                  </div>
                  <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" name="status" id="status_title">
                        <option value="">-</option>
                        <option value="ADMIN">Admin</option>
                        <option value="RECRUITMENT">Recruitment</option>
                    </select>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="team" id="teamSave">Simpan</button>
                  <button type="button" class="btn" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Client</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="formClient" method="POST" action="server.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="title">Nama Client</label>
                    <input type="text" class="form-control" name="title_client" id="title_client" placeholder="Nama Client" required>
                  </div>
                   <div class="form-group">
                    <label for="deskripsi">Deskripsi Client</label>
                    <input type="text" class="form-control" name="desc_client" id="deskripsi_client" placeholder="Deskripsi Client" required>
                  </div>
                  <div class="form-group">
                    <label for="upload">Logo Client</label>
                    <input type="file" name="img_client" id="img_client" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Tanggal Join</label>
                    <input type="text" class="form-control" name="tgl_join" id="tgl_join" placeholder="Tanggal Join" required>
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="save_client" id="clientSave">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalAlbum" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Album</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="formAlbum" method="POST" action="server.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="title">Nama Album</label>
                    <input type="text" class="form-control" name="nama_album" id="nama_album" placeholder="Nama Album" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Album Deskripsi</label>
                    <input type="text" class="form-control" name="album_deskripsi" placeholder="Deskripsi Image" required>
                  </div>
                  <div class="form-group">
                    <label for="upload">Cover Album</label>
                    <input type="file" name="image" id="cover" required>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="album_save" id="albumSave">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalGaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Galeri</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="formGaleri" method="POST" action="server.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="album">Album</label>
                    <?php 
                      echo "<select class='form-control' name='albumid'>";
                        $album_query = mysqli_query($db, "SELECT * FROM album");
                        while ($row = mysqli_fetch_assoc($album_query)) {
                          echo "<option value=$row[albumid]>$row[nama_album]</option>";
                      }
                      echo "</select>";
                    ?>
                  </div>
                  <div class="form-group">
                    <label for="title">Nama Foto</label>
                    <input type="text" class="form-control" name="nama_foto" placeholder="Judul Foto" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <input type="text" class="form-control" name="desc_foto" placeholder="Deskripsi Foto" required>
                  </div>
                  <div class="form-group">
                    <label for="upload">Foto</label>
                    <input type="file" name="foto" id="photo" required>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="galeri_save" id="galeriSave">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Video</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="formVideo" method="POST" action="server.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="title">Nama Video</label>
                    <input type="text" class="form-control" name="nama_video"  placeholder="Judul Video" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Deskripsi Video</label>
                    <input type="text" class="form-control" name="video_deskripsi"  placeholder="Deskripsi Image" required>
                  </div>
                  <div class="form-group">
                    <label for="upload">Link Video</label>
                    <input type="text" class="form-control" name="video" placeholder="Link Video" required>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="save_video" id="videoSave">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="modalBranch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-body">
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tambah Branch</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <form role="form" id="formBranch" method="POST" action="server.php" enctype="multipart/form-data">
                <div class="box-body">
                  <div class="form-group">
                    <label for="title">Wilayah</label>
                    <input type="text" class="form-control" name="wilayah"  placeholder="Wilayah" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Alamat</label>
                    <input type="text" class="form-control" name="alamat"  placeholder="Alamat" required>
                  </div>
                  <div class="form-group">
                    <label for="deskripsi">Telepon</label>
                    <input type="text" class="form-control" name="telepon"  placeholder="Telepon" required>
                  </div>
                    <div class="form-group">
                    <label for="deskripsi">Email</label>
                    <input type="email" class="form-control" name="email"  placeholder="Email" required>
                  </div>
                  <div class="form-group">
                    <label for="upload">Maps</label>
                    <input type="text" class="form-control" name="maps" placeholder="Maps" required>
                  </div>
                </div>

                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-primary" name="save_branch" id="branchSave">Simpan</button>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
                </div>
              </form>
            </div>
            <!-- /.box -->

          </div>
        </div>
    </div>
  </div>

<!---================== Modal Admin ==================================-->

<div class="modal fade" id="modalHomeEdit" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="loadPage" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Information</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalEdit2" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" id="loadPage" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Update Information</h4>
            </div>
            <div class="modal-body">
                <div class="fetched-data"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Info  -->
<div class="modal fade" id="modalSuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header info">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="info-success">
          <i class="fa fa-check-circle"></i>
          <label>Data Berhasil Diinput</label>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- Ajax -->
<script language="javascript">
      function getkey(e)
      {
        if (window.event)
          return window.event.keyCode;
        else if (e)
          return e.which;
        else
          return null;
      }

      function goodchars(e, goods, field)
      {
        var key, keychar;
        key = getkey(e);
        if (key == null) return true;
       
        keychar = String.fromCharCode(key);
        keychar = keychar.toLowerCase();
        goods = goods.toLowerCase();
       
        // check goodkeys
        if (goods.indexOf(keychar) != -1)
            return true;
        // control keys
        if ( key==null || key==0 || key==8 || key==9 || key==27 )
          return true;
          
        if (key == 13) {
            var i;
            for (i = 0; i < field.form.elements.length; i++)
                if (field == field.form.elements[i])
                    break;
            i = (i + 1) % field.form.elements.length;
            field.form.elements[i].focus();
            return false;
            };
        // else return false
        return false;
    }
</script>
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">

function password_match() {
    var password = $("#password_title").val();
    var confirmPassword = $("#confpass_title").val();

    if (password != confirmPassword) {
        $("#teamSave").prop('disabled', true);
        $("#confpass_title").css("border", "1px solid red");
    } else {
        $("#teamSave").prop('disabled', false);
        $("#confpass_title").css("border", "1px solid #d2d6de");
    } 
}

jQuery("#confpass_title").keyup(password_match);

$(".pass_conf").keyup(function(){
  var password1 = $(".pass_primary").val();
  var confirmPassword1 = $(".pass_conf").val();

 if (password1 != confirmPassword1) {
      $(".savePass").prop('disabled', true);
      $(".pass_conf").css("border", "1px solid red");
  } else {
      $(".savePass").prop('disabled', false);
      $(".pass_conf").css("border", "1px solid #d2d6de");
  } 
})


$(document).ready(function () {
    var navListItems = $('.setup-panel div a'),
            allWells = $('.setup-content'),
            allNextBtn = $('.nextBtn');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
                $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url'],input[type='email'],input[type='radio'],input[type='file'],select,textarea"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');
});
</script>