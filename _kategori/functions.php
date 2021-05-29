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

    // Tambah Data
    function tambah($data){
        global $conn;

        // Data Dari form
        $nama         =   $data["nama_kategori"];

        // Query Insert Data
        $query  = "INSERT INTO tbl_kategori VALUES('', '$nama' ) ";
                    mysqli_query($conn, $query);

                    return mysqli_affected_rows($conn);
    }

    // Hapus Data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM tbl_kategori WHERE id_kategori = $id");

        return mysqli_affected_rows($conn);
    }

    // cari
    function cari($keyword){

        $query  = "SELECT * FROM tbl_kategori 
                    WHERE 
                    nama_kategori LIKE '%$keyword%'
                    ";
                   
                return query($query);
                
    }

?>