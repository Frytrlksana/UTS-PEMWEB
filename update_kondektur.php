<?php
    include('koneksi.php');
    if(isset($_POST['submit'])){
        $id_kondektur = $_POST['id_kondektur'];
        $nama = $_POST['nama'];
        $query = "UPDATE kondektur SET nama='$nama' WHERE id_kondektur='$id_kondektur'";
        $result = mysqli_query(connection(), $query);
        if($result){
            header('Location:kondektur.php');
            exit;
        }
        else{
            echo "Gagal mengubah data kondektur";
        }
    }
    else{
        $id_kondektur = $_GET['id_kondektur'];
        $query = "SELECT * FROM kondektur WHERE id_kondektur='$id_kondektur'";
        $result = mysqli_query(connection(), $query);
        $data = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update kondektur</title>
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

        td {
            padding : 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>DATA KONDEKTUR</h2>
        <div class="container">
            <h2><u><b>Trans UPN</b></u></h2>
            <table>
                <tr class="atas">
                    <td class="tiga">
                        <a class="nav-link" href="bus.php"><b><button>Bus</button></b></a>
                    </td>
                    <td class="dua">
                        <a class="nav-link" href="driver.php"><b><button>Driver</button></b></a>
                    </td>
                    <td class="empat">
                        <a class="nav-link" href="trans_upn.php"><b><button>Trans_UPN</button></b></a>
                    </td>
                </tr>
                
                <tr class="tengah">
                    <td>
                        <a class="nav-link href="<?php echo "menambah_kondektur.php"; ?>><b><button>Menambah Data</button></b></a>
                    </td>
                </tr>

                <tr class="akhir">
                    <td colspan="3">
                        <h2 style="margin: 30px 0 30px 0;">Update Data Kondektur</h2>
                        <form action="update_kondektur.php" method="POST">
                          <div class="form-group">
                            <label>id_kondektur</label>
                            <input type="text" class="form-control" placeholder="id_kondektur" name="id_kondektur" value="<?php echo $data['id_kondektur'];  ?>" required="required" readonly>
                          </div>
                          <div class="form-group">
                            <label>nama</label>
                            <input type="text" class="form-control" placeholder="nama" name="nama" value="<?php echo $data['nama'];  ?>" required="required">
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
