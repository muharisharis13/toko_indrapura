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
                <center><?php echo $this->session->flashdata('msg'); ?>
                    <?php if ($this->session->flashdata('success')) { ?>
                        <span class="alert alert-success"><?= $this->session->flashdata('success') ?></span>
                    <?php } else { ?>
                        <span class="alert alert-danger"><?= $this->session->flashdata('err') ?></span>
                    <?php } ?>
                </center>
                <h1 class="page-header">Member
                    <small>Page Member</small>
                </h1>
            </div>
        </div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#createMember"><i class="fa fa-plus-circle"></i> Tambah Member</button>

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
                            <tr>
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
                                <td style="text-align: end;">
                                    <button class="btn btn-sm btn-warning" onclick='location.href="<?= base_url("admin/member/penukaran_point/$item[id]") ?>"'>
                                        <i class="fa fa-gift"></i> Penukaran Point
                                    </button>
                                    <button class="btn btn-sm btn-danger" onclick="hapus_member('<?php echo $item['id']  ?>')">
                                        Delete
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