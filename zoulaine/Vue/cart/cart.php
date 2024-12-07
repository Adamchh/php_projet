<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Panier</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=ART50ZLUTRsApktCVHMF4i4KzbbnM7o5b80o6tpHwODyTaxZGHaxkFzoWf_P9DStGm4OmmEV9dYB0kJs&currency=USD"></script>

    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #333;
            --background-color: #f8f9fa;
        }

        body {
            background-color: var(--background-color);
        }

      
        .cart-header {
            color: var(--primary-color);
            padding: 15px 0;
        }

        .cart-header h1 {
            font-size: 2rem;
            font-weight: bold;
        }

        .cart-item {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item img {
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
        }

        .cart-item-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--secondary-color);
        }

        .cart-item-price {
            color: var(--primary-color);
            font-weight: bold;
        }

        .cart-summary {
            background-color: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-summary h5 {
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--secondary-color);
        }

        .btn-checkout {
            background-color: var(--primary-color);
            border: none;
            font-weight: bold;
        }

        .btn-checkout:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
   <?php
   include "C:/xampp/htdocs/zoulaine/Vue/partials/nav.php"
   ?>

<div class="container my-5">
    <h1 class="text-center mb-4">Votre Panier</h1>
    <div class="row">
        <!-- Liste des produits -->
        <div class="col-md-8">
            <?php if (!empty($cartItems)): ?>
                <?php foreach ($cartItems as $item): ?>
                    <div class="cart-item d-flex align-items-center mb-3">
                        <img src="<?= htmlspecialchars($item['image']) ?>" alt="<?= htmlspecialchars($item['name']) ?>" class="me-3" style="width: 100px; height: 100px; object-fit: cover;">
                        <div>
                            <h5 class="cart-item-title"><?= htmlspecialchars($item['name']) ?></h5>
                            <p class="cart-item-price"><?= htmlspecialchars($item['price']) ?> €</p>
                            <form method="POST" action="/zoulaine/public/index.php/cart/update" class="d-flex align-items-center">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($item['id']) ?>">
                                <input type="number" name="quantity" value="<?= htmlspecialchars($item['quantity']) ?>" class="form-control me-2" style="width: 80px;" min="1">
                                <button type="submit" class="btn btn-primary btn-sm">Mettre à jour</button>
                            </form>
                            <form method="POST" action="/zoulaine/public/index.php/cart/remove" class="mt-2">
                                <input type="hidden" name="product_id" value="<?= htmlspecialchars($item['id']) ?>">
                                <button type="submit" class="btn btn-danger btn-sm">Retirer</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center">Votre panier est vide.</p>
            <?php endif; ?>
        </div>

        <!-- Résumé du panier -->
        <div class="col-md-4">
    <div class="cart-summary p-3 bg-light rounded">
        <h5 class="text-center">Résumé</h5>
        <!-- Display Total Price -->
        <p>Total : <strong><?= htmlspecialchars(number_format($totalPrice ?? 0, 2)) ?> €</strong></p>
        <form method="POST" action="/zoulaine/public/index.php/checkout">
            <button type="submit" class="btn btn-primary w-100">Passer à la caisse</button>
        </form>
    </div>
    <?php $total = $totalPrice; ?>

    <div id="paypal-button-container" class="my-4"></div>

    <script>
    paypal.Buttons({
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
  amount: {
    value: '<?= $total ?>'
  }
}]

            });
        },
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                alert('Transaction completed by ' + details.payer.name.given_name);
                // Redirect to thank you page
                window.location.href = 'thank_you.php?orderID=' + data.orderID;
            });
        },
        onError: function(err) {
            console.error(err);
            alert('An error occurred during the transaction.');
        }
    }).render('#paypal-button-container');
</script>
</div>

    </div>
</div>

    <?php
   include "C:/xampp/htdocs/zoulaine/Vue/partials/footer.php"
   ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
