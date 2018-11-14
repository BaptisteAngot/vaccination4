<?php
  include 'inc/pdo.php';
  include 'inc/function.php';
  include 'inc/request.php';

  if (isLogged()) {
    // header('Location: user_log.php');
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
        <div class="wrap">
          <ul>
            <div class="boiteQuestion"> <li>Qu'est-ce que InfoVaccins.com?</li> </div>
            <p>InfoVaccins.com est un carnet de santé connecté accessible sous toutes les patformes.</p>
            <div class="boiteQuestion"> <li>À quoi sert-il?</li> </div>
            <p>Il permet de consulter les informations des différents vaccins mais également de s'y tenir
               informé.Après inscription InfoVaccins.com vous avertira des prochains vaccins vous concernant personnellement.
            </p><br>
            <div class="boiteQuestion"> <li>Qui sont les concernés?</li> </div>
            <p>InfoVaccins.com concerne tous le monde.</p>
            <div class="boiteQuestion"> <li>Quels sont les avantages?</li> </div>
            <p>InfoVaccins.com permet une de s'informer rapidement et efficacement sans avoir besoins de consulter un médecin
            car toutes nos informations on était vérifié par des spécialiste en matière de vaccination.</p>
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
              <h3>Jean-Baptiste de Saint-Léger</h3>
              <p>Développeur WEB à NFactory</p>
            </div>
            <div class="section1">
              <img src="images/Equipe/NicolasDufresne.jpg" alt="Un membre d'InfoVaccins.">
              <h3>Nicolas Dufresne</h3>
              <p>Développeur WEB à NFactory</p>
            </div>
        </div>
      </section>



      <section id="partenaires">

      <h2>Nos partenaires</h2>
        <div class="wrap">
          <div class="clear"></div>

          <div class="wrap">
          <div class="ligne"></div>
          <div class="section2">
            <a href="#"><img src="images/e-vaccine.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/e-vaccine.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/e-vaccine.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>
          <div class="section2">
            <a href="#"><img src="images/e-vaccine.png" alt="Un partenaire d'InfoVaccins."></a>
          </div>

        </div>
      </section>

      <div class="clear"></div>
  <?php

  $titre = 'Nouveau message';

  $error = array();

      if ( !empty($_POST['submitnewpost']) ) {
          $name = trim(strip_tags($_POST['name']));
          $email = trim(strip_tags($_POST['email']));
          $message = trim(strip_tags($_POST['message']));

          if (!empty($name)){
              if(strlen($name) < 3 ) {
          $error['name'] = 'Votre nom est trop court. (minimum 3 caractères)';
        } elseif(strlen($name) > 40) {
          $error['name'] = 'Votre nom est trop long.';
        }

          } else {
            $error['name'] = 'Veuillez entrer votre nom';
          }

          if (!empty($email)){
              if(strlen($email) < 3 ) {
          $error['email'] = 'Votre email est trop court. (minimum 3 caractères)';
        } elseif(strlen($email) > 220) {
          $error['email'] = 'Votre email est trop long.';
        }

          } else {
            $error['email'] = 'Veuillez renseigner un titre';
          }

          if (!empty($message)){
              if(strlen($message) < 3 ) {
          $error['message'] = 'Votre message est trop court. (minimum 3 caractères)';
        }

          } else {
            $error['message'] = 'Veuillez renseigner un message';
          }

          if (count($error) == 0){
              $sql = "INSERT INTO ";
              $query = $pdo->prepare($sql);

              $query->bindValue(':name',$name, PDO::PARAM_STR);
              $query->bindValue(':email',$email, PDO::PARAM_STR);
              $query->bindValue(':message',$message, PDO::PARAM_STR);

              $query->execute();
          }
      }

   ?>


   <div class="section4">
     <h2>Contact</h2>
   <div class="wrap">
   <section id="form_contact">


                <div class="ligne"></div>
                <p class="textintro">Si vous souhaitez nous contacter pour des informations complémentaires, remplissez le formulaire suivant :</p>

                <form action="" method="post">
                  <div class="w50">
                    <label for="name">Votre Nom</label>
                    <input class="inputerror" type="text" name="name" value="" placeholder="Ex: Pierre Martin">
                  </div>

                  <div class="w50">
                    <label for="email">Votre Email</label>
                    <input type="email" name="email" value="" placeholder="Ex: pierremartin@gmail.com">
                  </div>

                  <div class="w100">
                    <label for="message">Votre Message</label>
                    <textarea name="message" rows="8" cols="80" placeholder="Votre message..."></textarea>
                  </div>

                  <input type="submit" name="submit" value="Envoyer">
                </form>
    </section>
    </div>
        <div class="clear"></div>
   </div>
  <?php include 'inc/footer.php'; ?>
