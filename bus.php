<?php
    include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>transupn</title>
    <style>
        /* Styles for the navigation links */
        .nav-link {
            display: block;
            padding: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            color: white;
            background-color: #696969;
            margin: 0 auto;
            transition: background-color 0.3s ease;
            margin-left: 0;
            margin-top: 10px;
        }
        .nav-link:hover {
            background-color: #3E8E41;
        }

        h2 {
            display: block;
            padding: 8px;
            text-decoration: none;
            font-weight: bold;
            font-size: 18px;
            background-color: white;
            border-radius: 5px;
            margin: 0 auto;
            transition: background-color 0.3s ease;
            margin-left: 0;
            margin-top: 10px;
        }

        /* Styles for the table */
        table {
            border:box;
            border-color: black;
            width: 80%;
            margin: 0 auto;
        }
        th, td {
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: 	#A9A9A9;
        }
        .green {
            background-color: green;
            color: white;
        }
        .yellow {
            background-color: yellow;
        }
        .red {
            background-color: red;
            color: white;
        }
        select {
            padding: 5px;
            border-radius: 5px;
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

        select{
            padding: 2px;
            margin: 5px;
            margin-right: 20px;
        }

    </style>
</head>
<body> 
<div class="container">
        <h2 align="center"><u><b>Trans UPN</b></u></h2>
        <table>
            <tr class="atas">
                <td class="tiga">
                    <a class="nav-link" href="<?php echo "driver.php"; ?>">Driver</a>
                </td>
                <td class="dua">
                    <a class="nav-link" href="<?php echo "kondektur.php"; ?>">Kondektur</a>
                </td>
                <td class="empat">
                    <a class="nav-link" href="<?php echo "trans_upn.php"; ?>">Trans UPN</a>
                </td>
                <td>
                    <a class="nav-link" href="<?php echo "menambah_driver.php"; ?>">Menambah Data</a>
                </td>
        <div class="table-container">
            <table border : box;>
                <thead>
                    <tr>
                        <th>ID Bus</th>
                        <th>Plat</th>
                        <th>Status</th>
                        <th>Total KM</th>
                        <th>Opsi</th>
                    </tr>
                </thead>
                <?php
    if (isset($_GET['status']) && $_GET['status'] != 'all') {
        $status = $_GET['status'];
        $query = "SELECT * FROM bus WHERE status='$status'";
    } else {
        $query = "SELECT * FROM bus";
    }
?>
                                            <select name="status">
                                                <option value="all">Semua</option>
                                                <option value="1">Aktif</option>
                                                <option value="2">Tidak Aktif</option>
                                                <option value="0">Sedang Perawatan</option>
                                            </select>
                                        <button type="submit">Filter</button>

                <tbody>
                    <?php 
                        $query = "SELECT * FROM bus";
                        $result = mysqli_query(connection(),$query);
                        while($data = mysqli_fetch_array($result)):
                            if ($data["status"] == 1) {
                                $warna = "green";
                            } elseif ($data["status"] == 2) {
                                $warna = "yellow";
                            } elseif ($data["status"] == 0) {
                                $warna = "red";
                            }
                            $status=$data["status"];
                            echo "<tr>";
                            echo "<td>".$data['id_bus']."</td>";
                            echo "<td>".$data['plat']; 
                                                ?>
                                            </td>
                                            
                                            <td>
                                                <?php 
                                                      if ($data["status"] == 1) {
                                                        $warna = "green";
                                                    } elseif ($data["status"] == 2) {
                                                        $warna = "yellow";
                                                    } elseif ($data["status"] == 0) {
                                                        $warna = "red";
                                                    }
                                                  $status=$data["status"];
                                                    echo "<button style ='background-color:$warna;'>$status</button>"
                                                ?>
                                            </td>
                                        <td>
                                            <?php
                                                $query_km = "SELECT SUM(jumlah_km) as total_km FROM trans_upn WHERE id_bus=".$data['id_bus'];
                                                $result_km = mysqli_query(connection(), $query_km);
                                                $data_km = mysqli_fetch_array($result_km);
                                                echo $data_km['total_km'];
                                            ?>
                                        </td>

                                            <td>
                                                <a href="<?php echo "update_bus.php?id_bus=".$data['id_bus']; ?>" > <button>Update</button></a>
                                                &nbsp;&nbsp;
                                               <a href="<?php echo "hapus_bus.php?id_bus=".$data['id_bus']; ?>"> <button>Delete</button></a>
                                            </td>
                                    </tr>
                                          
                                <?php endwhile ?>
                            </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html> 