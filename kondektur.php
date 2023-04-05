<?php
    include('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>transupn</title>
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
                    <a class="nav-link" href="<?php echo "bus.php"; ?>"><b>Bus</b></a>
                </td>
                <td class="dua">
                    <a class="nav-link" href="<?php echo "driver.php"; ?>"><b>Driver</b></a>
                </td>
                <td class="empat">
                    <a class="nav-link" href="<?php echo "trans_upn.php"; ?>"><b>Trans_UPN</b></a>
                </td>
            </tr>
                <td>
                    <a class="nav-link" href="<?php echo "menambah_kondektur.php"; ?>"><b>Menambah Data</b></a>
                </td>
                <td>
                    <a class="nav-link" href="<?php echo "pendapatan_kondektur.php"; ?>">Pendapatan Kondektur</a>
                </td>
            <tr class="akhir">
                <td colspan="3">
                    <table border="1" align="center">
                        <thead>
                            <tr bgcolor="lightgray">
                                <th>Id_Kondektur</th>
                                <th>Nama</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $query = "SELECT * FROM kondektur";
                            $result = mysqli_query(connection(),$query);
                            while($data = mysqli_fetch_array($result)): 
                            ?>
                            <tr>
                                <td><?php echo $data['id_kondektur']; ?></td>
                                <td><?php echo $data['nama']; ?></td>
                                <td>
                                    <a href="<?php echo "update_kondektur.php?id_kondektur=".$data['id_kondektur']; ?>"><button>Update</button></a>
                                    &nbsp;&nbsp;
                                    <a href="<?php echo "hapus_kondektur.php?id_kondektur=".$data['id_kondektur']; ?>"><button>Delete</button></a>
                                </td>
                            </tr>
                            <?php endwhile ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>