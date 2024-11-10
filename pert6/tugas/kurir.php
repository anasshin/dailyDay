<?php
include 'koneksi.php';

$id = "";
$nama = "";
$no = "";
$update = false;

// Add new record
if (isset($_POST['tambah'])) {
    $id = $_POST['id_kurir'];
    $nama = $_POST['nama_kurir'];
    $no = $_POST['no_kurir'];

    $query = "INSERT INTO kurir VALUES ('$id', '$nama', '$no')";
    $koneksi->query($query);

    header("Location: kurir.php");
}

// Edit a record
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $result = $koneksi->query("SELECT * FROM kurir WHERE id_kurir='$id'");
    $row = $result->fetch_assoc();

    $id = $row['id_kurir'];
    $nama = $row['nama_kurir'];
    $no = $row['no_kurir'];
}

// Update record
if (isset($_POST['ubah'])) {
    $id = $_POST['id_kurir'];
    $nama = $_POST['nama_kurir'];
    $no = $_POST['no_kurir'];

    $query = "UPDATE kurir SET nama_kurir='$nama', no_kurir='$no' WHERE id_kurir='$id'";
    $koneksi->query($query);

    header("Location: kurir.php");
}

// Delete record
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $koneksi->query("DELETE FROM kurir WHERE id_kurir='$id'");

    header("Location: kurir.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD Kurir</title>
</head>

<body>
    <h2><?php echo $update ? 'Ubah' : 'Tambah'; ?> Kurir</h2>
    <form action="kurir.php" method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" name="id_kurir" value="<?php echo $id; ?>" <?php echo $update ? 'readonly' : ''; ?>>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama_kurir" value="<?php echo $nama; ?>">
                </td>
            </tr>
            <tr>
                <td>No Kurir</td>
                <td>
                    <input type="text" name="no_kurir" value="<?php echo $no; ?>"><br>
                </td>
            </tr>
            <tr>
                <td> <button type="submit" name="<?php echo $update ? 'ubah' : 'tambah'; ?>">
                        <?php echo $update ? 'Ubah' : 'Tambah'; ?>
                    </button></td>
                <td>
                    <a href="kurir.php"><button>Batal</button></a>
                </td>
            </tr>
        </table>
    </form>

    <h2>Data Kurir</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No Kurir</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $koneksi->query("SELECT * FROM kurir");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?php echo $row['id_kurir']; ?></td>
                <td><?php echo $row['nama_kurir']; ?></td>
                <td><?php echo $row['no_kurir']; ?></td>
                <td>
                    <a href="kurir.php?edit=<?php echo $row['id_kurir']; ?>">Ubah</a> |
                    <a href="kurir.php?hapus=<?php echo $row['id_kurir']; ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="index.php">Kembali</a>
</body>

</html>