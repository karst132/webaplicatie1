<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="menukaart.css">
    <title>Document</title>
</head>
<body>
    <?php
    $dsn = 'mysql:dbname=test;host=127.0.0.1';
    $user = 'root';
    $password = '';
    $dbh = new PDO($dsn, $user, $password);
    $id = $_GET['id'];
    if(isset($_POST['wijzig']) && isset($_SESSION['naam'])){
        $titel = $_POST['titel'];
        $updatetitel = $dbh->prepare("UPDATE menu_test SET titel = (?) WHERE id =$id");
        $updatetitel->execute(array ($titel));
        $omschrijving = $_POST['beschrijving'];
        $updatebeschrijving = $dbh->prepare("UPDATE menu_test SET beschrijving = (?) WHERE id =$id");
        $updatebeschrijving->execute(array ($omschrijving));
        $prijs = ($_POST['prijs']/100);
        $updateprijs = $dbh->prepare("UPDATE menu_test SET prijs = (?) WHERE id =$id");
        $updateprijs->execute(array ($prijs));
    }
    if(isset($_POST['verwijder']) && isset($_SESSION['naam'])){
        $dbh->query("DELETE FROM menu_test WHERE id =$id");
        header("Location: index.php");
    }
    $statement = $dbh->query("SELECT * FROM menu_test WHERE id = $id");
    $menuItem = $statement->fetch();
    ?>
    <header>
        <h1>Bewerken</h1>
    </header>
    <main>
        <div class="col"> 
            <form method="post" action="edit.php?id=<?php echo $id ?>">
                <div class="col">
                    Titel
                    <input type="text" name="titel" value="<?php echo $menuItem['titel'] ?>">
                    Beschrijving
                    <textarea class="text-input" type="text" name="beschrijving"><?php echo $menuItem['beschrijving'] ?></textarea>
                    Prijs in centen
                    <input type="number" name="prijs" value="<?php echo ($menuItem['prijs']*100) ?>">
                    <input type="submit" name="wijzig" value="Wijzig">
                    <input type="submit" name="verwijder" value="Verwijder">
                </div>
            </form>
            <a href="index.php" class="blue-text">Terug</a>
        </div>
    </main>
</body>
</html>