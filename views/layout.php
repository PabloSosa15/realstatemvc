<?php
if(!isset($_SESSION)){
  session_start();
}

$auth = $_SESSION['login'] ?? false;

if(!isset($start)){
  $start = false;
}
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
          <a href="/">
            <img src="/build/img/logo.svg" alt="Real Estate Logo" />
          </a>
          <div class="mobile-menu">
            <img src="/build/img/barras.svg" alt="icono menu responsive">
          </div>

          <div class="right">
            <img class="dark-mode-button" src="/build/img/dark-mode.svg">
            <nav class="navigation">
              <a href="/us">About Us</a>
              <a href="/properties">Advertisements</a>
              <a href="/blog">Blog</a>
              <a href="/contact">Contact</a>
              <?php if($auth):?>
                <a href="/logout">Sign off</a>
              <?php endif;?>
            </nav>
          </div>
        </div>
        
        <?php 
        if($start) {
          echo "<h1>Sale of houses and exclusive luxury apartments</h1>";
          
        }
        ;?>
  
        </div>
    </header>

    <?php echo $content; ?>

        <footer class="footer section"> 
        <div class="container container-footer">
            <a href="/us">About Us</a>
            <a href="/properties">Advertisements</a>
            <a href="/blog">Blog</a>
            <a href="/contact">Contact</a>
        </div>


        <p class="copyright">All rights reserved <?php echo date('Y')?> &copy;</p>

    </footer>
    <script src="/build/js/bundle.min.js"></script>
  </body>
</html>
