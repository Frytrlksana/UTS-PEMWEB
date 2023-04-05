<!-- Ahilla Haffat Kammala/PemWeb C081 -->
<?php
include "koneksi.php";

if(isset($_POST['submit'])){
    $bulan = $_POST['bulan'];
    $conn = mysqli_connect("localhost","root","@Ferry10052002","transupn");

    if(!$conn){
        die("Connection failed: ".mysqli_connect_error());
    }

    $sql = "SELECT trans_upn.id_trans_upn, trans_upn.id_kondektur, trans_upn.jumlah_km, kondektur.nama, COUNT(trans_upn.id_trans_upn) AS total_perjalanan, SUM(trans_upn.jumlah_km) AS total_km 
    FROM trans_upn 
    INNER JOIN kondektur ON trans_upn.id_kondektur = kondektur.id_kondektur 
    WHERE MONTH(tanggal) = '$bulan' 
    GROUP BY trans_upn.id_kondektur";
    $result = mysqli_query($conn,$sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Trans UPN</title>
    <style>
        .container {
            margin: auto;
            width: 80%;
            border: 1px solid black;
            padding: 10px;
        }

        .nav-link {
            display: block;
            padding: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            color: white;
            background-color: #696969;
            border-radius: 5px;
            margin: 0 auto;
            transition: background-color 0.3s ease;
            margin-left: 0;
            margin-top: 10px;
        }
        .nav-link:hover {
            background-color: #3E8E41;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: white;
        }

        tr.atas {
            background-color: white;
            font-weight: bold;
            text-align: center;
        }

        tr.tengah {
            background-color: white;
        }

        tr.akhir {
            background-color:white;
            font-weight: bold;
        }

        th {
            background-color:  #C0C0C0;
            color: black;
        }

        td a {
            text-decoration: none;
            color: black;
        }


        td {
            text-align: center;
        }

        button {
            padding: 15px;
            border-radius: 5px;
            background-color: #C0C0C0;
            color: white;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #3E8E41;
        }

        select {
            padding: 5px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<div class = "container" >
        <h2 align="center"><u><b>Pendapatan Kondektur</b></u></h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
                    <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>Driver</b></a>
                        </center>    
                    </td>

                    <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "bus.php"; ?>"><b>Bus</b></a>
                        </center>    
                    </td>
                    <td class="empat">
                        <center>    
                            <a class="nav-link" href="<?php echo "trans_upn.php"; ?>"><b>Trans_UPN</b></a>
                        </center>    
                    </td>
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "kondektur.php"; ?>"><b>Kondektur</b></a>
                        </center>    
                    </td>
                </tr>
                
                <tr class="tengah">
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "menambah_bus.php"; ?>"><b>Menambah Data</b></a>
                        </center>
                    </td>
                </tr>
<div class="container">
    <form method="POST">
        <label for="bulan">Bulan:</label>
        <select name="bulan" id="bulan">
        <?php
    $bulan_array = array(
        1 => "Januari",
        2 => "Februari",
        3 => "Maret",
        4 => "April",
        5 => "Mei",
        6 => "Juni",
        7 => "Juli",
        8 => "Agustus",
        9 => "September",
        10 => "Oktober",
        11 => "November",
        12 => "Desember"
    );
    for($i = 1; $i <= 12; $i++){
        if($i >= 4 && $i <= 10) {
            $nama_bulan = $bulan_array[$i];
            echo "<option value='$i' ";
            if(isset($bulan) && $bulan == $i) echo "selected";
            echo ">$i ($nama_bulan)</option>";
        }
    }
?>
        </select>
        <button type="submit" name="submit">Tampilkan</button>
    </form>
            <?php
if(isset($result) && mysqli_num_rows($result) > 0): ?>
    <table class="rwd-table" border : box>
        <thead>
            <tr>
                <th>ID Kondektur</th>
                <th>Nama Kondektur</th>
                <th>Total Perjalanan</th>
                <th>Total KM</th>
                <th>Total Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $total_pendapatan = 0;
            while($row = mysqli_fetch_assoc($result)){
                $id_kondektur = $row['id_kondektur'];
                $nama = $row['nama'];
                $total_perjalanan = $row['total_perjalanan'];
                $total_km = $row['total_km'];
                $total_pendapatan_per_kondektur = $total_km * 1500;
                $total_pendapatan += $total_pendapatan_per_kondektur;?>
                <tr>
                <td data-th="ID Kondektur"><?php echo $row['id_kondektur']; ?></td>
                <td data-th="Nama Kondektur"><?php echo $nama; ?></td>
                <td data-th="Total Perjalanan"><?php echo $total_perjalanan; ?></td>
                <td data-th="Total KM"><?php echo $total_km; ?></td>
                <td data-th="Total Pendapatan">Rp. <?php echo number_format($total_pendapatan_per_kondektur, 0, ',', '.'); ?></td>
                </tr>
            <?php } ?>
            <tr>
            <td colspan="4" style="text-align: right; font-weight: bold;">Total Pendapatan</td>
            <td>Rp. <?php echo number_format($total_pendapatan, 0, ',', '.'); ?></td>
            </tr>
        </tbody>
    </table>
<?php elseif(isset($result)): ?>
    <p>Tidak ada data untuk bulan ini</p>
<?php endif; ?>
</div>
</body>
</html>