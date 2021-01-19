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
                  <h2>Detail Data Pegawai</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form class="form-horizontal form-label-left" action="<?php echo base_url('administrator/pegawai/proseseditpegawai'); ?>" method="post" enctype="multipart/form-data" role="form">
                    <span class="section">Data Pegawai</span>
                    <?php foreach ($pegawai as $a): ?>
                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">NIP <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="nip" value="<?php echo $a->nip; ?>" type="text" readonly="readonly">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Nama Pegawai <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6" name="nama" value="<?php echo $a->nama; ?>" type="text" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tempat Lahir <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="3"  name="tempatlahir" value="<?php echo $a->tempatlahir; ?>" type="text" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Tanggal Lahir <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" name="tanggallahir" class="form-control has-feedback-left" id="datepicker"  value="<?php echo $a->tanggallahir; ?>" >
                          <span class="fa fa-calendar-o form-control-feedback left" aria-hidden="true"></span>
                        </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Jenis Kelamin <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="jk" value="<?php echo $a->jeniskelamin; ?>"  type="text">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">No Handphone <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="6"  name="nohp" value="<?php echo $a->nohp; ?>"  type="text">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="email" name="email" class="form-control col-md-7 col-xs-12" value="<?php echo $a->email; ?>" >
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Alamat <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="textarea" name="alamat" class="form-control col-md-7 col-xs-12" ><?php echo $a->alamat; ?></textarea>
                      </div>
                    </div>

                    <div class="item form-group">
                      <label for="password" class="control-label col-md-3">Password</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password" type="password" name="password" data-validate-length="6,8" class="form-control col-md-7 col-xs-12"  value="<?php echo $a->password; ?>">
                      </div>
                    </div>

                    <div class="item form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit Kerja <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select class="form-control" name="unitkerja">
                          <option value="0">--Pilih Unit Kerja--</option>
                          <?php foreach ($uk as $b): ?>
                            <option value="<?php echo $b->idunitkerja; ?>" <?php if($b->idunitkerja == $a->idunitkerja){ echo "selected='selected;'";} ?>><?php echo $b->unitkerja; ?></option>
                          <?php endforeach; ?>
                        </select>
                       </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                      </div>
                    </div>
                    <?php endforeach; ?>
                  </form>
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

  </body>
</html>
