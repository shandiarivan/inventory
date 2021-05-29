<?php 

include "functions.php";

    $id = $_GET["id_kategori"];

    if( hapus($id) > 0){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'kategori.php';
            </script>
        ";
    } else{
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'kategori.php';
        </script>
        ";
    }

?>