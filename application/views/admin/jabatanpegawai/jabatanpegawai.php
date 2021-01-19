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
                  <h2>Data Jabatan Pegawai</h2>
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
                  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambahdata">Tambah Data</button>
                  <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Kode Jabatan Pegawai</th>
                        <th>Unit Kerja</th>
                        <th>Jabatan</th>
                        <th>Nama Pegawai</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php $i = 1;
                       foreach ($jp as $a) {

                       ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $a->idjp; ?></td>
                        <td><?php echo $a->unitkerja; ?></td>
                        <td><?php echo $a->jabatan; ?></td>
                        <td><?php echo $a->nama; ?></td>
                        <td>
                          <a href="" data-toggle="modal" data-target="#editdata<?=$a->idjp; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Jabatan Pegawai" disabled/></a>
                          <a href="<?php echo site_url('administrator/jabatanpegawai/hapusjp/'.$a->idjp); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Jabatan Pegawai"/></a>
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
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="tambahdata">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                <h4 class="modal-title">Tambah Jabatan Pegawai</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('administrator/jabatanpegawai/tambahjp'); ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Kode Jabatan Pegawai</label>
                    <div class="col-lg-9">
                      <input type="text" name="idjp" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Jabatan</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="jabatan">
                        <option value="0">--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $a): ?>
                          <option value="<?php echo $a->idjabatan; ?>"><?php echo $a->jabatan.' - '.$a->unitkerja; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Nama Pegawai</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="nip">
                        <option value="0">--Pilih Pegawai--</option>
                        <?php foreach ($pegawai as $a): ?>
                          <option value="<?php echo $a->nip; ?>"><?php echo $a->nama; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                </div>
              </form>
            </div>
          </div>

        </div>

        <?php foreach($jp as $a): ?>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$a->idjp; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                <h4 class="modal-title">Edit Jabatan Pegawai</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('administrator/jabatanpegawai/editjp'); ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Kode Jabatan Pegawai</label>
                    <div class="col-lg-9">
                      <input type="text" name="idjp" class="form-control" value="<?= $a->idjp; ?>" readonly="readonly" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Jabatan Pegawai</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="jabatan">
                        <option value="0">--Pilih Jabatan--</option>
                        <?php foreach ($jabatan as $b): ?>
                          <option value="<?php echo $b->idjabatan; ?>" <?php if($b->idjabatan == $a->idjabatan){ echo "selected='selected;'";} ?>><?php echo $b->jabatan.' - '.$b->unitkerja; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Pegawai</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="nip">
                        <option value="0">--Pilih Pegawai--</option>
                        <?php foreach ($pegawai as $b): ?>
                          <option value="<?php echo $b->nip; ?>" <?php if($b->nip == $a->nip){ echo "selected='selected;'";} ?>><?php echo $b->nama; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" class="btn btn-info">Simpan</button>
                  <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                </div>
              </form>
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
<script type="text/javascript">
  $('a[name=edit]').attr('disabled', false);
</script>


  </body>
</html>
