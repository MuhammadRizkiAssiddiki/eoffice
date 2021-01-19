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
                  <h2>Register Surat Internal</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form class="form-horizontal form-label-left" action="<?php echo base_url('operator/suratinternal/prosestambahsi'); ?>" method="post" enctype="multipart/form-data" role="form">
                    <span class="section">Data Surat Internal</span>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ID Register Surat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" value="<?php echo $kode; ?>" name="idsi" readonly type="text">
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
                          <?php foreach ($js as $a): ?>
                            <option value="<?php echo $a->idjenis; ?>"><?php echo $a->jenissurat; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Sifat Surat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="sifatsurat">
                          <option value="0">--Pilih Sifat Surat--</option>
                          <?php foreach ($ss as $a): ?>
                            <option value="<?php echo $a->idsifat; ?>"><?php echo $a->sifatsurat; ?></option>
                          <?php endforeach; ?>
                        </select>
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
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Asal Surat<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="asalsurat">
                          <option value="0">--Pilih Asal Surat--</option>
                          <?php foreach ($jp as $a): ?>
                            <option value="<?php echo $a->jabatan.' - '.$a->nama; ?>"><?php echo $a->jabatan.' - '.$a->nama; ?></option>
                          <?php endforeach; ?>
                        </select>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Perihal <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea" required="required" name="perihal" class="form-control col-md-7 col-xs-12" placeholder="Masukkan Perihal Surat"></textarea>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File Surat <span class="required">*</span>
                      </label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <input name="filesurat" placeholder="Masukkan File Surat" required="required" type="file">
                      </div>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <div style="color: red">
                          <?php echo $error ?>
                        </div>
                      </div>
                    </div>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File Lampiran
                      </label>
                      <div class="col-md-4 col-sm-6 col-xs-12">
                        <input name="filelampiran" placeholder="Masukkan File Surat" type="file">
                        Inputkan File Lampiran Jika Tersedia(Opsional)
                      </div>
                      <div class="col-md-2 col-sm-6 col-xs-12">
                        <div style="color: red">
                          <?php echo $error2 ?>
                        </div>
                      </div>

                    </div>

                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="cancel" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                  </form>

                   <!-- Copy Fields -->
                   <div class="copy hide">
                   <div class="item form-group">
                     <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">File Lampiran
                     </label>
                     <div class="col-md-3 col-sm-6 col-xs-12">
                       <input name="filelampiran" placeholder="Masukkan File Lampiran" type="file">

                       <div style="color: red">
                         <?php echo $error ?>
                       </div>
                     </div>
                     <div class="col-md-3 col-sm-6 col-xs-12">
                       <button class="btn btn-danger remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
                     </div>
                   </div>
                   </div>

                </div>
              </div>
            </div>

          </div>

          <br />

        </div>
        <!-- /page content -->

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
    $(document).ready(function() {
      $(".add-lampiran").click(function(){
          var html = $(".copy").html();
          $(".add-lampiran").after(html);
      });
      $("body").on("click",".remove",function(){
          $(this).parents(".form-group").remove();
      });
    });
</script>

<script type="text/javascript">
  $('a[name=edit]').attr('disabled', false);
</script>
<script>
    $('#myDatepicker').datetimepicker();

    $('#myDatepicker2').datetimepicker({
        format: 'DD.MM.YYYY'
    });

    $('#myDatepicker3').datetimepicker({
        format: 'hh:mm A'
    });

    $('#myDatepicker4').datetimepicker({
        ignoreReadonly: true,
        allowInputToggle: true
    });

    $('#datetimepicker6').datetimepicker();

    $('#datetimepicker7').datetimepicker({
        useCurrent: false
    });

    $("#datetimepicker6").on("dp.change", function(e) {
        $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
    });

    $("#datetimepicker7").on("dp.change", function(e) {
        $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
    });
</script>
  <script type="text/javascript">
              $(document).ready(function () {
                  $('#datepicker').datepicker({
                      format: "yyyy-mm-dd",
                      autoclose:true
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
