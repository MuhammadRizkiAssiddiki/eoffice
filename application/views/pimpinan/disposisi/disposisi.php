<?php $this->load->view('template/header'); ?>
<!-- Datatables -->
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url('assets/'); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">


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
                  <h2>Data Disposisi Masuk</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Settings 1</a>
                        </li>
                        <li><a href="#">Settings 2</a>
                        </li>
                      </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                  </ul>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table id="datatable" class="table table-striped">
                    <thead>
                      <tr>
                        <th></th>
                        <th>Asal Disposisi</th>
                        <th>Isi Disposisi</th>
                        <th>Sifat Disposisi</th>
                        <th>Buka Surat</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php $i = 1;
                       foreach ($dsp as $a) {

                       ?>
                      <tr>
                        <td>
                          <?php if ($a->statusdisposisi == 'Belum Dibaca') {  ?>
                            <img src="<?php echo base_url('img/mail.png'); ?>">
                        <?php  } elseif ($a->statusdisposisi == 'Sudah Dibaca') { ?>
                          <img src="<?php echo base_url('img/open-email.png'); ?>">
                        <?php  } ?>
                        </td>
                        <td><?php echo $a->asaldisposisi; ?></td>
                        <td><?php echo $a->kalimatdisposisi; ?></td>
                        <td><?php echo $a->sifatdisposisi; ?></td>
                        <td>
                          <?php if ($level == 'administrator'){ ?>
                            <a href="<?php echo site_url('administrator/disposisi/detaildsp/'.$a->iddisposisi); ?>" class="btn btn-default">Buka Surat</a>
                          <?php }else if($level == 'operator'){ ?>
                            <a href="<?php echo site_url('operator/disposisi/detaildsp/'.$a->iddisposisi); ?>" class="btn btn-default">Buka Surat</a>
                          <?php }else if($level == 'pimpinan'){ ?>
                            <a href="<?php echo site_url('pimpinan/disposisi/detaildsp/'.$a->iddisposisi); ?>" class="btn btn-default">Buka Surat</a>
                          <?php }else if($level == 'staf'){ ?>
                            <a href="<?php echo site_url('staf/disposisi/detaildsp/'.$a->iddisposisi); ?>" class="btn btn-default">Buka Surat</a>
                          <?php } ?>
                        </td>
                      </tr>
                    <?php } ?>
                    </tbody>
                  </table>
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
<script type="text/javascript">
  $('a[name=edit]').attr('disabled', false);
</script>


  </body>
</html>
