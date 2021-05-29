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

    // Tambah Stok
    function tambah($data){
        global $conn;

        // data dari form tambah
        $id = $data["id_datastok"];
        $id_msk = $data["id_barangmasuk"];
        $kode_brg = $data["kode_barang"];
        $nama_brg = $data["nama_barang"];
        $stok_awal = $data["stok_awal"];
        $keterangan = $data["keterangan"];
        $jml_item = $data["jml_item"];
        $tgl = $data["tgl_transaksi"];
        $supplier = $data["supplier"];
        $jml_keluar = 0;
        $id_brgkeluar = 0;

        $query = "INSERT INTO tbl_transitstok VALUES('', '$id_msk', '$kode_brg', '$nama_brg', '$tgl', '$stok_awal', '$jml_item', '$supplier')";
                    mysqli_query($conn,$query);
            
                    return mysqli_affected_rows($conn);
        
    }

    function simpan($data){
        global $conn; 

        // data dari form tambah
        $id     = $data["id_trstok"];
        $id_msk = $data["id_barangmasuk"];
        $kode_brg = $data["kode_barang"];
        $nama_brg = $data["nama_barang"];
        $stok_awal = $data["stok_awal"];
        $jml_masuk = $data["jml_masuk"];
        $tgl = $data["tgl_transaksi"] . date(" G:i:sa");
        $supplier = $data["supplier"];
        $jml_keluar = 0;
        $id_brgkeluar = 0;
        $ket_stokmasuk = "Stok Masuk";
        $masuk      = "Masuk";

        $stok = $stok_awal + $jml_masuk;
        
        $query  = "INSERT INTO tbl_lap_sm VALUES('', '$kode_brg', '$nama_brg', '$tgl', '$supplier', '$jml_masuk', '$ket_stokmasuk')";
                    mysqli_query($conn, $query);

        $query2 = "INSERT INTO tbl_kartustok VALUES('', '$kode_brg', '$nama_brg', '$tgl', '$ket_stokmasuk', ' $jml_masuk', '$jml_keluar', '$stok')";
                    mysqli_query($conn,$query2);
                
        $query3 = "INSERT INTO tbl_datamasuk VALUES('', '$kode_brg', '$nama_brg', '$tgl', '$supplier', '$jml_masuk', '$ket_stokmasuk')";
                    mysqli_query($conn, $query3);
        
        $query4 = "UPDATE tbl_databarang SET stok = $stok WHERE id_brgmasuk = $id_msk";
                    mysqli_query($conn, $query4);
        
        $query5 = "UPDATE tbl_datastok SET stok = $stok WHERE id_brgmasuk = $id_msk";
                    mysqli_query($conn, $query5);

        $query6 = "UPDATE tbl_barangkeluar SET stok = $stok WHERE id_brgmasuk = $id_msk";
                    mysqli_query($conn, $query6);

        $query7 = "UPDATE tbl_transitkeluar SET stok_awal = $stok WHERE id_brgmasuk = $id_msk";
                    mysqli_query($conn, $query7);
        
        $query8 = "DELETE FROM tbl_transitstok WHERE id_trstok = $id";
                    mysqli_query($conn, $query8);
        

        return mysqli_affected_rows($conn);

    }

    function batal($data){
        global $conn;

        $id = $data["id_trstok"];
        $id_msk = $data["id_barangmasuk"];
        $kode_brg = $data["kode_barang"];
        $nama_brg = $data["nama_barang"];
        $stok_awal = $data["stok_awal"];
        $jml_masuk = $data["jml_masuk"];
        $tgl = $data["tgl_transaksi"] . date(" G:i:sa");
        $supplier = $data["supplier"];
        $jml_keluar = 0;
        $id_brgkeluar = 0;
        $ket_keluar = "Stok Batal Masuk";

        $query = "INSERT INTO tbl_kartustok VALUES('', '$kode_brg', '$nama_brg', '$tgl', '$ket_keluar', '$jml_masuk', '$jml_keluar', '$stok_awal') ";
                    mysqli_query($conn, $query);
        
        $query2 = "INSERT INTO tbl_datamasuk VALUES('', '$kode_brg', '$nama_brg', '$tgl', '$supplier', '$jml_masuk', '$ket_keluar')";
                    mysqli_query($conn,$query2);
        
        $query3 = "DELETE FROM tbl_transitstok WHERE id_trstok = $id";
                    mysqli_query($conn, $query3);

        return mysqli_affected_rows($conn);

    }

    // cari
    function cari($keyword){

        $query  = "SELECT * FROM tbl_datastok 
                    WHERE 
                    nama_barang LIKE '%$keyword%'
                    ";
                   
                return query($query);
                
    }

?>