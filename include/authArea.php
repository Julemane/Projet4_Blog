<!--Zone info membre connecter-->
  <section id=userInfo>
   <?php
   //Si Mmembre connecter
    if (isset($_SESSION['nickname']))
    {
      ?>
      <p>Bienvenue dans votre espace membre <?php echo htmlspecialchars($_SESSION['nickname']);?>
      <p><a href="index.php?action=logout">Se déconnecter</a></p>
      <?php
    }
    else{
      //Si pas de variable de session on affiche la creation de compte et le form de login
      include('login.php');
      include('accountCreation.php');
    }
  ?>
  </section>
