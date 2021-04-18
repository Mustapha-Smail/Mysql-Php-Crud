<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="home.php"><img src="images/logo.png" alt="logo" width="100%" /></a>
        <a class="add-button" href="add.html"><i class="fa fa-plus-square"></i></a>
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
    </nav>

    <form action="search.php" method="post">
        <div class="input-group mb-3 search-bar">
            <input type="text" class="form-control" autocomplete="off"
                placeholder="Rechercher un individu (par son nom)" name="nom">
            <div class="input-group-append">
                <button class="btn btn-primary search" type="submit">Rechercher</button>
            </div>
        </div>
    </form>

    <form id="filter-form" class="filter-form" action="" method="get">
        <button type="button" id="dropbtn" onmouseover="document.getElementById('filter').style.display = 'block'; ">
            <i class="fa fa-filter" style="font-size:20px"></i>  Filtre
        </button>
        <br>
        <select class="select form-select" multiple aria-label="multiple select example" name="filter" id="filter" onchange="this.form.submit()">
            <option value="id">ID</option>
            <option value="nom" selected>Nom</option>
            <option value="prenom">Prénom</option>
            <option value="mail">Mail</option>
            <option value="telephone">Téléphone</option>
        </select>
    </form>

    <div class="container">
        <table id="data-table" class="table table-striped text-center" style="width:100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'database.php'; /*on inclut notre fichier de connection*/
                $filter = "nom"; 
                if (!empty($_GET['filter'])) { 
                    $filter = $_REQUEST['filter'];
                }
                $pdo = Database::connect(); /*on se connecte à la base */
                $sql = "SELECT * FROM individu ORDER BY $filter ASC"; /*on formule notre requete*/
                foreach ($pdo->query($sql) as $row) { //on cree les lignes du tableau avec chaque valeur retournée
                    echo'<tr>'; 
                    echo '<td>
                        <a class="btn btn-danger" href="delete.php?id=' . $row['id'] . ' "><i class="fa fa-trash" ></i></a>
                        <a class="btn btn-warning" href="edit.php?id=' . $row['id'] . '"><i class="fa fa-pencil" ></i></a>
                    </td>'; 
                    echo'<td>' . $row['id'] . '</td>';
                    echo'<td>' . $row['nom'] . '</td>';
                    echo'<td>' . $row['prenom'] . '</td>';
                    echo'<td>' . $row['mail'] . '</td>';
                    echo'<td>' . $row['telephone'] . '</td>';
                    echo '</tr>';
                }
                Database::disconnect(); //on se deconnecte de la base

            ?>
            </tbody>
        </table>
    </div>
    <footer>
        <p>Copyright ⓒ 2021 - <span style="font-size: 10px">SMAIL Mustapha</span></p>

    </footer>

    <script type="text/javascript">
        document.getElementById('filter').value = "<?php echo $_GET['filter'];?>";
        window.addEventListener('click', (evt)=>{
            if(evt !=  document.getElementById('filter')){
                document.getElementById('filter').style.display = "none"; 
            }
        }); 
    </script>
    
</body>

</html>