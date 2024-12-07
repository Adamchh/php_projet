<?php


class AdminModel {
    private $db;
    private $userModel;

    public function __construct() {
        $this->db = Database::getConnection();
        $this->userModel = new UserModel();

    }

    public function getAdminByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM admins WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUsers() {
        $stmt = $this->db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProducts() {
        $stmt = $this->db->query("SELECT * FROM products");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getOrders() {
        $stmt = $this->db->query("SELECT * FROM orders");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
      // Add a new user
    public function addUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

            $this->userModel->addUser($name, $email, $password);
            header('Location: /zoulaine/public/index.php/admin/users');
            exit();
        }
        include '../Vue/admin/addUser.php';
    }

    // Edit an existing user
    public function editUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];

            $this->userModel->updateUser($id, $name, $email);
            header('Location: /zoulaine/public/index.php/admin/users');
            exit();
        }

        $id = $_GET['id'];
        $user = $this->userModel->getUserById($id);
        include '../Vue/admin/editUser.php';
    }

    // Delete a user
    public function deleteUser() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];

            $this->userModel->deleteUser($id);
            header('Location: /zoulaine/public/index.php/admin/users');
            exit();
        }
    }
}
