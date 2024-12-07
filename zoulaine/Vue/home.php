<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - E-Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personnalisé -->
    <style>
        /* Couleurs principales */
        :root {
            --primary-color: #4CAF50;
            --secondary-color: #333;
            --background-color: #f8f9fa;
            --footer-bg: #343a40;
            --footer-text: #ffffff;
        }

        body {
            background-color: var(--background-color);
            font-family: 'Arial', sans-serif;
        }

  

        /* Carrousel */
        .carousel-caption h1 {
            font-size: 2.5rem;
            font-weight: bold;
        }

        .carousel-caption p {
            font-size: 1.2rem;
        }

        .carousel .btn {
            background-color: var(--primary-color);
            color: white;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 30px;
        }

        .carousel .btn:hover {
            background-color: #45a049;
        }

        /* Catégories */
        .category-card {
            background-color: white;
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .category-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .category-card img {
            height: 150px;
            object-fit: cover;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

      
    </style>
</head>
<body>
<?php
   include "C:/xampp/htdocs/zoulaine/Vue/partials/nav.php"
   ?>
    
    <!-- Carrousel -->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://th.bing.com/th/id/OIP.bTy48etGl37WlfBPdpsIQgHaEK?w=315&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" height="500px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Bienvenue sur E-Shop</h1>
                    <p>Découvrez les derniers téléphones et accessoires au meilleur prix.</p>
                    <a href="/zoulaine/public/index.php/products" class="btn">Voir les Produits</a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://th.bing.com/th/id/OIP.bxvNOmQHmPchiOwqxQXDWAHaEK?w=306&h=180&c=7&r=0&o=5&dpr=1.3&pid=1.7" height="500px" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Des Offres Exclusives</h1>
                    <p>Profitez de réductions incroyables sur vos marques préférées.</p>
                    <a href="/zoulaine/public/index.php/products" class="btn">Voir les Offres</a>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Précédent</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Suivant</span>
        </button>
    </div>

    <!-- Catégories -->
    <div class="container my-5">
    <h2 class="text-center mb-4">Nos Catégories</h2>
    <div class="row">
        <div class="col-md-4 mb-4">
            <a href="<?= isset($_SESSION['user_id']) ? '/zoulaine/public/index.php/products?category=Smartphones' : '/zoulaine/public/index.php/auth' ?>" class="text-decoration-none">
                <div class="category-card">
                    <img src="https://th.bing.com/th/id/OIP.qPpKvAWI8RfJyQ6ChOKclwHaFj?w=241&h=181&c=7&r=0&o=5&dpr=1.3&pid=1.7" height="100px" alt="Smartphones" class="w-100">
                    <div class="p-3 text-center">
                        <h5>Smartphones</h5>
                        <p>Découvrez nos derniers modèles.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="<?= isset($_SESSION['user_id']) ? '/zoulaine/public/index.php/products?category=Accessoires' : '/zoulaine/public/index.php/auth' ?>" class="text-decoration-none">
                <div class="category-card">
                    <img src="https://th.bing.com/th/id/OIP.hQAvpWdS4XmLVIqk-NN69wHaFS?rs=1&pid=ImgDetMain" alt="Accessoires" class="w-100">
                    <div class="p-3 text-center">
                        <h5>Accessoires</h5>
                        <p>Protégez et améliorez votre téléphone.</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-md-4 mb-4">
            <a href="<?= isset($_SESSION['user_id']) ? '/zoulaine/public/index.php/products?category=Offres Spéciales' : '/zoulaine/public/index.php/auth' ?>" class="text-decoration-none">
                <div class="category-card">
                    <img src="https://static.rfstat.com/mockup-maker/pack/118/slider-images/1034/08995cc547ad/2x.jpeg" alt="Offres spéciales" class="w-100">
                    <div class="p-3 text-center">
                        <h5>Offres Spéciales</h5>
                        <p>Ne manquez pas nos promotions.</p>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

    

    <?php
   include "C:/xampp/htdocs/zoulaine/Vue/partials/footer.php"
   ?>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
