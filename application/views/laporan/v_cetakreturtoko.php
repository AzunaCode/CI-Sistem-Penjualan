<?php if ($this->session->userdata('lvl') == "Admin") { ?>
    <!DOCTYPE html>
    <html lang="en">

    <?php
    $this->load->view('template/v_header');
    ?>

    <body>
        <div class="wrapper">
            <!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
            <div class="main-header" data-background-color="purple">
                <?php
                $this->load->view('template/v_logoheader');
                ?>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <?php
                $this->load->view('template/v_navbar');

                ?>
                <!-- End Navbar -->
            </div>

            <!-- Sidebar -->
            <?php
            $this->load->view('template/v_sidebar');
            ?>
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="page-header">
                            <h4 class="page-title">LaporanReturToko</h4>
                            <ul class="breadcrumbs">
                                <li class="nav-home">
                                    <a href="<?= base_url(); ?>index.php/homeadmin">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#laporan">Laporan</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#DataRetur"></i>DataRetur</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>index.php/laporan/datareturtoko"></i>Toko</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4> CETAK LAPORAN</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="<?= base_url(); ?>index.php/laporan/cetakdatareturtoko" target="_blank" method="POST">
                                                <div class="form-group">
                                                    <label>Dari Tanggal:</label>
                                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                        <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sampai:</label>
                                                    <div class="input-group date" id="reservationdatetimee" data-target-input="nearest">
                                                        <input type="text" name="sampai" class="form-control datetimepicker-input" data-target="#reservationdatetimee" />
                                                        <div class="input-group-append" data-target="#reservationdatetimee" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pilih Toko</label>
                                                    <select name="toko" id="toko" class="form-control">
                                                        <option>---Pilih Toko---</option>
                                                        <?php foreach ($toko as $a) :  ?>
                                                            <option value="<?= $a->id_toko ?>"><?= $a->nama_toko ?>-<?= $a->alamat_toko ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button class="btn btn-primary"><i class="fas fa-print"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>CETAK /NO.RETUR</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url(); ?>index.php/laporan/cetaknoreturtoko" method="POST">
                                            <div class="form-group">
                                                <label>Nomor Retur</label>
                                                <select class="form-control" name="noretur" id="noretur" placeholder="Nomor Retur" required>
                                                    <option>&nbsp;</option>
                                                    <?php foreach ($noretur as $a) :  ?>
                                                        <option value="<?= $a->kode_stokout ?>"><?= $a->kode_stokout ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Data Retur Toko</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table id="add-row" class="display table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No. Retur</th>
                                                            <th>Tanggal</th>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Zise</th>
                                                            <th>Harga</th>
                                                            <th>Jumlah</th>
                                                            <th>Subtotal</th>
                                                            <th>Ket.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($detail->result_array() as $row) :
                                                            $kt = $row['kode_stokout'];
                                                            $tgl = $row['tgl_stokout'];
                                                            $barang_kode = $row['kode_barang'];
                                                            $id = $row['no_barang'];
                                                            $barang_nama = $row['nama_barang'];
                                                            $barang_harjul = $row['hargapokok'];
                                                            $barang_qty = $row['jumlah'];
                                                            $barang_total = $row['sub_total'];
                                                            $size = $row['nama_size'];
                                                            $pesan = $row['pesan'];
                                                        ?>
                                                            <tr>
                                                                <td><?= $kt ?></td>
                                                                <td><?= $tgl ?></td>
                                                                <td><?= $barang_kode ?></td>
                                                                <td><?= $barang_nama ?></td>
                                                                <td><?= $size ?></td>
                                                                <td><?= $barang_harjul ?></td>
                                                                <td><?= $barang_qty ?></td>
                                                                <td><?= $barang_total ?></td>
                                                                <td><?= $pesan ?></td>
                                                            </tr>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom template | don't include it in your project! -->
            <?php
            $this->load->view('template/v_costum');
            ?>
            <!-- End Custom template -->
        </div>

        <?php
        $this->load->view('template/v_script');
        ?>

        <!-- Select2 -->
        <script src="<?= base_url(); ?>/assets/select2/js/select2.full.min.js"></script>

        <!-- InputMask -->
        <script src="<?= base_url(); ?>/assets/moment/moment.min.js"></script>
        <script src="<?= base_url(); ?>/assets/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url(); ?>/assets/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?= base_url(); ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?= base_url(); ?>/assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>



        <!-- Page specific script -->
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'YYYY/MM/DD'
                });
                //Date picker
                $('#reservationdatee').datetimepicker({
                    format: 'YYYY/MM/DD'
                });

                //Date and time picker
                $('#reservationdatetime').datetimepicker({
                    format: 'YYYY/MM/DD hh:mm A',
                    icons: {
                        time: 'flaticon-time',
                    }

                });

                $('#reservationdatetimee').datetimepicker({
                    icons: {
                        time: 'flaticon-time'
                    },
                    format: 'YYYY/MM/DD hh:mm A'
                });
                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })


                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                })

                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })

            })
        </script>
    </body>

    </html>

<?php } ?>

<?php if ($this->session->userdata('lvl') == "Owner") { ?>
    <!DOCTYPE html>
    <html lang="en">

    <?php
    $this->load->view('template/v_header');
    ?>

    <body>
        <div class="wrapper">
            <!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
            <div class="main-header" data-background-color="purple">
                <?php
                $this->load->view('template/v_logoheader');
                ?>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <?php
                $this->load->view('template/v_navbar');

                ?>
                <!-- End Navbar -->
            </div>

            <!-- Sidebar -->
            <?php
            $this->load->view('template/v_sidebar');
            ?>
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="page-header">
                            <h4 class="page-title">LaporanReturToko</h4>
                            <ul class="breadcrumbs">
                                <li class="nav-home">
                                    <a href="<?= base_url(); ?>index.php/homeadmin">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#laporan">Laporan</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#DataRetur"></i>DataRetur</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>index.php/laporan/datareturtoko"></i>Toko</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4> CETAK LAPORAN</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="<?= base_url(); ?>index.php/laporan/cetakdatareturtoko" target="_blank" method="POST">
                                                <div class="form-group">
                                                    <label>Dari Tanggal:</label>
                                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                        <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sampai:</label>
                                                    <div class="input-group date" id="reservationdatetimee" data-target-input="nearest">
                                                        <input type="text" name="sampai" class="form-control datetimepicker-input" data-target="#reservationdatetimee" />
                                                        <div class="input-group-append" data-target="#reservationdatetimee" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pilih Toko</label>
                                                    <select name="toko" id="toko" class="form-control">
                                                        <option>---Pilih Toko---</option>
                                                        <?php foreach ($toko as $a) :  ?>
                                                            <option value="<?= $a->id_toko ?>"><?= $a->nama_toko ?>-<?= $a->alamat_toko ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button class="btn btn-primary"><i class="fas fa-print"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>CETAK /NO.RETUR</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url(); ?>index.php/laporan/cetaknoreturtoko" method="POST">
                                            <div class="form-group">
                                                <label>Nomor Retur</label>
                                                <select class="form-control" name="noretur" id="noretur" placeholder="Nomor Retur" required>
                                                    <option>&nbsp;</option>
                                                    <?php foreach ($noretur as $a) :  ?>
                                                        <option value="<?= $a->kode_stokout ?>"><?= $a->kode_stokout ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Data Retur Toko</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table id="add-row" class="display table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No. Retur</th>
                                                            <th>Tanggal</th>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Zise</th>
                                                            <th>Harga</th>
                                                            <th>Jumlah</th>
                                                            <th>Subtotal</th>
                                                            <th>Ket.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($detail->result_array() as $row) :
                                                            $kt = $row['kode_stokout'];
                                                            $tgl = $row['tgl_stokout'];
                                                            $barang_kode = $row['kode_barang'];
                                                            $id = $row['no_barang'];
                                                            $barang_nama = $row['nama_barang'];
                                                            $barang_harjul = $row['hargapokok'];
                                                            $barang_qty = $row['jumlah'];
                                                            $barang_total = $row['sub_total'];
                                                            $size = $row['nama_size'];
                                                            $pesan = $row['pesan'];
                                                        ?>
                                                            <tr>
                                                                <td><?= $kt ?></td>
                                                                <td><?= $tgl ?></td>
                                                                <td><?= $barang_kode ?></td>
                                                                <td><?= $barang_nama ?></td>
                                                                <td><?= $size ?></td>
                                                                <td><?= $barang_harjul ?></td>
                                                                <td><?= $barang_qty ?></td>
                                                                <td><?= $barang_total ?></td>
                                                                <td><?= $pesan ?></td>
                                                            </tr>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom template | don't include it in your project! -->
            <?php
            $this->load->view('template/v_costum');
            ?>
            <!-- End Custom template -->
        </div>

        <?php
        $this->load->view('template/v_script');
        ?>

        <!-- Select2 -->
        <script src="<?= base_url(); ?>/assets/select2/js/select2.full.min.js"></script>

        <!-- InputMask -->
        <script src="<?= base_url(); ?>/assets/moment/moment.min.js"></script>
        <script src="<?= base_url(); ?>/assets/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url(); ?>/assets/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?= base_url(); ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?= base_url(); ?>/assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>



        <!-- Page specific script -->
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'YYYY/MM/DD'
                });
                //Date picker
                $('#reservationdatee').datetimepicker({
                    format: 'YYYY/MM/DD'
                });

                //Date and time picker
                $('#reservationdatetime').datetimepicker({
                    format: 'YYYY/MM/DD hh:mm A',
                    icons: {
                        time: 'flaticon-time',
                    }

                });

                $('#reservationdatetimee').datetimepicker({
                    icons: {
                        time: 'flaticon-time'
                    },
                    format: 'YYYY/MM/DD hh:mm A'
                });
                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })


                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                })

                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })

            })
        </script>
    </body>

    </html>

<?php } ?>

<?php if ($this->session->userdata('lvl') == "Gudang") { ?>
    <!DOCTYPE html>
    <html lang="en">

    <?php
    $this->load->view('template/v_header');
    ?>

    <body>
        <div class="wrapper">
            <!--
			Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
            <div class="main-header" data-background-color="purple">
                <?php
                $this->load->view('template/v_logoheader');
                ?>
                <!-- End Logo Header -->

                <!-- Navbar Header -->
                <?php
                $this->load->view('template/v_navbar');

                ?>
                <!-- End Navbar -->
            </div>

            <!-- Sidebar -->
            <?php
            $this->load->view('template/v_sidebar');
            ?>
            <div class="main-panel">
                <div class="content">
                    <div class="page-inner">
                        <div class="page-header">
                            <h4 class="page-title">LaporanReturToko</h4>
                            <ul class="breadcrumbs">
                                <li class="nav-home">
                                    <a href="<?= base_url(); ?>index.php/homeadmin">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#laporan">Laporan</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#DataRetur"></i>DataRetur</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>index.php/laporan/datareturtoko"></i>Toko</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4> CETAK LAPORAN</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="<?= base_url(); ?>index.php/laporan/cetakdatareturtoko" target="_blank" method="POST">
                                                <div class="form-group">
                                                    <label>Dari Tanggal:</label>
                                                    <div class="input-group date" id="reservationdatetime" data-target-input="nearest">
                                                        <input type="text" name="tanggal" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                                                        <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Sampai:</label>
                                                    <div class="input-group date" id="reservationdatetimee" data-target-input="nearest">
                                                        <input type="text" name="sampai" class="form-control datetimepicker-input" data-target="#reservationdatetimee" />
                                                        <div class="input-group-append" data-target="#reservationdatetimee" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Pilih Toko</label>
                                                    <select name="toko" id="toko" class="form-control">
                                                        <option>---Pilih Toko---</option>
                                                        <?php foreach ($toko as $a) :  ?>
                                                            <option value="<?= $a->id_toko ?>"><?= $a->nama_toko ?>-<?= $a->alamat_toko ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <div>
                                                        <button class="btn btn-primary"><i class="fas fa-print"></i></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>CETAK /NO.RETUR</h4>
                                    </div>
                                    <div class="card-body">
                                        <form action="<?= base_url(); ?>index.php/laporan/cetaknoreturtoko" method="POST">
                                            <div class="form-group">
                                                <label>Nomor Retur</label>
                                                <select class="form-control" name="noretur" id="noretur" placeholder="Nomor Retur" required>
                                                    <option>&nbsp;</option>
                                                    <?php foreach ($noretur as $a) :  ?>
                                                        <option value="<?= $a->kode_stokout ?>"><?= $a->kode_stokout ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <div>
                                                    <button type="submit" class="btn btn-primary"><i class="fas fa-print"></i></button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title">Data Retur Toko</h4>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="table-responsive">
                                                <table id="add-row" class="display table table-striped table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>No. Retur</th>
                                                            <th>Tanggal</th>
                                                            <th>Kode Barang</th>
                                                            <th>Nama Barang</th>
                                                            <th>Zise</th>
                                                            <th>Harga</th>
                                                            <th>Jumlah</th>
                                                            <th>Subtotal</th>
                                                            <th>Ket.</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach ($detail->result_array() as $row) :
                                                            $kt = $row['kode_stokout'];
                                                            $tgl = $row['tgl_stokout'];
                                                            $barang_kode = $row['kode_barang'];
                                                            $id = $row['no_barang'];
                                                            $barang_nama = $row['nama_barang'];
                                                            $barang_harjul = $row['hargapokok'];
                                                            $barang_qty = $row['jumlah'];
                                                            $barang_total = $row['sub_total'];
                                                            $size = $row['nama_size'];
                                                            $pesan = $row['pesan'];
                                                        ?>
                                                            <tr>
                                                                <td><?= $kt ?></td>
                                                                <td><?= $tgl ?></td>
                                                                <td><?= $barang_kode ?></td>
                                                                <td><?= $barang_nama ?></td>
                                                                <td><?= $size ?></td>
                                                                <td><?= $barang_harjul ?></td>
                                                                <td><?= $barang_qty ?></td>
                                                                <td><?= $barang_total ?></td>
                                                                <td><?= $pesan ?></td>
                                                            </tr>
                                                        <?php
                                                        endforeach;
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom template | don't include it in your project! -->
            <?php
            $this->load->view('template/v_costum');
            ?>
            <!-- End Custom template -->
        </div>

        <?php
        $this->load->view('template/v_script');
        ?>

        <!-- Select2 -->
        <script src="<?= base_url(); ?>/assets/select2/js/select2.full.min.js"></script>

        <!-- InputMask -->
        <script src="<?= base_url(); ?>/assets/moment/moment.min.js"></script>
        <script src="<?= base_url(); ?>/assets/inputmask/jquery.inputmask.min.js"></script>
        <!-- date-range-picker -->
        <script src="<?= base_url(); ?>/assets/daterangepicker/daterangepicker.js"></script>
        <!-- bootstrap color picker -->
        <script src="<?= base_url(); ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="<?= base_url(); ?>/assets/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>



        <!-- Page specific script -->
        <script>
            $(function() {
                //Initialize Select2 Elements
                $('.select2').select2()

                //Initialize Select2 Elements
                $('.select2bs4').select2({
                    theme: 'bootstrap4'
                })

                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
                $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
                $('[data-mask]').inputmask()

                //Date picker
                $('#reservationdate').datetimepicker({
                    format: 'YYYY/MM/DD'
                });
                //Date picker
                $('#reservationdatee').datetimepicker({
                    format: 'YYYY/MM/DD'
                });

                //Date and time picker
                $('#reservationdatetime').datetimepicker({
                    format: 'YYYY/MM/DD hh:mm A',
                    icons: {
                        time: 'flaticon-time',
                    }

                });

                $('#reservationdatetimee').datetimepicker({
                    icons: {
                        time: 'flaticon-time'
                    },
                    format: 'YYYY/MM/DD hh:mm A'
                });
                //Date range picker
                $('#reservation').daterangepicker()
                //Date range picker with time picker
                $('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'MM/DD/YYYY hh:mm A'
                    }
                })


                //Timepicker
                $('#timepicker').datetimepicker({
                    format: 'LT'
                })

                //Bootstrap Duallistbox
                $('.duallistbox').bootstrapDualListbox()

                //Colorpicker
                $('.my-colorpicker1').colorpicker()
                //color picker with addon
                $('.my-colorpicker2').colorpicker()

                $('.my-colorpicker2').on('colorpickerChange', function(event) {
                    $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
                })

                $("input[data-bootstrap-switch]").each(function() {
                    $(this).bootstrapSwitch('state', $(this).prop('checked'));
                })

            })
        </script>
    </body>

    </html>

<?php } ?>