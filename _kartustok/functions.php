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

    // Tombol Tampil Data
    function tampil(){
        global $conn;

     $abc= mysqli_query($conn,"SELECT * FROM tbl_kartustok");
     $def= mysqli_fetch_array($abc);    
        return $def;
    }

    // Hapus Data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tbl_barangmasuk WHERE id_barangmasuk = $id");

        return mysqli_affected_rows($conn);
    }

    // cari
    function cari($keyword){

        $query  = "SELECT * FROM tbl_kartustok 
                    WHERE 
                    kode_barang LIKE '%$keyword%'OR
                    nama_barang LIKE '%$keyword%' OR
                    tgl_transaksi LIKE '%$keyword%'OR
                    keterangan LIKE '%$keyword%'
                    ";
                   
                return query($query);
                
    }
?>