<?php
require_once '../modele/AdminModel.php';
require_once '../modele/UserModel.php';
require_once '../modele/ProductModel.php';
require_once '../modele/OrderModel.php';
class AdminController {
    private $model;
    private $userModel;
    private $productModel;
    private $orderModel;
    public function __construct() {
        $this->model = new AdminModel();
        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->orderModel = new OrderModel();
    }

    public function showLoginPage() {
        include '../Vue/admin/login.php';
    }

    public function authenticate() {

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $admin = $this->model->getAdminByEmail($email);

        if ($admin ) {
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: /zoulaine/public/index.php/admin/products');
            exit();
        } else {
            $_SESSION['error'] = 'Email ou mot de passe incorrect';
            header('Location: /zoulaine/public/index.php/auth');
            exit();
        }
    }

    public function logout() {
        unset($_SESSION['admin_id']);
        header('Location: /zoulaine/public/index.php/auth');
        exit();
    }

    public function showDashboard() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /zoulaine/public/index.php/auth');
            exit();
        }
        include '../Vue/admin/dashbord.php';
    }
    public function manageUsers() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /zoulaine/public/index.php/auth');
            exit();
        }

        $users = $this->model->getUsers();
        include '../Vue/admin/users.php';
    }

    public function manageProducts() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /zoulaine/public/index.php/auth');
            exit();
        }

        $products = $this->model->getProducts();
        include '../Vue/admin/products.php';
    }

    public function manageOrders() {
        if (!isset($_SESSION['admin_id'])) {
            header('Location: /zoulaine/public/index.php/auth');
            exit();
        }

        $orders = $this->model->getOrders();
        include '../Vue/admin/orders.php';
    }
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
    public function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $stock = $_POST['stock'];
            $image = $_POST['image'];

            $this->productModel->addProduct($name, $description, $price, $category, $stock, $image);
            header('Location: /zoulaine/public/index.php/admin/products');
            exit();
        }
        include '../Vue/admin/addProduct.php';
    }

    public function editProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $category = $_POST['category'];
            $stock = $_POST['stock'];
            $image = $_POST['image'];

            $this->productModel->updateProduct($id, $name, $description, $price, $category, $stock, $image);
            header('Location: /zoulaine/public/index.php/admin/products');
            exit();
        }

        $id = $_GET['id'];
        $product = $this->productModel->getProductById($id);
        include '../Vue/admin/editProduct.php';
    }

    public function deleteProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $this->productModel->deleteProduct($id);
            header('Location: /zoulaine/public/index.php/admin/products');
            exit();
        }
    }
    public function createOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userId = $_POST['user_id'];
            $total = $_POST['total'];
            $status = $_POST['status'];
    
            $this->orderModel->createOrder($userId, $total, $status);
            header('Location: /zoulaine/public/index.php/admin/orders');
            exit();
        }
        include '../Vue/admin/addOrder.php';
    }
    
    public function updateOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $userId = $_POST['user_id'];
            $total = $_POST['total'];
            $status = $_POST['status'];
    
            $this->orderModel->updateOrder($id, $userId, $total, $status);
            header('Location: /zoulaine/public/index.php/admin/orders');
            exit();
        }
    
        $id = $_GET['id'];
        $order = $this->orderModel->getOrderById($id);
        include '../Vue/admin/editOrder.php';
    }
    
    public function deleteOrder() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $this->orderModel->deleteOrder($id);
            header('Location: /zoulaine/public/index.php/admin/orders');
            exit();
        }
    }
}
