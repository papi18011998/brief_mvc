<?php
session_start();
if(!isset($_SESSION['user_connected'])){
    header('location:../connexion');
}
?>
<!Doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Liste des entreprises</title>
    <link rel="stylesheet" href="style" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<div class="d-flex justify-content-between border" >
    <a href="../utilisateurs/add_organisation" class="btn btn-success">Ajouter une nouvelle organisation</a>
    <a href="../utilisateurs/logout" class="btn btn-danger">Déconnexion</a>
</div>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Nom de l'entreprise</th>
      <th scope="col">Ninea</th>
      <th scope="col">Registre de commerce</th>
      <th scope="col">Date de creation</th>
      <th scope="col">Site Web</th>
      <th scope="col">Organigramme</th>
      <th scope="col">Prenom et nom Repondant</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php
      foreach($_SESSION['all'] as $entreprise){?>
        <tr>
            <td><?= $entreprise['nom_entreprise']; ?></td>
            <td><?= $entreprise['ninea']; ?></td>
            <td><?= $entreprise['rccm']; ?></td>
            <td><?= $entreprise['date_creation']; ?></td>
            <td><?= $entreprise['page_web']; ?></td>
            <td><?= $entreprise['organigramme']; ?></td>
            <td><?= $entreprise['prenom_repondant'].' '.$entreprise['nom_repondant']; ?></td>
            <td><a class="btn btn-success" href=<?='update/'.$entreprise['id_entreprise']?> >Modifier</a></td>
            <td><a class="btn btn-danger" href="<?='delete/'.$entreprise['id_entreprise']?>">Supprimer</a></td>
        </tr>
      <?php } ?>

  </tbody>
</table>
</body>
</html>
