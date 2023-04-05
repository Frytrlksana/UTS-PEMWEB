<?php
// memanggil file koneksi.php yang berisi koneksi ke database
// dengan include, semua kode dalam file koneksi.php dapat digunakan pada file ini
include('koneksi.php');

$status = '';
$result = '';

// melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (isset($_GET['id_driver'])) {
    // query SQL
    $id_driver_upd = $_GET['id_driver'];
    $query = "SELECT * FROM driver WHERE id_driver = '$id_driver_upd'";

    // eksekusi query
    $result = mysqli_query(connection(), $query);
  }
}

// melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id_driver = $_POST['id_driver'];
  $nama = $_POST['nama'];
  $no_sim = $_POST['no_sim'];
  $alamat = $_POST['alamat'];

  // query SQL
  $sql = "UPDATE driver SET nama='$nama', no_sim='$no_sim', alamat='$alamat' WHERE id_driver='$id_driver'";

  // eksekusi query
  $result = mysqli_query(connection(), $sql);
  if ($result) {
    $status = 'ok';
  } else {
    $status = 'err';
  }

  // redirect ke halaman lain
  header('Location: driver.php?status=' . $status);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Driver</title>
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
  <div class="container">
    <h2 align="center">DATA DRIVER</h2>
    <div class="container">
      <h2 align="center"><u><b>Trans UPN</b></u></h2>
      <table>
        <tr class="atas">
          <td class="tiga">
            <center>
              <a href="bus.php"><b><button>Bus</button></b></a>
            </center>
          </td>
          <td class="dua">
            <center>
              <a href="kondektur.php"><b><button>Kondektur</button></b></a>
                        </center>    
                    </td>
                    <td class="empat">
                        <center>    
                            <a class="nav-link" href="<?php echo "trans_upn.php"; ?>"><b><button>Trans_UPN</button></b></a>
                        </center>    
                    </td>
                </tr>
                
                <tr class="tengah">
                    <td>
                        <center>    
                            <a class="nav-link" href="<?php echo "menambah_driver.php"; ?>"><b><button>Menambah Data</button></b></a>
                        </center>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                        <h2 style="margin: 30px 0 30px 0;">Update Data driver</h2>
                        <form action="update_driver.php" method="POST">
                        <?php while($data = mysqli_fetch_array($result)): ?>
                          <div class="form-group">
                            <label>id_driver</label>
                            <input type="text" class="form-control" placeholder="id_driver" name="id_driver" value="<?php echo $data['id_driver'];  ?>" required="required" readonly>
                          </div>
                          <div class="form-group">
                            <label>nama</label>
                            <input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
                          </div>
                          <div class="form-group">
                            <label>no_sim</label>
                            <input type="text" class="form-control" placeholder="no_sim" name="no_sim" value="<?php echo $data['no_sim'];  ?>" required="required" >
                          </div>
                          <div class="form-group">
                            <label>alamat</label>
                            <input type="text" class="form-control" placeholder="alamat" name="alamat" value="<?php echo $data['alamat'];  ?>" required="required">
                          </div>
                          <button type="submit" class="btn btn-primary">Update</button>
                          <?php endwhile; ?>
                        </form>
                    </div>
                  </div>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>