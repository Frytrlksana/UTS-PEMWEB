<?php
    include('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>transupn</title>
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
    <div class="container">
        <h2 align="center"><u><b>Trans UPN</b></u></h2>
        <table>
            <tr class="atas">
                <td class="tiga">
                    <a class="nav-link" href="<?php echo "bus.php"; ?>">Bus</a>
                </td>
                <td class="dua">
                    <a class="nav-link" href="<?php echo "kondektur.php"; ?>">Kondektur</a>
                </td>
                <td class="empat">
                    <a class="nav-link" href="<?php echo "trans_upn.php"; ?>">Trans UPN</a>
                </td>
                <td>
                    <a class="nav-link" href="<?php echo "menambah_driver.php"; ?>">Menambah Data</a>
                </td><td>
                    <a class="nav-link" href="<?php echo "pendapatan_driver.php"; ?>">Pendapatan Driver</a>
                </td>
       
            
            <tr class="akhir">
                <td colspan="5">
                    <table border = "solid">
                        <thead>
                            <tr>
                                <th>Id_Driver</th>
                                <th>Nama</th>
                                <th>No_SIM</th>
                                <th>Alamat</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT * FROM driver";
                            $result = mysqli_query(connection(),$query);
                            while($data = mysqli_fetch_array($result)): 
                            ?>
                                <tr>
                                    <td><?php echo $data['id_driver']; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td><?php echo $data['no_sim']; ?></td>
                                    <td><?php echo $data['alamat']; ?></td>
                                    <td>
                                        <a href="<?php echo "update_driver.php?id_driver=".$data['id_driver']; ?>"><button>Update</button></a>
                                        &nbsp;&nbsp;
                                        <a href="<?php echo "hapus_driver.php?id_driver=".$data['id_driver']; ?>"><button>Delete</button></a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                        </tbody>
                            
                        </td>

                </tr>
            </table>
</body>
</html> 