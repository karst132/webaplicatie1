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
    if(isset($_POST['maak']) && isset($_SESSION['naam'])){
        $titel = $_POST['titel'];
        $omschrijving = $_POST['beschrijving'];
        $prijs = ($_POST['prijs']/100);
        $add = $dbh->prepare("INSERT INTO menu_test(titel,beschrijving,prijs) VALUES (?,?,?)");
        $add->execute(array($titel, $omschrijving, $prijs));
    }
    ?>
    <header>
        <h1>Toevoegen</h1>
    </header>
    <main>
        <div class="col"> 
            <form method="post" action="add.php">
                <div class="col">
                    Titel
                    <input type="text" name="titel">
                    Beschrijving
                    <textarea class="text-input" type="text" name="beschrijving"></textarea>
                    Prijs in centen
                    <input type="number" name="prijs">
                    <input type="submit" name="maak" value="Maak">
                </div>
            </form>
            <a href="index.php" class="blue-text">Terug</a>
        </div>
    </main>
</body>
</html>