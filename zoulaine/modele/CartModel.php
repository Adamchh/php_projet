<?php
class CartModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getCartItems() {
        // Exemple de requête simulée
        return $_SESSION['cart'] ?? [];
    }

    public function calculateTotal() {
        $cartItems = $this->getCartItems();
        $total = 0;
        foreach ($cartItems as $item) {
            $total += $item['price'];
        }
        return $total;
    }

    public function removeFromCart($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
        }
    }
}
