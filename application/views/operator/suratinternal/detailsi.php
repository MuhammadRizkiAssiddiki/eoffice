<?php $this->load->view('template/header'); ?>
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

<style>
  body {
    padding-right: 0px !important
  }

  .modal-open {
    overflow-y: auto;
  }
</style>

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
                  <h2>Register Surat Masuk Internal</h2>
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
                    <tbody>
                      <?php foreach ($si as $a): ?>
                        <tr>
                          <td>ID Register Surat Masuk</td>
                          <td><?php echo $a->idsi; ?></td>
                        </tr>
                        <tr>
                          <td>Nomor Surat Masuk</td>
                          <td><?php echo $a->nosurat; ?></td>
                        </tr>
                        <tr>
                          <td>Jenis Surat Masuk</td>
                          <td><?php echo $a->jenissurat; ?></td>
                        </tr>
                        <tr>
                          <td>Sifat Surat Masuk</td>
                          <td><?php echo $a->sifatsurat; ?></td>
                        </tr>
                        <tr>
                          <td>Tanggal Surat Masuk</td>
                          <td><?php echo $a->tanggalsurat; ?></td>
                        </tr>
                        <tr>
                          <td>Pengirim Surat Masuk</td>
                          <td><?php echo $a->asalsurat; ?></td>
                        </tr>
                        <tr>
                          <td>Perihal Surat Masuk</td>
                          <td><?php echo $a->perihal; ?></td>
                        </tr>
                        <tr>
                          <td><a href="<?php echo site_url('operator/suratinternal/downloadsurat/'.$a->filesurat); ?>" class="btn btn-default">Download Surat</a>
                          </td>
                          <?php if ($a->filelampiran != NULL) { ?>
                            <td><a href="" data-toggle="modal" data-target="#editdata<?=$a->idsi; ?>" class="btn btn-default">Lihat Lampiran</a></td>
                          <?php  } else{ ?>
                          <td><a href="#" class="btn btn-default" disabled="disabled">Lihat Lampiran</a></td>
                          <?php  } ?>
                        </tr>
                        <tr>
                          <td><a href="javascript:;" class="btn btn-default" id="tujuansurat" data="<?=$a->idsi; ?>" data-toggle="modal" data-target="#TujuanSurat">Tujuan Surat</a></td>
                          <?php if ($a->filelampiran != NULL) { ?>
                            <td><a href="<?php echo site_url('operator/suratinternal/downloadlmp/'.$a->filelampiran); ?>" class="btn btn-default">Download Lampiran</a></td>
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

        <?php foreach($si as $a): ?>
        <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$a->idsi; ?>">
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

        <!-- /Modal Disposisi -->
        <div class="modal fade bs-example-modal-lg" id="TujuanSurat" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                <h4 class="modal-title">Pilih Tujuan Surat</h4>
              </div>
              <form class="form-horizontal" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Tujuan Surat</label>
                    <div class="col-lg-6">
                      <select class="form-control" name="tujuansurat" id="ts">
                        <option value=""></option>
                        <?php foreach ($jp as $b): ?>
                          <option value="<?php echo $b->idjp; ?>"><?php echo $b->jabatan.' - '.$b->nama; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  id="emailtujuan" class="form-control col-md-7 col-xs-12" name="emailtujuan" type="hidden">
                    </div>
                  </div>

                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input  id="namatujuan" class="form-control col-md-7 col-xs-12" name="namatujuan" type="hidden">
                    </div>
                  </div>

                  <div class="item form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input class="form-control col-md-7 col-xs-12" id="asalsurat" name="asalsurat" type="hidden" value="<?php echo $a->asalsurat; ?>">
                    </div>
                  </div>

                  <div id="loading" style="text-align:center">

                  </div>

                </div>
                <div style="margin-left:580px">
                  <button type="submit" class="btn btn-info" id="btntambah">Tambah</button>
                </div>
              </form>

              <table class="table table-striped">
                <thead>
                  <th>Tujuan Surat</th>
                </thead>
                <tbody id="showtujuansurat">
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


<script type="text/javascript">
  $(document).ready(function(){
    datatujuansurat();
    function datatujuansurat(){
      var id=$('#tujuansurat').attr('data');

      $.ajax({
        type  : "POST",
        url   : "<?php echo base_url('operator/suratinternal/datatujuansurat')?>",
        dataType : "JSON",
        data: "id="+id,
        success : function(data){
          var html = '';
          var i;
          for (var i = 0; i < data.length; i++) {
            html += '<tr>'+
                  '<td>'+data[i].jabatan+' - '+data[i].nama+'</td>'+
                  '</tr>';

          }
          $('#showtujuansurat').html(html);
        }

      });
    }

    $("#ts").change(function(){

    var idtujuan = $("#ts").val();

    $.ajax({
        type:"POST",
        url: "<?=base_url('operator/suratinternal/setemail')?>",
        dataType : "JSON",
        data: {idtujuan: idtujuan},
        cache: false,
        success: function(data){

            
            $("#emailtujuan").val(data['email']);
            $("#namatujuan").val(data['nama']);
        }
    });
  });

  $('#btntambah').on( 'click',function(){
      var id=$('#tujuansurat').attr('data');
      var tujuansurat=$('#ts').val();
      var toemail = $('#emailtujuan').val();
      var nama = $('#namatujuan').val();
      var asalsurat = $('#asalsurat').val();

      $.ajax({
          type : "POST",
          url  : "<?php echo base_url('operator/suratinternal/simpantujuansurat')?>",
          dataType : "JSON",
          data : {tujuansurat:tujuansurat, id:id, toemail:toemail, nama:nama, asalsurat:asalsurat},
          beforeSend: function() {
            $("#loading").html('Sedang Mengirim...');
          },
          success: function(data){
              $("#ts option[value="+tujuansurat+"]").remove();
              $('[name="tujuansurat"]').val("");
              $('[name="emailtujuan"]').val("");
              $('[name="namatujuan"]').val("");
              datatujuansurat();
              $("#loading").html('Notifikasi Email Sudah Dikirim');
          },
          error: function(data){
            $("#ts option[value="+tujuansurat+"]").remove();
            $('[name="tujuansurat"]').val("");
            $('[name="emailtujuan"]').val("");
            $('[name="namatujuan"]').val("");
            datatujuansurat();
            $("#loading").html('Notifikasi Email Belum Terkirim, Cek Koneksi Internet Anda ');
          }
      });
      return false;
      //INSERT KE DALAM MODAL
    });
  });

</script>

  <script type="text/javascript">
              $(document).ready(function () {
                  $('#datepicker2').datepicker({
                      format: "yyyy-mm-dd",
                      autoclose:true
                  });
              });
  </script>

  </body>
</html>
