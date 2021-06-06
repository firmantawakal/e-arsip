<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Surat Masuk</title>
</head>

<body onload="window.print();">
    <table style="border-collapse: collapse; width: 0%;" border="0">
        <tbody>
            <tr>
                <td style="width: 100%; padding-bottom:20px"><strong><img style="display: block; margin-left: auto; margin-right: auto;" src="<?php echo base_url() ?>assets/images/Logo_Tri_Brata.png" alt="Logo Tri Brata" width="80" /></strong></td>
            </tr>
            <tr>
                <td style="width: 100%; text-align: center;"><strong>POLRI DAERAH RIAU<br />RESOR DUMAI<br />SEKTOR DUMAI KOTA<br /><br /></strong>JL. Jendral Sudirman Kota Dumai, 28812</td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <p style="text-align: center;"><strong>LAPORAN SURAT MASUK<br /></strong></p>
    <p style="text-align: left;">Tanggal : <?php echo $this->string_->tgl_indo($date1)?> - <?php echo $this->string_->tgl_indo($date2)?></p>
    <table style="border-collapse: collapse; width: 100%; height: 54px;" border="1">
        <tbody>
            <tr style="height: 18px;">
                <td style="width: 3%; text-align: center; padding:5px"><strong>No</strong></td>
                <td style="width: 17%; text-align: center; padding:5px"><strong>Tgl. Input</strong></td>
                <td style="width: 20%; text-align: center; padding:5px"><strong>Tgl. Surat</strong></td>
                <td style="width: 20%; text-align: center; padding:5px"><strong>No. Surat</strong></td>
                <td style="width: 20%; text-align: center; padding:5px"><strong>Pengirim</strong></td>
                <td style="width: 20%; text-align: center; padding:5px"><strong>Isi Singkat</strong></td>
            </tr>
            <?php
            $no = 1;
            foreach ($suratMasuk as $data) {
            ?>
            <tr style="height: 18px;">
				<td style="padding:5px"><?php echo $no++ ?></td>
                <td style="padding:5px"><?php echo $this->string_->dbdate_to_indo($data->tgl_suratmasuk) ?></td>
                <td style="padding:5px"><?php echo $this->string_->dbdate_to_indo($data->tgl_disuratmasuk) ?></td>
                <td style="padding:5px"><?php echo $data->no_suratmasuk ?></td>
                <td style="padding:5px"><?php echo $data->instansi_pengirim ?></td>
                <td style="padding:5px"><?php echo $data->isi_singkat ?></td>
            </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <table style="border-collapse: collapse; margin-left:65%; width: 35%; height: 156px;" border="0">
        <tbody>
            <tr>
                <td style="text-align: center;"><span >Dumai, <?php echo $this->string_->tgl_indo(date('Y-m-d'))?></span></td>
            </tr>
            <tr>
                <td style="text-align: center;">KAPOLSEK DUMAI KOTA</td>
            </tr>
            <tr style="height: 90px;">
                <td style="width: 100%; height: 90px;">&nbsp;</td>
            </tr>
            <tr>
                <td style="text-align: center;"><span style="text-decoration-line: underline; ">IPTU HARDIYANTO, S.E, M.Si</span><br />NRP. 78110458</td>
            </tr>
        </tbody>
    </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
</body>

</html>