 <!--Espace de login-->
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
      <span id="authInfo">
      <?php
        if(isset($authInfo)){
          echo $authInfo;
          //On propose de créer un compte si jamais l'user n'en à pas
          include('accountCreation.php');
      ?>
        <p><a href="index.php">Retour à l'accueil</a></p>
      <?php
        }
      ?>
      </span>

  </section>
