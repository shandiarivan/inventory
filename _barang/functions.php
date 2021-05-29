<?php 
include "../koneksi.php";

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

    // Hapus Data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tbl_databarang WHERE id_brgmasuk = $id");
        mysqli_query($conn, "DELETE FROM tbl_datastok WHERE id_brgmasuk = $id");
        mysqli_query($conn, "DELETE FROM tbl_barangkeluar WHERE id_brgmasuk = $id");

        return mysqli_affected_rows($conn);
    }

    // cari
    function cari($keyword){

        $query  = "SELECT A.*, B.nama_satuan, C.nama_kategori FROM tbl_databarang AS A INNER JOIN tbl_satuan AS B ON (A.satuan = B.id_satuan) INNER JOIN tbl_kategori AS C ON (A.kategori = C.id_kategori) 
                    WHERE 
                    kode_barang LIKE '%$keyword%' OR
                    nama_barang LIKE '%$keyword%' OR
                    satuan LIKE '%$keyword%' OR
                    kategori LIKE '%$keyword%'
                    ";
                   
                return query($query);
                
    }


?>