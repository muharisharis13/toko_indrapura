<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjualan Terlaris</title>
  <!-- Bootstrap Core CSS -->
  <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
  <!-- Custom CSS -->
  <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
  <link href="<?php echo base_url() . 'assets/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/bootstrap-datetimepicker.min.css' ?>">
</head>

<body>
  <div class="container">
    <table class="table table-bordered text-center" id="tabledata">
      <thead class=" text-center">
        <tr class="text-center">
          <th class="text-center">No</th>
          <th class="text-center">Kode barang</th>
          <th class="text-center">Nama Barang</th>
          <th class="text-center">Jumlah Barang Terjual</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        foreach ($data_penjualan_terlaris->result_array() as $item) {
        ?>
          <tr>
            <td>
              <?php
              echo $no++
              ?>
            </td>
            <td>
              <?php
              echo $item['d_jual_barang_id']
              ?>
            </td>
            <td>
              <?php
              echo $item['d_jual_barang_nama']
              ?>
            </td>
            <td>
              <?php
              echo $item['d_jual_qty']
              ?>
            </td>
          </tr>
        <?php
        }

        ?>
      </tbody>
    </table>
  </div>
  <!-- /.container -->

  <!-- jQuery -->
  <script src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

  <!-- Bootstrap Core JavaScript -->
  <script src="<?php echo base_url() . 'assets/dist/js/bootstrap-select.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/dataTables.bootstrap.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/jquery.price_format.min.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/moment.js' ?>"></script>
  <script src="<?php echo base_url() . 'assets/js/bootstrap-datetimepicker.min.js' ?>"></script>

  <script>
    $("#tabledata").DataTable();
  </script>

</body>

</html>