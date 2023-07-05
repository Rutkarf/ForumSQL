<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Exos</title>
</head>
<body>
<?php

const BASE_PATH='/exos/';


// var_dump();
// die();






//var_dump($_GET['action']);
//die();

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_PATH; ?>">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="<?= BASE_PATH.'category.php';?>"> Gestion Catégorie </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="<?=  BASE_PATH.'authentification.php?action=register'; ?>">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?=  BASE_PATH.'authentification.php?action=login'; ?>">Connexion</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link " href="<?= BASE_PATH.'topics.php' ?>" tabindex="-1" >Voir tous les topics</a>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <a href="<?= BASE_PATH.'topic.php' ?>" class="href">
                <button  class="btn btn-outline-success" type="submit">Creer un nouveau topic</button>
              </a>
            </form>
        </div>
    </div>
</nav>
<h4>partie 2: traitement du formulaire.</h4>
<p>Le client souhaite que soit dispensé tout message d'erreur si les champs de formulaire ne sont pas saisi et ce de manière individuelle. Ensuite si le formulaire ne contient pas d'erreur passer à l'insertion en BDD en verifiant que le pseudo n'est pas déjà existant en BDD.
rappel: tout traitement de formulaire est sujet à la condition !empty($_POST), le traitement des erreurs se fait via la vérification de chacunes des entrées de notre tableau $_POST avec empty($_POST['name_de_l_input'] si on vérifie un input type file il faudra verifier !isset($_FILES['picture_profil']) empty($_FILES['picture_profil']['name'])</p>



<?php if (!empty($_GET) && isset($_GET['action']) && $_GET['action']=='register'): ?>
<form class="w-50 mx-auto" enctype="multipart/form-data" method="post" action="">
    <div class="form-group">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input name="pseudo" class="form-control" id="pseudo" type="text">
        <small></small>
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Mot de passe</label>
        <input name="password" class="form-control" id="password" type="password">
        <small></small>
    </div>
    <div class="form-group">
        <label for="picture_profil" class="form-label">Photo de profil</label>
        <input name="picture_profil" class="form-control" id="picture_profil" type="file">
        <small></small>
    </div>
    <button type="submit" class="btn btn-primary mt-3">enregistrer</button>


</form>


<?php elseif(!empty($_GET) && isset($_GET['action']) && $_GET['action']=='login'): ?>


<form class="w-50 mx-auto mt-5" method="post" action="">
    <div class="form-group">
        <label for="pseudo" class="form-label">Pseudo</label>
        <input name="pseudo" class="form-control" id="pseudo" type="text">
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Mot de passe</label>
        <input name="password" class="form-control" id="password" type="password">
    </div>
    <button type="submit" class="btn btn-primary mt-3">enregistrer</button>


</form>


<?php endif; ?>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
