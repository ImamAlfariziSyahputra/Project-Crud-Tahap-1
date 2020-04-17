<?php 
    require 'functions.php';

    $products = query("SELECT * FROM produk");

    if( isset($_POST["submit"]) ) {
        if ( tambah($_POST) > 0) {
            echo "
                <script>
                    alert('Data Berhasil Ditambah!'); 
                    document.location.href = 'index.php';                 
                </script>
                ";
        } else {
            echo "
                <script>
                    alert('Data Gagal Ditambah!');
                    document.location.href = 'index.php';                  
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
    <title>index</title>
</head>
<body>
    <div class="kotak">
        <h1>FORM INPUT DATA</h1>

        <form action="" method="post">
            <table cellpadding="12" cellspacing="0" >
                <tr>
                    <td> <label for="kode">Kode Produk</label> </td> 
                    <td><input type="text" name="kode" id="kode" class="" required></td>
                </tr>
                <tr>
                    <td> <label for="nama">Nama Produk</label> </td>
                    <td><input type="text" name="nama" id="nama" class="" required></td>
                </tr>
                <tr>
                    <td> <label for="harga">Harga Produk</label> </td>
                    <td><input type="number" name="harga" id="harga" class="" required></td>
                </tr>
                <tr>
                    <td> <label for="satuan">Satuan</label> </td>
                    <td>
                        <select name="satuan" id="satuan" class="form-control" required>
                            <option value="">Choose</option>
                            <option value="Gelas">Gelas</option>
                            <option value="Piring">piring</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> <label for="kategori">Kategori</label> </td>
                    <td>
                        <select name="kategori" id="kategori" class="form-control" required>
                            <option value="">Choose</option>
                            <option value="Minuman">Minuman</option>
                            <option value="Makanan">Makanan</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td> <label for="url">URL Gambar</label> </td>
                    <td><input type="text" name="url" id="url" class="" required></td>
                </tr>
                <tr>
                    <td> <label for="stok">Stok Awal</label> </td>
                    <td><input type="number" name="stok" id="stok" class="" required></td>
                </tr>
                <tr>
                    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn1">Submit</button></td>
                </tr>
            </table>
        </form>  
    </div>
    
    <div class="kotak2">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Satuan</th>
                <th>Kategori Produk</th>
                <th>Stok Produk</th>
                <th>Gambar</th>
                <th>Modify</th>
            </tr>

            <?php $i = 1; ?>
            <?php foreach( $products as $product ) :?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $product["kode"]; ?></td>
                <td><?= $product["nama"]; ?></td>
                <td><?= $product["harga"]; ?></td>
                <td><?= $product["satuan"]; ?></td>
                <td><?= $product["kategori"]; ?></td>
                <?php if ($product['stok'] < 5 ) {
                    echo "<td class='red text-center'>" .  $product['stok'] . "</td>";
                } else  {
                    echo "<td class='text-center'>" . $product['stok'] . "</td>";
                }
                ?>
                <td> <img src="<?= $product["url"]; ?>" alt="Gambar" width="100px" height="100px" class="img"> </td>
                <td><a href="hapus.php?id=<?= $product["id"]; ?>">Delete</a> | <a href="ubah.php?id=<?= $product["id"]; ?>">Edit</a></td>
            </tr>
            <?php $i++ ?>
            <?php endforeach; ?>

        </table>
    </div>
</body>
</html>
