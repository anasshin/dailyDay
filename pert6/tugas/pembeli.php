<?php
include 'koneksi.php';

$id = "";
$nama = "";
$no = "";
$alamat = "";
$update = false;

// Add new record
if (isset($_POST['tambah'])) {
    $id = $_POST['id_pembeli'];
    $nama = $_POST['nama_pembeli'];
    $no = $_POST['no_pembeli'];
    $alamat = $_POST['alamat_pembeli'];

    $query = "INSERT INTO pembeli VALUES ('$id', '$nama', '$no', '$alamat')";
    $koneksi->query($query);

    header("Location: pembeli.php");
}

// Edit a record
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;

    $result = $koneksi->query("SELECT * FROM pembeli WHERE id_pembeli='$id'");
    $row = $result->fetch_assoc();

    $id = $row['id_pembeli'];
    $nama = $row['nama_pembeli'];
    $no = $row['no_pembeli'];
    $alamat = $row['alamat_pembeli'];
}

// Update record
if (isset($_POST['ubah'])) {
    $id = $_POST['id_pembeli'];
    $nama = $_POST['nama_pembeli'];
    $no = $_POST['no_pembeli'];
    $alamat = $_POST['alamat_pembeli'];

    $query = "UPDATE pembeli SET nama_pembeli='$nama', no_pembeli='$no', alamat_pembeli='$alamat' WHERE id_pembeli='$id'";
    $koneksi->query($query);

    header("Location: pembeli.php");
}

// Delete record
if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    $koneksi->query("DELETE FROM pembeli WHERE id_pembeli='$id'");

    header("Location: pembeli.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CRUD Pembeli</title>
</head>

<body>
    <h2><?php echo $update ? 'Ubah' : 'Tambah'; ?> Pembeli</h2>
    <form action="pembeli.php" method="POST">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <input type="text" name="id_pembeli" value="<?php echo $id; ?>" <?php echo $update ? 'readonly' : ''; ?>>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>
                    <input type="text" name="nama_pembeli" value="<?php echo $nama; ?>">
                </td>
            </tr>
            <tr>
                <td>No. HP</td>
                <td>
                    <input type="text" name="no_pembeli" value="<?php echo $no; ?>">
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <input type="text" name="alamat_pembeli" value="<?php echo $alamat; ?>"><br>
                </td>
            </tr>
            <tr>
                <td> <button type="submit" name="<?php echo $update ? 'ubah' : 'tambah'; ?>">
                        <?php echo $update ? 'Ubah' : 'Tambah'; ?>
                    </button></td>
                <td>
                    <a href="pembeli.php"><button>Batal</button></a>
                </td>
            </tr>
        </table>
    </form>

    <h2>Data Pembeli</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>No</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result = $koneksi->query("SELECT * FROM pembeli");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?php echo $row['id_pembeli']; ?></td>
                <td><?php echo $row['nama_pembeli']; ?></td>
                <td><?php echo $row['no_pembeli']; ?></td>
                <td><?php echo $row['alamat_pembeli']; ?></td>
                <td>
                    <a href="pembeli.php?edit=<?php echo $row['id_pembeli']; ?>">Ubah</a> |
                    <a href="pembeli.php?hapus=<?php echo $row['id_pembeli']; ?>">Hapus</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

    <a href="index.php">Kembali</a>
</body>

</html>