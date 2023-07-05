<?php require_once 'config/function.php'

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
    <title>Document</title>
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

    <h1>Gestion Catégories</h1>



    <?php  

   if (!empty($_POST)){



 if (empty($_POST['title'])) {
            $error['title']='title obligatoire';
    
        }else{



 if(empty($_POST['id'])){

execute("INSERT INTO category (title) VALUES (:1) ",array(

           ':1'=>$_POST['title']

           ));

 }else{

execute("UPDATE category SET title=:title WHERE id=:id", array(
  ':title'=>$_POST['title'],
  ':id'=>$_POST['id'],
));

 }
           



        }



// var_dump($_POST);

}
$categorys=execute("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);

//var_dump($categorys);

// var_dump($_GET);

if (isset($_GET['action']) && $_GET['action'] == 'update' && $_GET['id'] ) {
$category= execute("SELECT * FROM category WHERE id=:id", array(':id'=>$_GET['id']))->fetch(PDO::FETCH_ASSOC);

// var_dump($category);

}else{


}

 if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
// var_dump($_GET['id']);die();
  $id = $_GET['id'];
  execute("DELETE FROM category WHERE id=:id", array(':id' => $id));
}
    
?>

    <form class="w-50 mx-auto mt-5" method="POST" action="">
        <div class="form-group">
            <label for="title" class="form-label">Titre</label>
            <input type="text" name="title" id="title" value="<?= $category['title'] ?? '';?>">
            <small class="text-danger"><?php echo $error['title'] ?? ''; ?></small>
        </div>
        <input type="hidden" name="id" value="<?= $category['id']?? ''; ?>">
        <button class="btn btn-primary mt-3" type="submit">Enregistrer</button>
    </form>



    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">TITLE</th>
                <th scope="col">UPDATE</th>
                <th scope="col">DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($categorys as $category):?><tr>
                <td><?php echo $category['id'];?></td>
                <td><?php echo $category['title'];?></td>
                <td><a href="?action=update&id=<?=$category['id']; ?>" class="btn btn-info">Update</a></td>
                <td><a href="?action=delete&id=<?=$category['id']; ?>" class="btn btn-danger">Delete</a></td>
            </tr><?php endforeach;?>
        </tbody>
    </table>









</body>

</html>