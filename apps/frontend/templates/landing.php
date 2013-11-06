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
    <body>
      <div class="navbar-wrapper">
        <div class="container">

          <div class="navbar">
            <div class="navbar-inner">
              <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="brand" href="#"><?php echo image_tag("bululu.png") ?></a>
              <div class="nav-collapse">
                <div class="pull-right">
                  <a href="<?php echo url_for('sf_guard_register') ?>" data-toggle="modal" class="btn btn-link">Sign up</a> 
                  <a href="#login" data-toggle="modal" class="btn">Sign in</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <?php $images = array("01.jpg", "02.jpg", "03.jpg") ?>
      <div id="myCarousel" class="carousel slide">
        <div class="carousel-inner">
          <div class="item active">
            <?php echo image_tag("carousel/" . $images[rand(0,2)]) ?>
            <div class="container">
              <div class="carousel-caption">
                <h1>Venezuelans abroad</h1>
                <p class="lead">Establish a network among Venezuelans to enhance and establish new links, strengthen your cultural identity and find opportunities to promote your professional development, work online or start a business anywhere in the world.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php echo $sf_content ?>
      <?php include_javascripts() ?>
    </body>
    </html>
