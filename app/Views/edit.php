<!DOCTYPE html>
<html>

<head>
    <title>Khaerul Umam - CRUD Website</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
</head>

<body>
    <h1>Khaerul Umam - CRUD Website</h1>

    <div class="container">
        <h2>Edit Produk</h2>
        <form action="<?= base_url('/save-update/' . $data['id']) ?>" method="POST">
            <input type="hidden" name="id" value="<?= $data['id'];  ?>">
            <input type="text" name="nama_produk" placeholder="Nama Produk" value="<?php echo $data['nama_produk']; ?>" required>
            <br>
            <textarea name="keterangan" placeholder="Keterangan" required><?php echo $data['keterangan']; ?></textarea>
            <br>
            <input type="number" name="harga" placeholder="Harga" value="<?php echo $data['harga']; ?>" required>
            <br>
            <input type="number" name="jumlah" placeholder="Jumlah" value="<?php echo $data['jumlah']; ?>" required>
            <br>
            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>
</body>

</html>