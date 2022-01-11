<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('template/v_header');
?>

<body onload="window.print()">
    <div class="wrapper">
        <?php
        $b = $ctp->row_array();
        ?>
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

        </table>
        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>

            </tr>
        </table>
        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;padding-left:20px;text-align:left;">
                    <h4>ORDER BARANG </h4>
                    <h4><?= $b['nama_toko'] ?></h4>
                    <h4><?= $b['alamat_toko'] ?>/<?= $b['no_telp'] ?></h4>
                </td>
                <td colspan="2" style="width:800px;padding-left:20px;">
                    <h6>Bali, <?php echo date('d-M-Y') ?></h6>
                    <h4>Yth</h4>
                    <h4>BALI TEES </h4>
                </td>
            </tr>
        </table>
        <table border="1" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left;">Nomor</th>
                <th style="text-align:left;">: <?php echo $b['kode_order']; ?></th>&nbsp;
                <th style="text-align:left;">Order</th>
                <th style="text-align:left;">: Gudang</th>
            </tr>
            <tr>
                <th style="text-align:left;">Tanggal</th>
                <th style="text-align:left;">: <?php echo $b['tanggal_order']; ?></th>
                <th style="text-align:left;"></th>
                <th style="text-align:left;"></th>
            </tr>
        </table>
        <div class="row"></div>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="1" align="center" style="width:900px;border:none;">
            <thead>
                <tr>
                    <td style="width:20px;border:none;text-align:center;">No</td>
                    <td style="width:100px;border:none;text-align:center;">Kode Barang</td>
                    <td style="width:100px;border:none;text-align:center;">Nama</td>
                    <td style="width:100px;border:none;text-align:center;">Size</td>
                    <td style="width:100px;border:none;text-align:center;">Warna</td>
                    <td style="width:80px;border:none;text-align:center;">Price</td>
                    <td style="width:50px;border:none;text-align:center;">QTY</td>
                    <td style="width:90px;border:none;text-align:center;">Total</td>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($ctp->result_array() as $i) {
                    $no++;
                    $kode = $i['kode_barang'];
                    $size = $i['nama_size'];
                    $nabar = $i['nama_barang'];
                    $harjul = $i['hargapokok'];
                    $qty = $i['jumlah'];
                    $total = $i['sub_total'];
                    $warna = $i['nama_warna'];
                ?>
                    <tr>
                        <td style="text-align:left;"><?php echo $no; ?></td>
                        <td style="text-align:center;"><?php echo $kode; ?></td>
                        <td style="text-align:center;"><?php echo $nabar; ?></td>
                        <td style="text-align:center;"><?php echo $size; ?></td>
                        <td style="text-align:center;"><?php echo $warna; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($harjul) . ',-'; ?></td>
                        <td style="text-align:center;"><?php echo $qty; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($total) . ',-'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7" style="text-align:right;"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['total_order']) . ',-'; ?></b></td>
                </tr>
            </tfoot>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th style="text-align:left;">NB:</th>
            </tr>
            <tr>
                <td style="text-align:left;"> <?= $b['pesan'] ?></td>
            </tr>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Pemesan:</td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /></td>
            </tr>
            <tr>
                <td align="right">( <?php echo $this->session->userdata('nama'); ?> )</td>
            </tr>
            <tr>
                <td align="center"></td>
            </tr>
        </table>
    </div>
    <?php
    $this->load->view('template/v_script');
    ?>
</body>

</html>