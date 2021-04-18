<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/home-style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="images/logo.png" alt="logo" width="100%" /></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="data-table.php">La Base de Données</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contactez-moi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">À propos</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="header">
        <div class="header-content">
            <center>
                <h1>CONNECT DATA</h1>
                <p>Application web pour créer une base de données d'individus</p>
                <a href="data-table.php" class="btn btn-lg decouvrir">Découvrir</a>
            </center>
        </div>
    </div>
    <br>
    <div>
        <center>
        <h2>
            MINI PROJET PWP
        </h2>
        <p>
            Application web avec une base de données 
        </p>
        </center>
    </div>
    <div class="d-flex justify-content-between">
        <div class="content">
            <center><h2>Schema de la base</h2></center>
            <p>
                 La table individu contient 5 colonnes : ID (clef primaire auto
                incrémentée), NOM (chaine de caractères), PRENOM (chaine de caractères), mail (chaine de
                caractères), téléphone (nombre entier de 10 chiffres) ; Aucun de ces éléments ne peuvent
                être NULL et le mail, le numéro de téléphone (et l’ID) sont uniques.
            </p>
    <pre class="sql">
        CREATE TABLE individu(
            id int NOT NULL AUTO_INCREMENT PRIMARY KEY, 
            nom text(255) NOT NULL, 
            prenom text(255) NOT NULL, 
            mail text(255) NOT NULL, 
            telephone text(255) NOT NULL 
        );

        ALTER TABLE individu 
        ADD CONSTRAINT uniqueMail UNIQUE (mail),
        ADD CONSTRAINT uniqueTelephone UNIQUE (telephone);
    </pre>
        </div>
        <div class="image-container">
            <img src="images/2135-database_management_software.webp" alt="Base de données" style="width:100%">
        </div>
    </div>
    <div class="d-flex justify-content-between">
        <div class="image-container">
            <img src="images/Functionalities-FySelf-1.jpg" alt="Fonctionnalités" class="image" style="width:100%">
        </div>
        <div class="content">
            <center>
                <h2>Fonctionnalités</h2>
            </center>
            <p>
                <ul>
                    <li>Lister dans une data-table la liste des individus</li>
                    <li>Rechercher un individu par son nom</li>
                    <li>Ajouter un nouvel individu</li>
                    <li>Supprimer les données d'un individu</li>
                    <li>Modifier les données d'un individu</li>
                </ul>
            </p>
        </div>
    </div>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-sm">
                    <h1><a href="#"><img src="images/logo.png" alt="logo" width="15%" /></a></h1>
                    <p style="font-size: 16px; ">
                        Mustapha SMAIL <br>
                        40016261 - L2 MIASHS G3 <br>
                        Mini Projet PWP.
                    </p>
                </div>
                <div class="col-sm">
                    <ul>
                        <h3>Quick links</h3>
                        <li class="nav-item">
                            <a class="nav-link" href="data-table.php">La Base de Données</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contactez-moi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">À propos</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm">
                    <h3>Suivez-moi</h3>
                    <p>
                    <a href="https://github.com/Mustapha-Smail" target="_blank" rel="noopener noreferrer"><i class="fa fa-github"></i></a>
                    <a href="https://www.linkedin.com/in/mustapha-smail" target="_blank" rel="noopener noreferrer"><i class="fa fa-linkedin"></i></a>
                    </p>
                </div>
            </div>
        </div>
        <center><p>&copy; Mustapha SMAIL 2021</p></center>
    </footer>
</body>
</html>