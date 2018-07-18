<header>
  <h1>Un billet pour l'Alaska par Jean Forteroche</h1>
  <!--Menu de navigation-->
  <nav>

  </nav>
  <section id="login">
    <p>Connexion</p>
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
    <p>Creation de compte</p>
    <form action="index.php?action=newUser" method="post">
              <label>Pseudo
                <input type="text" name="nickname">
              </label>
               <input type="submit" value="Creer mon compte">
    </form>



  </section>
</header>

