<?php include __DIR__ . '/../layout/header.php'; ?>
<?php include __DIR__ . '/../layout/sidebar.php'; ?>


<div class="container mt-4">
    <h2><?= isset($data) ? 'Edit' : 'Tambah' ?> Data Pasien</h2>

    <form method="POST" action="PasienController.php?action=<?= isset($data) ? 'update' : 'store' ?>">
        <?php if (isset($data)): ?>
            <input type="hidden" name="id_pasien" value="<?= $data['id_pasien'] ?>">
        <?php endif; ?>

        <div class="mb-3">
            <label class="form-label">Nama Depan</label>
            <input type="text" name="nama_depan" class="form-control" required value="<?= $data['nama_depan'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Belakang</label>
            <input type="text" name="nama_belakang" class="form-control" required value="<?= $data['nama_belakang'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control" required value="<?= $data['tanggal_lahir'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="L" <?= (isset($data) && $data['jenis_kelamin'] == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                <option value="P" <?= (isset($data) && $data['jenis_kelamin'] == 'P') ? 'selected' : '' ?>>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $data['alamat'] ?? '' ?></textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Nomor Telepon</label>
            <input type="text" name="nomor_telepon" class="form-control" required value="<?= $data['nomor_telepon'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" required value="<?= $data['email'] ?? '' ?>">
        </div>

        <div class="mb-3">
            <label class="form-label">Asuransi (ID)</label>
            <input type="number" name="id_asuransi" class="form-control" required value="<?= $data['id_asuransi'] ?? '' ?>">
        </div>

        <button type="submit" class="btn btn-success"><?= isset($data) ? 'Perbarui' : 'Simpan' ?></button>
        <a href="PasienController.php" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?php include __DIR__ . '/../layout/footer.php'; ?>
