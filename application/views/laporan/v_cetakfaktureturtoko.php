<!DOCTYPE html>
<html lang="en">

<?php
$this->load->view('template/v_header');
?>

<body onload="window.print()">
    <div class="wrapper">
        <table align="center" style="width:900px; border-bottom:3px double;border-top:none;border-right:none;border-left:none;margin-top:5px;margin-bottom:20px;">

        </table>
        <table border="0" align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:0px;">
            <tr>
                <td colspan="2" style="width:800px;padding-left:20px;">
                    <center>
                        <h4>BALI TEES </h4>
                        <h4>RETUR BARANG</h4>
                        <h4><?php
                            foreach ($us as $data) {
                                echo $data->nama_toko;
                            }
                            ?> - <?php
                                    foreach ($us as $data) {
                                        echo $data->alamat_toko;
                                    }
                                    ?></h4>
                    </center><br />
                </td>
            </tr>
        </table>
        <table border="1" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <?php
        $b = $ctk->row_array();
        ?>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <td colspan="3" style="text-align:left;"><b>Nomor</b></td>
                <td colspan="5" style="text-align:left;">: <?php echo $b['kode_stokout']; ?></td>&nbsp;
            </tr>
            <tr>
                <td colspan="3" style="text-align:left;"><b>Tanggal</b></td>
                <td colspan="5" style="text-align:left;">: <?php echo $b['tgl_stokout']; ?></td>
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
        <table border="1" align="center" style="width:900px;border:none;">
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
                foreach ($ctk->result_array() as $i) {
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
                    <td style="text-align:right;"><b><?php echo 'Rp ' . number_format($b['total']); ?></b></td>
                </tr>
            </tfoot>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td>
                </td>
            </tr>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td>
                    <h5> Nb:</h5>
                    <h5> <?= $b['pesan'] ?></h5>
                </td>
            </tr>
        </table>

        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Bali, <?php echo date('d-M-Y') ?></td>
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