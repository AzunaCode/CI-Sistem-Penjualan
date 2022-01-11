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
                        <h4>LAPORAN RETUR TOKO </h4>
                        <h4><?php
                            foreach ($t as $data) {
                                echo $data->nama_toko;
                            }
                            ?> - <?php
                                    foreach ($t as $data) {
                                        echo $data->alamat_toko;
                                    }
                                    ?></h4>
                    </center><br />
                </td>
            </tr>
        </table>
        <table border="0" align="center" style="width:900px;border:none;">
            <tr>
                <th style="text-align:left"></th>
            </tr>
        </table>
        <table border="1" align="center" style="width:900px;margin-bottom:20px;">
            <thead>
                <tr>
                    <th style="width:50px;">No</th>
                    <th>No_Retur</th>
                    <th>Tanggal</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Ket</th>
                    <th>Nama Toko</th>
                    <th>Harga Jual</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 0;
                foreach ($rt->result_array() as $i) {
                    $no++;
                    $nofak = $i['kode_stokout'];
                    $tgl = $i['tgl_stokout'];
                    $barang_id = $i['kode_barang'];
                    $barang_nama = $i['nama_barang'];
                    $ket = $i['keterangan'];
                    $nmtoko = $i['nama_toko'];
                    $barang_harjul = $i['hargajual'];
                    $barang_qty = $i['jumlah'];
                    $barang_total = $i['sub_total'];
                ?>
                    <tr>
                        <td style="text-align:center;"><?php echo $no; ?></td>
                        <td style="padding-left:5px;"><?php echo $nofak; ?></td>
                        <td style="text-align:center;"><?php echo $tgl; ?></td>
                        <td style="text-align:center;"><?php echo $barang_id; ?></td>
                        <td style="text-align:left;"><?php echo $barang_nama; ?></td>
                        <td style="text-align:left;"><?php echo $ket; ?></td>
                        <td style="text-align:left;"><?php echo $nmtoko; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($barang_harjul); ?></td>
                        <td style="text-align:center;"><?php echo $barang_qty; ?></td>
                        <td style="text-align:right;"><?php echo 'Rp ' . number_format($barang_total); ?></td>
                    </tr>
                <?php } ?>
            </tbody>

        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td></td>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <td align="right">Bali, <?php echo date('d-M-Y') ?></td>
            </tr>
            <tr>
                <td align="right"></td>
            </tr>

            <tr>
                <td><br /><br /><br /><br /></td>
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