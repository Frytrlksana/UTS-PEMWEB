<?php
    include('koneksi.php');
    if(isset($_POST['submit'])){
        $id_bus = $_POST['id_bus'];
        $plat = $_POST['plat'];
        $status = $_POST['status'];
        $query = "UPDATE bus SET plat='$plat', status='$status' WHERE id_bus='$id_bus'";
        $result = mysqli_query(connection(), $query);
        if($result){
            header('Location:bus.php');
            exit;
        }
        else{
            echo "Gagal mengubah data bus";
        }
    }
    else{
        $id_bus = $_GET['id_bus'];
        $query = "SELECT * FROM bus WHERE id_bus='$id_bus'";
        $result = mysqli_query(connection(), $query);
        $data = mysqli_fetch_assoc($result);
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Update Bus | transupn</title>
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
  <div class="container">
    <div class="nav-brand">
      <href="#">Trans UPN</a>
    </div>
    <ul class="nav-links">
      <li>
        <a href="<?php echo "kondektur.php"; ?>"><button>Kondektur</button></a>
      </li>
      <li>
        <a href="<?php echo "driver.php"; ?>"><button>Driver</button></a>
      </li>
      <li>
        <a href="<?php echo "trans_upn.php"; ?>"><button>Trans UPN</button></a>
      </li>
      <li>
        <a href="<?php echo "menambah_bus.php"; ?>"><Button>Menambah Data</Button></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container">
    <h2>Update Bus</h2>
    <form action="" method="POST">
        <div class="form-group">
            <label for="id_bus">ID Bus:</label>
            <input type="text" id="id_bus" name="id_bus" value="<?php echo $data['id_bus']; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="plat">Plat:</label>
            <input type="text" id="plat" name="plat" value="<?php echo $data['plat']; ?>" required>
        </div>
        <div class="form-group">
            <label for="status">Status:</label>
            <select name="status" id="status">
                <option value="1" <?php if($data['status']==1) echo 'selected'; ?>>Aktif</option>
                <option value="2" <?php if($data['status']==2) echo 'selected'; ?>>Tidak Aktif</option>
                <option value="0" <?php if($data['status']==0) echo 'selected'; ?>>Sedang Perawatan</option>
            </select>
        </div>
        <button type="submit" name="submit">Update</button>
    </form>
</div>

</body>
</html>
