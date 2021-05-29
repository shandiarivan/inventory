<?php 
include "../koneksi.php";
date_default_timezone_set("Asia/Jakarta");

    // Tampil Data
    function query($query){
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows   = [];
        while( $row = mysqli_fetch_assoc($result)){
        $rows[] = $row; 
        }
        return $rows;
    }

    // Simpan Barang
    function kirim($data){
        global $conn;

        $id          = $data["id_trkeluar"];
        $id_keluar   = $data["id_barangkeluar"];
        $id_msk      = $data["id_barangmasuk"];
        $kode_barang = $data["kode_barangkeluar"];
        $nama_barang = $data["nama_barang"];
        $tgl_keluar  = $data["tgl_keluar"] . date(" G:i:sa");
        $stok_awal   = $data["stok_awal"];
        $jml_keluar = $data["jml_keluar"];
        $jml_msk     = 0;
        $customer    = $data["customer"];
        $keterangan  = "Barang Keluar";
        $keluar      = "Keluar";

        $sisa        = $stok_awal - $jml_keluar;

        $query  = "INSERT INTO tbl_kartustok VALUES('', '$kode_barang', '$nama_barang', '$tgl_keluar', '$keterangan', '$jml_msk', '$jml_keluar', '$sisa')";
                    mysqli_query($conn, $query);

        $query2 = "INSERT INTO tbl_datakeluar VALUES('', '$kode_barang', '$nama_barang', '$tgl_keluar', '$customer', '$jml_keluar', '$keterangan')";
                    mysqli_query($conn, $query2);

        $query3 = "INSERT INTO tbl_lap_bk VALUES('', '$kode_barang', '$nama_barang', '$tgl_keluar', '$customer', '$jml_keluar', '$keterangan') ";
                    mysqli_query($conn, $query3);

        // Update Data di tabel data barang       
        $query4     = "UPDATE tbl_databarang SET stok = $sisa WHERE id_brgmasuk = $id_msk ";
                        mysqli_query($conn, $query4);

        //Update Data di tabel barang keluar
        $query5      = "UPDATE tbl_barangkeluar SET stok = $sisa WHERE id_brgmasuk = $id_msk ";
                         mysqli_query($conn, $query5);

       // Update Data di tabel data stok
        $query6      = "UPDATE tbl_datastok SET stok = $sisa WHERE id_brgmasuk = $id_msk";
                        mysqli_query($conn, $query6);
        
        // Hapus Data di tabel transit keluar
        $query7      = "DELETE FROM tbl_transitkeluar WHERE id_trkeluar = $id";
                        mysqli_query($conn, $query7);

        return mysqli_affected_rows($conn);
    }

    function tambah($data){
        global $conn;

        $id         = $data["id_barangkeluar"];
        $id_msk     = $data["id_barangmasuk"];
        $kode_brgkeluar     = $data["kode_barangkeluar"];
        $nama_barang        = $data["nama_barang"];
        $tgl_keluar         = $data["tgl_keluar"];
        $stok_awal          = $data["stok_awal"];
        $stok_keluar        = $data["stok_keluar"];
        $customer           = $data["customer"];
        $sisa               = $stok_awal - $stok_keluar;

        $query = "INSERT INTO tbl_transitkeluar VALUES('', '$id_msk', '$id', '$kode_brgkeluar', '$nama_barang', '$tgl_keluar', '$stok_awal', '$stok_keluar', '$customer')";
                    mysqli_query($conn, $query);
        
        $query2 = "UPDATE tbl_transitstok SET stok_awal = $sisa WHERE id_brgmasuk = $id_msk ";
                    mysqli_query($conn, $query2);

        // $query2 = "UPDATE tbl_barangkeluar SET stok = $sisa WHERE id_brgmasuk = $id_msk ";
        //             mysqli_query($conn, $query2);
        
        // $query3 = "UPDATE tbl_databarang SET stok = $sisa WHERE id_brgmasuk = $id_msk ";
        //             mysqli_query($conn, $query3);
        
        // $query4 = "UPDATE tbl_datastok SET stok = $sisa WHERE id_brgmasuk = $id_msk";
        //             mysqli_query($conn, $query4);
        
            return mysqli_affected_rows($conn);
    }

    function batal($data){
        global $conn;

        $id          = $data["id_trkeluar"];
        $id_keluar   = $data["id_barangkeluar"];
        $id_msk      = $data["id_barangmasuk"];
        $kode_barang = $data["kode_barangkeluar"];
        $nama_barang = $data["nama_barang"];
        $tgl_keluar  = $data["tgl_keluar"] . date(" G:i:sa");
        $stok_awal   = $data["stok_awal"];
        $stok_keluar = $data["jml_keluar"];
        $jml_msk     = 0;
        $customer    = $data["customer"];
        $keterangan  = "Batal Keluar";
        $keluar      = "Keluar";

        $query = "INSERT INTO tbl_kartustok VALUES('', '$kode_barang', '$nama_barang', '$tgl_keluar', '$keterangan', '$jml_msk', '$stok_keluar', '$stok_awal')";
                    mysqli_query($conn, $query);
        
        $query2 = "INSERT INTO tbl_datakeluar VALUES('', '$kode_barang', '$nama_barang', '$tgl_keluar', '$customer', '$stok_keluar', '$keterangan')";
                    mysqli_query($conn, $query2);

        $query3 = "UPDATE tbl_databarang SET stok = $stok_awal WHERE id_brgmasuk = $id_msk";
                    mysqli_query($conn, $query3);
        
        $query4 = "UPDATE tbl_datastok SET stok = $stok_awal WHERE id_brgmasuk = $id_msk";
                    mysqli_query($conn, $query4);

        $query5 = "UPDATE tbl_barangkeluar SET stok = $stok_awal WHERE id_brgkeluar = $id_keluar";
                    mysqli_query($conn, $query5);
        
        $query6 = "DELETE FROM tbl_transitkeluar WHERE id_trkeluar = $id";
                    mysqli_query($conn, $query6);

        return mysqli_affected_rows($conn);
    }

    function cari($keyword){
        $query = "SELECT * FROM tbl_barangkeluar
                    WHERE 
                    nama_barang LIKE '%$keyword%' OR
                    kode_barang LIKE '%$keyword%' 
                    ";

            return query($query);
    }
?>