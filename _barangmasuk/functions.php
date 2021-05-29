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

    // Tambah Data
    function tambah($data){
        global $conn;

        // Data Dari form
        $kode_barang         =   $data["kode_barangmasuk"];
        $nama_barang         =   $data["nama_barangmasuk"];
        $satuan              =   $data["satuan"];
        $kategori            =   $data["kategori"];
        $jumlah              =   $data["jumlah_item"];
        $keterangan          =   $data["keterangan"];
        $tgl_masuk           =   $data["tgl_masuk"];
        $nama_supplier       =   $data["supplier"];
        $status              = 1;

        // Query Insert Data
        $query  = "INSERT INTO tbl_barangmasuk VALUES('', '$kode_barang', '$nama_barang', '$satuan', '$kategori', '$jumlah', '$keterangan', '$tgl_masuk', '$nama_supplier', '$status') ";
                    mysqli_query($conn, $query);

                    return mysqli_affected_rows($conn);
    }

    // Simpan Data
    function simpan($data){
        global $conn;

        // Data Dari Barang Masuk
        $id                  =   $data["id_barangmasuk"];
        $kode_barang         =   $data["kode_barangmasuk"];
        $nama_barang         =   $data["nama_barangmasuk"];
        $satuan              =   $data["satuan"];
        $kategori            =   $data["kategori"];
        $jumlah              =   $data["jumlah_item"];
        $keterangan          =   $data["keterangan"];
        $tgl_masuk           =   $data["tgl_masuk"] . date(" G:i:sa");
        $nama_supplier       =   $data["supplier"];
        $jml_keluar          = 0;
        $id_brgkeluar        = 0;

        // Data insert ke tabel data masuk
        $id                  = $data["id_barangmasuk"];
        $kode_barang         = $data["kode_barangmasuk"];
        $nama_barang         = $data["nama_barangmasuk"];
        $tgl_masuk           = $data["tgl_masuk"] . date(" G:i:sa");
        $nama_supplier       = $data["supplier"];
        $jumlah              = $data["jumlah_item"];
        $keterangan          =   $data["keterangan"];

        // Query Insert Data
        $query  = "INSERT INTO tbl_datamasuk VALUES('', '$kode_barang', '$nama_barang', '$tgl_masuk', '$nama_supplier', '$jumlah', '$keterangan' ) ";
                    mysqli_query($conn, $query);

        // Data insert ke tabel data barang
        $id                  = $data["id_barangmasuk"];
        $kode_brg            = $data["kode_barang"];
        $nama_barang         = $data["nama_barangmasuk"];
        $satuan              = $data["satuan"];
        $kategori            = $data["kategori"];
        $jumlah              = $data["jumlah_item"];

        $query8 = "INSERT INTO tbl_databarang VALUES('', '$id', '$kode_brg', '$nama_barang', '$satuan', '$kategori', '$jumlah')";
                    mysqli_query($conn, $query8);

        // Data Insert ke tabel kartu stok
        $id                  = $data["id_barangmasuk"];
        $id_brgkeluar        = 0;
        $kode_barang         = $data["kode_barangmasuk"];
        $nama_barang         = $data["nama_barangmasuk"];
        $tgl_masuk           = $data["tgl_masuk"] . date(" G:i:sa");
        $keterangan          = $data["keterangan"];
        $jml_masuk           = $data["jumlah_item"];
        $jml_keluar          = 0;
        $jumlah              = $data["jumlah_item"];
        $masuk               = "Masuk";

        // Query Insert Data
        $query3 = "INSERT INTO tbl_kartustok VALUES('', '$kode_barang', '$nama_barang', '$tgl_masuk', '$keterangan', '$jml_masuk', '$jml_keluar', '$jumlah') ";
                        mysqli_query($conn, $query3);
        
        // Data Insert ke tabel data stok
        $id                  = $data["id_barangmasuk"];
        $kode_brg            = $data["kode_barang"];
        $nama_barang         = $data["nama_barangmasuk"];
        $jumlah              = $data["jumlah_item"];

        // Query Insert Data
        $query4 = "INSERT INTO tbl_datastok VALUES('', '$id', '$kode_brg', '$nama_barang', '$jumlah') ";
                        mysqli_query($conn, $query4);

        // Data Insert ke tabel barang keluar
        $id                  = $data["id_barangmasuk"];
        $kode_brg            = $data["kode_barang"];
        $nama_barang         = $data["nama_barangmasuk"];
        $satuan              = $data["satuan"];
        $kategori            = $data["kategori"];
        $jumlah              = $data["jumlah_item"];

        //  Query Insert Data
        $query5 = "INSERT INTO tbl_barangkeluar VALUES('', '$id', '$kode_brg', '$nama_barang', '$satuan', '$kategori', '$jumlah') ";
                    mysqli_query($conn, $query5);

        // Data Insert ke tabel laporan barang masuk
        $kode_brg           = $data["kode_barang"];
        $nama_barang        = $data["nama_barangmasuk"];
        $tgl_masuk          = $data["tgl_masuk"] . date(" G:i:sa");
        $nama_supplier      = $data["supplier"];
        $jumlah             = $data["jumlah_item"];
        $keterangan          = $data["keterangan"];

        // Query Insert Data
        $query6 = "INSERT INTO tbl_lap_bm VALUES('', '$kode_brg', '$nama_barang', '$tgl_masuk', '$nama_supplier', '$jumlah', '$keterangan') ";
                    mysqli_query($conn, $query6);
        
        $status2 = 0;

        // Hapus dari tabel barangmasuk
        $query7 = " UPDATE tbl_barangmasuk SET status = $status2 WHERE id_brgmasuk = $id";
                    mysqli_query($conn,$query7);

                    return mysqli_affected_rows($conn);


    }

    // Fungsi Batal
     function Batal($data){
        global $conn;

        // Data Insert ke tabel kartu stok
        $id                  = $data["id_barangmasuk"];
        $id_brgkeluar        = 0;
        $kode_barang         = $data["kode_barangmasuk"];
        $nama_barang         = $data["nama_barangmasuk"];
        $tgl_masuk           = $data["tgl_masuk"] . date(" G:i:sa");
        $ket_batal          = "Batal Masuk";
        $jml_masuk           = $data["jumlah_item"];
        $jml_keluar          = 0;
        $jumlah              = 0;

        $query1 = "INSERT INTO tbl_kartustok VALUES('', '$kode_barang', '$nama_barang', '$tgl_masuk', '$ket_batal', '$jml_masuk', '$jml_keluar', '$jumlah') ";
                        mysqli_query($conn, $query1); 
        
        // Hapus
        // $query2 = "DELETE FROM tbl_barangmasuk WHERE id_brgmasuk = $id";
        //             mysqli_query($conn,$query2);
        
        // Data insert ke tabel data masuk
        $id                  = $data["id_barangmasuk"];
        $kode_barang         = $data["kode_barangmasuk"];
        $nama_barang         = $data["nama_barangmasuk"];
        $tgl_masuk           = $data["tgl_masuk"]. date(" G:i:sa");
        $nama_supplier       = $data["supplier"];
        $jumlah              = $data["jumlah_item"];
        $ket_batal          =  "Batal Masuk";

        // Query Insert Data
        $query2  = "INSERT INTO tbl_datamasuk VALUES('', '$kode_barang', '$nama_barang', '$tgl_masuk', '$nama_supplier', '$jumlah', '$ket_batal' ) ";
                    mysqli_query($conn, $query2);

        $query3  = "UPDATE tbl_barangmasuk SET status = '0' WHERE id_brgmasuk = $id ";
                    mysqli_query($conn, $query3);            

        return mysqli_affected_rows($conn);
    }


?>