<?php
class FrontController {
    public function handleRequest() {
        // Récupère l'URL
        $uri = strtok($_SERVER['REQUEST_URI'], '?'); 
        if ($uri === '/zoulaine/public/index.php/logout') {
            require_once '../controleur/AuthController.php';
            $controller = new AuthController();
            $controller->logout();
        }
       
        elseif ($uri === '/zoulaine/public/index.php/auth') {
            require_once '../Vue/auth/auth.php';
        } elseif ($uri === '/zoulaine/public/index.php/authenticate') {
            require_once 'C:/xampp/htdocs/zoulaine/controleur/AuthController.php';
            $controller = new AuthController();
            $controller->authenticate();
        } elseif ($uri === '/zoulaine/public/index.php/registerUser') {
            require_once 'C:/xampp/htdocs/zoulaine/controleur/AuthController.php';
            $controller = new AuthController();
            $controller->registerUser();
        }elseif($uri === '/zoulaine/public/index.php/cart') { 
            if (!isset($_SESSION['user_id'])) {
                // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
                header('Location: /zoulaine/public/index.php/auth');
                exit();
            }
            require_once 'C:/xampp/htdocs/zoulaine/controleur/CartController.php';
            $controller = new CartController();
            $controller->showCart();
        }
        elseif ($uri === '/zoulaine/public/index.php/cart/add') {
            if (!isset($_SESSION['user_id'])) {
                // Redirige vers la page de connexion si l'utilisateur n'est pas authentifié
                header('Location: /zoulaine/public/index.php/auth');
                exit();
            }
            require_once '../controleur/CartController.php';
            $controller = new CartController();
            $controller->addToCart();
        }elseif ($uri === '/zoulaine/public/index.php/admin/users/add') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->addUser();
        } elseif ($uri === '/zoulaine/public/index.php/admin/users/edit') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->editUser();
        } elseif ($uri === '/zoulaine/public/index.php/admin/users/delete') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->deleteUser();
        }
        elseif ($uri === '/zoulaine/public/index.php/cart/update') {
            require_once '../controleur/CartController.php';
            $controller = new CartController();
            $controller->updateQuantity();
        }
        
         elseif ($uri === '/zoulaine/public/index.php/cart/remove') {
            require_once 'C:/xampp/htdocs/zoulaine/controleur/CartController.php';
            $controller = new CartController();
            $controller->removeFromCart();
        } elseif ($uri === '/zoulaine/public/index.php/checkout') {
            require_once 'C:/xampp/htdocs/zoulaine/controleur/CartController.php';
            $controller = new CartController();
            $controller->checkout();
        } 
        elseif ($uri === '/zoulaine/public/index.php/' || $uri === '/zoulaine/public/') {
            require_once '../Vue/home.php';
        } elseif ($uri === '/zoulaine/public/index.php/products') {
            require_once 'C:/xampp/htdocs/zoulaine/controleur/ProductController.php';
            $controller = new ProductController();
            $controller->showAllProducts();
        }elseif ($uri === '/zoulaine/public/index.php/admin/dashboard') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->showDashboard();
        } elseif ($uri === '/zoulaine/public/index.php/admin/users') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->manageUsers();
        } elseif ($uri === '/zoulaine/public/index.php/admin/products') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->manageProducts();
        }elseif ($uri === '/zoulaine/public/index.php/admin/products/add') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->addProduct();
        } elseif ($uri === '/zoulaine/public/index.php/admin/products/edit') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->editProduct();
        } elseif ($uri === '/zoulaine/public/index.php/admin/products/delete') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->deleteProduct();
        }
        
        elseif ($uri === '/zoulaine/public/index.php/admin/orders') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->manageOrders();
        }elseif ($uri === '/zoulaine/public/index.php/admin/orders/add') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->createOrder();
        } elseif ($uri === '/zoulaine/public/index.php/admin/orders/edit') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->updateOrder();
        } elseif ($uri === '/zoulaine/public/index.php/admin/orders/delete') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->deleteOrder();
        } elseif ($uri === '/zoulaine/public/index.php/admin/orders') {
            if (!isset($_SESSION['admin_id'])) {
                header('Location: /zoulaine/public/index.php/login');
                exit();
            }
            require_once '../controleur/AdminController.php';
            $controller = new AdminController();
            $controller->manageOrders();
        }
        
         else {
            http_response_code(404);
            echo "404 - Page non trouvée";
        }

       
        
    }
}
