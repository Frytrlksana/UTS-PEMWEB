<!-- Ahilla Haffat Kammala/PemWeb C081 -->

<?php
include ('koneksi.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    // Check if the foreign key values exist in their respective tables
    $konduktor_result = mysqli_query(connection(), "SELECT * FROM kondektur WHERE id_kondektur='$id_kondektur'");
    $bus_result = mysqli_query(connection(), "SELECT * FROM bus WHERE id_bus='$id_bus'");
    $driver_result = mysqli_query(connection(), "SELECT * FROM driver WHERE id_driver='$id_driver'");

    if (mysqli_num_rows($konduktor_result) > 0 && mysqli_num_rows($bus_result) > 0 && mysqli_num_rows($driver_result) > 0) {
        $query = "INSERT INTO trans_upn (id_trans_upn, id_kondektur, id_bus, id_driver, jumlah_km, tanggal)
                  VALUES ('$id_trans_upn', '$id_kondektur', '$id_bus', '$id_driver', '$jumlah_km', '$tanggal')";
        $result = mysqli_query(connection(), $query);
        if ($result) {
            $status = 'ok';
        } else {
            $status = 'err';
        }
    } else {
        $status = 'fk_err';
    }
    header('Location: trans_upn.php?status=' . $status);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add New Product</title>
    <style>
body{
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
        }
        nav{
            background-color: #333;
            color: #333;
            margin : center;
            padding: 1em;
            display: flex;
            justify-content: space-between;
        }
        .container{
            max-width: 800px;
            margin: 0 auto;
            padding: 2em;
            background-color: #fff;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        h2{
            margin-top: 0;
        }
        form{
            display: flex;
            flex-direction: column;
            max-width: 400px;
        }
        .form-group{
            display: flex;
            flex-direction: column;
            margin-bottom: 1em;
        }
        label{
            font-weight: bold;
            margin-bottom: 0.5em;
        }
        input, select{
            padding: 0.5em;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button{
            background-color: #333;
            color: #fff;
            padding: 0.5em;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover{
            background-color: #555;
        }
        a{
            color: black;
            text-decoration: none;
            font-weight: bold;
        }
        ul{
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
        }
        li{
            margin-left: 1em;
        }
</style>
</head>
<body>
<div class = "container" >
        <h2 align="center"><u><b>Trans UPN</b></u></h2>
            <table style="width:100%" cellspacing="0">
                <tr class="atas">
                    <td class="dua">
                        <center>    
                            <a class="nav-link" href="<?php echo "kondektur.php"; ?>"><b><button>Kondektur</button></b></a>
                        </center>    
                    </td>

                    <td class="tiga">
                        <center>    
                            <a class="nav-link" href="<?php echo "driver.php"; ?>"><b><button>Driver</button></b></a>
                        </center>    
                    </td>
                    <td class="empat">
                        <center>    
                            <a class="nav-link" href="<?php echo "kondektur.php"; ?>"><b><button>Kondektur</button></b></a>
                        </center>    
                    </td>
                </tr>
                
                <tr class="tengah">
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "menambah_bus.php"; ?>"><b><button>Menambah Data</button></b></a>
                        </center>
                    </td>
                </tr>
    <tr class="akhir">
  <td colspan="3"><main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data berhasil diperbarui</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
                          }
                        ?>
    <div class="content">
    <form action="menambah_trans_upn.php" method="POST">

        <label>Id Trans UPN:</label>
        <input type="text" placeholder="id_trans_upn" name="id_trans_upn" required="required">

        <label>Id Kondektur:</label>
        <select name="id_kondektur">
            <?php
                 $query_kondektur = "SELECT * FROM kondektur";
                 $result_kondektur = mysqli_query(connection(), $query_kondektur);
                 while($data_kondektur = mysqli_fetch_array($result_kondektur)) {
                     echo "<option value='".$data_kondektur['id_kondektur']."'>".$data_kondektur['nama']."</option>";
                 }
             ?>
        </select>

        <label>Id Bus:</label>
        <select name="id_bus">
            <?php
                 $query_bus = "SELECT * FROM bus";
                 $result_bus = mysqli_query(connection(), $query_bus);
                 while($data_bus = mysqli_fetch_array($result_bus)) {
                     echo "<option value='".$data_bus['id_bus']."'>".$data_bus['plat']."</option>";
                 }
             ?>
        </select>

        <label>Id driver:</label>
        <select name="id_driver">
            <?php
                 $query_driver = "SELECT * FROM driver";
                 $result_driver = mysqli_query(connection(), $query_driver);
                 while($data_driver = mysqli_fetch_array($result_driver)) {
                     echo "<option value='".$data_driver['id_driver']."'>".$data_driver['nama']."</option>";
                 }
             ?>
        </select>

        <label>Jumlah Km:</label>
        <input type="text" placeholder="jumlah_km" name="jumlah_km" required="required">

        <label>Tanggal:</label>
        <input type="text" placeholder="tanggal" name="tanggal" required="required">

        <input type="submit" name="submit" value="Simpan">
    </form>
</div>
            </body>
            </html>