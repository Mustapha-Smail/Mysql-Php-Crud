<?php require 'database.php';
  $id=0;
  if (!empty($_GET['id'])) {
      $id=$_REQUEST['id'];
  }
  if (!empty($_POST)) {
      $id= $_POST['id'];
      $pdo=Database::connect();
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $sql = "DELETE FROM individu WHERE id = ?";
      $q = $pdo->prepare($sql);
      $q->execute(array($id));
      Database::disconnect();
      header("Location: data-table.php");
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="home.php"><img src="images/logo.png" alt="logo" width="100%" /></a>
    <a class="add-button" href="add.html" ><i class="fa fa-plus-square"></i></a>
</nav>
<div class="container text-center body-delete">
    <form action="delete.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id;?>" />
        <h2>Voulez-vous vraiment supprimer ? </h2>
        <div class="form-actions">
            <button type="submit" class="btn btn-danger">OUI</button>
            <a class="btn" href="data-table.php">NON</a>
        </div>
    </form>
</div>

<footer>
    <p>Copyright ⓒ 2021 - <span style="font-size: 10px">SMAIL Mustapha</span></p>
</footer>


</body>
</html>