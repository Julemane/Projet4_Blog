<header>
  <h1>Un billet pour l'Alaska par Jean Forteroche</h1>
  <!--Menu de navigation-->
  <nav>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <?php
      if(isset($_SESSION['userLevel']) && $_SESSION['userLevel'] == 'admin'){
      ?>
      <li><a href="index.php?action=admin">Administration</a></li>
      <?php
      }
      ?>


    </ul>

  </nav>

</header>

