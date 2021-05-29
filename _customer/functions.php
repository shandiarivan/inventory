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
        $nama         =   $data["nama_customer"];
        $alamat       =   $data["email"];
        $email        =   $data["telepon"];
        $telepon         =   $data["alamat"];

        // Query Insert Data
        $query  = "INSERT INTO customer VALUES('', '$nama', '$alamat', '$email', '$telepon') ";
                    mysqli_query($conn, $query);

                    return mysqli_affected_rows($conn);
    }

    // Hapus Data
    function hapus($id){
        global $conn;
        mysqli_query($conn, "DELETE FROM customer WHERE id_customer = $id");

        return mysqli_affected_rows($conn);
    }

    // Edit Data
    function edit($data){
        global $conn;

        // Data Dari form
        $id           =  $data["id_customer"];
        $nama         =  $data["nama_customer"];
        $email        =  $data["email"];
        $telepon      =  $data["telepon"];
        $alamat       =  $data["alamat"];

        // Query Insert Data
        $query  = "UPDATE customer SET nama_customer = '$nama', email = '$email', telepon = '$telepon', alamat = '$alamat' WHERE id_customer = $id";
        
                    mysqli_query($conn, $query);

                    return mysqli_affected_rows($conn);
    }

    // cari
    function cari($keyword){

        $query  = "SELECT * FROM customer 
                    WHERE 
                    nama_customer LIKE '%$keyword%'OR
                    email LIKE '%$keyword%'OR
                    telepon LIKE '%$keyword%'OR
                    alamat LIKE '%$keyword%' 
                    ";
                   
                return query($query);
                
    }
?>