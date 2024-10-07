<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="public/css/style.css">
    <title><?= $title ?></title>
</head>
<body>
    <div id="wrapper" class="uk-container uk-container-expand">
        <header>
            <div>
                Logo
            </div>
            <ul class="navbar">
                <li><a href="index.php?action=accueil">Home</a></li>
                <li><a href="index.php?action=listFilms">Films</a></li>
                <li><a href="index.php?action=listActeurs">Actors</a></li>
                <li><a href="index.php?action=listDirectors">Directors</a></li>
            </ul>
        </header>
        <main>
            <div id="contenu">
                <?= $contenu ?>
            </div>
        </main>
    </div>
</body>