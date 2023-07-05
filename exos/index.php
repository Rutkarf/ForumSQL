<? session_start() ?>

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
                    <a class="nav-link " href="<?= BASE_PATH.'topics.php' ?>">Voir tous les topics</a>
                </li>
            </ul>
            <div class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
                <a href="<?= BASE_PATH.'topic.php' ?>" class="href">
                <span  class="btn btn-outline-success" type="submit">Creer un nouveau topic</button>
              </a>
</div>
        </div>
        </div>
    </div>
</nav>

<h2>Mise en place du projet forum</h2>
<p>Notre client souhaite la création ,par notre équipe, de son forum devTech le montage de sa base de donnée. Il nous explique qu'il a besoin d'une simple authentification par Pseudo. Que ses utilisateur peuvent créer un topic en liens avec plusieurs catégories que nous qualifiront de tag. Une fois le topic créé, il souhaite que tout utilisateur puisse y participer</p>

<h3>Identifier les différentes tables</h3>
<ol>
    <li>User: id (AI), pseudo (Varchar 20), picture_profil (varchar 50), password (varchar 70)</li>
    <li>Topic: id (AI), title (Varchar 70), id_user(int)</li>
    <li>Message: id (AI), content (LongText), publish_date (dateTime), id_topic(int),id_user(int) </li>
    <li>Category: id(AI), title (Varchar 20)</li>
    <li>Topic_category: id(AI), id_topic (int), id_category(int)</li>
</ol>

<h4>Exo 1 : Créer cette BDD devtech</h4>

<h3>Exo 2: Inscription / connexion</h3>
<h4>Partie 1 : Créer les formulaires</h4>
<p>Ajouter les bouton inscription et connexion envoyant sur une page authentication.php qui contiendra les 2 formulaires.</p>
<p>Ainsi il va faloir déclarer un passage en get qui sera receptionné dans la superglobale $_GET.
    Rappel: <a href="mapage.php?1ereClé=1erevaleur&2ndeClé=2ndevaleur"></a>  qui sera receptionné dans $_GET sous la forme ['1erarg'=>'1erevaleur', '2ndarg'=>'2ndevaleur' ]. Pour accéder à la 1ereValeur il nous faut donc appeler echo $_GET['1ereClé'].  Ensuite créez les formulaires parametrés pour être opérationnels. (rappel: un formulaire doit avoir une méthode, les inputs un name, un enctype si le formulaire contient un input type file et enfin un button type submit). Enfin gérer la condition d'apparition d'un formulaire ou de l'autre grace à $_GET </p>

<h3>Exo 4: afficher les infos de l'utilisateur connecté grace à $_SESSION</h3>
<p>A la condition que l'utilisateur soit chargé en session afficher ses informations de profil: pseudo et photo </p>

<?php if (isset($_SESSION['users']) && !empty($_SESSION['user'])): ?>
    <h4>Pseudo: <?= $_SESSION['user']['pseudo'] ; ?></h4>
    <img src="<?= $_SESSION['user']['picture_profil'] ; ?>" width="200" alt="">
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>