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
        mysqli_query($conn, "DELETE FROM tbl_datamasuk WHERE id_datamasuk = $id");

        return mysqli_affected_rows($conn);
    }

    // cari
    function cari($keyword){

        $query  = "SELECT *FROM tbl_datamasuk 
                    WHERE 
                    kode_barang LIKE '%$keyword%'OR
                    nama_barang LIKE '%$keyword%' OR
                    tgl_masuk LIKE '%$keyword%'OR
                    supplier LIKE '%$keyword%' OR
                    keterangan LIKE '%%$keyword'
                    ";
                   
                return query($query);
                
    }


?>