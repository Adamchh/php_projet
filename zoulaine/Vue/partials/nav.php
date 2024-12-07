
    <style>
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #333;
            --background-color: #f8f9fa;
            --footer-bg: #343a40;
            --footer-text: #ffffff;
        }


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
    </style>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
        <a class="navbar-brand" href="/zoulaine/public/index.php/">
                <i class="fas fa-mobile-alt"></i> E-Shop
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/zoulaine/public/index.php/products">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/zoulaine/public/index.php/cart">Mon Panier</a>
                    </li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                    <li class="nav-item"><a class="nav-link" href="/zoulaine/public/index.php/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-register" href="/zoulaine/public/index.php/auth">S'inscrire / Se connecter</a>
                    </li>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </nav>
