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
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url('');?>">Accueil</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="<?=site_url('blog');?>">Blog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('contact');?>">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('apropos');?>">A propos</a>
          </li>
        </ul>
        <ul class="navbar-nav justify-content-end">
          <?php if(! $this->Auth_user->is_connected) : ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('connexion');?>">Connexion</a>
          </li>
          <?php else: ?>
          <li class="nav-item">
            <a class="nav-link" href="<?=site_url('user_pages')?>" >Control Panel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#" >Bonjour <?= $this->Auth_user->username; ?> | </a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="<?=site_url('deconnexion');?>">Déconnexion</a>
          </li>
          <?php endif; ?>
        </ul>
    </nav>

