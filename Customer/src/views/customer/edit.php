<?php
include_once '../../controllers/CustomerController.php';
require_once '../../models/CustomerModel.php';

$controller = new CustomerController();
$customer = $controller->update($_GET['id']);
$controller->update($_GET['id']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: "Times New Roman", Times, serif;
        }
        .form-group {
            margin-bottom: 1.5rem;
        }

        .card {
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #6c757d;
            color: #fff;
            text-align: start;
        }

        .card-footer {
            background-color: #4F6F52;
            color: #fff;
        }

        #identitas, #head-layanan {
            background-color: #89AA97;
        }
    </style>
</head>

<body>
    <div class="container mt-4 mb-4">
        <div class="card">
            <div class="card-header">
                Edit Customer Data
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <b>Identitas</b>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nama_pelanggan">Nama Pelanggan</label>
                                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" value="<?php echo $customer['nama_pelanggan']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="pic">PIC</label>
                                                <input type="text" class="form-control" id="pic" name="pic" value="<?php echo $customer['pic']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nama_pic_lokasi">PIC Lokasi</label>
                                                <input type="text" class="form-control" id="nama_pic_lokasi" name="nama_pic_lokasi" value="<?php echo $customer['nama_pic_lokasi']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="number" class="form-control" id="nik" name="nik" value="<?php echo $customer['nik']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="alamat">Alamat</label>
                                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $customer['alamat']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="rt_rw">RT/RW</label>
                                                <input type="text" class="form-control" id="rt_rw" name="rt_rw" value="<?php echo $customer['rt_rw']; ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="relokasi_rubah_nama">Relokasi/Rubah Nama</label>
                                        <input type="text" class="form-control" id="relokasi_rubah_nama" name="relokasi_rubah_nama">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status_onu">Status ONU</label>
                                        <input type="text" class="form-control" id="status_onu" name="status_onu" value="<?php echo $customer['status_onu']; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status_pppoe">Status PPPoE</label>
                                        <input type="text" class="form-control" id="status_pppoe" name="status_pppoe" value="<?php echo $customer['status_pppoe']; ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="status_user">Status User</label>
                                        <input type="text" class="form-control" id="status_user" name="status_user" value="<?php echo $customer['status_user']; ?>">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="keterangan">Keterangan</label>
                                        <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $customer['keterangan']; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <b>Layanan</b>
                                </div>
                                <div class="card-body">
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="layanan">Layanan</label>
                                                <select class="form-control" id="layanan" name="layanan">
                                                    <option <?php echo $customer['layanan'] == 'UrbanLite' ? 'selected' : ''; ?>>UrbanLite</option>
                                                    <option <?php echo $customer['layanan'] == 'UrbanMax' ? 'selected' : ''; ?>>UrbanMax</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="kecepatan">Kecepatan</label>
                                                <select class="form-control" id="kecepatan" name="kecepatan">
                                                    <option <?php echo $customer['kecepatan'] == '10 Mbps' ? 'selected' : ''; ?>>10 Mbps</option>
                                                    <option <?php echo $customer['kecepatan'] == '20 Mbps' ? 'selected' : ''; ?>>20 Mbps</option>
                                                    <option <?php echo $customer['kecepatan'] == '30 Mbps' ? 'selected' : ''; ?>>30 Mbps</option>
                                                    <option <?php echo $customer['kecepatan'] == '50 Mbps' ? 'selected' : ''; ?>>50 Mbps</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="biaya_bulanan">Biaya Bulanan</label>
                                                <select type="text" class="form-control" id="biaya_bulanan" name="biaya_bulanan">
                                                    <option <?php echo $customer['biaya_bulanan'] == '150000' ? 'selected' : ''; ?>>150000</option>
                                                    <option <?php echo $customer['biaya_bulanan'] == '200000' ? 'selected' : ''; ?>>200000</option>
                                                    <option <?php echo $customer['biaya_bulanan'] == '275000' ? 'selected' : ''; ?>>275000</option>
                                                    <option <?php echo $customer['biaya_bulanan'] == '525000' ? 'selected' : ''; ?>>525000</option>
                                                    <option <?php echo $customer['biaya_bulanan'] == '0' ? 'selected' : ''; ?>>0</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="nomor_registrasi">Nomor Registrasi</label>
                                                <input type="text" class="form-control" id="nomor_registrasi" name="nomor_registrasi" value="<?php echo $customer['nomor_registrasi']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="username_pppoe">Username PPPoE</label>
                                                <input type="text" class="form-control" id="username_pppoe" name="username_pppoe" value="<?php echo $customer['username_pppoe']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="password_pppoe">Password PPPoE</label>
                                                <input type="text" class="form-control" id="password_pppoe" name="password_pppoe" value="<?php echo $customer['password_pppoe']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="vlan">VLAN</label>
                                                <input type="text" class="form-control" id="vlan" name="vlan" value="<?php echo $customer['vlan']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="type_onu">Type ONU</label>
                                                <input type="text" class="form-control" id="type_onu" name="type_onu" value="<?php echo $customer['type_onu']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="mac_address">Mac Address</label>
                                                <input type="text" class="form-control" id="mac_address" name="mac_address" value="<?php echo $customer['mac_address']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="serial_number">Serial Number</label>
                                                <input type="text" class="form-control" id="serial_number" name="serial_number" value="<?php echo $customer['serial_number']; ?>">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <label for="tanggal_aktif">Tanggal Aktif</label>
                                                <input type="date" class="form-control" id="tanggal_aktif" name="tanggal_aktif" value="<?php echo $customer['tanggal_aktif']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a href="./index.php" class="btn btn-outline-secondary">Back</a>
                        <button type="submit" class="btn btn-outline-secondary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>