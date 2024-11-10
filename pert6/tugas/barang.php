<?php
include 'koneksi.php';

$id = "";
$nama = "";
$harga = "";
$update = false;

// Add new record
if (isset($_POST['tambah'])) {
    $id = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga_barang'];

    $query = "INSERT INTO barang VALUES ('$id', '$nama', '$harga')";
    $koneksi->query($query);

    header("Location: barang.php");
}

// Edit a record
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $result = $koneksi->query("SELECT * FROM barang WHERE id_barang='$id'");
    $row = $result->fetch_assoc();

    $id = $row['id_barang'];
    $nama = $row['nama_barang'];
    $harga = $row['harga_barang'];
}

// Update record
if (isset($_POST['ubah'])) {
    $id = $_POST['id_barang'];
    $nama = $_POST['nama_barang'];
    $harga = $_POST['harga_barang'];

    $query = "UPDATE barang SET nama_barang='$nama', harga_barang='$harga' WHERE id_barang='$id'";
    $koneksi->query($query);

    header("Location: barang.php");
}

// Delete record
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $koneksi->query("DELETE FROM barang WHERE id_barang='$id'");

    header("Location: barang.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD Barang</title>
</head>

<body>
    <h2><?php echo $update ? 'Ubah' : 'Tambah'; ?> Barang</h2>
    <form action="barang.php" method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" name="id_barang" value="<?php echo $id; ?>" <?php echo $update ? 'readonly' : ''; ?>>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama_barang" value="<?php echo $nama; ?>">
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td>
                    <input type="number" name="harga_barang" value="<?php echo $harga; ?>"><br>
                </td>
            </tr>
            <tr>
                <td> <button type="submit" name="<?php echo $update ? 'ubah' : 'tambah'; ?>">
                        <?php echo $update ? 'Ubah' : 'Tambah'; ?>
                    </button></td>
                <td>

                    <a href="barang.php"><button>Batal</button></a>
                </td>
            </tr>
        </table>

    </form>

    <h2>Data Barang</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $koneksi->query("SELECT * FROM barang");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?php echo $row['id_barang']; ?></td>
                <td><?php echo $row['nama_barang']; ?></td>
                <td><?php echo $row['harga_barang']; ?></td>
                <td>
                    <a href="barang.php?edit=<?php echo $row['id_barang']; ?>">Ubah</a> |
                    <a href="barang.php?hapus=<?php echo $row['id_barang']; ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="index.php">Kembali</a>
</body>

</html>