<?php
require_once '../modele/UserModel.php';
require_once 'C:/xampp/htdocs/zoulaine/modele/AdminModel.php';


class AuthController {
    public function showLoginPage() {
        include '../Vue/auth/login.php';
    }

    public function showRegisterPage() {
        include '../Vue/auth/register.php';
    }

    public function authenticate() {

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $adminModel = new AdminModel();
        $userModel = new UserModel();

        // Check if the email matches an admin
        $admin = $adminModel->getAdminByEmail($email);
        if ($admin && $password == $admin['password']) {
            $_SESSION['admin_id'] = $admin['id'];
            header('Location: /zoulaine/public/index.php/admin/dashboard');
            exit();
        }

        // Check if the email matches a user
        $user = $userModel->getUserByEmail($email);
        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            header('Location: /zoulaine/public/index.php/products');
            exit();
        }

        // If neither admin nor user, redirect back with an error
        $_SESSION['error'] = 'Email or password incorrect';
        header('Location: /zoulaine/public/index.php/auth');
        exit();
    }
    public function registerUser() {
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';
    
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
        $model = new UserModel();
        $model->createUser($name, $email, $hashedPassword, $phone, $address);
    
        header('Location: /zoulaine/public/index.php/auth');
        exit();
    }
    public function logout() {
        session_destroy(); // Détruire la session
        header('Location: /zoulaine/public/index.php/auth'); // Rediriger vers la page de connexion
        exit();
    }
    
}
