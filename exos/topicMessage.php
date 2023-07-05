<?php require_once 'config/function.php'; 
// var_dump($_GET);die();
$affichageTopic=execute("SELECT * FROM topic WHERE id =:id", array(
    ':id'=>$_GET["topic_id"]
))->fetch(PDO::FETCH_ASSOC);
// var_dump($affichageTopic);die()
if (!empty($_POST['textarea'])) {
    // var_dump($_GET);die();
    $addTextArea = execute ("INSERT INTO message (content ,publish_date ,id_topic) VALUES (:content, NOW(), :id_topic)" ,array(
          ':content'=>$_POST['textarea'], 
          ':id_topic'=>$_GET['topic_id']
    ));
}
$affichageMessage = execute("INSERT INTO message (content) VALUES (:content)", array(
    ':content' => $_POST['textarea']
));


?>


<!doctype html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Topic</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASE_PATH; ?>">Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="<?= BASE_PATH.'category.php';?>"> Gestion
                            Catégorie </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link"
                            href="<?=  BASE_PATH.'authentification.php?action=register'; ?>">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=  BASE_PATH.'authentification.php?action=login'; ?>">Connexion</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
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
                        <span class="btn btn-outline-success" type="submit">Creer un nouveau topic</button>
                    </a>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <h1><?php echo $affichageTopic['title'];?></h1>

    <?php
$tags = execute("SELECT c.title FROM category c INNER JOIN topic_category tc ON c.id=tc.id_category WHERE tc.id_topic=$affichageTopic[id]")->fetchAll(PDO::FETCH_ASSOC);
//  var_dump($tags);
?>
    <?php foreach ($tags as $tag): ?>
    <button class="m-1 btn btn-secondary"><?= $tag['title']; ?></button>
    <?php endforeach; ?>


    <form action="" method="POST">
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Textarea</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="textarea" rows="3" placeholder="Veuillez entrer l'explication de votre problème"></textarea>
    </div>
    <button type="submit" class="btn btn-success">Success</button>
</form>

<p><?php echo $affichageMessage['textarea'];?></p>