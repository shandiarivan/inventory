<?php 

include "functions.php";

    $id = $_GET["id_datamasuk"];

    if( hapus($id) > 0){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'data_masuk.php';
            </script>
        ";
    } else{
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'data_masuk.php';
        </script>
        ";
    }

?>