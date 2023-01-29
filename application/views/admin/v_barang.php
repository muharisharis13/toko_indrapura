<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="Mesproject">

    <title>Management data barang</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() . 'assets/css/bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/style.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/font-awesome.css' ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url() . 'assets/css/4-col-portfolio.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/dataTables.bootstrap.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/css/jquery.dataTables.min.css' ?>" rel="stylesheet">
    <link href="<?php echo base_url() . 'assets/dist/css/bootstrap-select.css' ?>" rel="stylesheet">
</head>

<body>

    <!-- Navigation -->
    <?php
    $this->load->view('admin/menu');
    ?>

    <!-- Page Content -->
    <div class="container">
        <center><?php echo $this->session->flashdata('msg'); ?></center>
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Data
                    <small>Barang</small>
                    <div class="pull-right">
                        <a href="<?= base_url("admin/barang/ready_all") ?>" class="btn btn-sm btn-info">
                            Ready All
                        </a>
                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#largeModal"><span class="fa fa-plus"></span> Tambah Barang</a>
                        <a href="#" data-toggle="modal" data-target="#modalSatuan" class="btn btn-sm btn-primary">
                            Daftar Satuan Barang
                        </a>
                        <a href="<?php echo base_url("admin/barang/print_barcode") ?>" class="btn btn-sm btn-info">
                            <i class="fa fa-print"></i>
                            Cetak Barcode
                        </a>
                    </div>
                </h1>
            </div>
        </div>
        <!-- /.row -->
        <!-- Projects Row -->
        <div class="row">
            <div class="col-lg-12">
                <table class="table table-bordered table-condensed" style="font-size:11px;" id="mydata">
                    <thead>
                        <tr>
                            <th style="text-align:center;width:40px;">No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan</th>
                            <th>Harga Pokok</th>
                            <th>Harga (Eceran)</th>
                            <th>Harga (Grosir)</th>
                            <th>Stok</th>
                            <th>Min Stok</th>
                            <th>Kategori</th>
                            <th>Status Barang</th>
                            <th style="width:100px;text-align:center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.row -->
        <!-- ============ MODAL ADD =============== -->
        <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Tambah Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/barang/tambah_barang' ?>">
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="control-label col-xs-3">Kode Barang</label>
                                <div class="col-xs-9">
                                    <input name="kobar" class="form-control" type="text" minlength="10" placeholder="Kode Barang..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Barang</label>
                                <div class="col-xs-9">
                                    <input name="nabar" class="form-control" type="text" placeholder="Nama Barang..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kategori</label>
                                <div class="col-xs-9">
                                    <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                        <?php foreach ($kat2->result_array() as $k2) {
                                            $id_kat = $k2['kategori_id'];
                                            $nm_kat = $k2['kategori_nama'];
                                        ?>
                                            <option value="<?php echo $id_kat; ?>"><?php echo $nm_kat; ?></option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="control-label col-xs-3">Satuan</label>
                                <div class="col-xs-9">
                                    <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                        <?php
                                        foreach ($satuan_baru->result_array() as $item) {
                                            $item_name = $item['name'];
                                            echo "<option>$item_name</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga Pokok</label>
                                <div class="col-xs-9">
                                    <input name="harpok" class="harpok form-control" type="text" placeholder="Harga Pokok..." style="width:335px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga (Eceran)</label>
                                <div class="col-xs-9">
                                    <input name="harjul" class="harjul form-control" type="text" placeholder="Harga Jual Eceran..." style="width:335px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga (Grosir)</label>
                                <div class="col-xs-9">
                                    <input name="harjul_grosir" class="harjul form-control" type="text" placeholder="Harga Jual Grosir..." style="width:335px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Stok</label>
                                <div class="col-xs-9">
                                    <input name="stok" class="form-control" type="number" placeholder="Stok..." style="width:335px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Minimal Stok</label>
                                <div class="col-xs-9">
                                    <input name="min_stok" class="form-control" type="number" placeholder="Minimal Stok..." style="width:335px;">
                                </div>
                            </div>





                        </div>

                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button class="btn btn-info">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ============ MODAL EDIT =============== -->
        <?php
        // foreach ($data->result_array() as $a) {
        // $id = $a['barang_id'];
        // $nm = $a['barang_nama'];
        // $satuan = $a['barang_satuan'];
        // $harpok = $a['barang_harpok'];
        // $harjul = $a['barang_harjul'];
        // $harjul_grosir = $a['barang_harjul_grosir'];
        // $stok = $a['barang_stok'];
        // $min_stok = $a['barang_min_stok'];
        // $kat_id = $a['barang_kategori_id'];
        // $kat_nama = $a['kategori_nama'];
        ?>
        <div id="modalEditPelanggan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo base_url() . 'admin/barang/edit_barang' ?>" id="form_edit">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kode Barang</label>
                                <div class="col-xs-9">
                                    <input name="kobar" class="form-control" type="text" value="" minlength="13" placeholder="Kode Barang..." style="width:335px;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Nama Barang</label>
                                <div class="col-xs-9">
                                    <input name="nabar" class="form-control" type="text" value="" placeholder="Nama Barang..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Kategori</label>
                                <div class="col-xs-9">
                                    <select name="kategori" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Kategori" data-width="80%" placeholder="Pilih Kategori" required>
                                        <?php foreach ($kat2->result_array() as $k2) {
                                            $id_kat = $k2['kategori_id'];
                                            $nm_kat = $k2['kategori_nama'];

                                            echo "<option value='$id_kat'>$nm_kat</option>";
                                        }
                                        ?>

                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Satuan</label>
                                <div class="col-xs-9">
                                    <select name="satuan" class="selectpicker show-tick form-control" data-live-search="true" title="Pilih Satuan" data-width="80%" placeholder="Pilih Satuan" required>
                                        <?php
                                        foreach ($satuan_baru->result_array() as $sat) {

                                            $item_name = $sat['name'];

                                            echo "<option value='$item_name'>$item_name</option>";
                                        }
                                        ?>


                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga Pokok</label>
                                <div class="col-xs-9">
                                    <input name="harpok" class="harpok form-control" type="text" value="" placeholder="Harga Pokok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga (Eceran)</label>
                                <div class="col-xs-9">
                                    <input name="harjul" class="harjul form-control" type="text" value="" placeholder="Harga Jual..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Harga (Grosir)</label>
                                <div class="col-xs-9">
                                    <input name="harjul_grosir" class="harjul form-control" type="text" value="" placeholder="Harga Jual Grosir..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Stok</label>
                                <div class="col-xs-9">
                                    <input name="stok" class="form-control" type="number" value="" placeholder="Stok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-xs-3">Minimal Stok</label>
                                <div class="col-xs-9">
                                    <input name="min_stok" class="form-control" type="number" value="" placeholder="Minimal Stok..." style="width:335px;" required>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <div class="row">
                                    <div class="col-xs-12 text-center">
                                        <img id="img_barcode_edit" src="<?php echo base_url('admin/barang/initBarcode/'); ?>" alt="">
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Tutup</button>
                            <button type="submit" class="btn btn-info">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        // }
        ?>

        <!-- ============ MODAL HAPUS =============== -->


        <!--END MODAL-->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p style="text-align:center;">Copyright &copy; <?php echo '2023'; ?> by Mesproject</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>



    <!-- modal -->
    <div id="modalSatuan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <form action="<?= base_url('admin/barang/tambah_satuan') ?>" method="post">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 class="modal-title" id="myModalLabel">Edit Barang</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group d-flex">
                                <input type="text" name="satuan" placeholder="masukan satuan unit baru" class="form-control">
                                <button type="submit" class="btn btn-sm btn-success" style="margin-top:10px;">Tambah</button>
                            </div>
                        </div>
                    </div>
                    </form>
                    <div class="row">
                        <div class="col-xs-12">
                            <table class="table table-bordered table-condensed" id="tableSatuan">

                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Satuan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($satuan_baru->result_array() as $item) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php
                                                echo $item['id']
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                echo $item['name']
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal end -->
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url() . 'assets/js/jquery.js' ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url() . 'assets/dist/js/bootstrap-select.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/dataTables.bootstrap.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.dataTables.min.js' ?>"></script>
    <script src="<?php echo base_url() . 'assets/js/jquery.price_format.min.js' ?>"></script>
    <script type="text/javascript">
        // $(document).ready(function() {
        //     $('#mydata').DataTable();
        //     $('#tableSatuan').DataTable();
        //     $("div.dataTables_filter input").focus();
        // });

        $(document).ready(function() {


            table = $('#mydata').DataTable({
                "scrollCollapse": true,
                "select": true,
                "processing": true,
                "serverSide": true,
                "retrieve": true,
                "bInfo": false,
                "ajax": {
                    "url": "<?= base_url('admin/barang/ajax_list') ?>",
                    "type": "POST",
                    "data": function(data) {}
                },
                "ordering": true,
                lengthMenu: [
                    [25, 50, 125, -1],
                    ['25 File', '50 File', '125 File', 'Show All']
                ],

            });
        });
    </script>
    <script type="text/javascript">
        // $('.select_status_barang').change(function() {
        //     $.ajax({
        //         url: "barang/update_status_barang",
        //         type: "POST",
        //         cache: false,
        //         data: $('.form_status_barang').serialize(),
        //         success: (result) => {
        //             console.log({
        //                 result
        //             })
        //         }
        //     })
        // })
        function get_data(id) {
            $("#modalEditPelanggan").modal('show')
            $.ajax({
                url: "<?= base_url('admin/barang/get_detail') ?>" + "/" + id,
                type: 'GET',
                success: function(res) {
                    let data = JSON.parse(res)
                    console.log(data)

                    // Load Data
                    $("#form_edit input[name=kobar]").val(data.barang_id)
                    $("#form_edit input[name=nabar]").val(data.barang_nama)
                    $("#form_edit select[name=kategori]").val(data.barang_kategori_id).trigger("change")
                    $("#form_edit select[name=satuan]").val(data.barang_satuan).trigger("change")
                    $("#form_edit input[name=harpok]").val(data.barang_harpok)
                    $("#form_edit input[name=harjul]").val(data.barang_harjul)
                    $("#form_edit input[name=harjul_grosir]").val(data.barang_harjul_grosir)
                    $("#form_edit input[name=stok]").val(data.barang_stok)
                    $("#form_edit input[name=min_stok]").val(data.barang_min_stok)
                    $("#form_edit #img_barcode_edit").attr('src', '<?php echo base_url('admin/barang/initBarcode/'); ?>/' + data.barang_id)
                }
            })
        }

        function delete_data(id) {
            if (confirm("Apakah Anda yakin ingin menghapus Data ini?") == true) {
                $.ajax({
                    url: "<?= base_url('admin/barang/hapus_barang') ?>",
                    type: "POST",
                    data: {
                        kode: id
                    },
                    success: function(res) {
                        location.reload()
                    }
                })
            } else {
                text = "You canceled!";
            }

        }

        function changeSelect(id) {
            let data = {
                "id": id,
                "status_barang": $('#select_status' + id).val()
            }

            // console.log({
            //     data
            // })

            $.ajax({
                url: "barang/update_status_barang",
                type: "POST",
                cache: false,
                data: data,
                success: (result) => {
                    console.log({
                        result
                    })
                    window.location.reload()
                }
            })
        }
        $(function() {
            $('.harpok').priceFormat({
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
        });
    </script>

</body>

</html>