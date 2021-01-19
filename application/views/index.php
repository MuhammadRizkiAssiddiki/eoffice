<?php $this->load->view('template/header'); ?>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
          <!-- sidebar menu -->
            <?php $this->load->view('template/sidebar'); ?>
          <!-- /sidebar menu -->


        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="row tile_count">
            <?php if ($level == 'pimpinan'): ?>
              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Surat Masuk Bulan Ini<br> &nbsp;</span>
                <div class="count green"><?php echo $bulansm; ?></div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Surat Masuk<br> &nbsp;</span>
                <div class="count"><?php echo $jumlahsm; ?></div>
              </div>

              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Surat Keluar Bulan Ini<br> &nbsp;</span>
                <div class="count green"><?php echo $bulansk+$bulanski; ?></div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Surat Keluar<br> &nbsp;</span>
                <div class="count"><?php echo $jumlahsk+$jumlahski; ?></div>
              </div>
            <?php endif; ?>
            <?php if ($level == 'operator'): ?>
              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Register Surat Masuk <br> &nbsp;&nbsp;&nbsp;&nbsp;Internal</span>
                <div class="count"><?php echo $totalsi; ?></div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Register Surat Masuk <br> &nbsp;&nbsp;&nbsp;&nbsp;Eksternal</span>
                <div class="count"><?php echo $totalse; ?></div>
              </div>
              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-user"></i> Register Surat Keluar <br> &nbsp;</span>
                <div class="count"><?php echo $totalsk; ?></div>
              </div>
            <?php endif; ?>
            <?php if ($level != 'pimpinan'): ?>
              <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
                <span class="count_top"><i class="fa fa-clock-o"></i> Disposisi Masuk <br> &nbsp; </span>
                 <div class="count">  <?php echo $td; ?></div>
              </div>
            <?php endif; ?>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Disposisi Masuk <br> &nbsp;&nbsp;&nbsp;&nbsp;Bulan Ini</span>
              <div class="count green"><?php echo $bulan; ?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Disposisi <br> &nbsp; </span><br>
              <div class="count"><?php echo $jumlah; ?></div>
            </div>
          </div>
          <!-- /top tiles -->

          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="dashboard_graph">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
			</ol>

			<!-- deklarasi carousel -->
			<div class="carousel-inner" role="listbox">
				<div class="item active">
					<img src="<?php echo base_url('img/univrab4.jpg'); ?>" alt="www.malasngoding.com">
					<div class="carousel-caption">
            <h3>Universitas Abdurrab</h3>
						<p>E-Office Universitas Abdurrab</p>
            <p>Pekanbaru-Riau</p>
					</div>
				</div>
				<div class="item">
					<img src="<?php echo base_url('img/univrab3.jpg'); ?>" alt="www.malasngoding.com">
					<div class="carousel-caption">
						<h3>Universitas Abdurrab</h3>
						<p>E-Office Universitas Abdurrab</p>
            <p>Pekanbaru-Riau</p>
					</div>
				</div>
				<div class="item">
					<img src="<?php echo base_url('img/univrab2.jpg'); ?>" alt="www.malasngoding.com">
					<div class="carousel-caption">
            <h3>Universitas Abdurrab</h3>
						<p>E-Office Universitas Abdurrab</p>
            <p>Pekanbaru-Riau</p>
					</div>
				</div>
			</div>

			<!-- membuat panah next dan previous -->
			<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
                <div class="clearfix"></div>
              </div>
            </div>

          </div>
          <br />

        </div>
        <!-- /page content -->

<?php $this->load->view('template/footer'); ?>
  </body>
</html>
