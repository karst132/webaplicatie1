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
     if(isset($_POST['wijzig'])){
        $omschrijving = $_POST['beschrijving'];
        $dbh->query("UPDATE menu_test SET beschrijving = '$omschrijving' WHERE id =$id");
    }
    $statement = $dbh->query("SELECT * FROM menu_test WHERE id = $id");
    $menuItem = $statement->fetch();
    ?>
    <header>
        <h1>Bewerken</h1>
    </header>
    <main>
        <div class="col"> 
            <h1><?php echo $menuItem['titel'] ?></h1>
            <form method="post" action="edit.php?id=<?php echo $id ?>">
                <div class="col">
                    <textarea class="text-input" type="text" name="beschrijving"><?php echo $menuItem['beschrijving'] ?></textarea>
                    <input type="submit" name="wijzig" value="Wijzig">
                </div>
            </form>
        </div>
    </main>
</body>
</html>