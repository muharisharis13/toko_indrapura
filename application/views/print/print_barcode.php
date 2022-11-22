<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link media="all" href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
  <link media="all" href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
  <link media="all" href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
  <!-- Custom CSS -->
  <link media="all" href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
  <link media="all" href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
  <link media="all" href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
  <link media="all" href="<?php echo base_url() . 'assets/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
  <title>Print Barcode Barang</title>

  <style type="text/css" media="all">
    .custom_container {
      display: flex;
      flex-wrap: wrap;
    }

    @media print {

      pre,
      blockquote {
        page-break-inside: avoid;
      }
    }
  </style>
</head>

<body style="margin:0;padding:0;box-sizing:border-box">

  <div class="custom_container">
    <?php
    foreach ($data_barang_id as $item) {
      for ($x = 0; $x < $item['barang_stok']; $x++) {
    ?>
        <div style="border:1px solid black;padding:10px;">
          <img src="<?php echo base_url('admin/barang/initBarcode/' . $item['barang_id']); ?>" alt="">
          <?= $item["barang_id"] ?>
        </div>

    <?php
      }
    } ?>

  </div>
  <script>
    window.print()
  </script>
</body>

</html>