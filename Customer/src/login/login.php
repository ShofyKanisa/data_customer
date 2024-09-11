<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #f0f0f0, #d9d9d9);
            font-family: "Times New Roman", Times, serif;
        }

        .container {
            max-width: 400px;
            margin-top: 140px;
        }

        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background-color: #6c757d;
            color: #fff;
            border-bottom: none;
            padding: 1.5rem;
            border-radius: 0.5rem 0.5rem 0 0;
            text-align: center;
        }

        .btn-custom {
            background-color: #4F6F52;
            color: #fff;
            border: none;
            border-radius: 0.5rem;
            padding: 0.75rem 1.5rem;
            font-weight: bold;
        }

        .btn-custom:hover {
            background-color: #3b4c40;
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .form-control:focus {
            border-color: #4F6F52;
            box-shadow: 0 0 0 0.2rem rgba(79, 130, 95, 0.25);
        }

        .alert {
            border-radius: 0.5rem;
        }

        .login-footer {
            text-align: center;
            margin-top: 1rem;
        }

        .login-footer a {
            color: #4F6F52;
            text-decoration: none;
        }

        .login-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h4 class="mb-0">Login</h4>
            </div>
            <div class="card-body">
                <!-- Alert message for login errors (if any) -->
                <div class="alert alert-danger <?php echo isset($_GET['error']) ? '' : 'd-none'; ?>" role="alert">
                    <strong>Error:</strong> Username atau password salah.
                </div>
                <form action="login_process.php" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-outline-secondary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
