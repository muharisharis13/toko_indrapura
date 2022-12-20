<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="Mesproject">

    <title>Transaksi Penjualan</title>

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

    <!-- Navigation -->
    <?php
    $this->load->view('admin/menu');
    ?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <h1 class="page-header">Transaksi
                    <small>Penjualan (Eceran)</small>
                    <a href="#" data-toggle="modal" data-target="#largeModal" class="pull-right"><small>Cari Produk!</small></a>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <form action="<?php echo base_url() . 'admin/penjualan/add_to_cart' ?>" method="post">
                    <table>
                        <tr>
                            <th>Kode Barang</th>
                        </tr>
                        <tr>
                            <th><input type="text" name="kode_brg" id="kode_brg" class="form-control input-sm"></th>
                        </tr>
                        <div id="detail_barang" style="position:absolute;">
                        </div>
                    </table>
                </form>
                <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th style="text-align:center;">Satuan</th>
                            <th style="text-align:center;">Harga(Rp)</th>
                            <!-- <th style="text-align:center;">Diskon(Rp)</th> -->
                            <th style="text-align:center;">Qty</th>
                            <th style="text-align:center;">Sub Total</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php
                        $subtotal = 0;
                        foreach ($cart as $items) : ?>
                            <?php
                            echo form_hidden($i . '[rowid]', $items['rowid']);
                            $subtotal += $items['subtotal'];
                            ?>
                            <tr>
                                <td>
                                    <?= $i++ ?>
                                </td>
                                <td><?= $items['id']; ?></td>
                                <td><?= $items['name']; ?></td>
                                <td style="text-align:center;"><?= $items['satuan']; ?></td>
                                <td style="text-align:right;"><?php echo number_format($items['amount']); ?></td>
                                <!-- <td style="text-align:right;"><?php echo number_format($items['disc']); ?></td> -->
                                <td style="text-align:center;">
                                    <form action="<?= base_url('admin/penjualan/updateQty') ?>" method="post">
                                        <input type="hidden" value="<?= $items['id'] ?>" name="update_kobar">
                                        <input type="text" name="update_qty" value="<?php echo $items['qty']; ?>">
                                        <input type="hidden" name="amount" value="<?php echo $items['amount'] ?>">
                                    </form>
                                </td>
                                <td style="text-align:right;"><?php echo number_format($items['subtotal']); ?></td>

                                <td style="text-align:center;"><a href="<?php echo base_url() . 'admin/penjualan/remove/' . $items['id']; ?>" class="btn btn-warning btn-xs"><span class="fa fa-close"></span> Batal</a></td>
                            </tr>

                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form action="<?php echo base_url() . 'admin/penjualan/simpan_penjualan' ?>" method="post">
                    <table>

                        <tr>
                            <td style="width:760px;" rowspan="2">
                                <button type="submit" class="btn btn-info btn-lg"> Simpan</button>
                                <?php
                                if (count($cart) > 0) {


                                ?>
                                    <button type="button" id="holding_btn" class="btn btn-warning btn-lg"> Holding</button>
                                <?php } ?>

                                <?php if (count($cart) == 0) {
                                ?>
                                    <button type="button" id="list_holding" class="btn btn-success btn-lg" data-toggle="modal" data-target="#listHoldingModal"> List Hold</button>
                                <?php
                                }
                                ?>

                            </td>
                            <th style="width:140px;">Total Belanja(Rp)</th>
                            <th style="text-align:right;width:140px;">
                                <input type="text" name="total2" id="total2" value="<?php echo number_format($subtotal); ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                            </th>
                            <input type="hidden" id="total" name="total" value="<?php echo $subtotal; ?>" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                        </tr>
                        <tr>
                            <th>Tunai(Rp)</th>
                            <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                            <!-- <input type="text" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required> -->
                        </tr>
                        <tr>
                            <td></td>
                            <th>
                                Diskon (Rp)
                            </th>
                            <th>
                                <input style="margin-bottom:5px ;" type="text" class="form-control input-sm" placeholder="Diskon" id="jual_diskon" name="jual_diskon">
                            </th>
                        </tr>
                        <tr>
                            <td></td>
                            <th>Kembalian(Rp)</th>
                            <th style="text-align:right;"><input disabled type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required></th>
                        </tr>

                    </table>
                </form>
                <hr />
            </div>
            <!-- /.row -->
            <!-- ============ MODAL ADD =============== -->
            <div class="modal fade" id="listHoldingModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4>List Holding</h4>
                        </div>
                        <div class="modal-body">
                            <table class="table table-bordered table-condensed" id="mydata">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>List item</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($hold as $holding) :
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $holding['id']
                                                ?>
                                            </td>
                                            <td>
                                                <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;">
                                                    <thead>
                                                        <tr>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th style="text-align:center;">Satuan</th>
                                                            <th style="text-align:center;">Harga(Rp)</th>
                                                            <!-- <th style="text-align:center;">Diskon(Rp)</th> -->
                                                            <th style="text-align:center;">Qty</th>
                                                            <th style="text-align:center;">Sub Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $i = 1; ?>
                                                        <?php
                                                        $subtotal = 0;
                                                        $cart = json_decode($holding['list_item']);
                                                        foreach ($cart as $items) : ?>
                                                            <?php
                                                            echo form_hidden($i . '[rowid]', $items->rowid);
                                                            $subtotal += $items->subtotal;
                                                            ?>
                                                            <tr>
                                                                <td><?= $items->id; ?></td>
                                                                <td><?= $items->name; ?></td>
                                                                <td style="text-align:center;"><?= $items->satuan; ?></td>
                                                                <td style="text-align:right;"><?php echo number_format($items->amount); ?></td>
                                                                <!-- <td style="text-align:right;"><?php echo number_format($items->disc); ?></td> -->
                                                                <td style="text-align:center;">
                                                                    <form action="<?= base_url('admin/penjualan/updateQty') ?>" method="post">
                                                                        <input type="hidden" value="<?= $items->id ?>" name="update_kobar">
                                                                        <input readonly type="text" name="update_qty" value="<?php echo $items->qty; ?>">
                                                                        <input type="hidden" name="amount" value="<?php echo $items->amount ?>">
                                                                    </form>
                                                                </td>
                                                                <td style="text-align:right;"><?php echo number_format($items->subtotal); ?></td>


                                                            </tr>

                                                            <?php $i++; ?>
                                                        <?php endforeach; ?>
                                                    </tbody>
                                                </table>
                                            </td>
                                            <td style="display:flex;align-items:center;height:200px;justify-content:center;">

                                                <button class="btn btn-info hold_add_cart" data-id='<?= $holding['id'] ?>'>
                                                    Add To Cart
                                                </button>
                                            </td>

                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



            <!-- /====== -->
            <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 class="modal-title" id="myModalLabel">Data Barang</h3>
                        </div>
                        <div class="modal-body" style="overflow:scroll;height:500px;">

                            <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                                <thead>
                                    <tr>
                                        <th style="text-align:center;width:40px;">No</th>
                                        <th style="width:120px;">Kode Barang</th>
                                        <th style="width:240px;">Nama Barang</th>
                                        <th>Satuan</th>
                                        <th style="width:100px;">Harga (Eceran)</th>
                                        <th>Stok</th>
                                        <th style="width:100px;text-align:center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 0;
                                    foreach ($cari->result_array() as $a) :
                                        $no++;
                                        $id = $a['barang_id'];
                                        $nm = $a['barang_nama'];
                                        $satuan = $a['barang_satuan'];
                                        $harpok = $a['barang_harpok'];
                                        $harjul = $a['barang_harjul'];
                                        $harjul_grosir = $a['barang_harjul_grosir'];
                                        $stok = $a['barang_stok'];
                                        $min_stok = $a['barang_min_stok'];
                                        $kat_id = $a['barang_kategori_id'];
                                        $kat_nama = $a['kategori_nama'];
                                    ?>
                                        <tr>
                                            <td style="text-align:center;"><?php echo $no; ?></td>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $nm; ?></td>
                                            <td style="text-align:center;"><?php echo $satuan; ?></td>
                                            <td style="text-align:right;"><?php echo 'Rp ' . number_format($harjul); ?></td>
                                            <td style="text-align:center;"><?php echo $stok; ?></td>
                                            <td style="text-align:center;">
                                                <form action="<?php echo base_url() . 'admin/penjualan/add_to_cart' ?>" method="post">
                                                    <input type="hidden" name="kode_brg" value="<?php echo $id ?>">
                                                    <input type="hidden" name="nabar" value="<?php echo $nm; ?>">
                                                    <input type="hidden" name="satuan" value="<?php echo $satuan; ?>">
                                                    <input type="hidden" name="stok" value="<?php echo $stok; ?>">
                                                    <input type="hidden" name="harjul" value="<?php echo number_format($harjul); ?>">
                                                    <input type="hidden" name="diskon" value="0">
                                                    <input type="hidden" name="qty" value="1" required>
                                                    <!-- <input type="hidden" name="id_cart" value="<?php echo $id_cart ?>"> -->
                                                    <button type="submit" class="btn btn-xs btn-info" title="Pilih"><span class="fa fa-edit"></span> Pilih</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>

                        </div>
                    </div>
                </div>
            </div>



            <!-- ============ MODAL HAPUS =============== -->


            <!--END MODAL-->

            <hr>

            <!-- Footer -->
            <footer>
                <div class="row">
                    <div class="col-lg-12">
                        <p style="text-align:center;">Copyright &copy; <?php echo '2017'; ?> by Mesproject</p>
                    </div>
                </div>
                <!-- /.row -->
            </footer>

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
            document.onkeyup = KeyCheck;

            function KeyCheck(e) {
                var KeyID = (window.event) ? event.keyCode : e.keyCode;
                if (KeyID == 113) {
                    $('#largeModal').modal('show');
                }
            }
        </script>
        <script type="text/javascript">
            $(function() {
                $('#jual_diskon').on('input', function() {

                    let jual_diskon = $('#jual_diskon').val().replace(/[^\d]/g, "")
                    let total = $('#total').val()
                    let hasil = total - jual_diskon
                    let hasil2 = $('#total2').val(hasil);

                    console.log({
                        total
                    })
                })
                $('#jml_uang').on("input", function() {
                    var total = $('#total2').val();
                    var newTotal = total.replace(/[^\d]/g, "");
                    var jumuang = $('#jml_uang').val();
                    var hsl = jumuang.replace(/[^\d]/g, "");
                    $('#jml_uang').val(hsl);
                    $('#kembalian').val(hsl - newTotal);
                });


            });
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#mydata').DataTable();
                $("#jual_diskon").val(0)
                //Ajax kabupaten/kota insert
                $("#kode_brg").focus();
                $("#kode_brg").on("input", function() {
                    var kobar = {
                        kode_brg: $(this).val()
                    };
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() . 'admin/penjualan/get_barang'; ?>",
                        data: kobar,
                        success: function(msg) {
                            $('#detail_barang').html(msg);
                        }
                    });
                });

                $("#kode_brg").keypress(function(e) {
                    if (e.which == 13) {
                        $("#jumlah").focus();
                    }
                });

                $("#holding_btn").click(function() {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() . 'admin/penjualan/add_holding_cart'; ?>",
                        // data: kobar,
                        success: function(msg) {
                            // $('#detail_barang').html(msg);
                            console.log(msg)
                            if (msg == 200) {
                                location.reload()
                            }
                        }
                    });
                })

                $(".hold_add_cart").click(function() {
                    let id = $(this).data('id')
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url() . 'admin/penjualan/add_to_cart/'; ?>" + id,
                        // data: kobar,
                        success: function(msg) {
                            // $('#detail_barang').html(msg);
                            // console.log(msg)
                            if (msg == 200) {
                                location.reload()
                            }
                        }
                    });
                })

            });
        </script>
        <script type="text/javascript">
            $(function() {
                $('.jml_uang').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
                });
                $('#jml_uang2').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ''
                });
                $('#kembalian').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
                });
                $('.harjul').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
                });
                $('#jual_diskon').priceFormat({
                    prefix: '',
                    //centsSeparator: '',
                    centsLimit: 0,
                    thousandsSeparator: ','
                });

            });
        </script>



</body>

</html>