<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="Mesproject">

    <title><?= $title ?></title>

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
        <div class="row">
            <div class="col-lg-12">
                <center><?php echo $this->session->flashdata('msg'); ?></center>
                <h1 class="page-header">Member
                    <small>Penukaran Point</small>
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="">No. Handphone</label>
                <input type="text" class="form-control" name="nohp">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="">Point</label>
                <input type="text" class="form-control" name="point">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="">Uang</label>
                <input type="text" class="form-control" name="uang">
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <label for="">Product</label>
                <select name="product" class="form-control">
                    <option value="-">-Select Product-</option>
                </select>
            </div>
        </div>

    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
                    </tbody>
                </table>
                <table>

                    <tr>
                        <td style="width:760px;" rowspan="3">
                            <!-- <button type="submit" class="btn btn-info btn-lg"> Simpan</button> -->
                        </td>
                        <th style="width:140px;">Total Belanja(Rp)</th>
                        <th style="text-align:right;width:140px;">
                            <input type="text" name="total3" id="total3" value="" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                        </th>
                        <input type="hidden" id="total" name="total" value="" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                    </tr>
                    <tr>
                        <th>Grand Total(Rp)</th>
                        <th style="text-align:right;"><input type="text" id="total2" value="" name="total2" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                        <!-- <input type="text" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required> -->
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
                    <tr>
                        <td></td>
                        <th></th>
                        <th style="text-align:right;"><button class="btn btn-success" data-toggle="modal" data-target="#tukarPoint">Tukar Point</button></th>
                    </tr>

                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="tukarPoint" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Pengurangan Point</h4>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div style="display: flex; justify-content:center;align-items:center;flex-direction:column">
                            <label>Nama</label>
                            <label>Point</label>
                            <input type="text" class="form-control" style="width:10em" name="pengurangan_point">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>

        </div>
    </div>


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

</body>

</html>