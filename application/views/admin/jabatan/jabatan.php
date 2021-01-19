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
                  <h2>Data Jabatan</h2>
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
                        <th>Kode Jabatan</th>
                        <th>Unit Kerja</th>
                        <th>Jabatan</th>
                        <th>Level Akses</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>


                    <tbody>
                      <?php $i = 1;
                       foreach ($jabatan as $a) {

                       ?>
                      <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $a->idjabatan; ?></td>
                        <td><?php echo $a->unitkerja; ?></td>
                        <td><?php echo $a->jabatan; ?></td>
                        <?php if ($a->levelakses == 'administrator'){ ?>
                          <td>Administrator</td>
                        <?php }else if($a->levelakses == 'pimpinan') {?>
                          <td>Pimpinan</td>
                        <?php }else if($a->levelakses == 'operator') {?>
                          <td>Staf Umum dan Kepegawaian(Operator)</td>
                        <?php }else if($a->levelakses == 'staf') {?>
                          <td>Staf</td>
                        <?php } ?>
                        <td>
                          <a href="" data-toggle="modal" data-target="#editdata<?=$a->idjabatan; ?>" disabled><img name="edit" width="20" height="20" src="<?php echo base_url('img/edit.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Edit Jabatan" disabled/></a>
                          <a href="<?php echo site_url('administrator/jabatan/hapusjabatan/'.$a->idjabatan); ?>" class="sa-params"><img width="20" height="20" src="<?php echo base_url('img/hapus.png'); ?>" data-toggle="tooltip" data-placement="bottom" data-original-title="Hapus Jabatan"/></a>
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
                <h4 class="modal-title">Tambah Jabatan</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('administrator/jabatan/tambahjabatan'); ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Kode Jabatan</label>
                    <div class="col-lg-9">
                      <input type="text" name="idjabatan" class="form-control" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Unit Kerja</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="unitkerja">
                        <option value="0">--Pilih Unit Kerja--</option>
                        <?php foreach ($uk as $a): ?>
                          <option value="<?php echo $a->idunitkerja; ?>"><?php echo $a->unitkerja; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Jabatan</label>
                    <div class="col-lg-9">
                      <input type="text" name="jabatan" class="form-control" placeholder="Masukkan Jabatan">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Level Akses</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="levelakses">
                        <option value="0">--Pilih Level Akses--</option>
                        <option value="administrator">--Administrator--</option>
                        <option value="pimpinan">--Pejabat Pimpinan/Atasan--</option>
                        <option value="operator">--Staf Umum & Kepegawaian (Operator)--</option>
                        <option value="staf">--Staf--</option>

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

        <?php foreach($jabatan as $a): ?>
        <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" id="editdata<?=$a->idjabatan; ?>">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" aria-hidden="true" data-dismiss="modal" class="close">x</button>
                <h4 class="modal-title">Edit Jabatan</h4>
              </div>
              <form class="form-horizontal" action="<?php echo base_url('administrator/jabatan/editjabatan'); ?>" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Kode Jabatan</label>
                    <div class="col-lg-9">
                      <input type="text" name="idjabatan" class="form-control" value="<?= $a->idjabatan; ?>" readonly="readonly" >
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Jabatan</label>
                    <div class="col-lg-9">
                      <input type="text" name="jabatan" class="form-control" value="<?= $a->jabatan; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Unit Kerja</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="unitkerja">
                        <option value="0">--Pilih Unit Kerja--</option>
                        <?php foreach ($uk as $b): ?>
                          <option value="<?php echo $b->idunitkerja; ?>" <?php if($b->idunitkerja == $a->idunitkerja){ echo "selected='selected;'";} ?>><?php echo $b->unitkerja; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-3 col-sm-2 control-label">Level Akses</label>
                    <div class="col-lg-9">
                      <select class="form-control" name="levelakses">
                        <?php
                          $administrator="";$pimpinan="";$operator="";$staf="";
                          if($a->levelakses=="administrator"){ $administrator='selected="selected"';$pimpinan='';$operator='';$staf='';}
                          else if($a->levelakses=="pimpinan"){ $administrator='';$pimpinan='selected="selected"';$operator='';$staf=''; }
                          else if($a->levelakses=="operator"){ $administrator='';$pimpinan='';$operator='selected="selected"';$staf=''; }
                          else if($a->levelakses=="staf"){ $administrator='';$pimpinan='';$operator='';$staf='selected="selected"'; }

                        ?>
                        <option value="administrator" <?php echo $administrator; ?>>Administrator</option>
                        <option value="pimpinan" <?php echo $pimpinan; ?>>Pimpinan</option>
                        <option value="operator" <?php echo $operator; ?>>Staf Umum & Kepegawaian(Operator)</option>
                        <option value="staf" <?php echo $staf; ?>>Staf</option>
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
