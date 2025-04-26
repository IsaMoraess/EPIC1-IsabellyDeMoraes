<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Veículos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Sistema de Veículos</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cadastro.php">Cadastro</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Carrossel -->
    <div id="carouselExampleCaptions" class="carousel slide mt-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://assegurou.com.br/blog/wp-content/uploads/2024/05/Lindo-carro-da-MERCEDEZ-1024x564.png" class="d-block w-100" alt="Imagem 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bem-vindo ao Sistema de Veículos</h5>
                    <p>Gerencie seus veículos de forma simples e rápida.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://conceitoideal.com.br/wp-content/uploads/2011/08/register-text-keyboard-button.jpg" class="d-block w-100" alt="Imagem 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Fácil Cadastro</h5>
                    <p>Cadastre seus veículos com poucos cliques.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://images.prismic.io/uplsite/1f4e6ab1-4f86-4c0b-a0bd-fd4117e4a672_Background+Check.jpg?auto=compress,format" class="d-block w-100" alt="Imagem 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Gestão Rápida</h5>
                    <p>Acesse todas as informações de forma intuitiva.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <!-- Conteúdo Principal -->
    <div class="container text-center mt-5">
        <h2>Gerencie seus veículos de forma prática!</h2>
        <p>Cadastre, visualize e mantenha o histórico de manutenções dos seus veículos.</p>
        <a href="login.php" class="btn btn-primary">Login</a>
        <a href="cadastro.php" class="btn btn-success">Cadastro</a>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3 mt-5">
        <p>&copy; 2025 Sistema de Veículos. Todos os direitos reservados.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
