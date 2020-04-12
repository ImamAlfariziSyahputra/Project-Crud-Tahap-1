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
        
        $kode = $_POST["kode"];
        $nama = $_POST["nama"];
        $harga = $_POST["harga"];
        $satuan = $_POST["satuan"];
        $kategori = $_POST["kategori"];
        $gambar = $_POST["url"];
        $stok = $_POST["stok"];

        $query = "INSERT INTO `produk` (`id`, `kode`, `nama`, `harga`, `satuan`, `kategori`, `url`, `stok`)
                VALUES ('', '$kode', '$nama', '$harga', '$satuan', '$kategori', '$gambar', '$stok')";

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