<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
    </style>
</head>
<body>
<?php
      include "C:/xampp/htdocs/zoulaine/Vue/admin/nav.php"

   ?>
    <div class="container mt-5">
        <h1 class="text-center">Welcome to the Admin Dashboard</h1>
        <p class="text-center">Use the navigation bar to manage users, products, and orders.</p>
        <div class="row text-center">
            <div class="col-md-4">
                <div class="card bg-primary text-white p-4">
                    <h3>Manage Users</h3>
                    <a href="/zoulaine/public/index.php/admin/users" class="btn btn-light">Go to Users</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-success text-white p-4">
                    <h3>Manage Products</h3>
                    <a href="/zoulaine/public/index.php/admin/products" class="btn btn-light">Go to Products</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card bg-info text-white p-4">
                    <h3>Manage Orders</h3>
                    <a href="/zoulaine/public/index.php/admin/orders" class="btn btn-light">Go to Orders</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
