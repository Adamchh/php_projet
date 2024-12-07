<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Products</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
   include "C:/xampp/htdocs/zoulaine/Vue/admin/nav.php"
   ?>
   <div class="container mt-5">
    <h2>Manage Products</h2>
    <a href="/zoulaine/public/index.php/admin/products/add" class="btn btn-success mb-3">Add New Product</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['id']) ?></td>
                    <td><?= htmlspecialchars($product['name']) ?></td>
                    <td><?= htmlspecialchars($product['category']) ?></td>
                    <td><?= htmlspecialchars($product['price']) ?> €</td>
                    <td><?= htmlspecialchars($product['stock']) ?></td>
                    <td>
                        <a href="/zoulaine/public/index.php/admin/products/edit?id=<?= $product['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        <form method="POST" action="/zoulaine/public/index.php/admin/products/delete" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
