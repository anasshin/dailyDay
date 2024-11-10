CREATE DATABASE db_tugas;

USE db_tugas;

CREATE Table barang (
    id_barang VARCHAR(4) PRIMARY KEY,
    nama_barang VARCHAR(50),
    harga_barang INT
);

CREATE Table pembeli (
    id_pembeli VARCHAR(4) PRIMARY KEY,
    nama_pembeli VARCHAR(50),
    no_pembeli VARCHAR(12),
    alamat_pembeli VARCHAR(50)
);

CREATE Table kurir (
    id_kurir VARCHAR(4) PRIMARY KEY,
    nama_kurir VARCHAR(50),
    no_kurir VARCHAR(12)
);

INSERT INTO
    barang
VALUES ('B001', 'Baju', 100000),
    ('B002', 'Celana', 150000),
    ('B003', 'Sepatu', 200000),
    ('B004', 'Topi', 50000),
    ('B005', 'Kacamata', 75000);

INSERT INTO
    pembeli
VALUES (
        'P001',
        'Anas',
        '08198766689',
        'Blater 1, Kalimanah, Purbalingga'
    ),
    (
        'P002',
        'Diana',
        '08123455432',
        'Blater 2, Kalimanah, Purbalingga'
    ),
    (
        'P003',
        'Ambilah',
        '08765443467',
        'Blater 3, Kalimanah, Purbalingga'
    ),
    (
        'P004',
        'Karem',
        '08654333251',
        'Blater 4, Kalimanah, Purbalingga'
    ),
    (
        'P005',
        'Dilanda',
        '0812321234',
        'Blater 5, Kalimanah, Purbalingga'
    );

INSERT INTO
    kurir
VALUES (
        'K001',
        'Jokowo - SiCepat',
        '081234567890'
    ),
    (
        'K002',
        'Budiman - AnterAja',
        '081234567891'
    ),
    (
        'K003',
        'Rudala - Tiki',
        '081234567892'
    ),
    (
        'K004',
        'Susi - POS',
        '081234567893'
    ),
    (
        'K005',
        'Dedi - JNE',
        '081234567894'
    );

INSERT INTO barang VALUES ('B005', 'Kacamata', 75000);