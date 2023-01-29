<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Laporan transaksi By Point</title>
</head>

<body>



  <div class=" container-fluid">

    <h2 style="text-align: center;">
      Laporan Penjualan Transaksi By Point
    </h2>
    <table border="1" align="center" class="table" style="width: 90vw;">
      <thead>
        <tr>
          <th style="padding: 10px;">No Faktur</th>
          <th>Tanggal</th>
          <th>Total Item</th>
          <th>Total Transaksi</th>
          <th>Total Diskon</th>
          <th>Jumlah Uang Masuk</th>
          <th>Kembalian</th>
          <th>Keterangan</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $total_transaksi = 0;
        $total_diskon = 0;
        $total_uang_masuk = 0;
        $total_kembalian = 0;
        foreach ($data as $item) {
          $total_transaksi += $item['jual_total'];
          $total_diskon += $item['jual_diskon'];
          $total_uang_masuk += $item['jual_jml_uang'];
          $total_kembalian += $item['jual_kembalian'];
          $tgl = date('Y M D', strtotime($item['jual_tanggal']));
        ?>
          <tr>
            <td style="text-align:center;padding:10px">
              <?php echo $item['jual_nofak'] ?>
            </td>
            <td style="text-align:center;">
              <?php echo $tgl ?>
            </td>
            <td style="text-align:center;">
              <?php echo $item['total_item'] ?>
            </td>
            <td style="text-align:center;">
              Rp. <?php echo number_format($item['jual_total']) ?>
            </td>
            <td style="text-align:center;">
              Rp. <?php echo number_format($item['jual_diskon']) ?>
            </td>
            <td style="text-align:center;">
              Rp. <?php echo number_format($item['jual_jml_uang']) ?>
            </td>
            <td style="text-align:center;">
              Rp. <?php echo number_format($item['jual_kembalian']) ?>
            </td>
            <td>
              <?php
              echo $item["jual_keterangan"]
              ?>
            </td>
          </tr>
        <?php } ?>
      </tbody>
      <tfoot>
        <tr>
          <th colspan="3" style="padding: 10px;">
            Total
          </th>
          <th>
            Rp. <?= number_format($total_transaksi); ?>
          </th>
          <th>
            Rp. <?= number_format($total_diskon); ?>
          </th>
          <th>
            Rp. <?= number_format($total_uang_masuk); ?>
          </th>
          <th>
            Rp. <?= number_format($total_kembalian); ?>
          </th>
        </tr>
      </tfoot>
    </table>
  </div>
</body>

</html>