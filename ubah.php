<?php 
    require 'functions.php';

    $id = $_GET["id"];
    $satuan = array('Gelas','Piring');
    $kategori = array('Minuman','Makanan');
    $prdcts = query("SELECT * FROM produk WHERE id = $id")[0];

    if( isset($_POST["submit"]) ) {
        if ( edit($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Diubah!');
                    document.location.href = 'index.php';
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Diubah!');
                    
                </script>
                ";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
    <style>
        .kotak {
            border-radius: 10px;
        }
    </style>
</head>
<body>
<div class="kotak">
        <h1>FORM EDIT DATA</h1>
<form action="" method="post">
            <table cellpadding="12" cellspacing="0" >
            <input type="hidden" name="id" value="<?= $prdcts["id"]; ?>">
                <tr>
                    <td> <label for="kode">Kode Produk</label> </td> 
                    <td><input type="text" name="kode" id="kode" class="" required value="<?= $prdcts["kode"]; ?>"></td>
                </tr>
                <tr>
                    <td> <label for="nama">Nama Produk</label> </td>
                    <td><input type="text" name="nama" id="nama" class="" required value="<?= $prdcts["nama"]; ?>"></td>
                </tr>
                <tr>
                    <td> <label for="harga">Harga Produk</label> </td>
                    <td><input type="number" name="harga" id="harga" class="" required value="<?= $prdcts["harga"]; ?>"></td>
                </tr>
                <tr>
                    <td> <label for="satuan">Satuan</label> </td>
                    <td>
                        <select name="satuan" id="satuan" class="form-control" required>
                        <?php 
                            foreach($satuan as $s) {
                                echo "<option value='$s'";
                                echo $prdcts['satuan']==$s?'selected="selected"':'';
                                echo ">$s<option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> <label for="kategori">Kategori</label> </td>
                    <td>
                        <select name="kategori" id="kategori" class="form-control" required>
                        <?php 
                            foreach($kategori as $k) {
                                echo "<option value='$k'";
                                echo $prdcts['satuan']==$k?'selected="selected"':'';
                                echo ">$k<option>";
                            }
                        ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> <label for="url">URL Gambar</label> </td>
                    <td><input type="text" name="url" id="url" class="" required value="<?= $prdcts["url"]; ?>"></td>
                </tr>
                <tr>
                    <td> <label for="stok">Stok Awal</label> </td>
                    <td><input type="number" name="stok" id="stok" class="" required value="<?= $prdcts["stok"]; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn1">Submit</button></td>
                </tr>
            </table>
        </form>  
    </div>
</body>
</html>