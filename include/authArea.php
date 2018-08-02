<!--Zone info membre connecter-->
  <section id=userInfo>
   <?php
   //Si Mmembre connecter
    if (isset($_SESSION['nickname']))
    {
      if($_SESSION['userLevel'] == 'admin' ){
        ?>
        Connecté en tant qu'administrateur :<strong> <?php echo htmlspecialchars($_SESSION['nickname']);

      }else{
        ?></strong>
        Vous êtes connecté en tant que membre : <strong><?php echo htmlspecialchars($_SESSION['nickname']);
      }
      ?></strong>
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
