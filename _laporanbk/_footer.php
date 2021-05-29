</div>

<script>
    $(document).ready(function(){ // Ketika halaman selesai di load
        $('.input-tanggal').datepicker({
            dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
        });

        $('#form-tanggal, #form-bulan, #form-tahun, #form-periode').hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

        $('#filter').change(function(){ // Ketika user memilih filter
            if($(this).val() == '1'){ // Jika filter nya 1 (per tanggal)
                $('#form-bulan, #form-tahun, #form-periode').hide(); // Sembunyikan form bulan dan tahun
                $('#form-tanggal').show(); // Tampilkan form tanggal
            }else if($(this).val() == '2'){ // Jika filter nya 2 (per bulan)
                $('#form-tanggal, #form-periode').hide(); // Sembunyikan form tanggal
                $('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
            }else if($(this).val() == '3'){ // Jika filternya 3 (per tahun)
                $('#form-tanggal, #form-bulan, #form-periode').hide(); // Sembunyikan form tanggal dan bulan
                $('#form-tahun').show(); // Tampilkan form tahun
            }else{
                $('#form-bulan, #form-tahun, #form-tanggal').hide();
                $('#form-periode').show();
            }

            $('#form-tanggal input, #form-bulan select, #form-tahun select, $form-periode select').val(''); // Clear data pada textbox tanggal, combobox bulan & tahun
        })
    })
    </script>

<script src="../dist/plugin/jquery-ui.min.js"></script> <!-- Load file plugin js jquery-ui -->

<!-- jquery.min.js wajib disisipkan agar bootstrap.min.js dapat bekerja -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/admin.js"></script>
</body>
</html>