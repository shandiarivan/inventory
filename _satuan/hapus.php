<?php 

include "functions.php";

    $id = $_GET["id_satuan"];

    if( hapus($id) > 0){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'satuan.php';
            </script>
        ";
    } else{
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'satuan.php';
        </script>
        ";
    }

?>