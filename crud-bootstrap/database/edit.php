<?php
include 'config.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit;
}

// Ambil data lama
$stmt = $pdo->prepare("SELECT * FROM produk WHERE id = ?");
$stmt->execute([$id]);
$produk = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$produk) {
    die("Data tidak ditemukan!");
}

// Proses Update
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama     = $_POST['nama_produk'];
    $kategori = $_POST['kategori'];
    $harga    = $_POST['harga'];
    $stok     = $_POST['stok'];

    $sql = "UPDATE produk SET nama_produk = ?, kategori = ?, harga = ?, stok = ? WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    
    if ($stmt->execute([$nama, $kategori, $harga, $stok, $id])) {
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-warning text-white">
                    <h5 class="mb-0 text-dark">Edit Produk</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama Produk</label>
                            <input type="text" name="nama_produk" class="form-control" value="<?= htmlspecialchars($produk['nama_produk']); ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Kategori</label>
                            <select name="kategori" class="form-select" required>
                                <option value="Aksesoris" <?= $produk['kategori'] == 'Aksesoris' ? 'selected' : ''; ?>>Aksesoris</option>
                                <option value="Komponen" <?= $produk['kategori'] == 'Komponen' ? 'selected' : ''; ?>>Komponen</option>
                                <option value="Monitor" <?= $produk['kategori'] == 'Monitor' ? 'selected' : ''; ?>>Monitor</option>
                                <option value="Laptop" <?= $produk['kategori'] == 'Laptop' ? 'selected' : ''; ?>>Laptop</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control" value="<?= $produk['harga']; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Stok</label>
                            <input type="number" name="stok" class="form-control" value="<?= $produk['stok']; ?>" required>
                        </div>
                        <div class="d-flex justify-content-between">
                            <a href="index.php" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-warning text-dark fw-bold">Update Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>