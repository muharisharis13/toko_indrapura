<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Produk By Mfikri.com">
    <meta name="author" content="Mesproject">

    <title><?= $title ?></title>
    <style>
        .card-member-container {
            background-image: url();
            background-position: center;
            /* background-repeat: no-repeat; */
            width: 100%;
            height: 300px;
            padding: 2rem;
            align-items: center;
            padding: 10px;
            position: static;
        }

        .img_member {
            object-fit: contain;
            width: 100%;
            height: 350px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
        }

        .item_member {
            z-index: 100;
        }
    </style>
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
                <center>
                    <?php if ($this->session->flashdata('success')) { ?>
                        <span class="alert alert-success"><?= $this->session->flashdata('success') ?></span>
                    <?php } elseif ($this->session->flashdata('err')) { ?>
                        <span class="alert alert-danger"><?= $this->session->flashdata('err') ?></span>
                    <?php } ?>
                </center>
                <h1 class="page-header">Member
                    <small>Page Member</small>
                </h1>
            </div>
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createMember"><i class="fa fa-plus-circle"></i> Tambah Member</button>
        <button class="btn btn-warning" data-toggle="modal" data-target="#editMember"><i class="fa fa-edit"></i> No.Hp Member</button>

    </div>
    <div class="container" style="margin-top: 50px;">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-condensed" style="font-size:11px;margin-top:10px;" id="mydataMember">
                    <thead>
                        <tr>
                            <th>No. </th>
                            <th>No Member</th>
                            <th>Nama Member</th>
                            <th>No. Hp</th>
                            <th>Alamat</th>
                            <th>Point</th>
                            <th>Uang</th>
                            <th style="text-align: end;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($list_member->result_array() as $item) {


                        ?>
                            <tr onclick="card_member('<?= $item['no_member'] ?>','<?= $item['nama_user'] ?>','<?= $item['no_hp_user'] ?>','<?= $item['alamat'] ?>')">
                                <td>
                                    <?php
                                    echo $item['id']
                                    ?>
                                </td>
                                <td style="text-transform: uppercase;">
                                    <?php
                                    echo $item['no_member']
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $item['nama_user']
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $item['no_hp_user']
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $item['alamat']
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $item['point']
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    echo $item['uang']
                                    ?>
                                </td>
                                <td style="text-align: end;" onclick="event.stopPropagation()">

                                    <button class="btn btn-sm btn-warning" onclick='location.href="<?= base_url("admin/member/penukaran_point/$item[id]") ?>"'>
                                        <i class="fa fa-gift"></i> Penukaran Point
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="hapus_member('<?php echo $item['id']  ?>')">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="createMember" class="modal fade" role="dialog">

        <div class="modal-dialog">
            <form method="post" action="<?php echo base_url() . 'admin/member/tambah_member' ?>">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Tambah Member</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-12">
                                <label>No. Hp</label>
                                <input type="number" class="form-control" name="no_hp">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Nama</label>
                                <input type="text" class="form-control" name="nama_user">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <!-- Edit No Hp -->
    <div id="editMember" class="modal fade" role="dialog">

        <div class="modal-dialog">
            <form method="post" action="<?php echo base_url() . 'admin/member/edit_no_hp' ?>">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Edit No. Hp Member</h4>
                    </div>
                    <div class="modal-body">

                        <div class="row">
                            <div class="col-md-9">
                                <label>No. Hp Lama</label>
                                <input type="number" class="form-control" name="no_hp">
                            </div>
                            <div class="col-md-2">
                                <label>&nbsp;</label>
                                <button type="button" class="btn btn-success" id="check_no_hp_btn">Check</button>
                            </div>
                        </div>
                        <div id="result_check_no_hp" style="margin-top: 10px;">

                        </div>
                        <div class="row" style="margin-top:10px;display:none;" id="no_hp_baru">
                            <input type="hidden" name="no_member" id="no_member_edit" />
                            <div class="col-md-12">
                                <label>No. Hp Baru - <span id="no_member_lbl"></span></label>
                                <input type="number" class="form-control" required name="no_hp_baru">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" disabled id="submit_edit_no_hp"><i class="fa fa-save"></i> Simpan</button>
                    </div>
                </div>

            </form>

        </div>
    </div>


    <div id="detailMemberMdl" class="modal fade" role="dialog">

        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <!-- <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Member</h4>
                </div> -->
                <div class="modal-body">

                    <div class="card-member-container">
                        <img src="<?php echo base_url() . 'assets/images/bg-member.png' ?>" class="img_member" />
                        <div class="item_member d-flex align-items-center" style="height: 300px;">
                            <h3 class="text-center" style="z-index: 100;position:relative;">Member Card Sumber Jaya</h3>
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: bold;margin: 2px 0">
                                    Nama Member
                                </div>
                                <div class="col-sm-8" style="margin:2px 0">
                                    : <span id="nama_member"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: bold;margin: 2px 0">
                                    No Member
                                </div>
                                <div class="col-sm-8" style="margin:2px 0">
                                    : <span id="no_member"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: bold;margin: 2px 0">
                                    No Hp
                                </div>
                                <div class="col-sm-8" style="margin:2px 0">
                                    : <span id="nohp_member"></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-3" style="font-weight: bold;margin: 2px 0">
                                    Alamat
                                </div>
                                <div class="col-sm-8" style="margin:2px 0">
                                    : <span id="alamat_member"></span>
                                </div>
                            </div>
                            <div class="qrcode-member" style="margin-top: 2rem;">
                                <img src="http://chart.apis.google.com/chart?cht=qr&chs=130x130&chld=L|0&chl=012456789" id="img_member_qrcode" style="z-index: 100;position:relative;" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success" onclick="print_member()"><i class="fa fa-print"></i> Print</button>
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
    <script>
        $('#mydataMember').DataTable();

        function print_member() {
            var no_member = $('#no_member').text()
            window.open('<?= base_url('admin/member/print') ?>/' + no_member)
        }

        function card_member(no_member, nama_member, nohp_member, alamat_member) {
            $('#nama_member').text(nama_member)
            $('#no_member').text(no_member)
            $('#nohp_member').text(nohp_member)
            $('#alamat_member').text(alamat_member)

            var url_qrcode = `http://chart.apis.google.com/chart?cht=qr&chs=130x130&chld=L|0&chl=${no_member}`
            $('#img_member_qrcode').prop('src', url_qrcode)
            $("#detailMemberMdl").modal('show')
        }

        $("#check_no_hp_btn").click(function() {
            let no_hp = $("#editMember input[name=no_hp]").val()
            if (no_hp == '') {
                alert("No Hp Lama Member, Kosong")
            } else {
                $.ajax({
                    url: "member/check_nomor",
                    type: "POST",
                    data: {
                        no_hp: no_hp
                    },
                    success: (res) => {
                        $("#result_check_no_hp").html(res)
                    }
                })
            }
        })


        function pilih_member(no_member) {
            $("#no_member_lbl").text(no_member + " ( selected )")
            $("#no_member_edit").val(no_member)
            $("#no_hp_baru").show()
            $("#submit_edit_no_hp").attr("disabled", false)
        }

        function hapus_member(id) {
            $.ajax({
                url: "member/hapus_member",
                type: "POST",
                data: {
                    id: id
                },
                success: () => {
                    window.location.reload();
                }
            })
        }
    </script>

</body>

</html>