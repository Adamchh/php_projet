<?php
require_once '../modele/CartModel.php';

class CartController {
    private $model;

    public function __construct() {
        $this->model = new CartModel();
    }

    public function addToCart() {
    
        // Retrieve product data from POST request
        $productId = $_POST['product_id'] ?? null;
        $productName = $_POST['product_name'] ?? '';
        $productPrice = $_POST['product_price'] ?? 0; // Ensure price is numeric
        $productImage = $_POST['product_image'] ?? '';
        $quantity = $_POST['quantity'] ?? 1;
    
        // Ensure product ID and price are valid
        if ($productId && is_numeric($productPrice)) {
            // Initialize the cart if it is not already set
            if (!isset($_SESSION['cart'])) {
                $_SESSION['cart'] = [];
            }
    
            // If the product already exists in the cart, update the quantity
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] += intval($quantity);
            } else {
                // Add a new product to the cart
                $_SESSION['cart'][$productId] = [
                    'id' => $productId,
                    'name' => $productName,
                    'price' => floatval($productPrice), // Ensure price is stored as a float
                    'image' => $productImage,
                    'quantity' => intval($quantity),
                ];
            }
        }
    
        // Redirect to the product page or cart page
        header('Location: /zoulaine/public/index.php/products');
        exit();
    }
    

    public function showCart() {
    
        $cartItems = $_SESSION['cart'] ?? [];
    
        // Calculate total price, ensuring numeric types
        $totalPrice = array_reduce($cartItems, function ($total, $item) {
            return $total + (floatval($item['price']) * intval($item['quantity']));
        }, 0.0);
    
        // Include the cart view
        include '../Vue/cart/cart.php';
    }
    
    
    public function removeFromCart() {
        $productId = $_POST['product_id'] ?? null;
    
        if ($productId && isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    
        header('Location: /zoulaine/public/index.php/cart');
        exit();
    }
    public function updateQuantity() {
    
        // Récupérer les données depuis la requête POST
        $productId = $_POST['product_id'] ?? null;
        $quantity = $_POST['quantity'] ?? null;
    
        // Vérifier les entrées
        if ($productId && $quantity && $quantity > 0) {
            if (isset($_SESSION['cart'][$productId])) {
                $_SESSION['cart'][$productId]['quantity'] = $quantity;
            }
        }
    
        // Rediriger vers la page du panier
        header('Location: /zoulaine/public/index.php/cart');
        exit();
    }
    
    public function checkout() {
        // Logique de validation du panier et passage à la caisse
        header('Location: /zoulaine/public/index.php/checkout/success');
        exit();
    }
}
