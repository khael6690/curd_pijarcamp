<!DOCTYPE html>
<html>

<head>
    <title>Khaerul Umam - CRUD Website</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/style.css'); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body>
    <h1>Khaerul Umam - CRUD Website</h1>

    <div class="container">
        <h2>Daftar Produk</h2>
        <?php if ($produk) : ?>
            <table style="padding: 3px 3px;">
                <tr>
                    <th>Nama Produk</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
                <?php foreach ($produk as $p) : ?>
                    <tr>
                        <td><?php echo $p['nama_produk']; ?></td>
                        <td><?php echo $p['keterangan']; ?></td>
                        <td><?php echo $p['harga']; ?></td>
                        <td><?php echo $p['jumlah']; ?></td>
                        <td>
                            <a href="<?php echo site_url('edit-data/' . $p['id']); ?>">Edit</a>
                            <a href="<?php echo site_url('hapus/' . $p['id']); ?>" onclick="confirm('Apakah yakin ingin dihapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else : ?>
            <p>Tidak ada produk.</p>
        <?php endif; ?>

        <h2>Tambah Produk Baru</h2>
        <form action="<?= base_url('save-data') ?>" method="POST" class="form">
            <input type="text" name="nama_produk" placeholder="Nama Produk" required><br>
            <textarea name="keterangan" placeholder="Keterangan" required></textarea><br>
            <input type="number" name="harga" placeholder="Harga" required><br>
            <input type="number" name="jumlah" placeholder="Jumlah" required><br>
            <input type="submit" name="submit" value="Tambah">
        </form>
    </div>
    <script>
        function refresh() {
            setTimeout(function() {
                location.reload();
            }, 1000);
        }

        $(document).ready(function() {

            $('.form').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    success: function(response) {
                        alert("berhasil ditambahkan")
                        refresh();

                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
            })
        })

        function edit(id) {

        }
    </script>
</body>

</html>