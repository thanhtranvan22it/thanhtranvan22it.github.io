<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NHẬP VÀ TÍNH TOÁN TRÊN DÃY SỐ</title>
</head>

<body>
    <form method="POST" action="bai1.php">
        <table>
            <thead>
                <tr>
                    <th colspan="2">NHẬP VÀ TÍNH TRÊN DÃY SỐ</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Nhập dãy số:</td>
                    <td><input type="text" name="nhap_mang" value="<?php echo isset($_POST['nhap_mang']) ? htmlspecialchars($_POST['nhap_mang']) : ''; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" name="btn_goi" value="Tổng dãy số"></td>
                </tr>
                <tr>
                    <td>Tổng dãy số:</td>
                    <td><input type="text" name="ket_qua" disabled="disabled" value="<?php echo isset($ket_qua) ? $ket_qua : ''; ?>"></td>
                </tr>
            </tbody>
        </table>
    </form>
    <style>
        * {
            font-family: Tahoma;
        }

        table {
            width: 400px;
            margin: 100px auto;
        }

        table th {
            background: #66CCFF;
            padding: 10px;
            font-size: 18px;
        }
    </style>

    <?php
    $ket_qua = 0;
    if (isset($_POST['btn_goi'])) {
        $mang_so = explode(",", $_POST['nhap_mang']);
        $n = count($mang_so);
        for ($i = 0; $i < $n; $i++) {
            $ket_qua += (int)$mang_so[$i];
        }
    }
    ?>

</body>

</html>
