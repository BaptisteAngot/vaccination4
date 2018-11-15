<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';


  $titre = 'Nouveau message Contact';
  $error = array();

      if ( !empty($_POST['submitted']) ) {
          $name = trim(strip_tags($_POST['name']));
          $email = trim(strip_tags($_POST['email']));
          $message = trim(strip_tags($_POST['message']));

          $error=validationText($error,$name,3,40,'name');
          $error=validatemail($error,$email);
          $error=validationText($error,$message,3,1000,'message');

          pre($error);

          if (count($error) == 0){
            mail($email,$titre,$message);
          }
      }
      include 'inc/header.php';
?>


  <div id= "intro">
    <p>Bienvenue sur notre site InfoVaccins.com </br>
      Si vous souhaitez consulter les informations concernant vos vaccins, </br>
      inscrivez-vous dès maintenant !</p>
    <div class="wrap">
      <?php if(!isLogged()){ ?>
      <!-- Bouton connexion -->
      <div class="connexion">
        <a href="connexion.php">Se connecter</a>
      </div>
      <!-- Bouton inscription -->
      <div class="inscription">
        <a href="inscription.php">S'inscrire</a>
      </div>
      <div class="clear"></div>
    <?php }else {?>
      <div class="connexion">
        <a href="deconnexion.php">Deconnexion</a>
      </div>
    <?php } ?>
    </div>
  </div>

  <div id ="FAQ">
  <h2>Questions fréquentes</h2>
  <div class="ligne"></div>
    <div class="wrap-FAQ">
      <ul>
        <div class="boiteQuestion"> <li>Qu'est-ce que InfoVaccins.com?</li> </div>
        <p>InfoVaccins.com est un carnet de santé connecté accessible sous toutes les patformes.</p>
        <div class="boiteQuestion"> <li>À quoi sert-il?</li> </div>
        <p>Il permet de consulter les informations des différents vaccins mais également de s'y tenir
           informé.Après inscription InfoVaccins.com vous avertira des prochains vaccins vous concernant personnellement.
        </p>
        <div class="boiteQuestion"> <li>Qui sont les concernés?</li> </div>
        <p>InfoVaccins.com concerne tous le monde.</p>
        <div class="boiteQuestion"> <li>Quels sont les avantages?</li> </div>
        <p>InfoVaccins.com permet une de s'informer rapidement et efficacement sans avoir besoins de consulter un médecin
          car toutes nos informations on était vérifié par des spécialiste en matière de vaccination.
        </p>
      </ul>
    </div>
  </div>


  <section id="equipe">
  <h2>Notre équipe</h2>
    <div class="ligne"></div>
    <div class="wrap">
      <div class="section1">
          <img src="images/Equipe/BaptisteAngot.jpg" alt="Un membre d'InfoVaccins.">
          <h3>Baptiste Angot </h3>
          <p>Développeur WEB à NFactory</p>
      </div>
      <div class="section1">
          <img src="images/Equipe/TurpinPaul.jpg" alt="Un membre d'InfoVaccins.">
          <h3>Paul Turpin</h3>
          <p>Développeur WEB à NFactory</p>
      </div>
      <div class="section1">
          <img src="images/Equipe/Jean-BaptisteDeSaint-Léger.jpg" alt="Un membre d'InfoVaccins.">
          <h3>Jean-Baptiste de Sain-Léger</h3>
          <p>Développeur WEB à NFactory</p>
      </div>
      <div class="section1">
          <img src="images/Equipe/NicolasDufresne.jpg" alt="Un membre d'InfoVaccins.">
          <h3>Nicolas Dufresne</h3>
          <p>Développeur WEB à NFactory</p>
      </div>
    </div>
  </section>
  <div class="clear"></div>



  <section id="partenaires">
    <h2>Nos partenaires</h2>
    <div class="wrap">
        <div class="ligne"></div>
        <div id="box"><img height="700" src="images/partenaires.png" width="350"></div>
    </div>
  </section>
   <div id="form-contact">
     <h2>Nous contacter</h2>
        <div class="ligne"></div>
        <div class="wrap">
        <p> Si vous souhaitez nous contacter pour des informations complémentaires, remplissez le formulaire suivant :</p>
        <form action="" method="post">
          <div class="w50">
            <label for="name">Votre Nom</label>
            <input class="inputerror" type="text" name="name" value="<?php if (isLogged()) {
              echo $_SESSION['user']['pseudo'];
            }else { ?>" placeholder="<?php echo "Ex: Pierre Martin" ; } ?>">
          </div>
          <div class="w50">
              <label for="email">Votre Email</label>
              <input type="email" name="email" value="<?php if (isLogged()) {
                echo $_SESSION['user']['email'];
              } else {?>" placeholder="<?php echo 'Ex: pierremartin@gmail.com' ;} ?>">
          </div>
          <div class="w100">
            <label for="message">Votre Message</label>
            <textarea name="message" rows="8" cols="80" placeholder="Votre message..."></textarea>
          </div>
          <input type="submit" name="submitted" value="Envoyer">
        </form>
      </div>
    </div>
    <div class="clear"></div>

  <?php include 'inc/footer.php'; ?>
