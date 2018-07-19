
<?php $title = "creation de compte" ?>

<?php ob_start(); ?>

<a href="index.php">Retour à la liste des billets</a>

<h4>Creation de compte</h4>
    <form action="index.php?action=newUser" method="post">
      <p>Veuillez renseigner vos informations afin de créer votre compte</p>
              <p>
                <label>Votre pseudo
                  <input type="text" name="nickname" value="" required>
                </label>
              </p>
              <p>
                <label>Votre Email
                  <input type="email" name="mail" required>
                </label>
              </p>
              <p>
                <label>Votre mot de passe
                  <input type="password" name="password" required>
                </label>
              </p>
              <p>
                <label>Confirmez votre mot de passe
                  <input type="password" name="password2" required>
                </label>
              </p>
                <input type="submit" value="Creer mon compte">

              <span id="formstatus">
               <?php if(isset($info)){
                echo $info;
              }?>
              </span>

    </form>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/template.php'); ?>
