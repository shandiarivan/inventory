</div>

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
       // $('.input-tanggal').datepicker({
         //   dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        //});

        $('#form-tanggal, #form-barang, #form-ket').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-barang, #form-ket').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal, #form-ket').hide(); // Sembunyikan form tanggal
                $('#form-barang').show(); // Tampilkan form bulan dan tahun
            }else{ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-barang').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-ket').show(); // Tampilkan form tahun
            }

            $('#form-tanggal input, #form-barang select, #form-ket select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
</script>
<script src="../dist/plugin/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->

<!-- jquery.min.js wajib disisipkan agar bootstrap.min.js dapat bekerja -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/admin.js"></script>
</body>
</html>