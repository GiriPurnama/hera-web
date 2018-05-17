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
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Admin -->
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
            <form role="form" id="formHome" method="POST" enctype="multipart/form-data">
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
                <button type="submit" class="btn btn-primary" id="homeSave">Simpan</button>
                <button type="button" id="closeBtn" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
              </div>
            </form>
          </div>
          <!-- /.box -->

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
<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
  $(document).on('click', '#homeSave', function(){
      var data = new FormData(this);
      data.append('title_img', $('#title_image').val());
      data.append('desc_img', $('#deskripsi_image').val());
      data.append('image_home', $('#upload_image')[0].files[0]);
      data.append('home', $('#homeSave').text());
      
      $.ajax({
         url : "server.php",  
         method: 'POST',
         cache: false,
         contentType: false,
         processData: false,
         data : data,

         success: function(data){
            $('#formHome').trigger("reset");
            $('#closeBtn').click();
            $("#modalSuccess").modal("show");
         }
      });

  });
</script>