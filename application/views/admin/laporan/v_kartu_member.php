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
            width: 280px;
            /* margin: 30px; */
            height: 150px;
            /* padding: 10px; */
            position: relative;
        }

        * {
            font-size: 8px;
        }

        body {
            padding: 0 !important;
        }

        h3 {
            font-size: 10px !important;
        }

        .img_member {
            object-fit: contain;
            height: 150px;
            border: 1px dashed black;
        }

        .item_member {
            width: 300px;
            height: 150px;
        }

        @media print {
            .card-member-container {
                background-image: url();
                background-position: center;
                /* background-repeat: no-repeat; */
                width: 300px;
                /* margin: 30px; */
                height: 190px;
                /* padding: 10px; */
                position: relative;
            }

            * {
                font-size: 8px;
                zoom: 100%;
            }

            body {
                padding: 0 !important;
            }

            h3 {
                font-size: 10px !important;
            }

            .col-sm-4 {
                padding: 0px !important;
                width: 80px !important;
            }


            .col-sm-7 {
                width: 190px !important;
            }

            .img_member {
                object-fit: contain;
                height: 150px;
            }

            .form-inline {
                display: flex;
            }

            .item_member {
                width: 265px;
                height: 150px;
            }

            #img_member_qrcode img {
                content: url('http://chart.apis.google.com/chart?cht=qr&chs=50x50&chld=L|0&chl=<?= $no_member ?>');
            }
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
    <?php if ($nama_member == 'member_not_found') { ?>
        <h1>MEMBER NOT FOUND</h1>
    <?php } else { ?>
        <div class="modal-body">
            <div class="card-member-container">
                <img src="<?php echo base_url() . 'assets/images/bg-member.png' ?>" class="img_member" />
                <div class="item_member d-flex align-items-center" style="margin-top: -160px;">
                    <h3 class="text-center" style="z-index: 100;position:relative;">Member Card Toko Indrapura</h3>
                    <div class="form-inline" style="padding-left:8px;">
                        <div class="col-sm-4" style="font-weight: bold;margin: 1px 0">
                            Nama Member
                        </div>
                        <div class="col-sm-7" style="margin: 1px 0">
                            : <span id="nama_member"><?= $nama_member ?></span>
                        </div>
                    </div>
                    <div class="form-inline" style="padding-left:8px;">
                        <div class="col-sm-4" style="font-weight: bold;margin: 1px 0">
                            No Member
                        </div>
                        <div class="col-sm-7" style="margin: 1px 0">
                            : <span id="no_member"><?= $no_member ?></span>
                        </div>
                    </div>
                    <div class="form-inline" style="padding-left:8px;">
                        <div class="col-sm-4" style="font-weight: bold;margin: 1px 0">
                            No Hp
                        </div>
                        <div class="col-sm-7" style="margin: 1px 0">
                            : <span id="nohp_member"><?= $nohp_member ?></span>
                        </div>
                    </div>
                    <div class="form-inline" style="padding-left:8px;">
                        <div class="col-sm-4" style="font-weight: bold;margin: 1px 0">
                            Alamat
                        </div>
                        <div class="col-sm-7" style="margin: 2px 0">
                            : <span id="alamat_member"><?= $alamat_member ?></span>
                        </div>
                    </div>
                    <div class="qrcode-member" style="margin-top: 10px;padding-left:8px;">
                        <img src="http://chart.apis.google.com/chart?cht=qr&chs=60x60&chld=L|0&chl=<?= $no_member ?>" id="img_member_qrcode" style="z-index: 100;position:relative;" />
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</body>

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
    <?php if ($nama_member != 'member_not_found') { ?>
        window.print()
    <?php } ?>

    function card_member(no_member, nama_member) {
        $('#nama_member').text(nama_member)
        $('#no_member').text(no_member)

        var url_qrcode = `http://chart.apis.google.com/chart?cht=qr&chs=130x130&chld=L|0&chl=${no_member}`
        $('#img_member_qrcode').prop('src', url_qrcode)
        $("#detailMemberMdl").modal('show')
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