<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Produits</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS Personnalisé -->

    <style>
        /* Couleurs principales */
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #333;
            --background-color: #f8f9fa;
            --footer-bg: #343a40;
            --footer-text: #ffffff;
        }

        body {
            background-color: var(--background-color);
        }

        /* Navbar */
        .navbar {
            background-color: var(--primary-color);
            padding: 15px 0;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: white;
        }

        .navbar-nav .nav-link {
            color: white;
            margin: 0 10px;
            transition: color 0.3s ease-in-out;
        }

        .navbar-nav .nav-link:hover {
            color: #d4f4d4;
        }

        .btn-register {
            background-color: white;
            color: var(--primary-color);
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
        }

        .btn-register:hover {
            background-color: var(--secondary-color);
            color: white;
        }


        .btn-register {
            background-color: white;
            color: var(--primary-color);
            font-weight: bold;
            padding: 8px 15px;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
        }

        .btn-register:hover {
            background-color: var(--secondary-color);
            color: white;
        }

        /* Produits */
        .card {
            border: none;
            border-radius: 10px;
            transition: transform 0.3s, box-shadow 0.3s;
            background-color: #e8f5e9;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-title {
            color: var(--primary-color);
            font-weight: bold;
        }

        .card-text {
            color: #666;
        }

        .price {
            color: var(--primary-color);
            font-weight: bold;
            font-size: 1.2rem;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        .card-icon {
            color: var(--primary-color);
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        /* Footer */
        footer {
            background-color: var(--footer-bg);
            color: var(--footer-text);
            padding: 20px 0;
        }

        footer h5 {
            font-size: 1.3rem;
            font-weight: bold;
        }

        footer a {
            color: var(--footer-text);
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }

        footer .social-icons i {
            font-size: 1.5rem;
            margin: 0 10px;
            color: var(--footer-text);
            transition: color 0.3s ease-in-out;
        }

        footer .social-icons i:hover {
            color: var(--primary-color);
        }
    </style>
</head>
<body>
   
<?php
   include "C:/xampp/htdocs/zoulaine/Vue/partials/nav.php"
   ?>


    <div class="container my-4">
        <h1 class="text-center mb-4">Liste des Produits</h1>
        <form method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Search by name" value="<?= htmlspecialchars($_GET['name'] ?? '') ?>">
                </div>
                <div class="col-md-4">
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        <?php foreach ($categories as $category): ?>
                            <option value="<?= htmlspecialchars($category) ?>" <?= (isset($_GET['category']) && $_GET['category'] === $category) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($category) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

    </div>

    <!-- Liste des produits -->
    <div class="container">
    <div class="row">
        <?php if (count($products) > 0): ?>
            <?php foreach ($products as $product): ?>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card text-center">
                        <img src="<?= htmlspecialchars($product['image']) ?>" class="card-img-top" alt="<?= htmlspecialchars($product['name']) ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($product['name']) ?></h5>
                            <p class="price"><?= htmlspecialchars($product['price']) ?> €</p>
                            <form method="POST" action="/zoulaine/public/index.php/cart/add">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($product['id']) ?>">
                                <input type="hidden" name="product_name" value="<?= htmlspecialchars($product['name']) ?>">
                                <input type="hidden" name="product_price" value="<?= htmlspecialchars($product['price']) ?>">
                                <input type="hidden" name="product_category" value="<?= htmlspecialchars($product['category']) ?>">
                                <input type="hidden" name="product_image" value="<?= htmlspecialchars($product['image']) ?>">
                                <button type="submit" class="btn btn-success">Ajouter au panier</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center">Aucun produit trouvé.</p>
        <?php endif; ?>


    </div>
</div>

 
    <?php
   include "C:/xampp/htdocs/zoulaine/Vue/partials/footer.php"
   ?>

    <!-- JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
