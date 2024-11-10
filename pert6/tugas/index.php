<?php
include 'koneksi.php';

function generateTable($koneksi, $query, $columns, $link)
{
    $result = mysqli_query($koneksi, $query);
    echo '<a href="' . $link . '" style="text-decoration: none; color: inherit;">';
    echo '<table border="1">';
    echo '<tr>';
    echo '<th>No</th>';
    foreach ($columns as $column) {
        echo '<th>' . $column . '</th>';
    }
    echo '</tr>';
    $no = 1;
    while ($data = mysqli_fetch_array($result)) {
        echo '<tr>';
        echo '<td>' . $no++ . '</td>';
        foreach ($columns as $column) {
            echo '<td>' . $data[$column] . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
    echo '</a>';
}

$barang = "select * from barang";
$pembeli = "select * from pembeli";
$kurir = "select * from kurir";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utama</title>
</head>

<body style="display: flex; gap: 10px;">
    <?php
    generateTable($koneksi, $barang, ['id_barang'], 'barang.php');
    generateTable($koneksi, $pembeli, ['id_pembeli'], 'pembeli.php');
    generateTable($koneksi, $kurir, ['id_kurir'], 'kurir.php');
    ?>
</body>

</html>