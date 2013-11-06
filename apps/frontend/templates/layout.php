<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
  <?php include_http_metas() ?>
  <?php include_metas() ?>
  <?php include_title() ?>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" href="/favicon.ico" />
  
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
      <![endif]-->
      <!-- Fav and touch icons
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="../assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="../assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="../assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="../assets/ico/apple-touch-icon-57-precomposed.png">
        <link rel="shortcut icon" href="../assets/ico/favicon.png">
      -->
      <?php include_stylesheets() ?>

    </head>
    <body class="pt80">
      <div class="navbar navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="<?php echo url_for("home") ?>"><?php echo image_tag("bululu.png") ?></a>
            <div class="nav-collapse">
              <div class="pull-right">
                <?php if($sf_user->isAuthenticated()) : ?>
                <a href="<?php echo url_for('sf_guard_register') ?>" data-toggle="modal" class="btn btn-link lh40">Registrate</a> 
                <a href="#login" data-toggle="modal" class="btn">Entrar</a>
              <?php else: ?>
                <?php echo image_tag("no-avatar.png", array('width' => "60px")); ?>
                <a href="<?php echo url_for("home") ?>" class="btn btn-link">Armando Esteban Quito</a>
              <?php endif ?>
              </div>
              <ul class="nav pull-right">
                <li>
                  <?php echo link_to("Personas", "personasList")?>
                </li>
                <li>
                  <?php echo link_to("El Bululú", "comunidadesList")?>
                </li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row-fluid">
          <?php echo $sf_content ?>
        </div>
      </div>
      <?php include_component("sfGuardAuth", "loginModal") ?>
      <?php include_javascripts() ?>
    </body>
    </html>
