<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CSS personnalisé -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }

        .auth-container {
            max-width: 500px;
            margin: 50px auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .auth-header {
            background-color: #4CAF50;
            color: white;
            text-align: center;
            padding: 20px;
        }

        .auth-header h1 {
            font-size: 1.8rem;
            margin: 0;
        }

        .toggle-buttons {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }

        .toggle-buttons button {
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s, color 0.3s;
        }

        .toggle-buttons button.active {
            background-color: #4CAF50;
            color: white;
        }

        .toggle-buttons button:not(.active) {
            background-color: #f1f1f1;
            color: #4CAF50;
        }

        .form-container {
            padding: 20px;
        }

        .form-container form {
            display: none;
        }

        .form-container form.active {
            display: block;
        }

        .form-control {
            margin-bottom: 15px;
        }

        .btn-submit {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #45a049;
        }

        .helper-text {
            text-align: center;
            margin-top: 15px;
        }

        .helper-text a {
            color: #4CAF50;
            text-decoration: none;
        }

        .helper-text a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="auth-container">
        <!-- Header -->
        <div class="auth-header">
            <h1>Bienvenue</h1>
        </div>

        <!-- Toggle buttons -->
        <div class="toggle-buttons">
            <button id="btn-login" class="active">Connexion</button>
            <button id="btn-register">Inscription</button>
        </div>

        <!-- Forms -->
        <div class="form-container">
            <!-- Login Form -->
            <form id="login-form" class="active" method="POST" action="/zoulaine/public/index.php/authenticate">
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                <button type="submit" class="btn-submit">Se connecter</button>
            </form>

            <!-- Register Form -->
            <form id="register-form" method="POST" action="/zoulaine/public/index.php/registerUser">
                <input type="text" name="name" class="form-control" placeholder="Nom complet" required>
                <input type="email" name="email" class="form-control" placeholder="Email" required>
                <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
                <input type="text" name="phone" class="form-control" placeholder="Téléphone" required>
                <textarea name="address" class="form-control" placeholder="Adresse" rows="3" required></textarea>
                <button type="submit" class="btn-submit">S'inscrire</button>
            </form>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        const btnLogin = document.getElementById('btn-login');
        const btnRegister = document.getElementById('btn-register');
        const loginForm = document.getElementById('login-form');
        const registerForm = document.getElementById('register-form');

        btnLogin.addEventListener('click', () => {
            btnLogin.classList.add('active');
            btnRegister.classList.remove('active');
            loginForm.classList.add('active');
            registerForm.classList.remove('active');
        });

        btnRegister.addEventListener('click', () => {
            btnRegister.classList.add('active');
            btnLogin.classList.remove('active');
            registerForm.classList.add('active');
            loginForm.classList.remove('active');
        });
    </script>
</body>
</html>
