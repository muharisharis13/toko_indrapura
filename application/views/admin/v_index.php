<!DOCTYPE html>
<html lang="en">

<head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="Produk By Mfikri.com">
      <meta name="author" content="Mesproject">

      <title>Admin</title>

      <!-- Bootstrap Core CSS -->
      <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
      <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
      <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
      <!-- Custom CSS -->
      <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">

      <style type="text/css">
            .bg {
                  width: 100%;
                  height: 100%;
                  position: fixed;
                  z-index: -1;
                  float: left;
                  left: 0;
                  margin-top: -20px;
            }
      </style>
</head>

<body>
      <!-- <img src="https://images.unsplash.com/photo-1623063204455-3729f5ca0232?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1994&q=80" alt="gambar" class="bg" /> -->
      <!-- Navigation -->
      <?php
      $this->load->view('admin/menu');
      ?>

      <!-- Page Content -->
      <div class="container">

            <!-- Page Heading -->
            <div class="row">
                  <div class="col-lg-12">
                        <h1 class="page-header" style="color:#fcc;">Hello,
                              <small>
                                    <?php
                                    echo $this->session->userdata('nama')
                                    ?>
                              </small>
                        </h1>
                  </div>
            </div>

            <!-- /.row -->
            <div class="mainbody-section text-center">
                  <?php $h = $this->session->userdata('akses'); ?>
                  <?php $u = $this->session->userdata('user'); ?>

                  <!-- Projects Row -->
                  <div class="row">
                        <?php if ($h == '1') { ?>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item blue" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/penjualan' ?>" data-toggle="modal">
                                                <i class="fa fa-shopping-bag"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Penjualan</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item color" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/kategori' ?>" data-toggle="modal">
                                                <i class="fa fa-sitemap"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Kategori</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item purple" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/barang' ?>" data-toggle="modal">
                                                <i class="fa fa-shopping-cart"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Barang</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item red" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/pengguna' ?>" data-toggle="modal">
                                                <i class="fa fa-users"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Pengguna</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item blue" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/laporan' ?>" data-toggle="modal">
                                                <i class="fa fa-bar-chart"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item red" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/penjualan_terlaris' ?>">
                                                <i class="fa fa-money"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Produk Terlaris</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item blue" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/grafik' ?>">
                                                <i class="fa fa-bar-chart"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Grafik</p>
                                          </a>
                                    </div>
                              </div>
                        <?php } ?>
                        <?php if ($h == '2') { ?>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item blue" style="height:150px;">
                                          <a href="#" data-toggle="modal">
                                                <i class="fa fa-shopping-cart"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Penjualan</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item color" style="height:150px;">
                                          <a href="#" data-toggle="modal">
                                                <i class="fa fa-sitemap"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Kategori</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item red" style="height:150px;">
                                          <a href="<?php echo base_url() . 'admin/penjualan' ?>" data-toggle="modal">
                                                <i class="fa fa-shopping-bag"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Penjualan</p>
                                          </a>
                                    </div>
                              </div>
                              <div class="col-md-3 portfolio-item">
                                    <div class="menu-item blue" style="height:150px;">
                                          <a href="#" data-toggle="modal">
                                                <i class="fa fa-bar-chart"></i>
                                                <p style="text-align:left;font-size:14px;padding-left:5px;">Laporan</p>
                                          </a>
                                    </div>
                              </div>
                        <?php } ?>
                  </div>

                  <!-- /.container -->
            </div>x`

            <!-- jQuery -->
            <script src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

            <!-- Bootstrap Core JavaScript -->
            <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>

</body>

</html>