<header>
  <h1>Un billet pour l'Alaska par Jean Forteroche</h1>
  <!--Menu de navigation-->
  <nav>

  </nav>
  <section id="login">
    <h4>Connexion</h4>
    <form action="index.php?action=login" method="post">
              <label>Pseudo
                <input type="text" name="userNickname">
              </label>
              <label>Mot de passe
                <input type="password" name="userPassword">
              </label>
              <input type="submit" value="Se connecter">
            </form>
  </section>
  <section id="register">
    <h4>Creation de compte</h4>
    <form action="index.php?action=newUser" method="post">
              <label>Votre pseudo
                <input type="text" name="nickname">
              </label>
              <label>Votre Email
                <input type="mail" name="mail">
              </label>
              <label>Votre mot de passe
                <input type="password" name="password">
              </label>
               <input type="submit" value="Creer mon compte">
    </form>



  </section>
</header>

