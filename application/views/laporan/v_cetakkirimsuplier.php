<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('template/v_header');
?>

<body onload="window.print()">
    <div class="wrapper">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

        </table>
        <?php
        $b = $krs->row_array();
        $sup = $s->row_array();
        ?>
        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <th colspan="2" style="width:800px;padding-left:20px;">
                    <h4><b>BALI TEES</b> </h4>
                    <h4>Nama Suplier: <?= $sup['nama_suplier'] ?> </h4>
                    <h4><?= $sup['alamat_suplier'] ?> / <?= $sup['no_telp'] ?> </h4>
                </th>
                <th colspan="2" style="width:800px;padding-left:20px;">
                    <h5>Bali, <?= date('d-M-Y') ?></h5>
                    <h5> KEPADA Yth.</h5>
                    <h4>BALI TEES</h4>
                    <h4>JL. </h4>
                </th>
            </tr>
        </table>
        <table border="1" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>

        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left;">SURAT JALAN NO. </th>
                <th style="text-align:left;">: <?php echo $b['kode_stokin']; ?></th>&nbsp;
            </tr>
            <tr>
                <th style="text-align:left;">Tanggal</th>
                <th style="text-align:left;">: <?php echo $b['tanggal']; ?></th>
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
                    <td style="width:20px;border:none;text-align:center;">No. </td>
                    <td style="width:100px;border:none;text-align:center;">Kode Barang</td>
                    <td style="width:100px;border:none;text-align:center;">Item Barang</td>
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
                foreach ($krs->result_array() as $i) {
                    $no++;
                    $kode = $i['kode_barang'];
                    $item = $i['nama_item'];
                    $size = $i['nama_size'];
                    $nabar = $i['nama_barang'];
                    $harjul = $i['harga'];
                    $qty = $i['jumlah'];
                    $total = $i['subtotal'];
                    $warna = $i['nama_warna'];
                ?>
                    <tr>
                        <td style="text-align:left;"><?php echo $no; ?></td>
                        <td style="text-align:center;"><?php echo $kode; ?></td>
                        <td style="text-align:center;"><?php echo $item; ?></td>
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
                    <td colspan="8" style="text-align:right;"><b>Total</b></td>
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['total']) . ',-'; ?></b></td>
                </tr>
            </tfoot>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Diterima Oleh:</td>
                <td align="right">
                    <h5>Terimakasih,</h5>
                    <h5>Hormat Saya</h5>
                </td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /></td>
            </tr>
            <tr>
                <td align="right">( &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp )</td>
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