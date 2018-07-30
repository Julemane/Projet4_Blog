<!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <a class="navbar-brand" href="#"><?php echo SITE_NAME; ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Accueil
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li><a class="nav-link" href="index.php?action=creationUser">Créer un compte</a></li>
            <?php
            if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
            ?>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=admin">Administration</a>
              </li>
              <?php
             }
            ?>
          </ul>
        </div>
      </div>
    </nav>




