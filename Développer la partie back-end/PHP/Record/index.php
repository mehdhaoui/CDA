<!--inclusion du header-->
<?php include 'common/header.php';?>
<body>
<div class="container-fluid"> <!-- se ferme au pied de page -->
    <!-- navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="index.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="artist.php">Artist</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="disc.php">Disc</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Signup/signup.php">Signup</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login/login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Login/logout.php">Log out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <h class="fs-1">Evaluation PHP</h>

    <footer>

    </footer>
    </div> <!-- div container -->
<!-- inclusion du footer -->
<?php include 'common/footer.php';?>
</body>
