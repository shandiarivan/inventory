<?php 

include "functions.php";

    $id = $_GET["id_datakeluar"];

    if( hapus($id) > 0){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'data_keluar.php';
            </script>
        ";
    } else{
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'data_keluar.php';
        </script>
        ";
    }

?>