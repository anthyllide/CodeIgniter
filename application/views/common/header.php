<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css');?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap-grid.min.css');?>">
  </head>
  <body>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url('');?>">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('contact');?>">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('apropos');?>">A propos</a>
          </li>
        </ul>
        <ul class="navbar-nav justify-content-end">
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('connexion');?>">Connexion</a>
          </li>
        </ul>
    </nav>

