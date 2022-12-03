<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <title>Faktur Penjualan Barang</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/laporan.css') ?>" />
</head>

<body>
    <div class="container">
        <div class="header">
            <div class="name_shop">
                SUMBER JAYA
            </div>
            <div class="address_shop">
                Dusun III, Desa Sipare-pare Kecamatan Air Putih-Kab. Batubara
            </div>
            <div class="info-kasir">
                Kasir :
                <?php
                echo $this->session->userdata("nama")
                ?>
            </div>
            <div class="line" />
        </div>

        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                        <th>Qty</th>
                        <th>Nama barang</th>
                        <th>SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($data->result_array() as $item) {
                    ?>
                        <tr>
                            <td style="padding-bottom:10px;">
                                <?php
                                echo $item['d_jual_qty'];
                                ?>
                            </td>
                            <td style="padding-bottom:10px;">
                                <?php
                                echo $item['d_jual_barang_nama'];
                                ?>
                            </td>
                            <td style="padding-bottom:10px;">
                                <?php
                                echo 'Rp' . number_format($item['d_jual_total']);
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
                <tfoot class="t-foot">
                    <tr>
                        <td colspan="2" style="text-align:center;"><b>Total</b></td>
                        <td style="text-align:center;"><b><?php echo 'Rp ' . number_format($item['jual_total']); ?></b></td>

                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="line" />
        <div class="see-you">
            Terima kasih sudah Belanja di Toko Indrapura
        </div>

    </div>

</body>

</html>