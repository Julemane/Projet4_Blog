<header>
  <h1>Un billet pour l'Alaska par Jean Forteroche</h1>
  <!--Menu de navigation-->
  <nav>

  </nav>


  <section id="login">
    <h4>Connexion</h4>
    <form action="index.php?action=login" method="post">
              <label>Pseudo
                <input type="text" name="userNickname" required>
              </label>
              <label>Mot de passe
                <input type="password" name="userPassword" required>
              </label>
              <input type="submit" value="Se connecter">
            </form>
  </section>
  <section id="register">
    <p>Pas encore de compte ?</p>
    <a href="index.php?action=creationUser">Creer un compte</a>
  </section>
   <?php
    if (isset($_SESSION['nickname']))
    {
      echo 'Bienvenue'.' '.$_SESSION['nickname'];
    }

  ?>
</header>

