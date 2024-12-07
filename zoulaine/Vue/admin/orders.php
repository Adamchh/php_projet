<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Gestion des Commandes</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php    include "C:/xampp/htdocs/zoulaine/Vue/admin/nav.php"
 ?>

    <div class="container mt-5">
        <h2>Gestion des Commandes</h2>
        <div class="container mt-5">
    <h2>Manage Orders</h2>
    <a href="/zoulaine/public/index.php/admin/orders/add" class="btn btn-success mb-3">Add New Order</a>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Total</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td><?= htmlspecialchars($order['id']) ?></td>
                    <td><?= htmlspecialchars($order['user_id']) ?></td>
                    <td><?= htmlspecialchars($order['total_price']) ?> €</td>
                    <td><?= htmlspecialchars($order['status']) ?></td>
                    
                    <td>
                        <!-- Edit Button -->
                        <a href="/zoulaine/public/index.php/admin/orders/edit?id=<?= $order['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                        
                        <!-- Delete Button -->
                        <form method="POST" action="/zoulaine/public/index.php/admin/orders/delete" style="display:inline;">
                            <input type="hidden" name="id" value="<?= $order['id'] ?>">
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>