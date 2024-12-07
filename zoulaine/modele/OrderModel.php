<?php
class OrderModel {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

    public function getAllOrders() {
        $stmt = $this->db->query("SELECT * FROM orders");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrderById($id) {
        $stmt = $this->db->prepare("SELECT * FROM orders WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createOrder($userId, $total, $status) {
        $stmt = $this->db->prepare("INSERT INTO orders (user_id, total_price, status) VALUES (?, ?, ?)");
        $stmt->execute([$userId, $total, $status]);
    }

    public function updateOrder($id, $userId, $total, $status) {
        $stmt = $this->db->prepare("UPDATE orders SET user_id = ?, total_price = ?, status = ? WHERE id = ?");
        $stmt->execute([$userId, $total, $status, $id]);
    }

    public function deleteOrder($id) {
        $stmt = $this->db->prepare("DELETE FROM orders WHERE id = ?");
        $stmt->execute([$id]);
    }
}
