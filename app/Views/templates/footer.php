</div>

</div>
</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
        </div>
    </div>
</div>
<!-- DataTables Script -->
<!-- Modifikasi script JavaScript -->
<script>
    $(document).ready(function() {
        $('#dataTables').DataTable({
            "lengthMenu": [10, 25, 50, 75, 100], // Opsi tampilan jumlah data
            "pageLength": 10, // Jumlah data per halaman
            "searching": true, // Aktifkan fitur pencarian
        });
    });
</script>

<!-- <script>
    $(document).ready(function() {
        // Meng-handle klik pada tombol Edit
        $('.btn-edit').on('click', function() {
            // Menyembunyikan tombol Edit
            $(this).hide();

            // Menampilkan tombol Simpan pada baris yang diklik
            var currentRow = $(this).closest('tr');
            currentRow.find('.btn-save').show();

            // Mengaktifkan kolom-kolom tabel untuk diedit
            currentRow.find('.editable').prop('contenteditable', true).addClass('active');
        });

        // Meng-handle klik pada tombol Simpan
        $('.btn-save').on('click', function() {
            // Menampilkan kembali tombol Edit pada baris yang diklik
            var currentRow = $(this).closest('tr');
            currentRow.find('.btn-edit').show();

            // Menyembunyikan tombol Simpan pada baris yang diklik
            $(this).hide();

            // Menonaktifkan kolom-kolom tabel dari diedit pada baris yang diklik
            currentRow.find('.editable').prop('contenteditable', false).removeClass('active');

            // Mengambil data dari baris yang diedit
            var id = currentRow.find('td[data-field="id"]').text();
            var nama = currentRow.find('td[data-field="nama"]').text();
            var pemberkasan = currentRow.find('td[data-field="pemberkasan"]').text();
            var prestasi = currentRow.find('td[data-field="prestasi"]').text();
            var status = currentRow.find('td[data-field="status"]').text();
            var pk_ortu = currentRow.find('td[data-field="pk_ortu"]').text();
            var ph_ortu = currentRow.find('td[data-field="ph_ortu"]').text();
            var tg_ortu = currentRow.find('td[data-field="tg_ortu"]').text();

            // Kirim data ke server menggunakan AJAX
            $.ajax({
                url: '<?= base_url('Home/updateData') ?>',
                method: 'POST',
                data: {
                    id: id,
                    nama: nama,
                    pemberkasan: pemberkasan,
                    prestasi: prestasi,
                    status: status,
                    pk_ortu: pk_ortu,
                    ph_ortu: ph_ortu,
                    tg_ortu: tg_ortu,
                },
                dataType: 'json',
                success: function(response) {
                    // Tampilkan pesan sukses atau error
                    alert(response.message);

                    // Jika penyimpanan ke basis data berhasil, perbarui tampilan
                    if (response.status === 'success') {
                        // Update isi sel-sel yang diedit dengan nilai baru
                        currentRow.find('td[data-field="nama"]').text(nama);
                        currentRow.find('td[data-field="pemberkasan"]').text(pemberkasan);
                        currentRow.find('td[data-field="prestasi"]').text(prestasi);
                        currentRow.find('td[data-field="status"]').text(status);
                        currentRow.find('td[data-field="pk_ortu"]').text(pk_ortu);
                        currentRow.find('td[data-field="ph_ortu"]').text(ph_ortu);
                        currentRow.find('td[data-field="tg_ortu"]').text(tg_ortu);

                        // Sembunyikan tombol Simpan dan tampilkan tombol Edit lagi
                        currentRow.find('.btn-save').hide();
                        currentRow.find('.btn-edit').show();
                    }
                },
                error: function() {
                    // Tampilkan pesan error jika terjadi kesalahan
                    alert('Terjadi kesalahan saat menyimpan data.');
                }
            });
        });
    });
</script> -->

<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="/js/demo/chart-area-demo.js"></script>
<script src="/js/demo/chart-pie-demo.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

<!-- Bootstrap Selectpicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.min.css">


<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>

<!-- Bootstrap JS (popper.js required) -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Bootstrap Selectpicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>


</body>

</html>