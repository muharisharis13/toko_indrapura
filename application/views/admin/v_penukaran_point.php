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

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body>

    <!-- Navigation -->
    <?php
    $this->load->view('admin/menu');
    ?>

    <!-- Page Content -->
    <form id="create">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <center><?php echo $this->session->flashdata('msg'); ?></center>
                    <h1 class="page-header">Member
                        <small>Penukaran Point</small>
                    </h1>
                </div>
            </div>
            <div class="row" style="padding-bottom: 3px;">
                <div class="col-md-3">
                    <label for="">No. Member</label>
                    <input type="text" style="text-transform: uppercase;" class="form-control" name="no_member" value="<?= $get_detail_member->no_member ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="">No. Handphone</label>
                    <input type="text" class="form-control" name="no_hp_user" value="<?= $get_detail_member->no_hp_user ?>" readonly>
                </div>
            </div>
            <div class="row" style="padding-bottom: 3px;">
                <div class="col-md-3">
                    <label for="">Nama</label>
                    <input type="text" class="form-control" name="nama" value="<?= $get_detail_member->nama_user ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="">alamat</label>
                    <input type="text" class="form-control" name="alamat" value="<?= $get_detail_member->alamat ?>" readonly>
                </div>
            </div>
            <div class="row" style="padding-bottom: 3px;">
                <div class="col-md-3">
                    <label for="">Point</label>
                    <input type="text" class="form-control" name="point" value="<?= $get_detail_member->point ?>" readonly>
                </div>
                <div class="col-md-3">
                    <label for="">Uang</label>
                    <input type="text" class="form-control" name="uang" value="<?= $get_detail_member->uang ?>" readonly>
                </div>
            </div>
            <div class="row" style="padding-bottom: 3px;">
                <div class="col-md-6">
                    <label for="">Pilih Product</label>
                    <select class="select-product form-control" name="select_product" id="select_product" onchange="selectProduct()">
                        <option value="">- Select Product -</option>
                        <?php
                        foreach ($get_list_product->result_array() as $item) {
                        ?>
                            <option value="<?php echo $item['barang_id'] ?>">
                                <?=
                                $item['barang_nama']
                                ?>
                                (Stock : <?=
                                            $item['barang_stok']
                                            ?>)

                            </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>

        <div class="container" style="margin-top: 50px;">
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
                        <tbody id="table_product">
                        </tbody>
                    </table>
                    <table>

                        <tr>
                            <td style="width:760px;" rowspan="2">
                                <!-- <button type="submit" class="btn btn-info btn-lg"> Simpan</button> -->
                            </td>
                            <th style="width:140px;">Total Belanja(Rp)</th>
                            <th style="text-align:right;width:140px;">
                                <input type="text" name="total3" id="total3" value="" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                            </th>
                            <input type="hidden" id="total" name="total" value="" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly>
                        </tr>
                        <tr>
                            <th>Tunai(Rp)</th>
                            <th style="text-align:right;"><input type="text" id="jml_uang" name="jml_uang" value="<?= $get_detail_member->uang ?>" class="jml_uang form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                            <!-- <input type="text" id="jml_uang2" name="jml_uang2" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" required> -->
                        </tr>
                        <tr>
                            <td></td>
                            <th>Kembalian(Rp)</th>
                            <th style="text-align:right;"><input type="text" id="kembalian" name="kembalian" class="form-control input-sm" style="text-align:right;margin-bottom:5px;" readonly></th>
                        </tr>
                        <tr>
                            <td></td>
                            <th></th>
                            <th style="text-align:right;"><button type="button" class="btn btn-success" id="tukar_point_btn" data-toggle="modal" data-target="#tukarPoint">Tukar Point</button></th>
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
                                <label id="nama_mems"></label>
                                <label id="point_mems"></label>
                                <input type="text" class="form-control" style="width:15em" name="pengurangan_point" placeholder="Masukkan Jumlah Pengurangan">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


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
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(() => {
            $(".select-product").select2();

            $('#tukar_point_btn').click(function() {
                if ($("#kembalian").val() < 0) {
                    alert('Kurang')
                    return false
                } else {
                    return true
                }
            })
            let checkCartPoint = localStorage.getItem("cart_point");

            let cartPoint = checkCartPoint ? JSON.parse(checkCartPoint) : [];
            var total = 0
            cartPoint.map((item, index) => {
                let subTotal = parseInt(item.qty) * parseInt(item.barang_harjul)
                total += subTotal
                let html = `
                                <tr>
                                    <td>                            
                                        ${item.id}
                                    </td>
                                    <td>
                                        ${item.barang_id}
                                    </td>
                                    <td>
                                        ${item.barang_nama}
                                    </td>
                                    <td>
                                        ${item.barang_satuan}
                                    </td>
                                    <td>
                                        ${item.barang_harjul}
                                    </td>
                                    <td>
                                        ${item.qty}
                                    </td>
                                    <td>
                                        ${subTotal}
                                    </td>
                                    <td style="text-align:end;">
                                            <button class="btn btn-sm btn-danger" type='button' onclick="removeItem(${index})">
                                                Delete
                                            </button>
                                    </td>
                                </tr>
                            `
                $('#table_product').append(html)
                var total_keseluruhan = $('#total3').val(total)
                var tunai = $('#jml_uang').val()
                $('#kembalian').val(tunai - total)

                document.getElementById('nama_mems').innerHTML = 'Nama : <?= $get_detail_member->nama_user ?>';
                document.getElementById('point_mems').innerHTML = 'Point : <?= $get_detail_member->point ?>';
            })

            $('#create').submit(function(e) {
                e.preventDefault();
                let data = new FormData(this);
                let cek = data.append('detail', JSON.stringify(allItem()));
                $.ajax({
                    url: '<?= base_url('admin/member/create_penukaran') ?>',
                    type: "post",
                    data: data,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(data) {
                        console.log(data)
                    },
                    error: function(e) {
                        console.log(e);
                    }
                });
            });
        })

        function removeItem(item) {
            // Get Data
            let checkCartPoint1 = localStorage.getItem("cart_point");
            let cartPoint = checkCartPoint1 ? JSON.parse(checkCartPoint1) : [];

            // Remove Data
            cartPoint.splice(item, 1)

            // Remove Local Storage
            localStorage.removeItem("cart_point")

            // Set Local Storage
            localStorage.setItem("cart_point", JSON.stringify(cartPoint));

            // Live Change Table
            let checkCartPointItem = localStorage.getItem("cart_point");
            let cartPointMap = checkCartPointItem ? JSON.parse(checkCartPointItem) : [];
            var total = 0
            $('#table_product').html('')
            cartPointMap.map((item, index) => {
                let subTotal = parseInt(item.qty) * parseInt(item.barang_harjul)
                total += subTotal
                let html = `
                                <tr>
                                    <td>                            
                                        ${item.id}
                                    </td>
                                    <td>
                                        ${item.barang_id}
                                    </td>
                                    <td>
                                        ${item.barang_nama}
                                    </td>
                                    <td>
                                        ${item.barang_satuan}
                                    </td>
                                    <td>
                                        ${item.barang_harjul}
                                    </td>
                                    <td>
                                        ${item.qty}
                                    </td>
                                    <td>
                                        ${subTotal}
                                    </td>
                                    <td style="text-align:end;">
                                            <button class="btn btn-sm btn-danger" type='button' onclick="removeItem(${index})">
                                                Delete
                                            </button>
                                    </td>
                                </tr>
                            `
                $('#table_product').append(html)
                var total_keseluruhan = $('#total3').val(total)
                var tunai = $('#jml_uang').val()
                $('#kembalian').val(tunai - total)

                document.getElementById('nama_mems').innerHTML = 'Nama : <?= $get_detail_member->nama_user ?>';
                document.getElementById('point_mems').innerHTML = 'Point : <?= $get_detail_member->point ?>';
            })
            // items = JSON.stringify(item);
            // localStorage.setItem("cart_point", items);
            // localStorage.removeItem("cart_point", [id]);
        }

        function allItem() {
            // let table;
            // table = document.getElementById('table_product');
            // let obj = {};
            // for (i = 1; i < table.rows.length; i++) {
            //     let objCells = table.rows.item(i).cells;
            //     let cur = [];
            //     for (var j = 0; j < objCells.length - 1; j++) {
            //         if (j == 1 || j == 7) {
            //             cur.push(objCells.item(j).innerHTML.split(".").join(""));
            //         } else {
            //             cur.push(objCells.item(j).innerHTML);
            //         }

            //     }
            //     obj[i] = cur;
            // }
            // return obj;
            let checkCartPoint = localStorage.getItem("cart_point");
            let cartPoint = checkCartPoint ? JSON.parse(checkCartPoint) : [];
            return cartPoint;
        }

        function selectProduct() {
            var selectBox = document.getElementById("select_product");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;

            $.ajax({
                url: "<?= base_url() ?>admin/member/select_product",
                type: "POST",
                data: {
                    id: selectedValue
                },
                success: (result) => {
                    console.log({
                        result: JSON.parse(result)
                    })
                    let checkCartPoint = localStorage.getItem("cart_point");
                    let cartPoint = checkCartPoint ? JSON.parse(checkCartPoint) : [];


                    if (JSON.parse(result)?.id) {
                        let product = JSON.parse(result)
                        if (cartPoint.length > 0) {
                            localStorage.setItem("cart_point", JSON.stringify([

                                ...cartPoint,
                                {
                                    ...product,
                                    qty: 1
                                }
                            ]))

                        } else {
                            localStorage.setItem("cart_point", JSON.stringify([{
                                ...product,
                                qty: 1
                            }]))
                        }
                        location.reload()

                    } else {
                        alert("tidak ada product")
                    }
                }
            })
        }
    </script>

</body>

</html>