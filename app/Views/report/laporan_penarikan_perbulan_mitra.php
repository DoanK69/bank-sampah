<!DOCTYPE html>
<html>

<head>
    <title>Laporan Data Penjualan Per Bulan</title>
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo.png">
    <style type="text/css">
        .head {
            border-style: double;
            border-width: 3px;
            border-color: white;
        }

        .body {
            border-collapse: collapse;
            border: 1px;
            border-color: black;
        }

        table tr .text2 {
            text-align: right;
            font-size: 13px;
        }

        table tr .text {
            text-align: center;
            font-size: 13px;
        }

        table tr td {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <center>
        <table class="head" width="625">
            <tr>
                <td><img src="<?= base_url(); ?>/assets/images/logo.png" width="90" height="90"></td>
                <td>
                    <center>
                        <font size="5"><b>BANK SAMPAH</b></font><br>
                        <font size="2">Alamat : Jalan Alai Timur No. 30 C Padang</font><br>
                        <font size="2"><i>Email : banksampah@gmail.com Kode Pos : 25171 Telp. (0821) 71538532</i></font>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <hr>
                </td>
            </tr>
            <table width="625" class="head">
                <tr>
                    <td class="text2">Padang, <?= date("d M Y"); ?></td>
                </tr>
            </table>
        </table>
        <table class="head" style="margin-bottom: 20px;">
            <tr>
                <td>Laporan Data Penarikan Per Bulan</td>
            </tr>
            <tr>
                <?php $namabulan;
                if ($bulan == "01") {
                    $namabulan = "Januari";
                } else if ($bulan == "02") {
                    $namabulan = "Februari";
                } else if ($bulan == "03") {
                    $namabulan = "Maret";
                } else if ($bulan == "04") {
                    $namabulan = "April";
                } else if ($bulan == "05") {
                    $namabulan = "Mei";
                } else if ($bulan == "06") {
                    $namabulan = "Juni";
                } else if ($bulan == "07") {
                    $namabulan = "Juli";
                } else if ($bulan == "08") {
                    $namabulan = "Agustus";
                } else if ($bulan == "09") {
                    $namabulan = "September";
                } else if ($bulan == "10") {
                    $namabulan = "Oktober";
                } else if ($bulan == "11") {
                    $namabulan = "November";
                } else if ($bulan == "12") {
                    $namabulan = "Desember";
                } ?>
                <td style="text-align: center;">Bulan : <?= $namabulan; ?> <?= $tahun; ?> </td>
            </tr>
            <tr>
                <h3 style="text-align: center;">
                    <?php echo $nama; ?>
                </h3>
            </tr>
        </table>
        <table border="1" class="body" width="625">
            <thead>
                <tr style="height: 25px;">
                    <th>No.</th>
                    <th>No Penarikan</th>
                    <th>Tanggal</th>
                    <th>Nama Nasabah</th>
                    <th>Nama Bank</th>
                    <th>No Rekening</th>
                    <th>Nama Rekening</th>
                    <th>Status</th>
                    <th>Jumlah Penarikan</th>

                </tr>
            </thead>
            <tbody>

                <?php $no = 0;
                $total = 0;
                foreach ($penarikan as $row) : $no++ ?>
                <tr style="height: 30px; text-align: center;">
                    <td> <?= $no; ?></td>
                    <td> <?= $row['penarikan_nomor']; ?></td>
                    <td> <?= $row['penarikan_tanggal']; ?></td>
                    <td> <?= $row['nasabah_nama']; ?></td>
                    <td> <?= $row['penarikan_nama_bank']; ?></td>
                    <td> <?= $row['penarikan_nomor_rekening']; ?></td>
                    <td> <?= $row['penarikan_nama_rekening']; ?></td>
                    <td> <?php if ($row['penarikan_status'] == 0) { ?>
                        PENDING
                        <?php } else if ($row['penarikan_status'] == 1) { ?>
                        SUKSES
                        <?php } else { ?>
                        DITOLAK
                        <?php } ?>
                    </td>
                    <td> <?= $row['penarikan_jumlah_penarikan']; ?></td>
                </tr>
                <?php $total+=$row['penarikan_jumlah_penarikan']; ?>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr style="height: 20px;">
                    <td colspan="8">
                        Total :
                    </td>
                    <td style="text-align: center;">
                        <?= $total; ?>
                    </td>
                </tr>
            </tfoot>
        </table>
    </center>
</body>

<script>
    window.print();
</script>

</html>