<?php 
    include "functions.php";

    $id = $_GET["id_brgmasuk"];

    if( hapus($id) > 0){
        echo "
            <script>
                alert('Data Berhasil Dihapus');
                document.location.href = 'barang.php';
            </script>
        ";
    } else{
        echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'barang.php';
        </script>
        ";
    }
    //  echo "<meta http-equiv='refresh' content='0;URL=supplier.php' />";
?>
