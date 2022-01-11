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
                        <h4 class="page-title">LaporanBarang/Toko</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="<?= base_url(); ?>index.php/homegudang">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="#Laporan">Laporan</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url(); ?>index.php/laporan/tampiltokolap">Barang/Toko</a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                        </ul>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <?php echo $this->session->flashdata('msg'); ?>
                                        <table id="add-row" class="display table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Create</th>
                                                    <th>Update</th>
                                                    <th style="width: 10%">Action</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Create</th>
                                                    <th>Update</th>
                                                    <th>Action</th>
                                                </tr>
                                            </tfoot>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($t->result_array() as $b) :
                                                    $no++;
                                                    $id = $b['id_toko'];
                                                    $nm = $b['nama_toko'];
                                                    $almt = $b['alamat_toko'];
                                                    $create = $b['created_at'];
                                                    $update = $b['updated_at'];
                                                ?>
                                                    <tr>
                                                        <td><?= $no ?></td>
                                                        <td><?= $nm ?></td>
                                                        <td><?= $almt ?></td>
                                                        <td><?= $create ?></td>
                                                        <td><?= $update ?></td>
                                                        <td>
                                                            <div class="form-button-action">
                                                                <a href="<?= base_url('index.php/laporan/lapbarangtoko/' . $id); ?>" target="_blank" class="btn btn-link btn-primary" data-original-title="Edit Task">
                                                                    <i class="fa fa-print"></i>
                                                                </a>
                                                            </div>
                                                        </td>
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

        <!-- Custom template | don't include it in your project! -->
        <?php
        $this->load->view('template/v_costum');
        ?>
        <!-- End Custom template -->
    </div>
    <?php
    $this->load->view('template/v_script');
    ?>
</body>

</html>