<?php
include_once '../../controllers/CustomerController.php';
require_once '../../models/CustomerModel.php';

$controller = new CustomerController();
$controller->create();
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Times New Roman", Times, serif;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background-color: #6c757d;
            color: #fff;
            text-align: start;
        }

        .btn-custom {
            background-color: #6c757d;
            color: #fff;
            border: none;
        }

        .btn-custom:hover {
            background-color: #5a6268;
        }

        .form-control, .form-select {
            border-radius: 0.25rem;
        }

        .form-control:focus, .form-select:focus {
            border-color: #6c757d;
            box-shadow: 0 0 0 0.2rem rgba(108, 117, 125, 0.25);
        }

        .btn-outline-danger {
            border-radius: 0.25rem;
        }

        .btn-outline-danger:hover {
            color: #fff;
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-outline-primary {
            border-radius: 0.25rem;
        }

        .btn-outline-primary:hover {
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header text-center">
                <h4 class="mb-0">Input Data Customer</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <b>Identitas</b>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                            <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="Sangkuriang.Net" required>
                                        </div>
                                        <div class="col">
                                            <label for="pic" class="form-label">PIC</label>
                                            <input type="text" class="form-control" id="pic" name="pic" value="Sigit Suhardiman" required>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nama_pic_lokasi" class="form-label">PIC Lokasi</label>
                                        <input type="text" class="form-control" id="nama_pic_lokasi" name="nama_pic_lokasi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nik" class="form-label">NIK</label>
                                        <input type="number" class="form-control" id="nik" name="nik">
                                    </div>
                                    <div class="mb-3">
                                        <label for="alamat" class="form-label">Alamat</label>
                                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="rt_rw" class="form-label">RT/RW</label>
                                        <input type="text" class="form-control" id="rt_rw" name="rt_rw" value="RT/00 RW/00">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_onu" class="form-label">Status ONU</label>
                                        <input type="text" class="form-control" id="status_onu" name="status_onu">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_pppoe" class="form-label">Status PPPoE</label>
                                        <input type="text" class="form-control" id="status_pppoe" name="status_pppoe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="status_user" class="form-label">Status User</label>
                                        <input type="text" class="form-control" id="status_user" name="status_user">
                                    </div>
                                    <div class="mb-3">
                                        <label for="keterangan" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <b>Layanan</b>
                                </div>
                                <div class="card-body">
                                    <div class="row mb-3">
                                        <div class="col">
                                            <label for="layanan" class="form-label">Layanan</label>
                                            <select class="form-select" id="layanan" name="layanan">
                                                <option selected>UrbanLite</option>
                                                <option value="UrbanMax">UrbanMax</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="kecepatan" class="form-label">Kecepatan</label>
                                            <select class="form-select" id="kecepatan" name="kecepatan">
                                                <option selected>10 Mbps</option>
                                                <option value="20 Mbps">20 Mbps</option>
                                                <option value="30 Mbps">30 Mbps</option>
                                                <option value="50 Mbps">50 Mbps</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <label for="biaya_bulanan" class="form-label">Biaya Bulanan</label>
                                            <select class="form-select" id="biaya_bulanan" name="biaya_bulanan">
                                                <option selected>150000</option>
                                                <option value="200000">200000</option>
                                                <option value="275000">275000</option>
                                                <option value="525000">525000</option>
                                                <option value="0">0</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="nomor_registrasi" class="form-label">Nomor Registrasi</label>
                                        <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi">
                                    </div>
                                    <div class="mb-3">
                                        <label for="username_pppoe" class="form-label">Username PPPoE</label>
                                        <input type="text" class="form-control" id="username_pppoe" name="username_pppoe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password_pppoe" class="form-label">Password PPPoE</label>
                                        <input type="text" class="form-control" id="password_pppoe" name="password_pppoe">
                                    </div>
                                    <div class="mb-3">
                                        <label for="vlan" class="form-label">VLAN</label>
                                        <input type="text" class="form-control" id="vlan" name="vlan">
                                    </div>
                                    <div class="mb-3">
                                        <label for="type_onu" class="form-label">Type ONU</label>
                                        <input type="text" class="form-control" id="type_onu" name="type_onu">
                                    </div>
                                    <div class="mb-3">
                                        <label for="mac_address" class="form-label">Mac Address</label>
                                        <input type="text" class="form-control" id="mac_address" name="mac_address">
                                    </div>
                                    <div class="mb-3">
                                        <label for="serial_number" class="form-label">Serial Number</label>
                                        <input type="text" class="form-control" id="serial_number" name="serial_number">
                                    </div>
                                    <div class="mb-3">
                                        <label for="tanggal_aktif" class="form-label">Tanggal Aktif</label>
                                        <input type="date" class="form-control" id="tanggal_aktif" name="tanggal_aktif">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="./index.php" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-outline-secondary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
