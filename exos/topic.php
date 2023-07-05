<?php require_once 'config/function.php';


if(!empty($_POST)){
    // var_dump($_POST);
    if (empty($_POST['id'])) {
  $LastID   =   execute("INSERT INTO topic (title) VALUES (:titre)", array(
            ':titre' => $_POST['titre']
        ),'last');


// var_dump($_POST);die();
foreach($_POST['category']as $id_categorie){
    $result = execute("INSERT INTO topic_category (id_topic ,id_category) VALUES (:id_topic, :id_category)" ,array(
        ':id_topic'=>$LastID, 
        ':id_category'=>$id_categorie
    ));
  



}
   

}else{



}     
}
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
                    <a class="nav-link " href="<?= BASE_PATH.'topics.php' ?>" >Voir tous les topics</a>
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

    <?php 

$categorys = execute('SELECT * FROM category')->fetchAll(PDO::FETCH_ASSOC); 

// var_dump($categorys)

if($categorys) { ?>

    <form method="POST">
        <div class="form-row">
            <br>
            <div class="form-group col-md-6">
                <label for="inputTitre4">Titre du topic</label>
                <input type="Titre" name="titre" class="form-control" id="inputTitre4" placeholder="Titre">
            </div>
            <br>
            <div class="form-group col-md-6">
                <label for="category">Catégorie du topic:</label>
                <select multiple name="category[]" id="category">
                    <?php foreach ($categorys AS $category) { ?>


                    <option value="<?= $category['id'] ?>"><?= $category['title'] ?></option>


                    <?php    }     ?>



                </select>

            </div>
        </div>
        <br>
        <button class="btn btn-outline-success" type="submit">Creer un nouveau topic</button>
    </form>











    <?php } ?>