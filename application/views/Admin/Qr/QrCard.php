<!DOCTYPE html>
<html>
<head>
    <title>QR-CARD</title>
    <style type="text/css">

        body {
            background: rgb(204,204,204); 
        }
        .id-card-holder {
            width: 400px;
            padding: 4px;
            margin: 0 left;
            background-color: #1f1f1f;
            border-radius: 5px;
            position: relative;
        }
        .id-card {
            background-color: #fff;
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 0 1.5px 0px #b9b9b9;
        }
        .id-card img {
            margin: 0 center;
        }
        .header img {
            width: 100px;
            margin-top: 15px;
        }
        .photo img {
            width: 120px;
            height: 120px;
            margin-top: 15px;
        }
        h2 {
            font-size: 15px;
            margin: 5px 0;
        }
        h3 {
            font-size: 12px;
            margin: 2.5px 0;
            font-weight: 300;
        }
        .qr-code img {
            width: 50px;
        }
        p {
            font-size: 5px;
            margin: 2px;
        }

        page {
          background: white;
          display: block;
          margin: 0 auto;
          margin-bottom: 0.5cm;
          box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
      }

      page[size="A4"] {  
          width: 21cm;
          height: 29.7cm; 
      }

      table.tbl {
        width: 100%;
        border-collapse: collapse;
    }

    table.tbl th {
        padding: 6px;
    }

    table.tbl td {
        padding: 5px;
    }

    .data {
        position: relative;
        text-align: left;
        float: all;
        margin-top: -115px;
        margin-bottom: -5px;
    }

    @media print {
        body, page {
            margin: 0;
            box-shadow: 0;
        }
    }
</style>
</head>
<body>
    <page size="A4">
        <div class="id-card-holder">
            <div class="id-card">
                <div class="header">
                    <table width="100%">
                        <tr>
                            <td colspan="2" align="center">
                                <span style="font-size: 15px;font-weight: bold;">SISTEM INFORMASI PERPUSTAKAAN</span>
                                <br>
                                <span style="font-size: 12px;font-weight: bold;">MAN 1 PEKALONGAN</span>
                            </td>
                        </tr>
                    </table>
                    <hr>
                </div>
                <h2>KARTU ANGGOTA PERPUSTAKAAN</h2>
                <div style="margin-left: 250px; margin-bottom: 45px; margin-top: -15px" class="photo">
                    <img src="<?= base_url('/public/user/qrcode/' . $data->qrcode) ?>">
                </div>
                <div class="data">
                    <h3 style="font-weight: inherit; margin-bottom: 10px;"><strong>Nama : </strong><?= strtoupper($data->nama_lengkap) ?></h3>
                    <h3 style="font-weight: inherit; margin-bottom: 10px;"><strong>NIS : </strong><?= strtoupper($data->nis) ?></h3>
                    <h3 style="font-weight: bold; margin-bottom: 10px;"><?= strtoupper($data->alamat) ?></h3>
                </div>
                <hr>
                <p>KARTU INI BERLAKU SELAMA MENJADI SISWA <strong>MAN 01 PEKALONGAN</strong></p>
                <p>HARAP DIBAWA SAAT MENGUNJUNGI PERPUSTAKAAN</p>
            </div>
        </div>
    </page>
</body>
<script type="text/javascript">
    window.print();
    window.focus();
</script>
</html>