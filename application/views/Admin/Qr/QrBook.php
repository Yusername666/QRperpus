<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>SISTEM INFORMASI PERPUSTAKAAN</title>
    <style type="text/css">
        .page-header,
        .page-header-space {
            height: 1mm;
        }

        .page-footer,
        .page-footer-space {
            height: 1mm;
        }

        .page-footer {
            position: fixed;
            bottom: 0;
            width: 50%;
        }

        .page-header {
            position: fixed;
            top: 0mm;
            width: 50%;
        }

        .page {
            page-break-after: always;
            margin-left: 1mm;
            margin-right: 1mm;
        }

        @page {
            size: 4cm 3cm;
            /*margin: 20cm 20cm 40cm 40cm;*/
        }

        html,
        body {
            margin-top: 25px;
            margin-left: 40px;
        }
        .grid-container {
            display: grid; 
            grid-template-columns: 1fr; 
            grid-template-rows: : 1fr; 
        }

        @media print {
            thead {
                display: table-header-group;
            }

            tfoot {
                display: table-footer-group;
            }

            body {
                margin: 0;
            }
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

        .emapat {
            margin-left: 5.75px;
            margin-bottom: 5.75px;
            border: 1px solid black;
            text-align: center;
            float: left;
            width: 25%;
            height: 215px;
        }
        .empat {
            margin-left: 5.75px;
            margin-bottom: 5.75px;
            border: 1px solid black;
            text-align: left;
            float: left;
            width: 72%;
            height: 215px;
        }
        .broder {
            border: 1px solid black;
            float: left;
            height: 100%;
            width: 90%;
        }
    </style>
</head>

<body>
    <div class="page-header" style="text-align: center"></div>
    <div class="page-footer"></div>

    <div class="grid-container">
        <table width="100%">
            <thead>
                <tr>
                    <td>
                        <!--place holder for the fixed-position header-->
                        <div class="page-header-space"></div>
                    </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!--*** CONTENT GOES HERE ***-->
                        <div class="broder" align="left">
                            <div class="page">
                                <table width="100%">
                                    <tr>
                                        <td colspan="2" align="center">
                                            <span style="font-size: 30px;font-weight: bold;">SISTEM INFORMASI PERPUSTAKAAN MAN 01 PEKALONGAN</span>
                                            <hr>
                                        </td>
                                    </tr>
                                </table>
                                <div align="center">
                                    <div class="emapat">
                                        <img src="<?= base_url('/public/buku/qrcode/' . $data['qrcode']) ?>" style="width: 190px; height: 190px; margin-top:10px" alt="qrcode">
                                    </div>
                                    <div class="empat">
                                        <div align="center" style="margin-top: 20px">
                                            <h1 style="text-align: center;">
                                                <?= $data['id_klasifikasi'] ?>
                                            </h1>
                                            <h2 style="text-align: center;">
                                                <?= $data['judul_buku'] ?>
                                            </h2>
                                            <h3 style="text-align: center;">
                                                <?= $data['pengarang'] ?>
                                            </h3>
                                            <h3 style="text-align: center;">
                                                <?= $data['kd_inventaris'] ?>
                                            </h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td>
                        <!--place holder for the fixed-position footer-->
                        <div class="page-footer-space"></div>
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>
    <script type="text/javascript">
        window.print();
        window.focus();
    </script>

</body>

</html>