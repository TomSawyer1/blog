<nav class="navbar navbar-light navbar-expand-lg" style="background-color:#e3f2fd;" data-bs-theme="dark" id="maNav">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= URL ?>index.php">Blog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between align-items-center" id="navbarNav">
            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= URL ?>inscription.php">Inscription</a>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>login.php">Login</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>ajt-articles.php">Ajouter un article</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?= URL ?>logout.php">Déconnexion</a>
                </li>


            </ul>
        </div>
    </div>
</nav>