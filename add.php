<?php require 'database.php';

 if ($_SERVER["REQUEST_METHOD"]== "POST" && !empty($_POST)) {

    /* on recupère nos valeurs*/
    $nom = htmlentities(trim($_POST['nom']));
    $prenom=htmlentities(trim($_POST['prenom']));
    $mail = htmlentities(trim($_POST['mail']));
    $telephone=htmlentities(trim($_POST['telephone']));

    $pdo = Database::connect();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO individu(nom, prenom, mail, telephone) values(?, ?, ?, ?)";
    $q = $pdo->prepare($sql);
    try {
        $q->execute(array($nom, $prenom, $mail, $telephone));
    } catch (PDOException $e) {
    echo '<META http-equiv="refresh" content="0.5; URL=add.html">';
    die('<script type="text/javascript">
        alert("L\'adresse email ou/et Le numéro de téléphone existe(nt) déjà!");
        </script>'
    );
    }
    
    Database::disconnect();
    header("Location: data-table.php");
 }

?>