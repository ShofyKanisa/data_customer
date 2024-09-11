<?php
include_once '../../controllers/CustomerController.php';
require_once '../../models/CustomerModel.php';

$controller = new CustomerController();
$customer = $controller->show($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Arial", sans-serif;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
            border-radius: 0.5rem;
        }

        .card-header {
            background-color: #6c757d;
            color: #fff;
            font-size: 1.25rem;
            border-bottom: 1px solid #6c757d;
            border-radius: 0.5rem 0.5rem 0 0;
        }

        .card-body {
            background-color: #ffffff;
            padding: 2rem;
        }

        .card-footer {
            background-color: #6c757d;
            color: #fff;
            font-size: 0.875rem;
            border-top: 1px solid #6c757d;
            border-radius: 0 0 0.5rem 0.5rem;
        }

        .btn-custom {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #5a6268;
        }

        .btn-outline-secondary {
            border-radius: 0.25rem;
        }

        .btn-outline-secondary:hover {
            color: #fff;
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-outline-warning {
            border-radius: 0.25rem;
        }

        .btn-outline-warning:hover {
            color: #fff;
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-outline-danger {
            border-radius: 0.25rem;
        }

        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .card-text {
            margin-bottom: 1rem;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-4">
        <div class="card mx-auto">
            <div class="card-header text-center">
                <?php echo $customer['nama_pic_lokasi']; ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <p class="card-text"><strong>Nama Pelanggan:</strong> <?php echo $customer['nama_pelanggan']; ?></p>
                        <p class="card-text"><strong>PIC:</strong> <?php echo $customer['pic']; ?></p>
                        <p class="card-text"><strong>Nama PIC Lokasi:</strong> <?php echo $customer['nama_pic_lokasi']; ?></p>
                        <p class="card-text"><strong>Relokasi Rubah Nama:</strong> <?php echo $customer['relokasi_rubah_nama']; ?></p>
                        <p class="card-text"><strong>NIK:</strong> <?php echo $customer['nik']; ?></p>
                        <p class="card-text"><strong>Alamat:</strong> <?php echo $customer['alamat']; ?></p>
                        <p class="card-text"><strong>Layanan:</strong> <?php echo $customer['layanan']; ?></p>
                        <p class="card-text"><strong>Kecepatan:</strong> <?php echo $customer['kecepatan']; ?></p>
                        <p class="card-text"><strong>Biaya Bulanan:</strong> Rp. <?php echo number_format((float) $customer['biaya_bulanan'], 0, ',', '.'); ?></p>
                        <p class="card-text"><strong>Nomor Registrasi:</strong> <?php echo $customer['nomor_registrasi']; ?></p>
                        <p class="card-text"><strong>Username PPPoE:</strong> <?php echo $customer['username_pppoe']; ?></p>
                        <p class="card-text"><strong>Password PPPoE:</strong> <?php echo $customer['password_pppoe']; ?></p>
                        <p class="card-text"><strong>VLAN:</strong> <?php echo $customer['vlan']; ?></p>
                        <p class="card-text"><strong>Type ONU:</strong> <?php echo $customer['type_onu']; ?></p>
                        <p class="card-text"><strong>MAC Address:</strong> <?php echo $customer['mac_address']; ?></p>
                        <p class="card-text"><strong>Serial Number:</strong> <?php echo $customer['serial_number']; ?></p>
                        <p class="card-text"><strong>Status ONU:</strong> <?php echo $customer['status_onu']; ?></p>
                        <p class="card-text"><strong>Status PPPoE:</strong> <?php echo $customer['status_pppoe']; ?></p>
                        <p class="card-text"><strong>Tanggal Aktif:</strong> <?php echo $customer['tanggal_aktif']; ?></p>
                        <p class="card-text"><strong>Status User:</strong> <?php echo $customer['status_user']; ?></p>
                        <p class="card-text"><strong>Keterangan:</strong> <?php echo $customer['keterangan']; ?></p>
                    </div>
                </div>
                <div class="text-center mt-4">
                    <a href="./index.php" class="btn btn-outline-secondary">Back</a>
                    <a href="edit.php?id=<?php echo $customer['id']; ?>" class="btn btn-outline-warning">Edit</a>
                    <a href="delete.php?id=<?php echo $customer['id']; ?>" class="btn btn-outline-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
