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
        $nama         =   $data["nama"];
        $alamat       =   $data["alamat"];
        $email        =   $data["email"];
        $telepon         =   $data["telepon"];

        // Query Insert Data
        $query  = "INSERT INTO supplier VALUES('', '$nama', '$alamat', '$email', '$telepon') ";
                    mysqli_query($conn, $query);

                    return mysqli_affected_rows($conn);
    }

    // Hapus Data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier = $id");

        return mysqli_affected_rows($conn);
    }

    // Edit Data
    function edit($data){
        global $conn;

        // Data Dari form
        $id           = $data["id"];
        $nama         =   $data["nama"];
        $alamat       =   $data["alamat"];
        $email        =   $data["email"];
        $telepon         =   $data["telepon"];

        // Query Insert Data
        $query  = "UPDATE supplier SET nama = '$nama', alamat = '$alamat', email = '$email', telepon = '$telepon' WHERE id_supplier = $id ";
                    mysqli_query($conn, $query);

                    return mysqli_affected_rows($conn);
    }

    // cari
    function cari($keyword){

        $query  = "SELECT * FROM supplier 
                    WHERE 
                    nama LIKE '%$keyword%'OR
                    alamat LIKE '%$keyword%' OR
                    email LIKE '%$keyword%'OR
                    telepon LIKE '%$keyword%'
                    ";
                   
                return query($query);
                
    }
?>