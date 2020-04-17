<?php 
    $conn = mysqli_connect("localhost", "root", "", "phpdasar");

    function query($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while( $row = mysqli_fetch_assoc($result) ) {
            $rows[] = $row;
        }
        return $rows;
    }

    function tambah($data) {
        global $conn;
        
        $kode = $data["kode"];
        $nama = $data["nama"];
        $harga = $data["harga"];
        $satuan = $data["satuan"];
        $kategori = $data["kategori"];
        $gambar = $data["url"];
        $stok = $data["stok"];

        $query = "INSERT INTO `produk` (`id`, `kode`, `nama`, `harga`, `satuan`, `kategori`, `url`, `stok`)
                VALUES ('', '$kode', '$nama', '$harga', '$satuan', '$kategori', '$gambar', '$stok')";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function edit($data) {
        global $conn;

        $id = $data["id"];
        $kode = $data["kode"];
        $nama = $data["nama"];
        $harga = $data["harga"];
        $satuan = $data["satuan"];
        $kategori = $data["kategori"];
        $gambar = $data["url"];
        $stok = $data["stok"];

        $query = "UPDATE `produk` SET `kode` = '$kode', `nama` = '$nama', `harga` = '$harga', `satuan` = '$satuan', `kategori` = '$kategori', `url` = '$gambar', `stok` = '$stok' WHERE `produk`.`id` = $id";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }

    function hapus($data) {
        global $conn;
        $id = $_GET["id"];

        $query = "DELETE FROM produk WHERE id = $id";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
?>
