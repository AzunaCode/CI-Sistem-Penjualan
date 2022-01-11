<?php if ($this->session->userdata('lvl') == 'Kasir') { ?>
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
                            <h4 class="page-title">ReturKeToko</h4>
                            <ul class="breadcrumbs">
                                <li class="nav-home">
                                    <a href="<?= base_url(); ?>index.php/homekasir">
                                        <i class="flaticon-home"></i>
                                    </a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Masterdata</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="#">Retur</a>
                                </li>
                                <li class="separator">
                                    <i class="flaticon-right-arrow"></i>
                                </li>
                                <li class="nav-item">
                                    <a href="<?= base_url(); ?>index.php/stokout">ReturKeToko</a>
                                </li>
                            </ul>
                        </div>
                        <div class="row row-card-no-pd">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">

                                        <div class="d-flex align-items-center">
                                            <h4 class="card-title"><i class="flaticon-box-1"></i> Retur Barang</h4>
                                            <a href="" class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                                                <i class="fas fa-tshirt"></i>
                                                Retur
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <!-- Modal Tambah -->
                                        <div class="modal fade modal fade bd-example-modal-lg" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header no-bd">
                                                        <h5 class="modal-title">
                                                            <span class="fw-mediumbold">
                                                                Data</span>
                                                            <span class="fw-light">
                                                                Barang Toko
                                                            </span>
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="table-responsive">
                                                            <table id="add-row" class="display table table-striped table-hover">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Kode Order</th>
                                                                        <th>Tanggal</th>
                                                                        <th>Kode Barang</th>
                                                                        <th>Nama Barang</th>
                                                                        <th>Size Barang</th>
                                                                        <th>Toko</th>
                                                                        <th>Jumlah</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php
                                                                    foreach ($stok->result_array() as $b) :
                                                                        $id = $b['kode_order'];
                                                                        $tglo = $b['tanggal_order'];
                                                                        $qty = $b['jumlah'];
                                                                        $nmbar = $b['nama_barang'];
                                                                        $kodebar = $b['kode_barang'];
                                                                        $idbar = $b['no_barang'];
                                                                        $size = $b['nama_size'];
                                                                        $tokonm = $b['nama_toko'];
                                                                        $ket = $b['keterangan'];
                                                                    ?>
                                                                        <tr>
                                                                            <td><?= $id ?></td>
                                                                            <td><?= $tglo ?></td>
                                                                            <td><?= $kodebar ?></td>
                                                                            <td><?= $nmbar ?></td>
                                                                            <td><?= $size ?></td>
                                                                            <td><?= $tokonm ?></td>
                                                                            <td><?= $qty ?></td>
                                                                            <form action="<?php echo base_url(); ?>index.php/stokout/addretur" method="POST">
                                                                                <td style="text-align:center;">
                                                                                    <input type="hidden" name="idbar" value="<?php echo $idbar; ?>">
                                                                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                                    <?php if ($ket == "KIRIM" || $ket == "ORDERTOKO") { ?>
                                                                                        <?php echo 'OK' ?>
                                                                                    <?php } else { ?>
                                                                                        <?php echo '<button type="submit" class="btn btn-sm btn-info">Pilih</button>' ?>
                                                                                    <?php  } ?>
                                                                                </td>
                                                                            </form>
                                                                        </tr>
                                                                    <?php endforeach; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer no-bd">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <?php echo $this->session->flashdata('msg'); ?>
                                                    <table class="display table table-striped table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th>Kode Barang</th>
                                                                <th>Nama Barang</th>
                                                                <th>QTY</th>
                                                                <th style="text-align:right">Item Price</th>
                                                                <th style="text-align:right">Sub-Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            <?php foreach ($this->cart->contents() as $items) : ?>

                                                                <?php echo form_hidden($i . '[rowid]', $items['rowid']); ?>
                                                                <tr>
                                                                    <td><?= $items['kodebar'] ?></td>
                                                                    <td>
                                                                        <?php echo $items['name']; ?>
                                                                    </td>
                                                                    <td><?= number_format($items['qty']) ?></td>
                                                                    <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['price']); ?></td>
                                                                    <td style="text-align:right">Rp. <?php echo $this->cart->format_number($items['subtotal']); ?></td>
                                                                    <td style="text-align:center;">
                                                                        <a href="<?= base_url('index.php/stokout/removeretur/' . $items['rowid']); ?>" class="btn btn-link btn-primary" data-original-title=".Remove"><span class="fas fa-trash"></a>
                                                                    </td>
                                                                </tr>
                                                                <?php $i++; ?>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="4" class="text-right">Total</td>
                                                                <td>Rp. <?php echo $this->cart->format_number($this->cart->total()); ?></td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <h1 class="page-title">
                                                <?=
                                                $this->session->userdata('nama');
                                                ?>
                                            </h1>
                                            <form action="<?= base_url(); ?>index.php/stokout/simpanstokout" method="POST" target="_blank">
                                                <label>Kode Retur</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-tshirt"></i></span>
                                                    </div>
                                                    <input name="kode_retur" type="text" class="form-control" value="<?= $kodestokout ?>" placeholder="Kode Retur..." aria-label="Noorder" aria-describedby="basic-addon1" readonly>
                                                </div>
                                                <label>Pilih Toko</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-store-alt"></i></span>
                                                    </div>
                                                    <select name="tempatretur" id="tempatretur" class="form-control">
                                                        <option>---Pilih Toko---</option>
                                                        <?php foreach ($toko as $b) : ?>
                                                            <option value="<?= $b->id_toko ?>"><?= $b->nama_toko ?> - <?= $b->alamat_toko ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="form-group has-success">
                                                    <label for="comment">Tulis Pesan</label>
                                                    <textarea name="pesan" id="pesan" class="form-control" id="comment" rows="5"></textarea>
                                                </div>
                                                <input type="hidden" name="tanggal" value="<?php echo date("Y-m-d h:i:s"); ?>">
                                                <input type="hidden" name="total" id="total" value="<?php echo $this->cart->total(); ?>">
                                                <button type="submit" class="btn btn-primary"><span class="fas fa-archive"></span> Retur</button>
                                            </form>
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
        </div>
        <?php $this->load->view('template/v_script');
        ?>
    </body>

    </html>
<?php } ?>