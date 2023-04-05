<?php 
    include ('koneksi.php');

    $status = '';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id_driver= $_POST['id_driver'];
        $nama = $_POST['nama'];
        $no_sim = $_POST['no_sim'];
        $id_alamat= $_POST['alamat'];
      
        //query SQL
        $query = "INSERT INTO driver (id_driver, nama, no_sim, alamat) 
        VALUES('$id_driver', '$nama', '$no_sim', '$id_alamat')"; 
  
        //eksekusi query
        $result = mysqli_query(connection(),$query);
        if ($result) {
          $status = 'ok';
        }
        else{
          $status = 'err';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Insert Bus | transupn</title>
    <link rel="stylesheet" href="style.css">
</head>
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
                            <a class="nav-link" href="<?php echo "bus.php"; ?>"><b><button>Bus</button></b></a>
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
                            <a class="nav-link" href="<?php echo "menambah_bus.php"; ?>"><b><button>Menambah Data</button></b></a>
                        </center>
                    </td>
                </tr>
                <tr class="akhir">
                    <td colspan="3">
                      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                        <?php 
                          if ($status=='ok') {
                            echo '<br><br><div class="alert alert-success" role="alert">Data Customer berhasil disimpan</div>';
                          }
                          elseif($status=='err'){
                            echo '<br><br><div class="alert alert-danger" role="alert">Data Customer gagal disimpan</div>';
                          }
                        ?>
                
                      <h2 style="margin: 30px 0 30px 0;">Form Driver</h2>
                      <form action="menambah_driver.php" method="POST">
                      <div class="form-group">
                        <label>id_driver</label>
                        <input type="text" class="form-control" placeholder="id_driver" name="id_driver" required="required">
                      </div>
                      <div class="form-group">
                        <label>nama</label>
                        <input type="text" class="form-control" placeholder="nama" name="nama" required="required">
                      </div>
                      <div class="form-group">
                        <label>no_sim</label>
                        <input type="text" class="form-control" placeholder="no_sim" name="no_sim" required="required">
                      </div>
                      <div class="form-group">
                        <label>alamat</label>
                        <input type="text" class="form-control" placeholder="alamat" name="alamat" required="required">
                      </div>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                  </main>
                    </td>
                </tr>
            </table>
    </div>
</body>
</html>