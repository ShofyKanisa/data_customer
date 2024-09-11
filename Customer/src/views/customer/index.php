<?php
include_once '../../controllers/CustomerController.php';

$customerController = new CustomerController();
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$recordsPerPage = 10;
$offset = ($page - 1) * $recordsPerPage;

if (isset($_GET['filter']) && isset($_GET['search'])) {
    $search = $_GET['search'];
    $filter = $_GET['filter'];
    $customers = $customerController->getCustomersBySearch($filter, $search);
} else {
    $customers = $customerController->index();
}

$totalCustomers = count($customers);
$totalPages = ceil($totalCustomers / $recordsPerPage);
$customers = array_slice($customers, $offset, $recordsPerPage);
$counter = $offset + 1;
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sangkuriang Customers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">    <script defer>
        function resetSearch() {
            window.location.href = window.location.pathname;
        }
    </script>
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
        .card-header, .card-footer {
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
        .pagination .page-item.active .page-link {
            background-color: #6c757d;
            border-color: #6c757d;
        }
        .table {
            font-size: 0.875rem;
        }
        .table-custom th, .table-custom td {
            white-space: nowrap;
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container mt-4 mb-4">
        <h1 class="text-center mb-4">Customer List</h1>
        <a href="create.php" class="btn btn-custom mb-3">+ Add New Customer</a>
        <div class="row">
            <?php if (!empty($customers)) : ?>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Data Customer
                        </div>
                        <div class="card-body">
                            <div class="col-md-6 mx-auto">
                                <form action="" method="get" class="input-group mb-3 d-flex">
                                    <select class="form-select" name="filter" id="filter" aria-label="Filter Dropdown">
                                        <option value="">Filter by</option>
                                        <option value="status_pppoe" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'status_pppoe') echo 'selected'; ?>>PPPoE Status</option>
                                        <option value="status_user" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'status_user') echo 'selected'; ?>>User Status</option>
                                        <option value="rt_rw" <?php if (isset($_GET['filter']) && $_GET['filter'] === 'rt_rw') echo 'selected'; ?>>RT/RW</option>
                                    </select>
                                    <input type="text" class="form-control" name="search" placeholder="Search..." aria-label="Search" aria-describedby="button-addon" value="<?php if (isset($_GET['search'])) echo $_GET['search']; ?>">
                                    <button type="submit" class="btn btn-outline-secondary" id="button-addon">Search</button>
                                    <button type="button" onclick="resetSearch()" class="btn btn-outline-danger">Reset</button>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-hover table-bordered table-custom">
                                    <thead class="table-secondary">
                                        <tr>
                                        <th>No.</th>
                                        <th>Nama Pelanggan</th>
                                        <th>PIC</th>
                                        <th>Nama PIC Lokasi</th>
                                        <th>Relokasi/Rubah Nama</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>Layanan</th>
                                        <th>Kecepatan</th>
                                        <th>Biaya Bulanan</th>
                                        <th>Nomor Registrasi</th>
                                        <th>Username PPPoE</th>
                                        <th>Password PPPoE</th>
                                        <th>VLAN</th>
                                        <th>Type ONU</th>
                                        <th>Mac Address</th>
                                        <th>Serial Number</th>
                                        <th>Status ONU</th>
                                        <th>Status PPPoE</th>
                                        <th>Tanggal Aktif</th>
                                        <th>Status User</th>
                                        <th>Keterangan</th>
                                        <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody">
                                        <?php foreach ($customers as $customer) : ?>
                                            <tr>
                                                <td><?= $counter++ ?></td>
                                                <td><?= htmlspecialchars($customer['nama_pelanggan'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['pic'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['nama_pic_lokasi'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['relokasi_rubah_nama'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['nik'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['alamat'], ENT_QUOTES, 'UTF-8') ?>, <?= htmlspecialchars($customer['rt_rw'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['layanan'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['kecepatan'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= number_format((float)$customer['biaya_bulanan'], 0, ',', '.') ?></td>
                                                <td><?= htmlspecialchars($customer['nomor_registrasi'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['username_pppoe'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['password_pppoe'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['vlan'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['type_onu'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['mac_address'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['serial_number'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['status_onu'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['status_pppoe'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['tanggal_aktif'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['status_user'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td><?= htmlspecialchars($customer['keterangan'], ENT_QUOTES, 'UTF-8') ?></td>
                                                <td>
                                                    <a href="show.php?id=<?= $customer['id'] ?>" class="btn btn-outline-info btn-sm">View</a>
                                                    <a href="edit.php?id=<?= $customer['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                                                    <a href="delete.php?id=<?= $customer['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                    <li class="page-item <?php if ($page <= 1) echo 'disabled'; ?>">
                                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                                        <li class="page-item <?php if ($i == $page) echo 'active'; ?>"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                                    <?php endfor; ?>
                                    <li class="page-item <?php if ($page >= $totalPages) echo 'disabled'; ?>">
                                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="card-footer">
                            ㅤ
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="col-md-12">
                    <div class="alert alert-warning" role="alert">
                        Customers tidak di temukan.
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script></body>
</html>
