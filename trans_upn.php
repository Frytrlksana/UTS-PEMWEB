<?php
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>TransUPN</title>
    <style>
        table {
            width: 100%;
        }
        .atas {
            background-color: white;
        }
        .tengah {
            background-color: white;
        }
        .akhir {
            background-color: white;
        }
        td {
            text-align: center;
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
        button {
            padding: 15px;
            margin-top: 0 auto;
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
    <div class="container">
    <h2 align="center"><u><b>TRANS UPN</b></u></h2>
        <table>
            <tr class="atas">
                <td class="tiga">
                    <a class="nav-link" href="bus.php">Bus</a>
                </td>
                <td class="dua">
                    <a class="nav-link" href="kondektur.php">Kondektur</a>
                </td>
                <td class="empat">
                    <a class="nav-link" href="driver.php">Driver</a>
                </td>
            </tr>
            <tr class="tengah">
                <td>
                    <a class="nav-link" href="menambah_trans_upn.php">Menambah Data</a>
                </td>
            </tr>
            <tr class="akhir">
                <td colspan="7">
                    <table border="">
                        <thead>
                            <tr bgcolor="lightgray">
                                <th>id_trans_upn</th>
                                <th>id_kondektur</th>
                                <th>id_bus</th>
                                <th>id_driver</th>
                                <th>jumlah_km</th>
                                <th>tanggal</th>
                                <th>opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT * FROM trans_upn";
                            $result = mysqli_query(connection(),$query);
                            ?>
                            <?php 
                            while($data = mysqli_fetch_array($result)): 
                            ?>
                            <tr>
                                <td><?php echo $data['id_trans_upn']; ?></td>
                                <td><?php echo $data['id_kondektur']; ?></td>
                                <td><?php echo $data['id_bus']; ?></td>
                                <td><?php echo $data['id_driver']; ?></td>
                                <td><?php echo $data['jumlah_km']; ?></td>
                                <td><?php echo $data['tanggal']; ?></td>
                                <td>
                                    <a href="update_trans_upn.php?id_trans_upn=<?php echo $data['id_trans_upn']; ?>"><button>Update</button></a>
                                    &nbsp;&nbsp;
                                    <a href="hapus_trans_upn.php?id_trans_upn=<?php echo $data['id_trans_upn']; ?>"><button>Delete</button></a>
                                </td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html> 