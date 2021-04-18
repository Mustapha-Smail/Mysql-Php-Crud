<?php require('database.php'); 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST)) {
        $id = htmlentities(trim($_POST['id'])); 
        $nom = htmlentities(trim($_POST['nom']));
        $prenom=htmlentities(trim($_POST['prenom']));
        $mail = htmlentities(trim($_POST['mail']));
        $telephone=htmlentities(trim($_POST['telephone']));

        $pdo = Database::connect(); 
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             
        $sql = "UPDATE individu SET nom = ?,prenom = ?,mail = ?,telephone = ? WHERE id = ?";
        $q = $pdo->prepare($sql);
        try {
            $q->execute(array($nom, $prenom, $mail, $telephone, $id));
        } catch (PDOException $e) {
            echo "<META http-equiv='refresh' content='0.5; URL=edit.php?id=$id'>";
            die(
                "<script type='text/javascript'>
                    alert('Erreur dans la modification de $nom $prenom');
                </script>"
            );
        
        }

        Database::disconnect();
        header("Location: data-table.php");
    }
?>