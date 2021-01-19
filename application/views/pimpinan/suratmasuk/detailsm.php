<?php $this->load->view('template/header'); ?>
<style>
body {
padding-right: 0px !important
}

.modal-open {
overflow-y: auto;
}
</style>
<!-- Datatables -->
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
<!-- bootstrap-daterangepicker -->
<link href="<?php echo base_url('assets/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
<!-- bootstrap-datetimepicker -->
<link href="<?php echo base_url('assets/'); ?>vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">
<!-- bootstrap-datepicker -->
<link href="<?php echo base_url('assets/'); ?>vendors/timepicker/bootstrap-datepicker.min.css" rel="stylesheet">




  <body class="nav-md">
    <div class="container body">
      <div class="main_container">

            <!-- sidebar menu -->
            <?php $this->load->view('template/sidebar'); ?>
            <!-- /sidebar menu -->



        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Surat Masuk</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <!-- <form class="form-horizontal form-label-left" action="<?php// echo base_url('operator/registersurat/prosestambahrsm'); ?>" method="post" enctype="multipart/form-data" role="form">
                    <span class="section">Detail Surat Masuk</span>
                    <?php //foreach ($rsm as $a): ?>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ID Register Surat Masuk<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="idrsm" required="required" type="text">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nomor Surat <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="nosurat" placeholder="Masukkan Nomor Surat" required="required" type="text">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Surat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="jenissurat">
                          <option value="0">--Pilih Jenis Surat--</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sifat Surat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="sifatsurat">
                          <option value="0">--Pilih Sifat Surat--</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Terima <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tanggalterima" class="form-control has-feedback-left" id="datepicker"  placeholder="Masukkan Tanggal Terima">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Surat <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tanggalsurat" class="form-control has-feedback-left" id="datepicker2"  placeholder="Masukkan Tanggal Surat">
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Asal Surat <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="asalsurat" placeholder="Masukkan Asal Surat" required="required" type="text">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tujuan Surat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="tujuansurat">
                          <option value="0">--Pilih Tujuan Surat--</option>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Perihal <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea" required="required" name="perihal" class="form-control col-md-7 col-xs-12" placeholder="Masukkan Alamat Pegawai"></textarea>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File Surat <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="filesurat" placeholder="Masukkan File Surat" required="required" type="file">
                      </div>
                    </div>

                    <div class="ln_solid"></div>
                  <?php //endforeach; ?>
                  </form> -->
                  <table class="table table-striped">
                    <tbody id="show_data">
                      <?php foreach ($sm as $a): ?>
                        <div class="form-group">
                          <div class="col-lg-6">
                            <input type="hidden" name="idsm" id="detailsm" value="<?php echo $a->kodedrsm; ?>">
                          </div>
                        </div>
                        <tr>
                          <td>Nomor Surat Masuk</td>
                          <td><b><?php echo $a->nosurat; ?></b></td>
                        </tr>
                        <tr>
                          <td>Jenis Surat Masuk</td>
                          <td><b><?php echo $a->jenissurat; ?></b></td>
                        </tr>
                        <tr>
                          <td>Sifat Surat Masuk</td>
                          <td><b><?php echo $a->sifatsurat; ?></b></td>
                        </tr>
                        <tr>
                          <td>Tipe Surat Masuk</td>
                          <td><b><?php echo $a->tipesurat; ?><b></td>
                        </tr>
                        <?php if ($a->tipesurat == "Surat Eksternal"): ?>
                          <tr>
                            <td>Tanggal Terima Surat Masuk</td>
                            <td><b><?php echo $a->tanggalterima; ?></b></td>
                          </tr>
                        <?php endif; ?>

                        <tr>
                          <td>Tanggal Surat Masuk</td>
                          <td><b><?php echo $a->tanggalsurat; ?></b></td>
                        </tr>
                        <tr>
                          <td>Pengirim Surat Masuk</td>
                          <td><b><?php echo $a->asalsurat; ?></b></td>
                        </tr>
                        <tr>
                          <td>Tujuan Surat Masuk</td>
                          <td><b><?php echo $a->nama." - ".$a->jabatan; ?></b></td>
                        </tr>
                        <tr>
                          <td>Perihal Surat Masuk</td>
                          <td><b><?php echo $a->perihal; ?></b></td>
                        </tr>
                        <tr>
                          <td><a href="<?php echo site_url('pimpinan/suratmasuk/downloadsm/'.$a->filesurat); ?>" class="btn btn-default">Download Surat</a>
                          </td>
                          <?php if ($a->filelampiran != NULL) { ?>
                            <td><a href="" data-toggle="modal" data-target="#editdata<?=$a->idsm; ?>" class="btn btn-default">Lihat Lampiran</a></td>
                          <?php  } else{ ?>
                          <td><a href="#" class="btn btn-default" disabled="disabled">Lihat Lampiran</a></td>
                          <?php  } ?>
                        </tr>
                        <tr>

                          <!-- /Modal Lihat Lampiran  data-toggle="modal" data-target="#disposisi<?=$a->idsm; ?>"-->

                          <td><a href="javascript:;" class="btn btn-default" id="disposisi" data="<?=$a->idsm; ?>" data-toggle="modal" data-target="#ModalDisposisi">Disposisi Surat</a></td>
                          <?php if ($a->filelampiran != NULL) { ?>
                            <td><a href="<?php echo site_url('pimpinan/suratmasuk/downloadlmp/'.$a->filelampiran); ?>" class="btn btn-default">Download Lampiran</a></td>
                          <?php  } else{ ?>
                          <td><a href="" class="btn btn-default" disabled="disabled">Download Lampiran</a></td>
                          <?php  } ?>

                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                  <embed type="application/pdf" src="<?php echo base_url('filesurat/'.$a->filesurat); ?>" width="100%" height="650">

                </div>
              </div>
            </div>

          </div>

          <br />

        </div>
        <!-- /page content -->

        <?php foreach($sm as $a): ?>

        <!-- /Modal Lihat Lampiran -->
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$a->idsm; ?>">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                <h4 class="modal-title">File Lampiran</h4>
              </div>
              <embed type="application/pdf" src="<?php echo base_url('filesurat/'.$a->filelampiran); ?>" width="100%" height="500">
              <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>

        </div>

        <!-- /End Lihat Lampiran -->

        <!-- /Modal Disposisi -->
        <div class="modal fade bs-example-modal-lg" id="ModalDisposisi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                <h4 style="text-align:center" class="modal-title">Disposisi Surat <?php echo $disposisi; ?></h4>
              </div>
              <?php if ($disposisi != NULL){ ?>
                <br>
                <h3 style="text-align:center">Data Disposisi Sudah Dikirim Kepada Penerima Disposisi</h3> <br>
              <?php }else if($disposisi == NULL){ ?>
                <form class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
                  <div class="modal-body">
                    <div class="form-group">
                      <div class="col-lg-6">
                        <input type="hidden" name="idsm" id="detailsm" value="<?php echo $a->kodedrsm; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Tujuan Disposisi</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="tujuandisposisi" id="tujuandisposisi">
                          <?php foreach ($jp as $a): ?>
                            <option value="<?php echo $a->idjp; ?>"><?php echo $a->nama.' - '.$a->jabatan; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Isi Disposisi</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="isidisposisi" id="isidisposisi">
                          <?php foreach ($kd as $a): ?>
                            <option value="<?php echo $a->idkd; ?>"><?php echo $a->kalimatdisposisi; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-lg-3 col-sm-2 control-label">Sifat Disposisi</label>
                      <div class="col-lg-6">
                        <select class="form-control" name="sifatdisposisi" id="sifatdisposisi">
                          <option value="Biasa">Biasa</option>
                          <option value="Penting">Penting</option>
                          <option value="Segera">Segera</option>
                          <option value="Rahasia">Rahasia</option>
                        </select>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Catatan
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea required="required" name="catatan" id="catatan" class="form-control col-md-7 col-xs-12" placeholder="Masukkan Catatan Disposisi"></textarea>
                      </div>
                    </div>
                  </div>
                  <div style="margin-left:580px">
                    <button type="submit" class="btn btn-info" id="btntambah">Tambah</button>
                  </div>
                </form>

              <?php } ?>

              <table class="table table-striped">
                <thead>
                  <th>Tujuan Disposisi</th>
                  <th>Isi Disposisi</th>
                </thead>
                <tbody id="show_disposisi">
                  <?php //foreach ($disposisi as $b): ?>
                    <!-- <tr>
                      <td><?php// echo $b->nama.' - '.$b->jabatan;?></td>
                      <td><?php //echo $b->kalimatdisposisi; ?></td>
                    </tr> -->
                  <?php// endforeach; ?>
                </tbody>
              </table>
              <div class="modal-footer">
                <button type="cancel" class="btn btn-warning" data-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>

        </div>

        <?php endforeach; ?>

<?php $this->load->view('template/footer'); ?>



<!-- Datatables -->
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Validator -->
<script src="<?php echo base_url('assets/'); ?>vendors/validator/validator.js"></script>
<!-- bootstrap-daterangepicker -->
<script src="<?php echo base_url('assets/'); ?>vendors/moment/min/moment.min.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- bootstrap-datetimepicker -->
<script src="<?php echo base_url('assets/'); ?>vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<!-- Datepicker -->
<script src="<?php echo base_url('assets/'); ?>vendors/timepicker/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url('assets/'); ?>vendors/jquery.js"></script>
<script src="<?php echo base_url('assets/'); ?>vendors/bootstrap.js"></script>



<script type="text/javascript">
  $(document).ready(function(){
  //var iddisposisi = $("#iddisposisi").val();

  //tampildisposisi(); //pemanggilan fungsi tampil Disposisi
  //fungsi tampil Disposisi
  /*$('#show_data').on('click','#disposisi',function(){
    var id=$(this).attr('data');
    function datadisposisi(){
    $.ajax({
       type  : "POST",
       url   : "<?php echo base_url('pimpinan/suratmasuk/datadisposisi')?>",
       dataType : "JSON",
       data: "id="+id,
       success : function(data){
         $('#ModalDisposisi').modal('show');
         var html = '';
         var i;
         for (var i = 0; i < data.length; i++) {
           html += '<tr>'+
                   '<td>'+data[i].nama+' - '+data[i].jabatan+'</td>'+
                   '<td>'+data[i].kalimatdisposisi+'</td>'+
                   '</tr>';

         }
         $('#show_disposisi').html(html);
       }

   });
  }
   return false;
 }); */
 datadisposisi();
 function datadisposisi(){
   var id=$('#detailsm').val();

   $.ajax({
     type  : "POST",
     url   : "<?php echo base_url('pimpinan/suratmasuk/datadisposisi')?>",
     dataType : "JSON",
     data: "id="+id,
     success : function(data){
       var html = '';
       var i;
       for (var i = 0; i < data.length; i++) {
         html += '<tr>'+
                '<td>'+data[i].nama+' - '+data[i].jabatan+'</td>'+
                '<td>'+data[i].kalimatdisposisi+'</td>'+
                '</tr>';

        }
      $('#show_disposisi').html(html);
    }

});
}

 /*$('#show_data').on('click','#disposisi',function(){
   var id=$(this).attr('data');

  return false;
});*/

 $('#btntambah').on('click',function(){
      var id=$('#disposisi').attr('data');
      var parent=$('#detailsm').val();
      var tujuandisposisi=$('#tujuandisposisi').val();
      var isidisposisi=$('#isidisposisi').val();
      var sifatdisposisi=$('#sifatdisposisi').val();
      var catatan=$('#catatan').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo base_url('pimpinan/suratmasuk/simpandisposisi')?>",
          dataType : "JSON",
          data : {id:id, tujuandisposisi:tujuandisposisi , isidisposisi:isidisposisi, sifatdisposisi:sifatdisposisi, catatan:catatan, parent:parent},
          success: function(data){
              $("#tujuandisposisi option[value="+tujuandisposisi+"]").remove();
              $('[name="tujuandisposisi"]').val("");
              $('[name="isidisposisi"]').val("");
              $('[name="sifatdisposisi"]').val("");
              $('[name="catatan"]').val("");
              datadisposisi();
              $("#btntambah").prop('disabled', true);
          }
      });
      return false;
      //INSERT KE DALAM MODAL
  });
});

</script>

  </body>
</html>
