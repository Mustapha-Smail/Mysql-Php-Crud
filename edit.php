<?php require('database.php'); 
    $id = null;
    if (!empty($_GET['id'])) { $id = $_REQUEST['id']; }
    if (null == $id) { header("location:data-table.php"); }
    else { 
        $pdo = Database ::connect();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM individu where id =?";
        $q = $pdo->prepare($sql);
        $q->execute(array($id));
        $data = $q->fetch(PDO::FETCH_ASSOC);
        Database::disconnect();
    }
?>

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
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <title>Document</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="home.php"><img src="images/logo.png" alt="logo" width="100%" /></a>
    <a class="add-button" href="add.html" ><i class="fa fa-plus-square"></i></a>
    </nav>
    <div class="container">
        <h1>Modifier les informations de <br> M.me <?php echo $data['nom'] .' '. $data['prenom']?></h1>
        <div class="form-container">
        <form id="add-form" action="update.php" method="post">
            <div class="mb-3">
            <label for="nom" class="form-label">Nom*</label>
            <input type="text" class="form-control" value = <?php echo $data['nom'] ?> name="nom" required readonly style="cursor: not-allowed;">
            </div>
            <div class="mb-3">
            <label for="prenom" class="form-label">Prénom*</label>
            <input type="text" class="form-control" value = <?php echo $data['prenom'] ?> name="prenom" required readonly style="cursor: not-allowed;">
            </div>
            <div class="mb-3">
            <label for="mail" class="form-label">Adresse Email*</label>
            <input type="email" id="mail" class="form-control" value = <?php echo $data['mail'] ?> name="mail" aria-describedby="emailHelp" required>
            </div>
            <div class="mb-3">
            <label for="telephone" class="form-label">Numéro de Téléphone*</label>
            <input type="text" id="telephone" class="form-control" value = <?php echo $data['telephone'] ?> name="telephone" required>
            </div>
            <small class="form-text text-muted">* Obligatoire</small><br /><br />
            <input type="hidden" name="id" value = <?php echo $data['id'] ?>>

            <div id="submit-btn" class="btn btn-primary">Modifier</div>
            <div class="btn"><a href="data-table.php" class="retour">Retour</a></div>
        </form>
        </div>
    </div> 
    <footer>
    <p>Copyright ⓒ 2021 - <span style="font-size: 10px">SMAIL Mustapha</span></p>

    </footer>

    <script src="add.js"></script>
</body>
</html>