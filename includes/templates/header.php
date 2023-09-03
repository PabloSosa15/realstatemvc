<?php
if(!isset($_SESSION)){
  session_start();
}

$auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Real States</title>
    <link rel="stylesheet" href="/build/css/app.css" />
  </head>
  <body>
    <header class="header <?php echo $start ? 'start' : ''; ?>">
      <div class="container container-header">
        <div class="bar">
          <a href="/index.php">
            <img src="/build/img/logo.svg" alt="Real Estate Logo" />
          </a>
          <div class="mobile-menu">
            <img src="/build/img/barras.svg" alt="icono menu responsive">
          </div>

          <div class="right">
            <img class="dark-mode-button" src="/build/img/dark-mode.svg">
            <nav class="navigation">
              <a href="/about-us.php">About Us</a>
              <a href="/advertisements.php">Advertisements</a>
              <a href="/blog.php">Blog</a>
              <a href="/contact.php">Contact</a>
              <?php if($auth):?>
                <a href="/sign-off.php">Sign off</a>
              <?php endif;?>

            </nav>
          </div>
        </div>
        </div>
    </header>
        <!-- .bar-->
<?php 
  echo $start ? "<h1>Sale of houses and exclusive luxury apartments</h1>" : '';?>

        <!-- /realstate -->