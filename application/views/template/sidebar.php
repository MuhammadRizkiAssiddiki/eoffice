<div class="col-md-3 left_col">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="<?= base_url('welcome'); ?>" class="site_title">&nbsp;&nbsp;&nbsp;<img src="<?php echo base_url('assets/production/images'); ?>/logo.png" alt="" width="170" height="40"></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <?php //foreach ($nama as $a): ?>

    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="<?php echo base_url('assets/production/images'); ?>/img.jpg" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Wellcome,</span>
        <h2><?php echo $nama; ?></h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
  <div class="menu_section">
    <ul class="nav side-menu">
      <?php if ($level == 'pimpinan'){ ?>
        <li><a href="<?php echo site_url('welcome'); ?>"><i class="fa fa-home"></i> Home</a>
        </li>
        <li><a href="<?php echo site_url('pimpinan/suratmasuk'); ?>"><i class="fa fa-comments-o"></i>Surat Masuk(<?php echo $total; ?>)</a>
        </li>
        <li><a href="<?php echo site_url('pimpinan/suratkeluar'); ?>"><i class="fa fa-send"></i>Surat Keluar Eksternal</a>
        </li>
        <li><a href="<?php echo site_url('pimpinan/ski'); ?>"><i class="fa fa-send-o"></i>Surat Keluar Internal</a>
        </li>
        <li><a href="<?php echo site_url('pimpinan/disposisi'); ?>"><i class="fa fa-file-text-o"></i>Disposisi Masuk(<?php echo $td; ?>)</a>
        </li>
      <?php }else if($level == 'administrator'){ ?>
        <li><a href="<?php echo site_url('welcome'); ?>"><i class="fa fa-home"></i> Home</a>
        </li>
        <li><a href="<?php echo site_url('administrator/jenissurat'); ?>"><i class="fa fa-envelope-o"></i>Jenis Surat</a>
        </li>
        <li><a href="<?php echo site_url('administrator/sifatsurat'); ?>"><i class="fa fa-tasks"></i>Sifat Surat</a>
        </li>
        <li><a href="<?php echo site_url('administrator/kalimatdisposisi'); ?>"><i class="fa fa-text-width"></i>Kalimat Disposisi</a>
        </li>
        <li><a href="<?php echo site_url('administrator/unitkerja'); ?>"><i class="fa fa-building-o"></i>Unit Kerja</a>
        </li>
        <li><a href="<?php echo site_url('administrator/jabatan'); ?>"><i class="fa fa-briefcase"></i>Jabatan</a>
        </li>
        <li><a href="<?php echo site_url('administrator/pegawai'); ?>"><i class="fa fa-user"></i>Pegawai</a>
        </li>
        <li><a href="<?php echo site_url('administrator/jabatanpegawai'); ?>"><i class="fa fa-users"></i>Jabatan Pegawai</a>
        </li>
        <li><a href="<?php echo site_url('administrator/disposisi'); ?>"><i class="fa fa-file-text-o"></i>Disposisi Masuk(<?php echo $td; ?>)</a>
        </li>
      <?php }else if($level == 'operator'){ ?>
        <li><a href="<?php echo site_url('welcome'); ?>"><i class="fa fa-home"></i> Home</a>
        </li>
        <li><a href="<?php echo site_url('operator/registersurat'); ?>"><i class="fa fa-envelope-o"></i>Register Surat Masuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Eksternal</a>
        </li>
        <li><a href="<?php echo site_url('operator/suratinternal'); ?>"><i class="fa fa-comments-o"></i>Register Surat Masuk &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Internal</a>
        </li>
        <li><a href="<?php echo site_url('operator/suratkeluar'); ?>"><i class="fa fa-send-o"></i>Register Surat Keluar</a>
        </li>
        <li><a href="<?php echo site_url('operator/disposisi'); ?>"><i class="fa fa-file-text-o"></i>Disposisi Masuk(<?php echo $td; ?>)</a>
        </li>
      <?php }else if($level == 'staf'){ ?>

        <li><a href="<?php echo site_url('welcome'); ?>"><i class="fa fa-home"></i> Home</a>
        </li>
        <li><a href="<?php echo site_url('staf/disposisi'); ?>"><i class="fa fa-file-text-o"></i>Disposisi Masuk(<?php echo $td; ?>)</a>
        </li>
      <?php } ?>


    </ul>
  </div>
</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Settings">
    <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
    <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
    <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
    <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
</div>
</div>

<!-- top navigation -->
<div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="<?php echo base_url('assets/production/images'); ?>/img.jpg" alt=""><?php echo $nama; ?>
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="javascript:;">Help</a></li>
            <li><a href="<?php echo site_url('login/logout') ?>"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
          </ul>
        </li>

        <?php if ($level == 'pimpinan'): ?>
          <li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-green"><?php $jumlah = $total+$td; echo $jumlah; ?></span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
              <?php foreach ($notif as $a): ?>
                <li>
                  <a href="<?php echo site_url('pimpinan/suratmasuk/detailsm/'.$a->idsm); ?>">
                    <span>
                      <span><big><?php echo $a->jenissurat; ?></big></span>
                      <span class="time"><?php echo $a->tanggalsurat; ?></span>
                    </span>
                    <span class="message">
                      <b><?php echo $a->asalsurat.'</b> : '.$a->perihal; ?>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>

              <li>
                <div class="text-center">
                  <a href="<?php echo site_url('pimpinan/suratmasuk'); ?>">
                    <strong>Lihat Semua Surat Masuk</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
              <?php foreach ($nd as $b): ?>
                <li>
                  <a href="<?php echo site_url('pimpinan/disposisi/detaildsp/'.$b->iddisposisi); ?>">
                    <span>
                      <span><big>Disposisi <?php echo $b->sifatdisposisi; ?></big></span>
                      <span class="time"><?php echo $b->tanggaldisposisi; ?></span>
                    </span>
                    <span class="message">
                      <b><?php echo $b->asaldisposisi.'</b> : '.$b->kalimatdisposisi; ?>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>

              <li>
                <div class="text-center">
                  <a href="<?php echo site_url('pimpinan/disposisi'); ?>">
                    <strong>Lihat Semua Disposisi Masuk</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>

        <?php else: ?>
          <li role="presentation" class="dropdown">
            <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
              <i class="fa fa-envelope-o"></i>
              <span class="badge bg-green"><?php echo $td; ?></span>
            </a>
            <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">

              <?php foreach ($nd as $b): ?>
                <li>
                  <?php if ($level == 'operator'){ ?>
                    <a href="<?php echo site_url('operator/disposisi/detaildsp/'.$b->iddisposisi); ?>">
                  <?php } else if($level == 'administrator'){ ?>
                    <a href="<?php echo site_url('administrator/disposisi/detaildsp/'.$b->iddisposisi); ?>">
                  <?php } else if($level == 'staf'){ ?>
                    <a href="<?php echo site_url('staf/disposisi/detaildsp/'.$b->iddisposisi); ?>">
                  <?php } ?>
                    <span>
                      <span><big>Disposisi <?php echo $b->sifatdisposisi; ?></big></span>
                      <span class="time"><?php echo $b->tanggaldisposisi; ?></span>
                    </span>
                    <span class="message">
                      <b><?php echo $b->asaldisposisi.'</b> : '.$b->kalimatdisposisi; ?>
                    </span>
                  </a>
                </li>
              <?php endforeach; ?>

              <li>
                <div class="text-center">
                  <a href="<?php echo site_url('pimpinan/disposisi'); ?>">
                    <strong>Lihat Semua Disposisi Masuk</strong>
                    <i class="fa fa-angle-right"></i>
                  </a>
                </div>
              </li>
            </ul>
          </li>
        <?php endif; ?>


      </ul>
    </nav>
  </div>
</div>
<?php // endforeach; ?>

<!-- /top navigation -->
