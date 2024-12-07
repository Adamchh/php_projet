<?php
class ProductModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    // Get products with category as an attribute
    public function getProducts($filters = []) {
        $query = "SELECT * FROM products WHERE 1=1";
        $params = [];

        if (!empty($filters['name'])) {
            $query .= " AND name LIKE ?";
            $params[] = "%" . $filters['name'] . "%";
        }

        if (!empty($filters['category'])) {
            $query .= " AND category = ?";
            $params[] = $filters['category'];
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all distinct categories from the products table
    public function getCategories() {
        $stmt = $this->db->query("SELECT DISTINCT category FROM products");
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }
    public function addProduct($name, $description, $price, $category, $stock, $image) {
        $stmt = $this->db->prepare("INSERT INTO products (name, description, price, category, stock, image) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $price, $category, $stock, $image]);
    }

    public function getProductById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProduct($id, $name, $description, $price, $category, $stock, $image) {
        $stmt = $this->db->prepare("UPDATE products SET name = ?, description = ?, price = ?, category = ?, stock = ?, image = ? WHERE id = ?");
        $stmt->execute([$name, $description, $price, $category, $stock, $image, $id]);
    }

    public function deleteProduct($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
    }
}
