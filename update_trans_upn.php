<!-- Ahilla Haffat Kammala/PemWeb C081 -->

<?php
  //memanggil file conn.php yang berisi koneski ke database
  //dengan include, semua kode dalam file conn.php dapat digunakan pada file index.php
  include ('koneksi.php');

  $status = '';
  $result = '';
  //melakukan pengecekan apakah ada variable GET yang dikirim
  if ($_SERVER['REQUEST_METHOD'] === 'GET') {
      if (isset($_GET['id_trans_upn'])) {
          //query SQL
          $id_trans_upn_upd = $_GET['id_trans_upn'];
          $query = "SELECT * FROM trans_upn WHERE id_trans_upn = '$id_trans_upn_upd'";
         
          //eksekusi query
          $result = mysqli_query(connection(),$query);
      }
  }

  //melakukan pengecekan apakah ada form yang dipost
  //melakukan pengecekan apakah ada form yang dipost
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_trans_upn = $_POST['id_trans_upn'];
    $id_kondektur = $_POST['id_kondektur'];
    $id_bus = $_POST['id_bus'];
    $id_driver = $_POST['id_driver'];
    $jumlah_km = $_POST['jumlah_km'];
    $tanggal = $_POST['tanggal'];

    //query SQL
    $sql = "UPDATE trans_upn SET id_kondektur='$id_kondektur', id_bus='$id_bus', id_driver='$id_driver', jumlah_km='$jumlah_km', tanggal='$tanggal' WHERE id_trans_upn='$id_trans_upn'";

    //eksekusi query
    $result = mysqli_query(connection(), $sql);

    if ($result) {
      $status = 'ok';
    } else {
      $status = 'err';
    }

    //redirect ke halaman lain
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
<nav>
        <h2><b>Update Trans UPN</b></h2>
        <div>
            <a href="bus.php"><b><button>Bus</button></b></a>
            <a href="kondektur.php"><b><button>Kondektur</button></b></a>
            <a href="driver.php"><b><button>Driver</button></b></a>
            <a href="trans_upn.php"><b><button>Trans UPN</button></b></a>
            <a href="menambah_trans_upn.php"><b><button>Menambah Data</button></b></a>
        </div>
    </nav>
        
    <tr class="akhir">
  <td colspan="3">
    <div class="container">  
  <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data berhasil diperbarui</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
                          }
                        ?>
    <div class="content">
    <form action="update_trans_upn.php" method="POST">
        <?php while($data = mysqli_fetch_array($result)): ?>
            <label>id_trans_upn</label>
            <input type="text" class="form-control" placeholder="id_trans_upn" name="id_trans_upn" value="<?php echo $data['id_trans_upn'];  ?>" required="required" readonly>

            <label>Id Kondektur:</label>
            <select name="id_kondektur">
                <?php
                    $query_kondektur = "SELECT * FROM kondektur";
                    $result_kondektur = mysqli_query(connection(), $query_kondektur);
                    while($data_kondektur = mysqli_fetch_array($result_kondektur)) {
                        $selected = ($data['id_kondektur'] == $data_kondektur['id_kondektur']) ? 'selected' : '';
                        echo "<option value='".$data_kondektur['id_kondektur']."' ".$selected.">".$data_kondektur['nama']."</option>";
                    }
                ?>
            </select>

            <label>Id Bus:</label>
            <select name="id_bus">
                <?php
                    $query_bus = "SELECT * FROM bus";
                    $result_bus = mysqli_query(connection(), $query_bus);
                    while($data_bus = mysqli_fetch_array($result_bus)) {
                        $selected = ($data['id_bus'] == $data_bus['id_bus']) ? 'selected' : '';
                        echo "<option value='".$data_bus['id_bus']."' ".$selected.">".$data_bus['plat']."</option>";
                    }
                ?>
            </select>

            <label>Id driver:</label>
            <select name="id_driver">
                <?php
                    $query_driver = "SELECT * FROM driver";
                    $result_driver = mysqli_query(connection(), $query_driver);
                    while($data_driver = mysqli_fetch_array($result_driver)) {
                        $selected = ($data['id_driver'] == $data_driver['id_driver']) ? 'selected' : '';
                        echo "<option value='".$data_driver['id_driver']."' ".$selected.">".$data_driver['nama']."</option>";
                    }
                ?>
            </select>

            <label>jumlah_km</label>
            <input type="text" class="form-control" placeholder="jumlah_km" name="jumlah_km" value="<?php echo $data['jumlah_km'];  ?>" required="required">

            <label>Tanggal:</label>
            <input type="text" class="form-control" placeholder="tanggal" name="tanggal" value="<?php echo $data['tanggal'];  ?>" required="required">

            <input type="submit" name="submit" value="Update">
        <?php endwhile; ?>
    </form>
</div>

            </body>
</html>