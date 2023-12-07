<?= view('templates/header', ['title' => 'Edit Data']) ?>

<!-- tambah_data_view.php -->
<div>
    <h3>Tambah Data Periode</h3>
    <form action="<?= site_url('Home/TambahDataPeriode'); ?>" method="post">
        <label for="inputPeriode">Periode:</label>
        <input type="text" id="inputPeriode" name="periode" class="form-control" required>
        <button type="submit" class="btn btn-success btn-sm">Simpan</button>
    </form>
</div>


<?= view('templates/footer') ?>